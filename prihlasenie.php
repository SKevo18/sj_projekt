<?php
require_once '_inc/config.php';
include_once '_inc/sablony/head.php';
?>

<body>
    <?php include_once '_inc/sablony/header.php'; ?>

    <?php
    if (isset($_SESSION["opravnenia"])) {
        header("Location: index.php");
        exit();
    }
    ?>

    <div class="col-8 mx-auto mt-5 pt-4">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <h1>Prihlásenie</h1>

                <form method="post" action="prihlasenie.php">
                    <div class="mb-3">
                        <label for="pouzivatelske_meno" class="form-label">Používateľské meno</label>
                        <input type="text" class="form-control" id="pouzivatelske_meno" name="pouzivatelske_meno" required />
                    </div>

                    <div class="mb-3">
                        <label for="heslo" class="form-label">Heslo</label>
                        <input type="password" class="form-control" id="heslo" name="heslo" required />
                    </div>

                    <button type="submit" class="btn btn-primary">Prihlásiť sa</button>
                </form>
            </div>
        </div>
    </div>

    <?php include_once '_inc/sablony/footer.php'; ?>
</body>