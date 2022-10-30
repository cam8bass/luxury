import { AJAX } from "../helper.js";

class ModelLogin {
  /**
   *valid email before submitting from
   * @param {*} inputEmail
   * @param {*} errorEmailText
   * @returns bool
   */
  validEmail(inputEmail, errorEmailText) {
    const emailRegex = new RegExp(
      "^[a-zA-Z0-9.-_]+[@]{1}[a-zA-Z0-9.-_]+[.]{1}[a-z]{2,10}$",
      "g"
    );
    if (!inputEmail.value) {
      errorEmailText.textContent = "Veuillez renseigner ce champ";
      return false;
    } else if (emailRegex.test(inputEmail.value)) {
      errorEmailText.textContent = "";
      return true;
    } else {
      errorEmailText.textContent = "Adresse non valide";
      return false;
    }
  }

  /**
   * valide password before submitting form
   * @param {*} inputPassword
   * @param {*} errorPasswordText
   * @returns bool
   */
  validPassword(inputPassword, errorPasswordText) {
    let message;
    if (!inputPassword.value) {
      message = "Veuillez renseigner ce champ";
      errorPasswordText.textContent = message;
      return false;
    } else if (
      inputPassword.value.length < 8 &&
      inputPassword.value.length > 0
    ) {
      message = "Le password doit comporter au moins 8 caractères";
      errorPasswordText.textContent = message;
      return false;
    } else if (!/[A-Z]/.test(inputPassword.value)) {
      message = "Le password doit contenir au moins une majuscule ";
      errorPasswordText.textContent = message;
      return false;
    } else if (!/[a-z]/.test(inputPassword.value)) {
      message = "Le password doit contenir au moins une minuscule";
      errorPasswordText.textContent = message;
      return false;
    } else if (!/[0-9]/.test(inputPassword.value)) {
      message = "Le password doit contenir au moins un chiffre";
      errorPasswordText.textContent = message;
      return false;
    } else {
      errorPasswordText.textContent = "";
      return true;
    }
  }

  checkErrorLoginSubmit = async function () {
    const [email, inputError] = await AJAX("src/config/ajax/ajaxLogin.php");
    return [email, inputError];

  };
}

export default new ModelLogin();
