<?php

namespace App\controllers\ControllerAdmin;

require_once('src/dataBase/Database.php');
require_once('src/models/ModelAdmin.php');
require_once('src/models/ModelErrorManagement.php');

use App\database\Database\DatabaseConnection;
use App\models\ModelAdmin\ModelAdmin;
use App\models\ModelLogin\ModelLogin;
use App\models\ModelErrorManagement\ErrorManagement;
use Exception;

class Admin
{

  function __construct()
  {
    $this->dbh = new DatabaseConnection();
    $this->modelAdmin = new ModelAdmin();
    $this->modelAdmin->dbh = $this->dbh;
    $this->errorManagement = new ErrorManagement();
  }

  public function settings()
  {
    $profile = $this->modelAdmin->userProfile();
    require("src/views/viewAdmin/settings.php");
  }

  public function loadAllAd()
  {
    $allAd = $this->modelAdmin->selectAllAd();
    require('src/views/viewAdmin/displayAllAd.php');
  }

  public function addAd()
  {
    // Permets de nettoyer le formulaire de création 
    $allInput = $this->errorManagement->sanatizeCreateForm($_POST);
    // Permet de vérifier le formulaire
    $errorInput = $this->errorManagement->checkAllInputCreateAd($_POST);
    //Permet de vérifier l'image
    $errorImg = $this->errorManagement->checkImgFile($_FILES);

    if (empty(array_filter($errorInput, fn ($el) => $el != '')) && !$errorImg) {
      // Permets d'enregistrer l'image dans le dossier 
      $newImgPath = $this->modelAdmin->saveNewImg($_FILES);
      // Permets d'enregistrer la nouvelle annonce
      $saveNewAd = $this->modelAdmin->addAd($allInput, $newImgPath);

      // afficher page success
      header('location: admin.php?login=true&action=dashboard');
    } else {
      require('src/views/viewAdmin/createAd.php');
    }
  }

  public function changeEmail()
  {
    $allInput = $this->errorManagement->sanatizeChangeEmail($_POST);
    $oldEmail = $allInput['oldEmail'] ?? "";
    $newEmail = filter_var(trim($allInput['newEmail']) ?? "", FILTER_VALIDATE_EMAIL);
    // Permets de récupérer l'ancienne adresse de l'utilisateur
    $oldUserEmail = $this->modelAdmin->retrieveEmail($oldEmail) ?? "";
    // Permet de vérifier les inputs 
    $errorInput = $this->errorManagement->checkErrorChangeEmail($oldEmail, $oldUserEmail['email'] ?? "", $newEmail);
    if (empty(array_filter($errorInput, fn ($el) => $el != ''))) {
      // Permets d'enregistrer dans la Bdd la nouvelle adresse email
      $this->modelAdmin->updateEmail($newEmail, $oldUserEmail['email']);
      header("location: admin.php?login=true&action=dashboard");
    } else {
      require('src/views/viewAdmin/changeEmail.php');
    }
  }

  public function editAd()
  {
    $idAd = $_GET['id'] ?? "";
    $infoAd = $this->modelAdmin->retrieveAdWithId($idAd);
    require('src/views/viewAdmin/editAd.php');
  }

  public function confirmEditAd()
  {
    $requestType = "editAd";
    $idAd = $_GET['id'] ?? "";
    // Permets de nettoyer le formulaire de création 
    $allInput = $this->errorManagement->sanatizeCreateForm($_POST);
    // Permet de vérifier le formulaire
    $errorInput = $this->errorManagement->checkAllInputCreateAd($_POST);

    $errorStatus = $this->errorManagement->checkErrorStatus($allInput['status'] ?? "");
    if ($errorStatus) {
      $errorInput['errorStatus'] = $errorStatus;
    }


    if (empty(array_filter($errorInput, fn ($el) => $el != '')) && !$errorStatus) {

      // Permets de mettre à jour l'annonce dans la bdd
      $saveEdit = $this->modelAdmin->editAd($allInput, $idAd);


      if ($saveEdit) {
        header("location: admin.php?login=true&action=dashboard");
      } else {
        throw new Exception("a écrire");
      }
    } else {
      require('src/views/viewAdmin/editAd.php');
    }
  }

  public function confirmDeleteAd()
  {
    $requestType = "deleteAd";
    $idAd = $_GET['id'] ?? "";
    $_SESSION['idAd'] = $idAd;
    require('src/views/viewAdmin/confirmPage.php');
  }

  public function confirmLogout()
  {
    $requestType = "logout";
    require('src/views/viewAdmin/confirmPage.php');
  }

  public function deleteAd()
  {
    $idAd = $_GET['id'] ?? "";
    $imgAd = $this->modelAdmin->retrieveImg($idAd);
    // Permets de supprimer l'image de l'annonce
    $deleteAd = $this->modelAdmin->deleteAd($idAd);

    if ($deleteAd) {
      $this->modelAdmin->deleteOldImg($imgAd['img']);
      header("location: admin.php?login=true&action=dashboard");
    } else {
      throw new Exception("à écrire");
    }
  }
}
