<?php

class Kontakt extends Databaza
{
    /**
     * Vloží kontakt do databázy.
     */
    public function vlozKontakt(string $meno, string $email, string $sprava, bool $suhlas): void
    {
        $this->insert("kontakt", array(
            "meno" => $meno,
            "email" => $email,
            "sprava" => $sprava,
            "suhlas" => $suhlas
        ));
    }
}
