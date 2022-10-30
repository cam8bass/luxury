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

  /**
   * delete ad
   * @param string $idAd 
   * @return bool 
   */
  public function deleteAd(string $idAd): bool
  {
    $statementDeleteAd = $this->dbh->connectDb()->prepare("DELETE * FROM ad WHERE idAd=:id");
    $statementDeleteAd->bindValue(":id", $idAd);
    $statementDeleteAd->execute();
    return $statementDeleteAd->fetch(PDO::FETCH_BOUND);
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
    $statementAddAd->bindValue(":status", "available");
    $statementAddAd->bindValue(":img", $img);
    $statementAddAd->bindValue(":title", $newAd['title']);
    $statementAddAd->bindValue(":area", $newAd['area']);
    $statementAddAd->bindValue(":room", $newAd['room']);
    $statementAddAd->bindValue(":price", $newAd['price']);
    $statementAddAd->bindValue(":location", $newAd['location']);
    $statementAddAd->bindValue(":description", $newAd['description']);
    $statementAddAd->execute();
    return $statementAddAd->fetch();
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
}
