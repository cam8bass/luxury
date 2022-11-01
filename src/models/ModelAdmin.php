<?php

namespace App\models\ModelAdmin;

use App\database\Database\DatabaseConnection;
use PDO;

require_once('src/dataBase/Database.php');

class ModelAdmin
{
  public DatabaseConnection $dbh;
  public string $imgPath = "./data/uploads/";
  /**
   * retrieve user profile from settings page
   * @return array user profile (firstName, lastName, email)
   */
  public function userProfile(): array
  {
    $statementRetrieveUser = $this->dbh->connectDb()->prepare("SELECT firstName,lastName,email FROM user");
    $statementRetrieveUser->execute();
    return $statementRetrieveUser->fetch();
  }


  public function selectAllAd()
  {
    $statementSelectAllAd = $this->dbh->connectDb()->prepare("SELECT * FROM ad");
    $statementSelectAllAd->execute();
    return $statementSelectAllAd->fetchAll();
  }

  /**
   * request all information from ad selected
   * @param string $idAd ad selected
   * @return array all information from ad selected
   */
  public function retrieveAdWithId(string $idAd): array
  {
    $statementRetrieveAdWithAd = $this->dbh->connectDb()->prepare("SELECT * FROM ad WHERE idAd=:id ");
    $statementRetrieveAdWithAd->bindValue(":id", $idAd);
    $statementRetrieveAdWithAd->execute();
    return $statementRetrieveAdWithAd->fetch();
  }

  /**
   * retrieve user email
   * @param string $email
   * @return array user email
   */
  public function retrieveEmail(string $email)
  {
    $statementRetrieveEmail = $this->dbh->connectDb()->prepare("SELECT email FROM user WHERE email=:email");
    $statementRetrieveEmail->bindValue(":email", $email);
    $statementRetrieveEmail->execute();
    return $statementRetrieveEmail->fetch();
  }

  public function retrieveImg(string $idAd): array
  {
    $statementRetrieveImg = $this->dbh->connectDb()->prepare("SELECT img FROM ad WHERE idAd=$idAd");
    $statementRetrieveImg->execute();
    return $statementRetrieveImg->fetch();
  }

  /**
   * delete ad
   * @param string $idAd 
   * @return bool 
   */
  public function deleteAd(string $idAd)
  {
    $statementDeleteAd = $this->dbh->connectDb()->prepare("DELETE FROM ad WHERE idAd=:id ");
    $statementDeleteAd->bindValue(":id", $idAd);
    return $statementDeleteAd->execute();
  }

  /**
   * @param array $newAd
   * @return bool
   */
  public function addAd(array $newAd, string $img): bool
  {
    $statementAddAd = $this->dbh->connectDb()->prepare("INSERT INTO ad VALUES(
    DEFAULT,
      :status,
      :img,
      :title,
      :area,
      :room,
      :price,
      :location,
      :description
    )");
    $statementAddAd->bindValue(":status", "Available");
    $statementAddAd->bindValue(":img", $img);
    $statementAddAd->bindValue(":title", ucfirst(strtolower(trim($newAd['title']))));
    $statementAddAd->bindValue(":area", ucfirst(strtolower(trim($newAd['area']))));
    $statementAddAd->bindValue(":room", ucfirst(strtolower(trim($newAd['room']))));
    $statementAddAd->bindValue(":price", ucfirst(strtolower(trim($newAd['price']))));
    $statementAddAd->bindValue(":location", ucfirst(strtolower(trim($newAd['location']))));
    $statementAddAd->bindValue(":description", ucfirst(trim($newAd['description'])));
    return $statementAddAd->execute();
  }

  public function editAd(array $updateAd,  string $id): bool
  {
    $statementEditAd = $this->dbh->connectDb()->prepare("UPDATE ad SET 
   status=:newStatus,
    title=:newTitle,
    area=:newArea,
    room=:newRoom,
    price=:newPrice,
    location=:newLocation,
    description=:newDescription
    WHERE idAd=$id
    ");
    $statementEditAd->bindValue(":newStatus", ucfirst(strtolower(trim($updateAd['status']))));
    $statementEditAd->bindValue(":newTitle", ucfirst(strtolower(trim($updateAd['title']))));
    $statementEditAd->bindValue(":newArea", ucfirst(strtolower(trim($updateAd['area']))));
    $statementEditAd->bindValue(":newRoom", ucfirst(strtolower(trim($updateAd['room']))));
    $statementEditAd->bindValue(":newPrice", ucfirst(strtolower(trim($updateAd['price']))));
    $statementEditAd->bindValue(":newLocation", ucfirst(strtolower(trim($updateAd['location']))));
    $statementEditAd->bindValue(":newDescription", ucfirst(strtolower(trim($updateAd['description']))));

    return $statementEditAd->execute();
  }

  public function updateEmail(string $newEmail, string $oldUserEmail)
  {
    $statementUpdateEmail = $this->dbh->connectDb()->prepare("UPDATE user SET email=:newEmail WHERE email=:oldUserEmail");
    $statementUpdateEmail->bindValue(':newEmail', $newEmail);
    $statementUpdateEmail->bindValue(':oldUserEmail', $oldUserEmail);
    $statementUpdateEmail->execute();
  }

  public function saveNewImg(array $img)
  {
    $idImg = uniqid();
    $imgExtension = pathinfo($img['img']['name'], PATHINFO_EXTENSION);
    $imgName = explode('.', $img['img']['name']);
    // Permets de définir le nom de l'image, si l'image ne possède pas de nom alors id généré sera défini en tant que nom
    $newImgName =  !trim($imgName[0]) ? $idImg . "." . $imgExtension : strtolower(str_replace(" ", "", $imgName[0])) . "-" . $idImg . "." . $imgExtension;
    // Permets de sauvegarder la nouvelle image
    move_uploaded_file($img['img']['tmp_name'], $this->imgPath . $newImgName);
    return $this->imgPath . $newImgName;
  }

  /**
   * delete old user image
   * @param string $oldImgName path old img
   */
  public function deleteOldImg(string $oldImgName)
  {
    unlink($oldImgName);
  }
}
