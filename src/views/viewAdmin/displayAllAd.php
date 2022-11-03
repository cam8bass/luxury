<?php $title = "Mes annonces" ?>

<?php ob_start() ?>

<script defer type="module" src="public/js/controllers/ControllerAllAd.js"></script>

<body class="page__dashboard page__displayAd">

  <?php require_once('includes/sidebar.php') ?>
  <div class="content content__ad">
    <ul class="list">
      <?php foreach ($allAd as $ad) : ?>
        <li class="list__item" id="test">
          <img src="<?= $ad['img'] ?>" alt="house" class="list__img" />

          <div class="list__detail">
            <span class="list__detail-name">Titre:</span>
            <span class="list__detail-text"><?= $ad['title'] ?></span>
          </div>

          <div class="list__detail">
            <span class="list__detail-name">Ville:</span>
            <span class="list__detail-text"><?= $ad["location"] ?></span>
          </div>

          <div class="list__detail">
            <span class="list__detail-name">Prix:</span>
            <span class="list__detail-text"><?= $ad['price'] ?>€</span>
          </div>

          <div class="list__detail">
            <span class="list__detail-name">Status:</span>
            <span class="list__detail-text"><?= $ad['status'] === "Available" ? "Disponible" : "Vendu" ?></span>
          </div>

          <div class="list__btn">
            <a href="index.php?login=true&action=editAd&id=<?= $ad['idAd'] ?>" class="list__btn-modify">
              <img src="public/img/icons/icon-edit.png" alt="icon edit" class="list__btn-icon" />
            </a>
            <a href="index.php?login=true&action=confirmDeleteAd&id=<?= $ad['idAd'] ?>" class="list__btn-remove" id="btn-delete">
              <img src="public/img/icons/icon-delete.png" alt="icon delete" class="list__btn-icon" />
            </a>
          </div>
        </li>
      <?php endforeach ?>
    </ul>
  </div>
</body>


<?php $content = ob_get_clean() ?>
<?php require('templates/layout.php') ?>