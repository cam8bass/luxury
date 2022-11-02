<?php

namespace App\controllers\ControllerUser;

require_once('src/dataBase/Database.php');
require_once('src/models/ModelAdmin.php');
require_once('src/models/ModelUser.php');

use App\database\Database\DatabaseConnection;
use App\models\ModelAdmin\ModelAdmin;
use App\models\ModelUser\ModelUser;


class User
{

  function __construct()
  {
    $this->dbh = new DatabaseConnection();
    $this->modelAdmin = new ModelAdmin();
    $this->modelAdmin->dbh = $this->dbh;
    $this->modelUser = new ModelUser();
  }


  public function allAd()
  {
    $allAd = $this->modelAdmin->selectAllAd();
    $_SESSION['userAllAd'] = $allAd;
  }

  public function sendEmail()
  {
    // Permets de filter les inputs
    $allInput = $this->modelUser->sanatizeSendEmail($_POST);
    // Permets de vérifier si les inputs sont conformes
    $errorSendEmail = $this->modelUser->checkAllInputSendEmail($_POST);

    if (empty(array_filter($errorSendEmail, fn ($el) => $el != ''))) {
      // envoyer l'email 
      // retourner un message success
      echo "send email";
    } else {
      require('src/views/viewUser/contact.php');
    }
  }
}
