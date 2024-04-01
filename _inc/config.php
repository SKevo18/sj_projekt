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

ini_set('display_errors', CONFIG["DEBUG"]);
ini_set('display_startup_errors', CONFIG["DEBUG"]);
error_reporting(E_ALL);

$GLOBALS["ODKAZY"] = [
    array('href' => 'index.php', 'text' => 'Domov', 'ikona' => 'fa-home'),
    array('href' => 'recepty.php', 'text' => 'Recepty', 'ikona' => 'fa-receipt'),
    array('href' => 'kontakt.php', 'text' => 'Kontakt', 'ikona' => 'fa-envelope')
];

require_once "classes.php";
