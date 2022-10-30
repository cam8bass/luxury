import { AJAX } from "../helper.js";

class ModelSettings {
  loadSettings = async function () {
    const allSettings = await AJAX("src/config/ajax/ajaxSettings.php");

    return allSettings;
  };

  checkOldAndNewEamil(inputOldEmail, inputNewEmail, errorNewEmail) {
    if (inputOldEmail.value === inputNewEmail.value) {
      errorNewEmail.textContent =
        "La nouvelle adresse email doit être différente de l'ancienne";
      return false;
    } else {
      errorNewEmail.textContent = "";
      return true;
    }
  }

  checkOldEmail(inputOldEmail, errorOldEmail, textEmail) {
    if (textEmail.textContent !== inputOldEmail.value) {
      errorOldEmail.textContent = "L'adresse email est incorrect";
      return false;
    } else {
      errorOldEmail.textContent = "";
      return true;
    }
  }

  checkAllErrorChangeEmail = async function () {
    const allErrors = await AJAX("src/config/ajax/ajaxChangeEmail.php");

    return allErrors;
  };
}

export default new ModelSettings();
