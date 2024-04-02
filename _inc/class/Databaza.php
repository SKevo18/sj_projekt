<?php

class Databaza
{
    private PDO $pripojenie;

    public function __construct()
    {
        try {
            $this->pripojenie = new PDO(
                "mysql:host=" . CONFIG["DB"]["HOST"] . ";dbname=" . CONFIG["DB"]["DBNAME"] . ";charset=utf8mb4",
                CONFIG["DB"]["USER"],
                CONFIG["DB"]["PASSWORD"]
            );
            $this->pripojenie->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $this->pripojenie->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        } catch (PDOException $e) {
            $sprava = "Nepodarilo sa pripojiť k databáze.";
            if (CONFIG["DEBUG"]) {
                $sprava .= "\nChyba: " . $e->getMessage();
            }

            die($sprava);
        }
    }

    /**
     * Vykoná dotaz v databáze.
     */
    private function query(string $sql, array $parametre = []): PDOStatement
    {
        $dotaz = $this->pripojenie->prepare($sql);
        $dotaz->execute($parametre);

        return $dotaz;
    }

    /**
     * Vráti prvý výsledok.
     */
    public function fetch(string $sql, array $parametre = []): array
    {
        return $this->query($sql, $parametre)->fetch();
    }

    /**
     * Vráti všetky výsledky.
     */
    public function fetchAll(string $sql, array $parametre = []): array
    {
        return $this->query($sql, $parametre)->fetchAll();
    }

    /**
     * Vloží dáta do databázy.
     * 
     * Kľúče reprezentujú stĺpce, hodnoty reprezentujú konkrétne dáta pre stĺpec.
     */
    public function insert(string $tabulka, array $data): void
    {
        $stlpce = implode(", ", array_keys($data));
        $hodnoty = implode(", ", array_fill(0, count($data), "?"));

        $sql = "INSERT INTO `$tabulka` ($stlpce) VALUES ($hodnoty)";
        $this->query($sql, array_values($data));
    }

    /**
     * Aktualizuje dáta v databáze.
     * 
     * Kľúče reprezentujú stĺpce, hodnoty reprezentujú konkrétne dáta pre stĺpec.
     */
    public function update(string $table, array $data, string $podmienkaWhere, array $parametre = []): void
    {
        // medzi klucmi bude `= ?`, na konci musime doplnit chybajuce `= ?`
        $set = implode(" = ?, ", array_keys($data)) . " = ?";
        $sql = "UPDATE `$table` SET $set WHERE $podmienkaWhere";

        $this->query($sql, array_merge(array_values($data), $parametre));
    }

    /**
     * Vymaže dáta z databázy.
     */
    public function delete(string $tabulka, string $podmienkaWhere, array $parametre = []): void
    {
        $sql = "DELETE FROM `$tabulka` WHERE $podmienkaWhere";
        $this->query($sql, $parametre);
    }
}
