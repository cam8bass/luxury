import { AJAX } from "../helper.js";

class ModelAllAd {
  loadAllAd = async function () {
    const allAd = await AJAX("src/views/ViewAllAd.php");
    return allAd;
  };
}

export default new ModelAllAd();
