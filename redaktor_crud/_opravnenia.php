<?php

$rola = Pouzivatel::REDAKTOR;
if (!isset($_SESSION["opravnenia"]) || isset($_SESSION["opravnenia"]) && ($_SESSION["opravnenia"] < $rola)) {
    die("Nemáte oprávnenie na túto akciu.");
}
