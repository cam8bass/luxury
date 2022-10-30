class ViewError {
  _errorTitle = document.querySelector("#error-title");
  _errorMessage = document.querySelector("#error-message");

  displayError(error) {
    this._errorTitle.textContent = "Error lors du changement d'adresse email ";
    this._errorMessage.textContent = `Nouvelle adresse email : ${
      error.errorNewEmail ? error.errorNewEmail : "elle est valide"
    } , ancienne adresse email: ${
      error.errorOldEmail ? error.errorOldEmail : "elle est valide"
    }`;
  }
}

export default new ViewError();
