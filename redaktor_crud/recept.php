<?php
require_once "../_inc/config.php";
require_once "_opravnenia.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $recept = new Recept();

    $data = array(
        "nazov" => htmlspecialchars($_POST["nazov"]),
        "popis" => htmlspecialchars($_POST["popis"]),
        "postup" => htmlspecialchars($_POST["postup"]),
    );

    if (isset($_POST["vytvorit"])) {
        $recept->vytvorRecept($data);
    } else if (isset($_POST["upravit"])) {
        $recept->upravRecept($_POST["id"], $data);
        header("Location: ../recept.php?id=" . $_POST["id"]);
        exit();
    } else if (isset($_POST["zmazat"])) {
        $recept->zmazRecept($_POST["id"]);
    }

    header("Location: ../recepty.php");
} else {
    die("Nesprávna request metóda, podporuje iba POST.");
}
