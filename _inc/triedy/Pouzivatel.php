<?php

class Pouzivatel extends Databaza
{
    final const NORMALNY = 0;
    final const REDAKTOR = 1;
    final const ADMIN = 2;

    public function vsetciPouzivatelia(): array
    {
        return $this->fetchAll(
            "SELECT * FROM `pouzivatel`
            ORDER BY `id` DESC"
        );
    }

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

    public function vytvorPouzivatela(array $data): void
    {
        $this->insert("pouzivatel", array(
            "pouzivatelske_meno" => $data["pouzivatelske_meno"],
            "heslo" => password_hash($data["heslo"], PASSWORD_BCRYPT),
            "opravnenia" => $data["opravnenia"]
        ));
    }

    public function upravPouzivatela(int $id, array $data): void
    {
        $d = array(
            "pouzivatelske_meno" => $data["pouzivatelske_meno"],
            "opravnenia" => $data["opravnenia"]
        );
        if ($data["heslo"]) $d["heslo"] = password_hash($data["heslo"], PASSWORD_BCRYPT);

        $this->update("pouzivatel", $id, $d);
    }

    public function zmazPouzivatela(int $id): void
    {
        $this->delete("pouzivatel", $id);
    }
}
