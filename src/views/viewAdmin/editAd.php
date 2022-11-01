<?php
if ($_SERVER['REQUEST_METHOD'] === "GET") {
  $errorInput = [
    "errorImg" => "",
    "errorTitle" => "",
    "errorLocation" => "",
    "errorRoom" => "",
    "errorArea" => "",
    "errorPrice" => "",
    "errorDescription" => "",
    "errorStatus" => "",

  ];

  $allInput = [
    "title" => "",
    "location" => "",
    "room" => "",
    "area" => "",
    "price" => "",
    "description" => "",
    "status" => "",
  ];
}

?>

<script defer type="module" src="public/js/controllers/ControllerEditAd.js"></script>
<?php $title = "Modifier l'annonce" ?>

<?php ob_start() ?>
<main class="page__dashboard">
  <?php require_once('includes/sidebar.php') ?>
  <div class="content content__edit">
    <h1 class="edit__title">Modifier mon annonce</h1>

    <?php if (isset($infoAd['idAd'])) : ?>
      <form action="index.php?login=true&action=confirmEditAd&id=<?= $infoAd['idAd'] ?? "" ?>" id="form-createAd" method="POST" class="edit">
      <?php else : ?>
        <form action="index.php?login=true&action=confirmEditAd&id=<?= $idAd ?? "" ?>" id="form-createAd" method="POST" class="edit">
        <?php endif ?>

        <div class="edit__block">
          <label for="title" class="edit__label">Titre:</label>
          <?php if (isset($infoAd['title'])) : ?>
            <input type="text" name="title" id="input-title" class="edit__input" maxlength="23" value="<?= $infoAd['title'] ?? "" ?>" />
          <?php else : ?>
            <input type="text" name="title" id="input-title" class="edit__input" maxlength="23" value="<?= !$errorInput["errorTitle"] ? $allInput['title'] : "" ?>" />
          <?php endif ?>
          <div class="login__error">
            <span id="error-title" class="login__error-text"><?= $errorInput['errorTitle'] ? $errorInput['errorTitle'] : "" ?></span>
          </div>
        </div>

        <div class="edit__block">
          <label for="location" class="edit__label">Pays:</label>
          <?php if (isset($infoAd['location'])) : ?>
            <input type="text" name="location" id="input-location" class="edit__input" maxlength="15" value="<?= $infoAd["location"] ?? "" ?>" />
          <?php else : ?>
            <input type="text" name="location" id="input-location" class="edit__input" maxlength="15" value="<?= !$errorInput["errorLocation"] ? $allInput['location'] : "" ?>" />
          <?php endif ?>
          <div class="login__error">
            <span id="error-location" class="login__error-text"><?= $errorInput['errorLocation'] ? $errorInput["errorLocation"] : "" ?></span>
          </div>
        </div>

        <div class="edit__block">
          <label for="room" class="edit__label">Chambres:</label>
          <?php if (isset($infoAd['room'])) : ?>
            <input type="text" name="room" maxlength="3" id="input-room" class="edit__input" value="<?= $infoAd['room'] ?? '' ?>" />
          <?php else : ?>
            <input type="text" name="room" maxlength="3" id="input-room" class="edit__input" value="<?= !$errorInput["errorRoom"] ? $allInput['room'] : "" ?>" />
          <?php endif ?>
          <div class="login__error">
            <span id="error-room" class="login__error-text"><?= $errorInput["errorRoom"] ? $errorInput['errorRoom'] : "" ?></span>
          </div>
        </div>

        <div class="edit__block">
          <label for="area" class="edit__label">Superficie:</label>
          <?php if (isset($infoAd['area'])) : ?>
            <input type="text" name="area" id="input-area" class="edit__input" maxlength="4" value="<?= $infoAd['area'] ?? '' ?>" />
          <?php else : ?>
            <input type="text" name="area" id="input-area" class="edit__input" maxlength="4" value="<?= !$errorInput["errorArea"] ? $allInput['area'] : "" ?>" />
          <?php endif ?>

          <div class="login__error">
            <span id="error-area" class="login__error-text"><?= $errorInput["errorArea"] ? $errorInput['errorArea'] : "" ?></span>
          </div>
        </div>

        <div class="edit__block">
          <label for="price" class="edit__label">Prix:</label>
          <?php if (isset($infoAd['price'])) : ?>
            <input type="text" name="price" id="input-price" class="edit__input" maxlength="9" value="<?= $infoAd['price'] ?? '' ?>" />
          <?php else : ?>
            <input type="text" name="price" id="input-price" class="edit__input" maxlength="9" value="<?= !$errorInput["errorPrice"] ? $allInput['price'] : "" ?>" />
          <?php endif ?>

          <div class="login__error">
            <span id="error-price" class="login__error-text"><?= $errorInput['errorPrice'] ? $errorInput["errorPrice"] : "" ?></span>
          </div>
        </div>

        <div class="edit__description">
          <label for="description" class="edit__label">Description:</label>
          <?php if (isset($infoAd['price'])) : ?>
            <textarea name="description" id="input-description" class="edit__input edit__description-text" maxlength="250"><?= $infoAd['description'] ?? "" ?></textarea>
          <?php else : ?>
            <textarea name="description" id="input-description" class="edit__input edit__description-text" maxlength="250"><?= !$errorInput["errorDescription"] ? $allInput['description'] : "" ?></textarea>
          <?php endif ?>

          <div class="login__error">
            <span id="error-description" class="login__error-text"><?= $errorInput['errorDescription'] ? $errorInput['errorDescription'] : "" ?></span>
          </div>
        </div>

        <select name="status" id="status" class="edit__select">
          <?php if ($errorInput['errorStatus']) : ?>
            <option value="" <?= $errorInput['errorStatus'] ? "selected" : "" ?>><?= $errorInput['errorStatus'] ? $errorInput['errorStatus'] : "" ?></option>
          <?php endif ?>
          <option value="Available" class="edit__select-item" <?= isset($infoAd['status']) && $infoAd['status']  === "Available" ? "selected" : ""  ?>>
            Disponible
          </option>
          <option value="Sold" class="edit__select-item" <?= isset($infoAd['status']) && $infoAd['status']  === "Sold" ? "selected" : ""  ?>>Vendu</option>
        </select>


        <button type="submit" class="btn edit__send">Modifier</button>
        </form>
  </div>
</main>




<?php $content = ob_get_clean() ?>
<?php require('templates/layout.php') ?>