<?php

$rola = Pouzivatel::ADMIN;
if (!isset($_SESSION["opravnenia"]) || isset($_SESSION["opravnenia"]) && ($_SESSION["opravnenia"] < $rola)) {
    die("Nemáte oprávnenie na túto akciu.");
}
