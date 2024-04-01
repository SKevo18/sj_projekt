<?php
require_once "_inc/config.php";
include_once 'sablony/head.php';
?>

<body>
  <?php include_once 'sablony/cookiesOkno.php'; ?>
  <?php include_once 'sablony/header.php'; ?>

  <?php
  if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $kontakt = new Kontakt();
    $kontakt->vlozKontakt(
      $_POST["meno"],
      $_POST["email"],
      $_POST["sprava"],
      isset($_POST["suhlas"])
    );
  }
  ?>
  <div class="col-8 mx-auto mt-5 pt-4">
    <h1>Ďakujeme za Váš kontakt</h1>
    <p>
      Vaša správa bola úspešne odoslaná.
    </p>
  </div>

  <?php include_once 'sablony/footer.php'; ?>