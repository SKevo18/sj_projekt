<?php
require_once '_inc/config.php';
include_once '_inc/sablony/head.php';
?>

<body>
    <?php include_once '_inc/sablony/header.php'; ?>

    <div class="col-8 mx-auto mt-5 pt-4">
        <?php
        if (isset($_SESSION["opravnenia"])) {
            if ($_SESSION["opravnenia"] >= Pouzivatel::ADMIN) {
                header("Location: admin.php");
            } else {
                header("Location: index.php");
            }
            exit();
        }

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $pouzivatel_obj = new Pouzivatel();

            if (isset($_POST["prihlasit"])) {
                $pouzivatel = $pouzivatel_obj->prihlasit($_POST["pouzivatelske_meno"], $_POST["heslo"]);
            } else if (isset($_POST["registrovat"])) {
                if ($_POST["heslo"] != $_POST["potvrdit_heslo"]) {
                    die('<div class="alert alert-danger text-center mt-4" role="alert">Heslá sa nezhodujú!</div>');
                }

                $pouzivatel = array(
                    "pouzivatelske_meno" => $_POST["pouzivatelske_meno"],
                    "heslo" => $_POST["heslo"],
                    "opravnenia" => 0
                );
                $pouzivatel_obj->vytvorPouzivatela($pouzivatel);
            } else {
                die("Nesprávna akcia");
            }

            if ($pouzivatel) {
                $_SESSION["pouzivatelske_meno"] = $pouzivatel["pouzivatelske_meno"];
                $_SESSION["opravnenia"] = $pouzivatel["opravnenia"];

                header("Location: index.php");
                exit();
            } else {
                echo '<div class="alert alert-danger text-center mt-4" role="alert">Nesprávne prihlasovacie údaje.</div>';
            }
        }
        ?>

        <div class="row justify-content-center">
            <div class="col-lg-6">
                <h1>Prihlásenie</h1>

                <form method="post">
                    <div class="mb-3">
                        <label for="pouzivatelske_meno" class="form-label">Používateľské meno</label>
                        <input type="text" class="form-control" id="pouzivatelske_meno" name="pouzivatelske_meno" required />
                    </div>

                    <div class="mb-3">
                        <label for="heslo" class="form-label">Heslo</label>
                        <input type="password" class="form-control" id="heslo" name="heslo" required />
                    </div>

                    <button type="submit" name="prihlasit" class="btn btn-primary">Prihlásiť sa</button>
                </form>
            </div>

            <div class="col-lg-6">
                <h1>Registrácia</h1>
                <p>Nemáš ešte účet? Registruj sa!</p>

                <form method="post">
                    <div class="mb-3">
                        <label for="pouzivatelske_meno" class="form-label">Používateľské meno</label>
                        <input type="text" class="form-control" id="pouzivatelske_meno" name="pouzivatelske_meno" required />
                    </div>

                    <div class="mb-3">
                        <label for="heslo" class="form-label">Heslo</label>
                        <input type="password" class="form-control" id="heslo" name="heslo" required />
                    </div>

                    <div class="mb-3">
                        <label for="potvrdit_heslo" class="form-label">Potvrdiť heslo</label>
                        <input type="password" class="form-control" id="potvrdit_heslo" name="potvrdit_heslo" required />
                    </div>

                    <button type="submit" name="registrovat" class="btn btn-primary">Registrovať sa</button>
                </form>
            </div>
        </div>
    </div>

    <?php include_once '_inc/sablony/footer.php'; ?>
</body>