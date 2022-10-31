import modelAd from "../models/ModelAd.js";
import viewAd from "../views/ViewAd.js";

class ControleAd {
  displayAd = async function () {
    const allAd = await modelAd.loadAllAd();
    console.log(allAd);
  };
}

const controleAd = new ControleAd();

const init = function () {
  controleAd.displayAd();
};
init();
