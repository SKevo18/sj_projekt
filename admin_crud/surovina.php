<?php
require_once "../_inc/config.php";
require_once "_opravnenia.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $surovina = new Surovina();
    $data = array(
        "nazov" => htmlspecialchars($_POST["nazov"]),
        "kcal" => htmlspecialchars($_POST["kcal"]),
        "jednotka" => htmlspecialchars($_POST["jednotka"]),
        "cena" => htmlspecialchars($_POST["cena"])
    );

    if (isset($_POST["vytvorit"])) {
        $surovina->vytvorSurovinu($data);
    } else if (isset($_POST["upravit"])) {
        $surovina->upravSurovinu($_POST["id"], $data);
    } else if (isset($_POST["zmazat"])) {
        $surovina->zmazSurovinu($_POST["id"]);
    }

    header("Location: ../admin.php");
} else {
    die("Nesprávna request metóda, podporuje iba POST.");
}
