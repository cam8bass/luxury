import View from "./Views.js";

class ViewSettings extends View {
  _parentElement = document.querySelector(".content");
  _btnEditEmail = document.querySelector("#edit-email");
  _textLastname = document.querySelector("#lastname");
  _textFirstname = document.querySelector("#firstname");
  _textEmail = document.querySelector("#email");
  _formChangeEmail = document.querySelector("#form-changeEmail");

  completeSettings(allSettings) {
    this._textFirstname.textContent = allSettings["firstName"] ?? "";
    this._textLastname.textContent = allSettings["lastName"] ?? "";
    this._textEmail.textContent = allSettings["email"] ?? "";
  }

  displayErrorSubmit(error) {
 
    error["errorNewEmail"]
      ? (this._parentElement.querySelector("#error-newEmail").textContent =
          error["errorNewEmail"])
      : "";

    error["errorOldEmail"]
      ? (this._parentElement.querySelector("#error-oldEmail").textContent =
          error["errorOldEmail"])
      : "";
  }

  toogleWindow() {
    this._formChangeEmail.classList.toggle("hidden");
  }

  handlerOpenChangeEmail() {
    this._btnEditEmail.addEventListener("click", this.toogleWindow.bind(this));
  }

  handlerCloseChangeEmail() {
    this._parentElement
      .querySelector("#btn-cancel")
      .addEventListener("click", this.toogleWindow.bind(this));
  }

  handlerSubmitChangeEmail(handler) {
    this._parentElement
      .querySelector("#form-changeEmail")
      .addEventListener("submit", function (e) {
        e.preventDefault();
        if (handler()) {
          this.submit();
        }
      });
  }
}

export default new ViewSettings();
