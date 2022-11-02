<?php

if ($requestType === "emailSend") {
  $title = "Email envoyé";
  $popupTitle = "Email envoyé";
  $popupText = "Votre email a été envoyé avec succès";
  $popupLinkReturn = "/contact";
} elseif ($requestType === "EmailNotSend") {
  $title = "Échec de l'envoi";
  $popupTitle = "Échec envoi email";
  $popupText = "Votre email n’a pas pu être envoyé, veuillez ressayer ultérieurement.";
  $popupLinkReturn = "/contact";
} elseif ($requestType === "addAd") {
  $title = "Annonce créée";
  $popupTitle = "Création de votre nouvelle annonce
  ";
  $popupText = "Votre nouvelle annonce vient être créée.";
  $popupLinkReturn = "admin?login=true&action=dashboard";
} elseif ($requestType === "changeEmail") {
  $title = "Modification email";
  $popupTitle = "Modification de l'adresse email
  ";
  $popupText = "Votre adresse email vient d'être modifiée.";
  $popupLinkReturn = "admin?login=true&action=dashboard";
} elseif ($requestType === "editAd") {
  $title = "Modification d'annonce";
  $popupTitle = "Modification de l'annonce
  ";
  $popupText = "Votre annonce vient d'être modifiée.";
  $popupLinkReturn = "admin?login=true&action=dashboard";
} elseif ($requestType === "notEditAd") {
  $title = "Échec modification";
  $popupTitle = "Échec lors de la modification de l'annonce
  ";
  $popupText = "Votre annonce n'a pas pu être modifiée";
  $popupLinkReturn = "admin?login=true&action=dashboard";
} elseif ($requestType === "deleteAd") {
  $title = "Annonce supprimée";
  $popupTitle = "Suppression de l'annonce";
  $popupText = "Votre annonce vient d’être supprimée.";
  $popupLinkReturn = "admin?login=true&action=dashboard";
} elseif ($requestType === "notDeleteAd") {
  $title = "Échec suppression";
  $popupTitle = "Échec suppression de l’annonce";
  $popupText = "Échec lors de la suppression de l’annonce";
  $popupLinkReturn = "admin?login=true&action=dashboard";
} else {
  throw new Exception(ERROR_REDIRECT);
}


$content = require("templates/layoutNotification.php");
