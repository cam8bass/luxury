<?php

namespace App\controllers\ControllerLogin;

require_once('src/dataBase/Database.php');
require_once('src/models/ModelLogin.php');
require_once('src/models/ModelErrorManagement.php');

use App\models\ModelErrorManagement\ErrorManagement;
use App\database\Database\DatabaseConnection;
use App\models\ModelLogin\ModelLogin;

class login
{

  function __construct()
  {
    $this->dbh = new DatabaseConnection();
    $this->modelLogin = new ModelLogin();
    $this->modelLogin->dbh = $this->dbh;
    $this->errorManagement = new ErrorManagement();
  }

  public function userLogin()
  {
    // Permets de vérifier les inputs
    $allInput = $this->errorManagement->sanatizeLoginAccount($_POST);
    // Permets de récupérer et valider l’adresse email et le password
    $email = $allInput['email'] ?? '';
    $password = $allInput['password'] ?? "";

    // Permets de rechercher un utilisateur grâce à l'email rentré
    $userAccount = $this->modelLogin->retrieveEmail($email);

    // Permets de vérifier si les données du formulaire sont correctes
    $errorLogin = $this->errorManagement->checkInputLogin($userAccount, $password, $email);

    if (empty(array_filter($errorLogin, fn ($el) => $el !== ""))) {
      $this->modelLogin->loginUser($userAccount);
      header("location: admin?login=true&action=dashboard");

    } else {
      require('src/views/viewAdmin/login.php');
    }
  }

  public function alreadyLoggin()
  {
    // Permets de vérifier si l'utilisateur est déjà connecté
    $currentUser = $this->modelLogin->checkUserLoggedIn();

    if ($currentUser) {
      session_start([
        'gc_maxlifetime' => 60 * 60 * 24 * 14,
        'use_strict_mode' => true,
        'use_only_cookies' => true,
        'cookie_lifetime' => 60 * 60 * 24 * 14,
        'cookie_httponly' => true,
        "cookie_secure" => true
      ]);
      $_SESSION['currentUser'] = $currentUser ?? "";
      return $currentUser;
    } else return;
  }

  public function logout()
  {
    $idSession = $_COOKIE["session"] ?? "";
    $this->modelLogin->userLogout($idSession);
    header("location: admin");
  }
}
