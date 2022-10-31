import modelChangeEmail from "../models/ModelChangeEmail.js";
import viewChangeEmail from "../views/ViewChangeEmail.js";
import modelLogin from "../models/ModelLogin.js";

class ControleChangeEmail {
  changeEmail() {
    if (
      modelLogin.validEmail(
        viewChangeEmail._inputOldEmail,
        viewChangeEmail._errorOldEmail
      ) &&
      modelLogin.validEmail(
        viewChangeEmail._inputNewEmail,
        viewChangeEmail._errorNewEmail
      ) &&
      modelChangeEmail.checkOldAndNewEamil(
        viewChangeEmail._inputOldEmail,
        viewChangeEmail._inputNewEmail,
        viewChangeEmail._errorNewEmail
      )
    ) {
      return true;
    }
  }
}

const controleChangeEmail = new ControleChangeEmail();

const init = function () {
  viewChangeEmail.handlerSubmitChangeEmail(controleChangeEmail.changeEmail);
};
init();
