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
     * Skontroluje prihlasovacie údaje a vráti používateľa, inak `null`.
     */
    public function prihlasit(string $pouzivatelske_meno, string $heslo): ?array
    {
        $pouzivatel = $this->fetch(
            "SELECT * FROM `pouzivatel`
            WHERE `pouzivatelske_meno` = :pouzivatelske_meno",
            array("pouzivatelske_meno" => $pouzivatelske_meno)
        );

        if ($pouzivatel && password_verify($heslo, $pouzivatel["heslo"])) {
            return $pouzivatel;
        }

        return null;
    }

    /**
     * Vytvorí nového používateľa. Heslo je hashované pomocou `PASSWORD_BCRYPT`.
     * 
     * `{ pouzivatelske_meno, email, heslo, opravnenia }`
     */
    public function vytvorPouzivatela(array $data): void
    {
        $this->insert("pouzivatel", array(
            "pouzivatelske_meno" => $data["pouzivatelske_meno"],
            "heslo" => password_hash($data["heslo"], PASSWORD_BCRYPT),
            "opravnenia" => $data["opravnenia"]
        ));
    }

    /**
     * Upraví používateľa.
     * 
     * `{ pouzivatelske_meno, email, heslo, opravnenia }`
     */
    public function upravPouzivatela(int $id, array $data): void
    {
        $this->update("pouzivatel", array(
            "pouzivatelske_meno" => $data["pouzivatelske_meno"],
            "heslo" => password_hash($data["heslo"], PASSWORD_BCRYPT),
            "opravnenia" => $data["opravnenia"]
        ), "`id` = $id");
    }

    /**
     * Zmaže používateľa.
     */
    public function zmazPouzivatela(int $id): void
    {
        $this->delete("pouzivatel", "`id` = $id");
    }
}
