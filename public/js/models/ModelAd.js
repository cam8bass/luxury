import { AJAX } from "../helper.js";

class ModelAd {
  loadAllAd = async function () {
    const allAd = await AJAX("src/config/ajax/ajaxDisplayAllAd.php");
    return allAd;
  };
}

export default new ModelAd();
