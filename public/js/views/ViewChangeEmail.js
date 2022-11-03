class ViewChangeEmail {
  _parentElement = document.querySelector(".content");
  _formChangeEmail = document.querySelector("#form-changeEmail");
  _inputOldEmail = document.querySelector("#input-oldEmail");
  _inputNewEmail = document.querySelector("#input-newEmail");
  _errorOldEmail = document.querySelector("#error-oldEmail");
  _errorNewEmail = document.querySelector("#error-newEmail");

  handlerSubmitChangeEmail(handler) {
    this._formChangeEmail.addEventListener("submit", function (e) {
      e.preventDefault();
      if (handler()) {
        this.submit();
      }
    });
  }
}

export default new ViewChangeEmail();
