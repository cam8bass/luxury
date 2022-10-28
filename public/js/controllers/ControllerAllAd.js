import modelAllAd from "../models/ModelAllAd.js";
import viewAllAd from "../views/ViewAllAd.js";

class ControleAllAd {
  showAllAd = async function () {
    viewAllAd.renderSpinner();
    const allAd = await modelAllAd.loadAllAd();

    viewAllAd.render(allAd);
    //a finir
  };
}

const controleAllAd = new ControleAllAd();

const init = function () {
 controleAllAd.showAllAd();
};

init();
