<?php

$idAd = $_SESSION["idAdDelete"] ?? "";

if ($requestType === "deleteAd") {
  // Permet de remplir la page de confirmation de suppréssion d'une annonce
  $title = "Supprimer annonce";
  $popupTitle = "Suppression de l'annonce";
  $popupText = "Êtes-vous sûr de vouloir surprimer cette annonce ?";
  $popupLinkCancel = "admin?login=true&action=displayAllAd";
  $popupLinkAgree = "admin?login=true&action=deleteAd&id=$idAd";
} elseif ($requestType === "logout") {
  // Permet de remplir la page de confirmation de déconnexion
  $title = "Deconnexion";
  $popupTitle = "Deconnexion";
  $popupText = "Êtes-vous sur de vouloir vous déconnecter?";
  $popupLinkCancel = "admin?login=true&action=dashboard";
  $popupLinkAgree = "admin?login=true&action=logout";
}


$content = require('templates/layoutConfirm.php');
require('templates/layout.php');
