<?php

class Pouzivatel extends Databaza
{
    final const REDAKTOR = 1;
    final const ADMIN = 2;

    /**
     * Vráti všetkých používateľov.
     */
    public function vsetciPouzivatelia(): array
    {
        return $this->fetchAll(
            "SELECT * FROM `pouzivatel`
            ORDER BY `id` DESC"
        );
    }

    /**
     * Vráti konkrétneho používateľa podľa ID.
     */
    public function pouzivatel(int $id): array
    {
        return $this->fetch("SELECT *
            FROM `pouzivatel`
            WHERE `id` = :id
        ", array(
            "id" => $id
        ));
    }

    /**
     * Vytvorí nového používateľa. Heslo je hashované pomocou `PASSWORD_BCRYPT`.
     * 
     * `{ pouzivatelske_meno, email, heslo, opravnenia }`
     */
    public function vytvorit(array $data): void
    {
        $this->insert("pouzivatel", array(
            "pouzivatelske_meno" => $data["pouzivatelske_meno"],
            "email" => $data["email"],
            "heslo" => password_hash($data["heslo"], PASSWORD_BCRYPT),
            "opravnenia" => $data["opravnenia"]
        ));
    }
}
