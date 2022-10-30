<?php

namespace App\controllers\ControllerAdmin;

require_once('src/dataBase/Database.php');
require_once('src/models/ModelAdmin.php');
require_once('src/models/ModelErrorManagement.php');

use App\database\Database\DatabaseConnection;
use App\models\ModelAdmin\ModelAdmin;
use App\models\ModelLogin\ModelLogin;
use App\models\ModelErrorManagement\ErrorManagement;

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
    $_SESSION['userProfile'] = $profile ?? [];
  }

  public function loadAllAd()
  {
    $allAdd = $this->modelAdmin->selectAllAd();
    $_SESSION['allAd'] = $allAdd ?? [];
  }

  public function addAd()
  {
    // Permets de nettoyer le formulaire de création 
    $allInput = $this->errorManagement->sanatizeCreateForm($_POST);
    // Permet de vérifier le formulaire
    $errorInput = $this->errorManagement->checkAllInputCreateAd($allInput, $_FILES);
    if (empty(array_filter($errorInput, fn ($el) => $el != ''))) {
      // Permets d'enregistrer l'image dans le dossier 
      $newImgPath = $this->modelAdmin->saveNewImg($_FILES);
      // Permets d'enregistrer la nouvelle annonce
      $saveNewAd = $this->modelAdmin->addAd($allInput, $newImgPath);

      // afficher page success
      header('location: admin.php?login=true&action=dashboard');
    } else {
      $_SESSION['allInput'] = $allInput;
      $_SESSION['errorCreateAd'] = $errorInput;
      header("location:admin.php?login=true&action=createAd");
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
      // afficher page d'erreur
      // a voir

      $_SESSION['errorInputEmail'] = $errorInput;
      // $_SESSION['userProfile'] = $errorInput;

      header("location: admin.php?login=true&action=settings");
    }
  }
}
