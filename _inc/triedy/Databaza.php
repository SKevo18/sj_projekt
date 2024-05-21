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

    private function query(string $sql, array $parametre = []): PDOStatement
    {
        $dotaz = $this->pripojenie->prepare($sql);
        $dotaz->execute($parametre);

        return $dotaz;
    }

    public function fetch(string $sql, array $parametre = []): array
    {
        $dotaz = $this->query($sql, $parametre);
        return $dotaz->fetch();
    }

    public function fetchAll(string $sql, array $parametre = []): array
    {
        return $this->query($sql, $parametre)->fetchAll();
    }

    public function insert(string $tabulka, array $data): void
    {
        $stlpce = implode(", ", array_keys($data));
        $hodnoty = implode(", ", array_fill(0, count($data), "?"));

        $sql = "INSERT INTO `$tabulka` ($stlpce) VALUES ($hodnoty)";
        $this->query($sql, array_values($data));
    }

    public function update(string $table, int $id, array $data): void
    {
        $set = implode(" = ?, ", array_keys($data)) . " = ?";
        $sql = "UPDATE `$table` SET $set WHERE id = $id";

        $this->query($sql, array_values($data));
    }

    public function delete(string $tabulka, int $id): void
    {
        $sql = "DELETE FROM `$tabulka` WHERE id = :id";
        $this->query($sql, array(
            "id" => $id
        ));
    }
}
