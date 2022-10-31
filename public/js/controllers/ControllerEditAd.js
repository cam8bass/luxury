import modelCreateAd from "../models/ModelCreateAd.js";
import viewCreateAd from "../views/ViewCreateAd.js";

class ControleCreateAd {
  checkFormCreate() {
    viewCreateAd._inputTitle.addEventListener("change", function () {
      modelCreateAd.validInputTitle(this, viewCreateAd._errorTitle);
    });

    viewCreateAd._inputLocation.addEventListener("change", function () {
      modelCreateAd.validInputLocation(this, viewCreateAd._errorLocation);
    });

    viewCreateAd._inputRoom.addEventListener("change", function () {
      modelCreateAd.validInputRoom(this, viewCreateAd._errorRoom);
    });

    viewCreateAd._inputArea.addEventListener("change", function () {
      modelCreateAd.validInputArea(this, viewCreateAd._errorArea);
    });

    viewCreateAd._inputPrice.addEventListener("change", function () {
      modelCreateAd.validInputPrice(this, viewCreateAd._errorPrice);
    });

    viewCreateAd._inputDescription.addEventListener("change", function () {
      modelCreateAd.validInputDescription(this, viewCreateAd._errorDescription);
    });

    viewCreateAd._parentElement.addEventListener("submit", function (e) {
      e.preventDefault();
      if (
      
        modelCreateAd.validInputTitle(
          viewCreateAd._inputTitle,
          viewCreateAd._errorTitle
        ) &&
        modelCreateAd.validInputLocation(
          viewCreateAd._inputLocation,
          viewCreateAd._errorLocation
        ) &&
        modelCreateAd.validInputRoom(
          viewCreateAd._inputRoom,
          viewCreateAd._errorRoom
        ) &&
        modelCreateAd.validInputArea(
          viewCreateAd._inputArea,
          viewCreateAd._errorArea
        ) &&
        modelCreateAd.validInputPrice(
          viewCreateAd._inputPrice,
          viewCreateAd._errorPrice
        ) &&
        modelCreateAd.validInputDescription(
          viewCreateAd._inputDescription,
          viewCreateAd._errorDescription
        )
      ) {
        this.submit();
      }
    });
  }
}

const controleCreateAd = new ControleCreateAd();

const init = function () {
  controleCreateAd.checkFormCreate();
};
init();
