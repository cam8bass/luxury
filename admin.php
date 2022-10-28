<?php
require_once('src/controllers/ControllerLogin.php');
require_once('src/controllers/ControllerAdmin.php');

use App\controllers\ControllerLogin\login;
use App\controllers\ControllerAdmin\Admin;

try {


  if (isset($_GET['action']) && isset($_GET['login'])) {

    if (($_GET['login'] === "false") && ($_GET['action'] === "login")) {
      // Permets de lancer la vérification du formulaire de login
      (new login())->userLogin();
    }

    if ($_GET['login'] === "true") {
      $currentUser = (new login())->alreadyLoggin();

      if ($currentUser) {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

          if ($_GET['action'] === "confirmCreateAd") {
            (new Admin())->addAd();
          }
        } elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
          if ($_GET['action'] === "dashboard") {
            require('src/views/viewAdmin/dashboard.html');
          } elseif ($_GET['action'] === "settings") {
            (new Admin())->settings();
            require('src/views/viewAdmin/settings.html');
          } elseif ($_GET['action'] === "createAd") {
            require('src/views/viewAdmin/createAd.html');
          } elseif ($_GET['action'] === "displayAd") {
            (new Admin())->loadAllAd();
            require('src/views/viewAdmin/displayAd.html');
          } elseif ($_GET['action'] === "logout") {
            require('src/views/viewAdmin/logout.html');
          } elseif ($_GET['action'] === "confirmLogout") {
            // Permets de déconnecter l'utilisateur
            (new login())->logout();
          }
        }
      } else {
        throw new Exception(ERROR_ACCESS_DENIED);
      }
    }

    //
  } elseif (!isset($_GET['action']) && !isset($_GET['login'])) {
    // Permets de récupérer la session de l'utilisateur pour une durée de 14 jours 
    $currentUser = (new login())->alreadyLoggin();

    if ($currentUser) {
      header("location: ../../admin.php?login=true&action=dashboard");
    } else {
      // Permets d'afficher la page de login si aucune action n’est présente et s’il n'y a pas de statut
      // echo "test";
      require('src/views/viewAdmin/login.html');
    }
  }
} catch (Exception $e) {
  $errorMessage =  $e->getMessage();
  echo $errorMessage;
}
