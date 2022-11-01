<?php
if ($_SERVER['REQUEST_METHOD'] === "GET") {
  $errorInput = [
    "errorImg" => "",
    "errorTitle" => "",
    "errorLocation" => "",
    "errorRoom" => "",
    "errorArea" => "",
    "errorPrice" => "",
    "errorDescription" => ""

  ];

  $allInput = [
    "title" => "",
    "location" => "",
    "room" => "",
    "area" => "",
    "price" => "",
    "description" => ""
  ];
}

?>

<?php $title = "Création d'annonce" ?>
<script defer type="module" src="public/js/controllers/ControllerCreateAd.js"></script>

<?php ob_start() ?>
<main class="page__dashboard ">

  <?php require_once('includes/sidebar.php') ?>

  <div class="content content__edit">
    <h1 class="edit__title">Créer une annonce</h1>

    <form action="index.php?login=true&action=confirmCreateAd" method="POST" class="edit" id="form-createAd" enctype="multipart/form-data">
      <div class="edit__block">
        <label for="img" class="edit__label">Image:</label>
        <input type="file" name="img" id="input-img" class="edit__input-file" />

        <div class="login__error">
          <span id="error-img" class="login__error-text"><?= isset($errorImg) && $errorImg ? $errorImg : "" ?></span>
        </div>
      </div>

      <div class="edit__block">
        <label for="title" class="edit__label">Titre:</label>
        <input type="text" name="title" id="input-title" class="edit__input" maxlength="23" value="<?= !$errorInput['errorTitle'] ? $allInput['title'] : "" ?>" />

        <div class="login__error">
          <span id="error-title" class="login__error-text"><?= $errorInput['errorTitle'] ? $errorInput['errorTitle'] : "" ?></span>
        </div>
      </div>

      <div class="edit__block">
        <label for="location" class="edit__label">Ville:</label>
        <input type="text" name="location" id="input-location" class="edit__input" maxlength="15" value="<?= !$errorInput['errorLocation'] ? $allInput['location'] : "" ?>" />

        <div class="login__error">
          <span id="error-location" class="login__error-text"><?= $errorInput['errorLocation'] ? $errorInput["errorLocation"] : "" ?></span>
        </div>
      </div>

      <div class="edit__block">
        <label for="room" class="edit__label">Chambres:</label>
        <input type="text" name="room" id="input-room" class="edit__input" maxlength="3" value="<?= !$errorInput["errorRoom"] ? $allInput['room'] : "" ?>" />
        <div class="login__error">
          <span id="error-room" class="login__error-text"><?= $errorInput["errorRoom"] ? $errorInput['errorRoom'] : "" ?></span>
        </div>
      </div>

      <div class="edit__block">
        <label for="area" class="edit__label">Superficie:</label>
        <input type="text" name="area" id="input-area" class="edit__input" maxlength="4" value="<?= !$errorInput['errorArea'] ? $allInput['area'] : "" ?>" />
        <div class="login__error">
          <span id="error-area" class="login__error-text"><?= $errorInput["errorArea"] ? $errorInput['errorArea'] : "" ?></span>
        </div>
      </div>

      <div class="edit__block">
        <label for="price" class="edit__label">Prix:</label>
        <input type="text" name="price" id="input-price" class="edit__input" maxlength="9" value="<?= !$errorInput['errorPrice'] ? $allInput['price'] : "" ?>" />
        <div class="login__error">
          <span id="error-price" class="login__error-text"><?= $errorInput['errorPrice'] ? $errorInput["errorPrice"] : "" ?></span>
        </div>
      </div>

      <div class="edit__description">
        <label for="description" class="edit__label">Description:</label>
        <textarea name="description" id="input-description" class="edit__input edit__description-text" maxlength="250"><?= !$errorInput["errorDescription"] ? $allInput['description'] : "" ?></textarea>

        <div class="login__error">
          <span id="error-description" class="login__error-text"><?= $errorInput['errorDescription'] ? $errorInput['errorDescription'] : "" ?></span>
        </div>
      </div>

      <button type="submit" id="btn-submit" class="btn edit__send edit__send-create">
        Modifier
      </button>
    </form>
  </div>
</main>

<?php $content = ob_get_clean() ?>
<?php require('templates/layout.php') ?>