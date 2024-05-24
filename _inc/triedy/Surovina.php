<?php

class Surovina extends Databaza
{
    public function vytvorSurovinu(array $surovina): void
    {
        $this->insert("surovina", array(
            "nazov" => $surovina["nazov"],
            "kcal" => $surovina["kcal"],
            "jednotka" => $surovina["jednotka"],
            "cena" => $surovina["cena"]
        ));
    }

    public function upravSurovinu(int $id, array $data): void
    {
        $this->update("surovina", $id, $data);
    }

    public function pridajSurovinu(int $idRecept, array $surovina): void
    {
        $this->insert("surovina_recept", array(
            "id_recept" => $idRecept,
            "id_surovina" => $surovina["id"],
            "mnozstvo" => $surovina["mnozstvo"]
        ));
    }

    public function vsetkySuroviny(): array
    {
        return $this->fetchAll("SELECT * FROM `surovina` ORDER BY `cena` DESC");
    }

    public function zmazSurovinu(int $id): void
    {
        $this->delete("surovina", $id);
    }
}
