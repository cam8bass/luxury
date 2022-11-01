<?php $title = "Mon compte" ?>

<?php ob_start() ?>

<body class="page__dashboard">
  <?php require_once('includes/sidebar.php') ?>
  <div class="content content__settings">
    <div class="profile">
      <h1 class="profile__title">Mon profil</h1>

      <div class="profile__info">
        <div class="profile__block">
          <p class="profile__label">Nom:</p>
          <p class="profile__text" id="lastname"><?= ucfirst($profile['lastName']) ?></p>
        </div>
        <div class="profile__block">
          <p class="profile__label">Prenom:</p>
          <p class="profile__text" id="firstname"><?= ucfirst($profile['firstName']) ?></p>
        </div>
        <div class="profile__block">
          <p class="profile__label">Email:</p>
          <p class="profile__text" id="email"><?= $profile['email'] ?></p>
          <a href="index.php?login=true&action=changeEmail" class="profile__btn" id="edit-email">
            <img src="public/img/icons/icon-edit.png" alt="icon edit" class="profile__btn-icon" />
          </a>
        </div>
      </div>
      <div class="profile__background">&nbsp;</div>
    </div>
  </div>
</body>

<?php $content = ob_get_clean() ?>
<?php require("templates/layout.php") ?>