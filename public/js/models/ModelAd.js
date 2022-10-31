import { AJAX } from "../helper.js";

class ModelAd {
  loadAllAd = async function () {
    const allAd = AJAX("src/config/ajax/ajaxDisplayAd.php");
    return allAd;
  };
}

export default new ModelAd();
