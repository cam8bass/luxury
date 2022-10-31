<?php $title = "Dashboard" ?>

<?php ob_start() ?>
<main class="page__dashboard">
  <?php require_once('includes/sidebar.php') ?>
  <div class="content content__dashboard">
    <img src="public/img/logo-luxury.png" alt="logo" class="content__logo" />
  </div>
</main>

<?php $content = ob_get_clean() ?>

<?php require("templates/layout.php") ?>