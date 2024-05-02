<?php
require_once "../_inc/config.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $surovina = new Surovina();
    $data = array(
        "nazov" => $_POST["nazov"],
        "kcal" => $_POST["kcal"],
        "jednotka" => $_POST["jednotka"],
        "cena" => $_POST["cena"]
    );

    if (isset($_POST["vytvorit"])) {
        $surovina->vytvorSurovinu($data);
    } else if (isset($_POST["upravit"])) {
        $surovina->upravSurovinu($_POST["id"], $data);
    } else if (isset($_POST["zmazat"])) {
        $surovina->zmazSurovinu($_POST["id"]);
    }

    header("Location: ../admin.php");
}
