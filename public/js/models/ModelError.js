import { AJAX } from "../helper.js";

class ModelError {
  errorChangeEmail = async function () {
    const errorInput = await AJAX("src/config/ajax.php");
    return errorInput;
  };
}

export default new ModelError();
