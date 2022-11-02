 <?php
  require_once('src/controllers/ControllerLogin.php');
  require_once('src/controllers/ControllerAdmin.php');
  require_once('src/controllers/ControllerUser.php');

  use App\controllers\ControllerLogin\login;
  use App\controllers\ControllerAdmin\Admin;
  use App\controllers\ControllerUser\User;

  try {

    if (isset($_GET['login']) && isset($_GET['action'])) {

      if ($_GET['login'] === "false" && $_GET['action'] === "login") {
        // Permets de lancer la vérification du formulaire de login
        (new login())->userLogin();
      }

      if ($_GET['login'] === "true") {
        $currentUser = (new login())->alreadyLoggin();

        if ($currentUser) {

          if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            if ($_GET['action'] === "confirmCreateAd") {
              (new Admin())->addAd();
            } elseif ($_GET['action'] === "confirmChangeEmail") {
              (new Admin())->changeEmail();
            } elseif ($_GET['action'] === "confirmEditAd") {
              (new Admin)->confirmEditAd();
            }
          } elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
            if ($_GET['action'] === "dashboard") {
              require('src/views/viewAdmin/dashboard.php');
            } elseif ($_GET['action'] === "settings") {
              //Permets d'afficher la page mon profil
              (new Admin())->settings();
            } elseif ($_GET['action'] === "changeEmail") {
              require('src/views/viewAdmin/changeEmail.php');
            } elseif ($_GET['action'] === "createAd") {
              require('src/views/viewAdmin/createAd.php');
            } elseif ($_GET['action'] === "displayAllAd") {
              (new Admin())->loadAllAd();
            } elseif ($_GET['action'] === "confirmLogout") {
              (new Admin())->confirmLogout();
            } elseif ($_GET['action'] === "confirmDeleteAd") {
              (new Admin())->confirmDeleteAd();
            } elseif ($_GET['action'] === "deleteAd") {
              (new Admin)->deleteAd();
            } elseif ($_GET['action'] === "editAd") {
              (new Admin())->editAd();
            } elseif ($_GET['action'] === "logout") {
              // Permets de déconnecter l'utilisateur
              (new login())->logout();
            }
          }
        } else {
          throw new Exception(ERROR_ACCESS_DENIED);
        }
      }
    } elseif (!isset($_GET['login']) && !isset($_GET["action"])) {

      if ($_SERVER['REQUEST_URI'] === "/") {
        require('src/views/viewUser/home.html');
      } elseif ($_SERVER['REQUEST_URI'] === "/annonces") {
        session_start();
        (new User())->allAd();
        require('src/views/viewUser/ad.html');
      } elseif ($_SERVER['REQUEST_URI'] === "/contact") {
        require('src/views/viewUser/contact.php');
      } elseif ($_SERVER['REQUEST_URI'] === "/admin") {
        // Permets de récupérer la session de l'utilisateur pour une durée de 14 jours 
        $currentUser = (new login())->alreadyLoggin();

        if ($currentUser) {
          header("location: admin?login=true&action=dashboard");
        } else {
          // Permets d'afficher la page de login si aucune action n’est présente et s’il n'y a pas de statut
          require('src/views/viewAdmin/login.php');
        }
      }
    } elseif (!isset($_GET['login']) && $_GET['action'] === 'sendEmail') {
      // Mettre en place l'envoie d'email
      (new User)->sendEmail();
    }
  } catch (Exception $e) {
    $errorMessage =  $e->getMessage();
    echo $errorMessage;
  }
