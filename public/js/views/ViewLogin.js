class ViewLogin {
  _inputEmail = document.querySelector("#email");
  _inputPassword = document.querySelector("#password");
  _errorEmailText = document.querySelector("#errorEmail");
  _errorPasswordText = document.querySelector("#errorPassword");
  _formLogin = document.querySelector("#form-login");
  _btnSubmit = document.querySelector(".login__btn");

  _errorLogin = {
    errorEmail: "",
    errorPassword: "",
  };

  displayErrorSubmit(email, error) {

    error["errorEmail"]
      ? (this._errorEmailText.textContent = error["errorEmail"])
      : "";

    error["errorPassword"]
      ? (this._errorPasswordText.textContent = error["errorPassword"])
      : "";

    !error["errorEmail"] ? (this._inputEmail.value = email) : "";
  }

  handlerErrorLoginSubmit(handler) {
    window.addEventListener("load", handler);
  }

  handlerSubmit(handler) {
    if (!this._formLogin) return;

    this._formLogin.addEventListener(
      "click",
      this.handlerErrorLoginSubmit(handler)
    );
  }
}

export default new ViewLogin();
