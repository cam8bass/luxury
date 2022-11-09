<?php
if ($_SERVER['REQUEST_METHOD'] === "GET") {
  $errorSendEmail = [
    "errorEmail" => "",
    "errorSubject" => "",
    "errorMessage" => ""
  ];

  $allInput['email'] = "";
  $allInput['subject'] = "";
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="public/css/main.css" />
  <meta
      name="description"
      content="Luxury, votre agence immobilière de luxe regroupant les meilleurs conseillers pour des annonces de qualité."
    />
  <script defer type="module" src="public/js/controllers/ControllerContact.js"></script>

  <title>Luxary Contact</title>
</head>

<body>
  <header class="header" id="top">
    <div class="header__logo">
      <a href="/" class="header__logo-link">
        <img src="public/img/logo-luxury.png" alt="logo" class="header__logo-img" />
      </a>
    </div>

    <div class="navigation">
      <input type="checkbox" class="navigation__checkbox" id="navi-toggle" />
      <label for="navi-toggle" class="navigation__btn">
        <span class="navigation__icon">&nbsp;</span>
      </label>
      <div class="navigation__background">&nbsp;</div>

      <nav class="navigation__nav">
        <ul class="navigation__list">
          <li class="navigation__item">
            <a href="/" class="navigation__link">Home</a>
          </li>
          <li class="navigation__item">
            <a href="annonces" class="navigation__link">Annonces</a>
          </li>
          <li class="navigation__item">
            <a href="contact" class="navigation__link navigation__link--active">Contact</a>
          </li>
        </ul>
      </nav>
    </div>
  </header>
  <main class="page__contact">
    <section class="section__form">
      <div class="video">
        <video class="video__content" autoplay muted loop>
          <source src="public/img/video-1.mp4" type="video/mp4" />
          <source src="public/img/video-1.webm" type="video/webm" />
          Your browser is not supported!
        </video>
      </div>

      <form action="index.php?action=sendEmail" method="post" class="form" id="form-sendEmail">

        <div class="form__block">
          <label for="email" class="form__label">Votre adresse email</label>
          <input type="email" name="email" id="input-email" class="form__input" value="<?= !$errorSendEmail["errorEmail"] ? $allInput['email'] : "" ?>" />
          <div class="login__error">
            <span id="error-email" class="login__error-text"><?= $errorSendEmail["errorEmail"] ? $errorSendEmail["errorEmail"] : "" ?></span>
          </div>
        </div>

        <div class="form__block">
          <label for="subject" class="form__label">Objet de votre demande</label>
          <input type="text" name="subject" id="input-subject" minlength="3" maxlength="50" class="form__input" value="<?= !$errorSendEmail["errorSubject"] ? $allInput['subject'] : "" ?>" />
          <div class="login__error">
            <span id="error-subject" class="login__error-text"><?= $errorSendEmail["errorSubject"] ? $errorSendEmail["errorSubject"] : "" ?></span>
          </div>
        </div>

        <div class="form__block-message">
          <label for="message" class="form__label">Votre message</label>
          <textarea name="message" id="input-message" class="form__message" minlength="20" maxlength="500"><?= $allInput['message'] ?? "" ?></textarea>
          <div class="login__error">
            <span id="error-message" class="login__error-text"><?= $errorSendEmail["errorMessage"] ? $errorSendEmail["errorMessage"] : "" ?></span>
          </div>
        </div>

        <button type="submit" class="btn form__btn">Envoyer</button>
      </form>
    </section>

    <footer class="footer">
      <ul class="footer__list">
        <div class="footer__block">
          <li class="footer__item">
            <a href="contact" class="footer__link">Contact</a>
          </li>
          <li class="footer__item">
            <a href="#top" class="footer__link">
              <img src="public/img/logo-luxury.png" alt="logo" class="footer__logo" />
            </a>
          </li>
          <li class="footer__item">
            <a href="annonces" class="footer__link">Annonces</a>
          </li>
        </div>
      </ul>
    </footer>

  </main>
</body>

</html>