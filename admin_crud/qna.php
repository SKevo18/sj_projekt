<?php
require_once "../_inc/config.php";
require_once "_opravnenia.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $qna = new Qna();

    $data = array(
        "otazka" => $_POST["otazka"],
        "odpoved" => $_POST["odpoved"]
    );

    if (isset($_POST["vytvorit"])) {
        $qna->vytvorQna($data);
    } else if (isset($_POST["upravit"])) {
        $qna->upravQna($_POST["id"], $data);
    } else if (isset($_POST["zmazat"])) {
        $qna->zmazQna($_POST["id"]);
    }

    header("Location: ../admin.php");
} else {
    die("Nesprávna request metóda, podporuje iba POST.");
}
