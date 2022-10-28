<form action="" method="POST" class="edit">
        <div class="edit__block">
          <label for="img" class="edit__label">Image:</label>
          <input type="file" name="img" id="img" class="edit__input-file" />
          <button type="button" class="edit__overview">
            <img
              src="public/img/icons/icon-overview.png"
              alt="icon overview"
              class="edit__overview-icon"
            />
          </button>
        </div>

        <div class="edit__block">
          <label for="title" class="edit__label">Titre:</label>
          <input type="text" name="title" id="title" class="edit__input" />
          <button type="button" class="edit__overview">
            <img
              src="public/img/icons/icon-overview.png"
              alt="icon overview"
              class="edit__overview-icon"
            />
          </button>
        </div>

        <div class="edit__block">
          <label for="location" class="edit__label">Pays:</label>
          <input type="text" name="location" id="location" class="edit__input" />
          <button type="button" class="edit__overview">
            <img
              src="public/img/icons/icon-overview.png"
              alt="icon overview"
              class="edit__overview-icon"
            />
          </button>
        </div>

        <div class="edit__block">
          <label for="room" class="edit__label">Chambres:</label>
          <input type="text" name="room" id="room" class="edit__input" />
          <button type="button" class="edit__overview">
            <img
              src="public/img/icons/icon-overview.png"
              alt="icon overview"
              class="edit__overview-icon"
            />
          </button>
        </div>

        <div class="edit__block">
          <label for="area" class="edit__label">Superficie:</label>
          <input type="text" name="area" id="area" class="edit__input" />
          <button type="button" class="edit__overview">
            <img
              src="public/img/icons/icon-overview.png"
              alt="icon overview"
              class="edit__overview-icon"
            />
          </button>
        </div>

        <div class="edit__block">
          <label for="price" class="edit__label">Prix:</label>
          <input type="text" name="price" id="price" class="edit__input" />
          <button type="button" class="edit__overview">
            <img
              src="public/img/icons/icon-overview.png"
              alt="icon overview"
              class="edit__overview-icon"
            />
          </button>
        </div>

        <div class="edit__description">
          <label for="description" class="edit__label">Description:</label>
          <textarea
            name="description"
            id="description"
            class="edit__input edit__description-text"
          ></textarea>
          <button type="button" class="edit__overview edit__description-btn">
            <img
              src="public/img/icons/icon-overview.png"
              alt="icon overview"
              class="edit__overview-icon"
            />
          </button>
        </div>

        <select name="status" id="status" class="edit__select">
          <option value="available" class="edit__select-item">
            Disponible
          </option>
          <option value="sold" class="edit__select-item">Vendu</option>
        </select>

        <button type="submit" class="btn edit__send">Modifier</button>
      </form>