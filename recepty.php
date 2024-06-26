<?php
require_once "_inc/config.php";
include_once '_inc/sablony/head.php';
?>

<body>
  <?php include_once '_inc/sablony/header.php'; ?>

  <div class="container py-4 mt-4">
    <h2 class="my-4 text-center">Zoznam receptov</h2>

    <?php
    if (isset($_SESSION["opravnenia"]) && ($_SESSION["opravnenia"] >= Pouzivatel::REDAKTOR)) {
    ?>
      <a class="btn btn-primary my-3" href="recept-crud.php">Vytvoriť nový</a>
    <?php
    }
    ?>

    <?php
    $recepty = new Recept();
    $vsetkyRecepty = $recepty->vsetkyRecepty();

    echo $recepty->vykresliZoznam($vsetkyRecepty);
    ?>
  </div>

  <?php include_once '_inc/sablony/footer.php'; ?>