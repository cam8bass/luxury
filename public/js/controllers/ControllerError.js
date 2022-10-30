import modelError from "../models/ModelError.js";
import viewError from "../views/ViewError.js";

class ControleError {
  checkErrorChangeEmail = async function () {
    const errorInput = await modelError.errorChangeEmail();
    viewError.displayError(errorInput);
  };
}

const controleError = new ControleError();

const init = function () {
  controleError.checkErrorChangeEmail();
};

init();
