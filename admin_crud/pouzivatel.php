<?php
require_once "../_inc/config.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $surovina = new Pouzivatel();

    $data = array(
        "pouzivatelske_meno" => $_POST["pouzivatelske_meno"],
        "heslo" => $_POST["heslo"],
        "opravnenia" => $_POST["opravnenia"],
    );

    if (isset($_POST["vytvorit"])) {
        $surovina->vytvorPouzivatela($data);
    } else if (isset($_POST["upravit"])) {
        $surovina->upravPouzivatela($_POST["id"], $data);
    } else if (isset($_POST["zmazat"])) {
        $surovina->zmazPouzivatela($_POST["id"]);
    }

    header("Location: ../admin.php");
}
