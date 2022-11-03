class ViewAd {
  _parentElement = document.querySelector(".homes");

  displayAllAd(data) {
    return data.map((ad) => this._generateMarkup(ad));
  }

  _generateMarkup(ad) {
    const markup = `
    <div class="home">
    <img
      src="${ad.img}"
      alt="home"
      class="home__img"
    />
    ${ad.status === "Sold" ? "<div class='sold'>Vendu</div>" : ""}
    <h5 class="home__name">${ad.title}</h5>
    <div class="home__details">
      <div class="home__block">
        <img
          src="public/img/icons/icon-world.png"
          alt="icon world"
          class="home__icon"
        />
        <p class="home__text">${ad.location}</p>
      </div>

      <div class="home__block">
        <img
          src="public/img/icons/icon-bed.png"
          alt="icon bed"
          class="home__icon"
        />
        <p class="home__text">${ad.room} chambres</p>
      </div>

      <div class="home__block">
        <img
          src="public/img/icons/icon-size.png"
          alt="icon size"
          class="home__icon"
        />
        <p class="home__text">${ad.area}m<sup>2</sup></p>
      </div>

      <div class="home__block">
        <img
          src="public/img/icons/icon-price.png"
          alt="icon price"
          class="home__icon"
        />
        <p class="home__text home__text-price">${ad.price}€</p>
      </div>

      <p class="home__description">
       ${ad.description}
      </p>
    </div>
    ${
      ad.status === "Sold"
        ? ""
        : "<a href='tel:+336698523148' class='btn home__btn'>Visiter</a>"
    }

  </div>
    `;
    this._parentElement.insertAdjacentHTML("afterbegin", markup);
  }
}

export default new ViewAd();
