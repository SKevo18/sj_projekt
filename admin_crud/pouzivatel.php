<?php
require_once "../_inc/config.php";
require_once "_opravnenia.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $pouzivatel = new Pouzivatel();

    $data = array(
        "pouzivatelske_meno" => htmlspecialchars($_POST["pouzivatelske_meno"]),
        "heslo" => $_POST["heslo"],
        "opravnenia" => $_POST["opravnenia"],
    );

    if (isset($_POST["vytvorit"])) {
        $pouzivatel->vytvorPouzivatela($data);
    } else if (isset($_POST["upravit"])) {
        $pouzivatel->upravPouzivatela($_POST["id"], $data);
    } else if (isset($_POST["zmazat"])) {
        $pouzivatel->zmazPouzivatela($_POST["id"]);
    }

    header("Location: ../admin.php");
} else {
    die("Nesprávna request metóda, podporuje iba POST.");
}
