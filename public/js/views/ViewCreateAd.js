import View from "./Views.js";

class ViewCreateAd extends View {
  _parentElement = document.querySelector("#form-createAd");
  // === Input ===
  _inputImg = document.querySelector("#input-img");
  _inputTitle = document.querySelector("#input-title");
  _inputLocation = document.querySelector("#input-location");
  _inputRoom = document.querySelector("#input-room");
  _inputArea = document.querySelector("#input-area");
  _inputPrice = document.querySelector("#input-price");
  _inputDescription = document.querySelector("#input-description");
  // === Error ===
  _errorMessage = "Problème d'affichage de la page";
  _errorImg = document.querySelector("#error-img");
  _errorTitle = document.querySelector("#error-title");
  _errorLocation = document.querySelector("#error-location");
  _errorRoom = document.querySelector("#error-room");
  _errorArea = document.querySelector("#error-area");
  _errorPrice = document.querySelector("#error-price");
  _errorDescription = document.querySelector("#error-description");
}

export default new ViewCreateAd();
