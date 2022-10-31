class ViewLogin {
  _inputEmail = document.querySelector("#email");
  _inputPassword = document.querySelector("#password");
  _errorEmailText = document.querySelector("#errorEmail");
  _errorPasswordText = document.querySelector("#errorPassword");
  _formLogin = document.querySelector("#form-login");
  _btnSubmit = document.querySelector(".login__btn");
}

export default new ViewLogin();
