import View from "./Views.js";

class ViewSettings extends View {
  _btnSettings = document.querySelector("#settings");
  _parentElement = document.querySelector(".content");

  _generateMarkup() {
    return `
  <div class="content content__settings">
  <div class="profile">
    <h1 class="profile__title">Mon profil</h1>

    <div class="profile__info">
      <div class="profile__block">
        <p class="profile__label">Nom:</p>
        <p class="profile__text">${this._data.lastName}</p>
        <button type="button" class="profile__btn">
          <img src="public/img/icons/icon-edit.png" alt="icon edit" class="profile__btn-icon">
        </button>
      </div>
      <div class="profile__block">
        <p class="profile__label">Prenom:</p>
        <p class="profile__text">${this._data.firstName}</p>
        <button type="button" class="profile__btn">
          <img src="public/img/icons/icon-edit.png" alt="icon edit" class="profile__btn-icon">
        </button>
      </div>
      <div class="profile__block">
        <p class="profile__label">Email:</p>
        <p class="profile__text">${this._data.email}</p>
        <button type="button" class="profile__btn">
          <img src="public/img/icons/icon-edit.png" alt="icon edit" class="profile__btn-icon">
        </button>
      </div>
  </div>
  <div class="profile__background">&nbsp;</div>
</div>
  `;
  }

  // handlerOpenSettings(handler) {
  //   if (!this._btnSettings) return;
  //   this._btnSettings.addEventListener("click", handler);
  // }
}

export default new ViewSettings();
