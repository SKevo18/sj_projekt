<?php
require_once '_inc/config.php';
include_once '_inc/sablony/head.php';

session_start();
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
        <h1>Admin rozhranie</h1>
        <p>
            Vitajte, <b><?= $_SESSION["pouzivatelske_meno"]; ?></b>!
        </p>

        <?php
        include_once '_inc/sablony/admin/suroviny.php';
        include_once '_inc/sablony/admin/pouzivatelia.php';
        ?>
    </div>

    <?php include_once '_inc/sablony/footer.php'; ?>
</body>