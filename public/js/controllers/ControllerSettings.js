import modelSettings from "../models/ModelSettings.js";
import viewSettings from "../views/ViewSettings.js";

class ControleSettings {
  openSettings = async function () {
    viewSettings.renderSpinner();
    const allSettings = await modelSettings.loadSettings();
    viewSettings.render(allSettings);
  };
}

const controleSettings = new ControleSettings();

const init = function () {
  // viewSettings.handlerOpenSettings(controleSettings.openSettings());
  controleSettings.openSettings();
};
init();
