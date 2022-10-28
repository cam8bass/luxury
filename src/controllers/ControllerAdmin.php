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
      print_r($errorInput);
      $_SESSION['allInput'] = $allInput;
      $_SESSION['errorCreateAd'] = $errorInput;
      header("location:admin.php?login=true&action=createAd");
    }
  }
}
