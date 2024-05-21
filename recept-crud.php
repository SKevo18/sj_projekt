<?php
require_once "_inc/config.php";
require_once "redaktor_crud/_opravnenia.php";

include_once '_inc/sablony/head.php';
?>

<body>
  <?php include_once '_inc/sablony/header.php'; ?>

  <?php
  if (isset($_GET["id"])) {
    $recept = new Recept();
    $recept = $recept->recept($_GET["id"]);
  } else {
    $recept = array(
      "id" => "0",
      "nazov" => "",
      "popis" => "",
      "postup" => "",
      "suroviny" => array()
    );
  }

  if ($recept) {
  ?>
    <form method="POST" action="redaktor_crud/recept.php" class="container py-4 mt-4">
      <input type="hidden" name="id" value="<?= $recept["id"]; ?>">

      <div class="d-flex align-items-center gap-4 my-3">
        <h3>Názov:</h3>
        <input class="my-4 text-center" type="text" name="nazov" value="<?= $recept["nazov"]; ?>" />
      </div>

      <div class="row">
        <div class="col-lg-5">
          <img src="assets/img/recepty/<?= $recept["id"]; ?>.png" class="img-fluid rounded-start" alt="<?= $recept["nazov"]; ?>" />
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
                  echo '<th scope=\"row\">' . $surovina['nazov'] . "</th>";
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
        <h3>Popis:</h3>
        <textarea rows="2" style="width: 100%" name="popis"><?= $recept["popis"] ?></textarea>
      </div>

      <div class="mt-4">
        <h3>Postup:</h3>
        <textarea rows="12" style="width: 100%" name="postup"><?= $recept["postup"] ?></textarea>
      </div>

      <input type="submit" name="<?= isset($_GET["id"]) ? 'upravit' : 'vytvorit' ?>" value="Uložiť" class="btn btn-primary">
    </form>
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