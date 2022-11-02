<?php $title ?>

<?php ob_start() ?>
<div class="popup">
  <div class="popup__content">
    <h1 class="popup__title">Page d'erreur</h1>

    <p class="popup__text">
      <?= $errorMessage; ?>
    </p>
    <?php if ($currentUser) : ?>
      <a href="admin?login=true&action=dashboard" class="btn popup__cancel popup__cancel-return">Retour</a>
    <?php else : ?>
      <a href="/" class="btn popup__cancel popup__cancel-return">Retour</a>
    <?php endif ?>
  </div>
</div>


<?php $content = ob_get_clean(); ?>

<?php require("templates/layout.php") ?>