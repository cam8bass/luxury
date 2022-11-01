<?php
if ($_SERVER['REQUEST_METHOD'] === "GET") {
  $errorLogin = [
    "errorEmail" => "",
    "errorPassword" => ""
  ];

  $email = "";
}
?>

<script defer type="module" src="public/js/controllers/ControllerLogin.js"></script>
<?php $title = "Login" ?>

<?php ob_start() ?>
<main class="page__login">
  <section class="login">
    <img src="public/img/logo-luxury.png" alt="logo" s class="login__logo" />
    <form action="index.php?login=false&action=login" method="post" class="login__form" id="form-login">
      <div class="login__block">
        <label for="email" class="form__label">Adresse email</label>
        <input type="email" name="email" id="email" class="login__input" value="<?= !$errorLogin['errorEmail'] ? $email : "" ?>" />

        <div class="login__error">
          <span id="errorEmail" class="login__error-text"><?= $errorLogin['errorEmail'] ? $errorLogin['errorEmail'] : "" ?></span>
        </div>

      </div>

      <div class="login__block">
        <label for="password" class="form__label">Mot de passe</label>
        <input type="password" name="password" id="password" class="login__input" />

        <div class="login__error">
          <span id="errorPassword" class="login__error-text"><?= $errorLogin['errorPassword'] ? $errorLogin['errorPassword'] : "" ?></span>
        </div>

      </div>
      </div>
      <button type="submit" class="btn login__btn">Connexion</button>
    </form>
  </section>
</main>

<?php $content = ob_get_clean() ?>

<?php require('templates/layout.php') ?>