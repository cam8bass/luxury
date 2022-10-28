<?php

namespace App\models\ModelLogin;

use App\database\Database\DatabaseConnection;
use PDO;

require_once('src/dataBase/Database.php');
require_once('src/config/config.php');

class ModelLogin
{
  public DatabaseConnection $dbh;

  /**
   * @param string $email
   * @return array user email and id
   */
  public function retrieveEmail(string $email)
  {
    $statementRetrieveEmail = $this->dbh->connectDb()->prepare("SELECT email,idUser,password FROM user WHERE email=:email");
    $statementRetrieveEmail->bindValue(":email", $email);
    $statementRetrieveEmail->execute();
    return $statementRetrieveEmail->fetch();
  }

  /**
   * delete current session
   * @param string $idSession
   */
  public function deleteSession(string $idSession)
  {
    $statementDeleteSession = $this->dbh->connectDb()->prepare('DELETE FROM session WHERE idSession=:idSession');
    $statementDeleteSession->bindValue("idSession", $idSession);
    $statementDeleteSession->execute();
  }

  /**
   * retrieve session information
   * @param string $idSession
   * @return array session data
   */
  public function readSession(string $idSession)
  {
    $statementReadSession = $this->dbh->connectDb()->prepare("SELECT * FROM session WHERE idSession=:idSession");
    $statementReadSession->bindValue(":idSession", $idSession);
    $statementReadSession->execute();
    return $statementReadSession->fetch();
  }

  /**
   * returns profile of the connected user
   * @param string $idUser
   * @return array current user
   */
  public function readUser(int $idUser): array
  {
    $statementReadUser = $this->dbh->connectDb()->prepare("SELECT firstName,lastName,email FROM user WHERE idUser=:idUser");
    $statementReadUser->bindValue(":idUser", $idUser);
    $statementReadUser->execute();
    return $statementReadUser->fetch();
  }

  /**
   * create new session 
   * @param string $idSession
   * @param string $idUser
   * @return bool 
   */
  public function createNewSession(string $idSession, string $idUser): bool
  {
    $statementCreateNewSession = $this->dbh->connectDb()->prepare("INSERT INTO session 
    (idSession,idUser) 
    VALUES(
      :idSession,
      :idUser
    )");

    $statementCreateNewSession->bindValue(":idSession", $idSession);
    $statementCreateNewSession->bindValue(":idUser", $idUser);
    $statementCreateNewSession->execute();
    return $statementCreateNewSession->fetch(PDO::FETCH_BOUND);
  }

  /**
   * Init session and create coookie 
   * @param array $userAccount
   * @return void
   */
  public function loginUser(array $userAccount): void
  {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $idUser = $userAccount['idUser'];
      // Permets de créer un id pour la session
      $idSession = bin2hex(random_bytes(32));
      // Permets d'envoyer l'id dans la session côté Bdd
      $this->createNewSession($idSession, $idUser);
      $signature = hash_hmac('sha256', $idSession, SECRET);
      //  Permets de créer 2 cookies (signature et session)
      setcookie('signature', $signature, time() + 60 * 60 * 24 * 14, '/', '', true, true);
      setcookie('session', $idSession, time() + 60 * 60 * 24 * 14, '/', '', true, true);
    }
  }

  public function checkUserLoggedIn()
  {
    $idSession = $_COOKIE['session'] ?? '';
    $signature = $_COOKIE['signature'] ?? '';

    if ($idSession & $signature) {
      $hash = hash_hmac('sha256', $idSession, SECRET);


      if (hash_equals($hash, $signature)) {
        $session = $this->readSession($idSession);

        if ($session) {
          $currentUser = $this->readUser($session["idUser"]);
        }
      }
    }
    return $currentUser ?? false;
  }

  /**
   * user logout
   * @param string $idSession
   */
  public function userLogout(string $idSession)
  {
    $this->deleteSession($idSession);
    setcookie('session', '', time() - 1, "/");
    setcookie('signature', '', time() - 1, "/");
    unset($_SESSION['currentUser']);
    session_destroy();
    return;
  }
}
