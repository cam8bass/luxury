import modelAd from "../models/ModelAd.js";
import viewAd from "../views/ViewAd.js";

class ControleAd {
  displayAd = async function () {
    const allAd = await modelAd.loadAllAd();
    viewAd.displayAllAd(allAd);


  };
}

const controleAd = new ControleAd();

const init = function () {
  controleAd.displayAd();
};
init();
