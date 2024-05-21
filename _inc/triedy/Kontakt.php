<?php

class Kontakt extends Databaza
{
    public function vytvorKontakt(string $meno, string $email, string $sprava, bool $suhlas): void
    {
        $this->insert("kontakt", array(
            "meno" => $meno,
            "email" => $email,
            "sprava" => $sprava,
            "suhlas" => $suhlas
        ));
    }
}
