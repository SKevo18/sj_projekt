<?php

class Surovina extends Databaza
{
    /**
     * Vytvorí surovinu.
     * 
     * `{ nazov, kcal, jednotka, cena }`
     */
    public function vytvorSurovinu(array $surovina): void
    {
        $this->insert("surovina", array(
            "nazov" => $surovina["nazov"],
            "kcal" => $surovina["kcal"],
            "jednotka" => $surovina["jednotka"],
            "cena" => $surovina["cena"]
        ));
    }

    /**
     * Upraví surovinu.
     * 
     * `{ nazov, kcal, jednotka, cena }`
     */
    public function upravSurovinu(int $id, array $data): void
    {
        $this->update("surovina", $data, "id = $id");
    }

    /**
     * Pridá surovinu k receptu.
     * 
     * `{ id (suroviny), mnozstvo }`
     */
    public function pridajSurovinu(int $idRecept, array $surovina): void
    {
        $this->insert("surovina_recept", array(
            "id_recept" => $idRecept,
            "id_surovina" => $surovina["id"],
            "mnozstvo" => $surovina["mnozstvo"]
        ));
    }

    /**
     * Vráti všetky suroviny.
     */
    public function vsetkySuroviny(): array
    {
        return $this->fetchAll("SELECT * FROM `surovina`");
    }

    /**
     * Vymaže surovinu.
     */
    public function zmazSurovinu(int $id): void
    {
        $this->delete("surovina", "id = $id");
    }
}
