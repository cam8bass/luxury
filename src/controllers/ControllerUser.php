<?php

namespace App\controllers\ControllerUser;

require_once('src/dataBase/Database.php');
require_once('src/models/ModelAdmin.php');

use App\database\Database\DatabaseConnection;
use App\models\ModelAdmin\ModelAdmin;


class User
{

  function __construct()
  {
    $this->dbh = new DatabaseConnection();
    $this->modelAdmin = new ModelAdmin();
    $this->modelAdmin->dbh = $this->dbh;
  }


  public function allAd()
  {
    $allAd = $this->modelAdmin->selectAllAd();
    $_SESSION['userAllAd'] = $allAd;
  }
}
