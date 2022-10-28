import View from "./Views.js";

class ViewAllAd extends View {
  _parentElement = document.querySelector(".content");
  // _btnAd = document.querySelector("#displayAd");
  _errorMessage =
    "Aucune annonce à afficher, veuillez créer une nouvelle annonce";

  // handlerdisplayAd(handler) {
  //   if (!this._btnAd) return;
  //   this._btnAd.addEventListener("click", handler);
  // }

  _generateMarkup() {
    return `
    <div class="content content__ad">
  <ul class="list">
  ${this._data.map(this._generateMarkupAd).join("")}
  </ul>
  
</div>
`;
  }

  _generateMarkupAd(ad) {
    return `


  <li class="list__item" id="test">
    <img
      src="${ad.img}"
      alt="house"
      class="list__img"
    />

    <div class="list__detail">
      <span class="list__detail-name">Titre:</span>
      <span class="list__detail-text">${ad.title}</span>
    </div>

    <div class="list__detail">
      <span class="list__detail-name">Ville:</span>
      <span class="list__detail-text">${ad.location}</span>
    </div>

    <div class="list__detail">
      <span class="list__detail-name">Prix:</span>
      <span class="list__detail-text">${ad.price}</span>
    </div>

    <div class="list__detail">
      <span class="list__detail-name">Status:</span>
      <span class="list__detail-text">${ad.status}</span>
    </div>

    <div class="list__btn">
      <button type="button" class="list__btn-modify">
        <img
          src="public/img/icons/icon-edit.png"
          alt="icon edit"
          class="list__btn-icon"
        />
      </button>
      <button type="button" class="list__btn-remove">
        <img
          src="public/img/icons/icon-delete.png"
          alt="icon delete"
          class="list__btn-icon"
        />
      </button>
    </div>
  </li>

    `;
  }
}

export default new ViewAllAd();
