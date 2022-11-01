export default class View {
  _data;

  // render(data, render = true) {
  //   if (!data || (Array.isArray(data) && data.length === 0))
  //     return this.renderError();
  //   this._data = data;
  //   const markup = this._generateMarkup();
  //   if (!render) return markup;
  //   this._clear();
  //   this._parentElement.insertAdjacentHTML("afterbegin", markup);
  // }

  // _clear() {
  //   this._parentElement.innerHTML = "";
  // }

  // renderError(message = this._errorMessage) {
  //   const markup = `
  //     <div class="errorJs">
  //       <div>
  //     <img src="public/img/icons/icon-warning.png" alt="icon warning"/>
  //       </div>
  //       <p>${message}</p>
  //     </div>
  //   `;
  //   this._clear();
  //   this._parentElement.insertAdjacentHTML("afterbegin", markup);
  // }


}
