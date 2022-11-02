<?php $title ?>

<?php ob_start() ?>
<div class="popup">
  <div class="popup__content">
    <h1 class="popup__title"><?= $popupTitle; ?></h1>

    <p class="popup__text">
      <?= $popupText; ?>
    </p>
    <a href="<?= $popupLinkReturn; ?>" class="btn popup__cancel popup__cancel-return">Retour</a>

  </div>
</div>


<?php $content = ob_get_clean(); ?>

<?php require("templates/layout.php") ?>