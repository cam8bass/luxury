<?php

namespace App\controllers\ControllerUser;

require_once('src/dataBase/Database.php');
require_once('src/models/ModelAdmin.php');
require_once('src/models/ModelUser.php');
require_once('src/config/Mail.php');


use App\database\Database\DatabaseConnection;
use App\models\ModelAdmin\ModelAdmin;
use App\models\ModelUser\ModelUser;
use App\congig\Mail\Mail;


class User
{

  function __construct()
  {
    $this->dbh = new DatabaseConnection();
    $this->modelAdmin = new ModelAdmin();
    $this->modelAdmin->dbh = $this->dbh;
    $this->modelUser = new ModelUser();
    $this->mail = new Mail();
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
      // Permets d'envoyer l'email
      $messageMail = $this->mail->sendMail("lc.laignel@gmail.com", $allInput['subject'], $allInput['message'] . "<br>" . "Email envoyé pars $allInput[email]", $allInput['email']);

      if ($messageMail) {
        $requestType = "emailSend";
        require('src/views/ViewNotification.php');
      } else {
        $requestType = "EmailNotSend";
        require('src/views/ViewNotification.php');
      }
    } else {
      require('src/views/viewUser/contact.php');
    }
  }
}
