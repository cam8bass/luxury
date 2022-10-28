import { AJAX } from "../helper.js";

class ModelSettings {
  loadSettings = async function () {
    const allSettings = await AJAX("src/views/ViewSettings.php");
    return allSettings;
  };
}

export default new ModelSettings();
