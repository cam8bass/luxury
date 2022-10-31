<?php
if ($_SERVER['REQUEST_METHOD'] === "GET") {
  $errorInput = [
    "errorOldEmail" => "",
    "errorNewEmail" => ""
  ];
}

?>

<script defer type="module" src="public/js/controllers/ControllerChangeEmail.js"></script>
<?php $title = "Changement d'adresse email" ?>

<?php ob_start() ?>

<form action="admin.php?login=true&action=confirmChangeEmail" method="post" class="changeEmail" id="form-changeEmail">
  <div class="changeEmail__content">
    <h4 class="changeEmail__title">Changement email</h4>
    <div class="changeEmail__block">
      <label for="oldEmail" class="changeEmail__label">Ancienne adresse email</label>
      <input type="email" name="oldEmail" id="input-oldEmail" class="changeEmail__input" />
      <div class="login__error">
        <span id="error-oldEmail" class="login__error-text"><?= $errorInput['errorOldEmail'] ? $errorInput['errorOldEmail'] : "" ?></span>
      </div>
    </div>
    <div class="changeEmail__block">
      <label for="newEmail" class="changeEmail__label">Nouvelle adresse email</label>
      <input type="email" name="newEmail" id="input-newEmail" class="changeEmail__input" />
      <div class="login__error">
        <span id="error-newEmail" class="login__error-text"><?= $errorInput['errorNewEmail'] ? $errorInput['errorNewEmail'] : "" ?></span>
      </div>
    </div>
    <div class="changeEmail__btn">
      <a href="admin.php?login=true&action=settings" class="btn changeEmail__btn-cancel">
        Annuler
      </a>
      <button type="submit" class="btn changeEmail__btn-agree">Confirmer</button>
    </div>
  </div>
</form>

<?php $content = ob_get_clean() ?>
<?php require('templates/layout.php') ?>