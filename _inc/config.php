<?php

const CONFIG = [
    "DB" => [
        "HOST" => "localhost",
        "DBNAME" => "projekt",
        "USER" => "root",
        "PASSWORD" => "",
    ],
    "DEBUG" => true
];

if (CONFIG["DEBUG"]) {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
}

$GLOBALS["ODKAZY"] = [
    array('href' => 'index.php', 'text' => 'Domov', 'ikona' => 'fa-home'),
    array('href' => 'recepty.php', 'text' => 'Recepty', 'ikona' => 'fa-receipt'),
    array('href' => 'kontakt.php', 'text' => 'Kontakt', 'ikona' => 'fa-envelope')
];

require_once "triedy.php";

session_start();

if (isset($_SESSION["opravnenia"]) && ($_SESSION["opravnenia"] >= Pouzivatel::ADMIN)) {
    $GLOBALS["ODKAZY"][] = array('href' => 'admin.php', 'text' => 'Admin', 'ikona' => 'fa-user-cog');
}

if (!isset($_SESSION["opravnenia"])) {
    $GLOBALS["ODKAZY"][] = array('href' => 'prihlasenie.php', 'text' => 'Prihlásiť', 'ikona' => 'fa-sign-in-alt');
} else {
    $GLOBALS["ODKAZY"][] = array('href' => 'odhlasit.php', 'text' => 'Odhlásiť', 'ikona' => 'fa-sign-out-alt');
}
