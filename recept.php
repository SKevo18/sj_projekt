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
                    <div class="col-lg-6">
                        <img src="assets/img/recepty/<?php echo $recept["id"]; ?>.png" class="img-fluid rounded-start" alt="<?php echo $recept["nazov"]; ?>" />
                    </div>

                    <div class="col-lg-6">
                        <h3>Ingrediencie:</h3>
                        <ul>
                            <?php
                            foreach ($recept["ingrediencie"] as $ingrediencia) {
                                echo "<li><b>{$ingrediencia['mnozstvo']}:</b> {$ingrediencia['nazov']}</li>";
                            }
                            ?>
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