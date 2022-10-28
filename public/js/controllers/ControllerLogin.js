import modelLogin from "../models/ModelLogin.js";
import viewLogin from "../views/ViewLogin.js";

class ControleLogin {
  checkLogin() {
    if (!viewLogin._inputEmail) return;
    viewLogin._inputEmail.addEventListener("change", function () {
      modelLogin.validEmail(this, viewLogin._errorEmailText);
    });

    if (!viewLogin._inputPassword) return;
    viewLogin._inputPassword.addEventListener("change", function () {
      modelLogin.validPassword(this, viewLogin._errorPasswordText);
    });
    
    if (!viewLogin._formLogin) return;
    viewLogin._formLogin.addEventListener("submit", function (e) {
      e.preventDefault();

      if (
        modelLogin.validEmail(
          viewLogin._inputEmail,
          viewLogin._errorEmailText
        ) &&
        modelLogin.validPassword(
          viewLogin._inputPassword,
          viewLogin._errorPasswordText
        )
      ) {
        viewLogin._formLogin.submit();
      }
    });
  }

  checkLoginSubmit = async function () {
    const [email, error] = await modelLogin.checkErrorLoginSubmit();
    viewLogin.displayErrorSubmit(email, error);
  };
}

const controleLogin = new ControleLogin();
//
const init = function () {
  controleLogin.checkLogin();
  controleLogin.checkLoginSubmit();
};

init();
