<?php
require_once '_inc/config.php';
include_once '_inc/sablony/head.php';
?>

<body>
    <?php include_once '_inc/sablony/header.php'; ?>

    <?php
    if (!isset($_SESSION["opravnenia"])) {
        header("Location: prihlasenie.php");
        exit();
    }
    ?>

    <div class="col-8 mx-auto mt-5 pt-4">
        <h1>Administrácia</h1>

        <div class="row justify-content-center">
            <div class="col-lg-6">
                <h2>Recepty</h2>
                <a href="recepty.php" class="btn btn-primary">Zoznam receptov</a>
                <a href="recepty_pridanie.php" class="btn btn-primary">Pridať recept</a>
            </div>
        </div>

    <?php include_once '_inc/sablony/footer.php'; ?>
</body>