<?php
require_once "_inc/config.php";
include_once 'sablony/head.php';
?>

<body>
  <?php include_once 'sablony/cookiesOkno.php'; ?>
  <?php include_once 'sablony/header.php'; ?>

  <?php
  if ($_SERVER["REQUEST_METHOD"] === "GET") {
    $recept = new Recept();
    $recept = $recept->recept($_GET["id"]);

    if ($recept) {
  ?>
      <div class="container py-4 mt-4">
        <h2 class="my-4 text-center"><?php echo $recept["nazov"]; ?></h2>

        <div class="row">
          <div class="col-lg-5">
            <img src="assets/img/recepty/<?php echo $recept["id"]; ?>.png" class="img-fluid rounded-start" alt="<?php echo $recept["nazov"]; ?>" />
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
          <p><?php echo str_replace("\n", "<br>", $recept["postup"]); ?></p>
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
  }
  ?>

  <?php include_once 'sablony/footer.php'; ?>