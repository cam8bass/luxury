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

  handlerCheckInputTitle(handler) {
    this._parentElement
      .querySelector("#input-title")
      .addEventListener("change", function () {
        handler();
      });
  }
  displayErrorCreateAdSubmit(allInput, allErrors) {
    if (allErrors["errorImg"]) {
      this._errorImg.textContent = allErrors["errorImg"];
      this._inputImg.textContent = "";
    } else {
      this._errorImg.textContent = "";
    }

    if (allErrors["errorTitle"]) {
      this._errorTitle.textContent = allErrors["errorTitle"];
      this._inputTitle.value = "";
    } else {
      this._errorTitle.textContent = "";
      this._inputTitle.value = allInput["title"]??"";
    }

    if (allErrors["errorLocation"]) {
      this._errorLocation.textContent = allErrors["errorLocation"];
      this._inputLocation.value = "";
    } else {
      this._errorLocation.textContent = "";
      this._inputLocation.value = allInput["location"]??"";
    }

    if (allErrors["errorRoom"]) {
      this._errorRoom.textContent = allErrors["errorRoom"];
      this._inputRoom.value = "";
    } else {
      this._errorRoom.textContent = "";
      this._inputRoom.value = allInput["room"]??"";
    }

    if (allErrors["errorArea"]) {
      this._errorArea.textContent = allErrors["errorArea"];
      this._inputArea.value = "";
    } else {
      this._errorArea.textContent = "";
      this._inputArea.value = allInput["area"]??"";
    }

    if (allErrors["errorPrice"]) {
      this._errorPrice.textContent = allErrors["errorPrice"];
      this._inputPrice.value = "";
    } else {
      this._errorPrice.textContent = "";
      this._inputPrice.value = allInput["price"]??"";
    }

    if (allErrors["errorDescription"]) {
      this._errorDescription.textContent = allErrors["errorDescription"];
      this._inputDescription.textContent = "";
    } else {
      this._errorDescription.textContent = "";
      this._inputDescription.textContent = allInput["description"]??"";
    }
  }
}

export default new ViewCreateAd();
