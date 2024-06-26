<?php
require_once "_inc/config.php";
include_once '_inc/sablony/head.php';
?>

<body>
  <?php include_once '_inc/sablony/header.php'; ?>

  <?php
  $recept = new Recept();
  $recept = $recept->recept($_GET["id"]);

  if ($recept) {
  ?>
    <div class="container py-4 mt-4">
      <div class="my-4">
        <h2 class="text-center"><?= $recept["nazov"]; ?></h2>
        <p class="text-center"><i><?= $recept["popis"]; ?></i></p>
      </div>

      <?php
      if (isset($_SESSION["opravnenia"]) && ($_SESSION["opravnenia"] >= Pouzivatel::REDAKTOR)) {
      ?>
        <div class="d-flex gap-4 align-items-center my-3">
          <a class="btn btn-primary" href="recept-crud.php?id=<?= $recept["id"]; ?>">Upraviť</a>
          <form action="redaktor_crud/recept.php" method="POST">
            <input type="hidden" name="id" value="<?= $recept["id"]; ?>">
            <button type="submit" name="zmazat" class="btn btn-danger">Zmazať</button>
        </div>
      <?php
      }
      ?>

      <div class="row">
        <div class="col-lg-5">
          <img onerror="this.onerror=null; this.src='assets/img/recepty/0.png'" src="assets/img/recepty/<?= $recept["id"]; ?>.png" class="img-fluid rounded-start" alt="<?= $recept["nazov"]; ?>" />
        </div>

        <div class="col-lg-6">
          <h3>Suroviny:</h3>
          <ul>
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Názov</th>
                  <th scope="col">Množstvo</th>
                  <th scope="col">Kalórie</th>
                  <th scope="col">Cena</th>
                </tr>
              </thead>
              <tbody>
                <?php
                foreach ($recept["suroviny"] as $surovina) {
                  echo "<tr>";
                  echo "<th scope='row'>" . $surovina["nazov"] . "</th>";
                  echo "<td>" . $surovina["mnozstvo"] . "</td>";
                  echo "<td>" . ($surovina["kcal"] != 0 ? $surovina["kcal"] . " kcal" : "-") . "</td>";
                  echo "<td>" . ($surovina["cena"] != 0 ? $surovina["cena"] . " €" : "-") . "</td>";
                  echo "</tr>";
                }
                ?>
              </tbody>
            </table>
          </ul>
        </div>
      </div>

      <div class="mt-4">
        <h3>Postup:</h3>
        <p><?= str_replace("\n", "<br>", $recept["postup"]); ?></p>
      </div>
    </div>
  <?php
  } else {
  ?>
    <div class="container py-4 mt-4">
      <h2 class="my-4 text-center">Recept neexistuje</h2>
    </div>
  <?php
  }
  ?>

  <?php include_once '_inc/sablony/footer.php'; ?>