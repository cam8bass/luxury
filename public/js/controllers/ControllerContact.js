import modelContact from "../models/ModelContact.js";
import viewContact from "../views/ViewContact.js";
import modelLogin from "../models/ModelLogin.js";

class ControleContact {
  checkSendEmail() {
    // Input email
    viewContact._inputEmail.addEventListener("change", function () {
      modelLogin.validEmail(this, viewContact._errorEmailText);
    });
    // Input subject
    viewContact._inputSubject.addEventListener("change", function () {
      modelContact.validSubject(this, viewContact._errorSubjectText);
    });
    // Input message
    viewContact._inputMessage.addEventListener("change", function () {
      modelContact.validMessage(this, viewContact._errorMessageText);
    });
    // Form submit
    viewContact._formSendEmail.addEventListener("submit", function (e) {
      e.preventDefault();

      if (
        modelLogin.validEmail(
          viewContact._inputEmail,
          viewContact._errorEmailText
        ) &&
        modelContact.validSubject(
          viewContact._inputSubject,
          viewContact._errorSubjectText
        ) &&
        modelContact.validMessage(
          viewContact._inputMessage,
          viewContact._errorMessageText
        )
      ) {
        this.submit();
      }
    });
  }
}

const controleContact = new ControleContact();

const init = function () {
  controleContact.checkSendEmail();
};
init();
