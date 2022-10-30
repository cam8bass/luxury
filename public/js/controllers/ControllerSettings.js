import modelSettings from "../models/ModelSettings.js";
import viewSettings from "../views/ViewSettings.js";
import modelLogin from "../models/ModelLogin.js";

class ControleSettings {
  openSettings = async function () {
    const allSettings = await modelSettings.loadSettings();
    viewSettings.completeSettings(allSettings);
  };

  changeEmail() {
    if (
      modelLogin.validEmail(
        viewSettings._parentElement.querySelector("#input-oldEmail"),
        viewSettings._parentElement.querySelector("#error-oldEmail")
      ) &&
      modelSettings.checkOldEmail(
        viewSettings._parentElement.querySelector("#input-oldEmail"),
        viewSettings._parentElement.querySelector("#error-oldEmail"),
        viewSettings._parentElement.querySelector("#email")
      ) &&
      modelLogin.validEmail(
        viewSettings._parentElement.querySelector("#input-newEmail"),
        viewSettings._parentElement.querySelector("#error-newEmail")
      ) &&
      modelSettings.checkOldAndNewEamil(
        viewSettings._parentElement.querySelector("#input-oldEmail"),
        viewSettings._parentElement.querySelector("#input-newEmail"),
        viewSettings._parentElement.querySelector("#error-newEmail")
      )
    ) {
      return true;
    }

  }

  checkChangeEmailSubmit = async function () {
    const allError = await modelSettings.checkAllErrorChangeEmail();
    viewSettings.displayErrorSubmit(allError);

  };
}

const controleSettings = new ControleSettings();

const init = function () {
  controleSettings.openSettings();
  viewSettings.handlerOpenChangeEmail();
  viewSettings.handlerCloseChangeEmail();
  viewSettings.handlerSubmitChangeEmail(controleSettings.changeEmail);
  //test
  controleSettings.checkChangeEmailSubmit();
};
init();
