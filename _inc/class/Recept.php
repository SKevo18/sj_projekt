<?php

class Recept extends Databaza
{
    public function vsetkyRecepty(int $limit = null): array
    {
        return $this->fetchAll(
            "
            SELECT * FROM `recept`
            ORDER BY `pridany` DESC
            " . ($limit ? "LIMIT $limit" : "")
        );
    }

    public function recept(int $id): array
    {
        $recept = $this->fetch("
            SELECT * FROM `recept`
            WHERE `id` = :id
        ", array(
            "id" => $id
        ));

        $recept["suroviny"] = $this->fetchAll("
            SELECT
                `s`.`nazov`,
                (`s`.`kcal` * `sr`.`mnozstvo`) as `kcal`,
                CONCAT(`sr`.`mnozstvo`, ' ', `s`.`jednotka`) as `mnozstvo`,
                `s`.`cena`
            FROM `surovina` `s`
                INNER JOIN `surovina_recept` `sr`
                ON (`sr`.`id_surovina` = `s`.`id`)
            WHERE `sr`.`id_recept` = :id;
        ", array(
            "id" => $id
        ));

        return $recept;
    }


    public function vykresliZoznam(array $recepty): string
    {
        $html = '<div class="row g-4">';
        foreach ($recepty as $recept) {
            $html .= '
            <div class="col-lg d-flex align-items-stretch">
            <div class="card mb-3">
            <div class="row g-0">
                <div class="col-4">
                    <img width="267" src="assets/img/recepty/' . $recept["id"] . '.png" class="img-fluid rounded-start" alt="' . $recept["nazov"] . '" />
                </div>

                <div class="col-8">
                    <article class="card-body">
                        <h5 class="card-title">
                            <a href="recept.php?id=' . $recept["id"] . '" class="stretched-link">' . $recept["nazov"] . '</a>
                        </h5>
                        <p class="card-text">' . ($recept["popis"] ?? "Žiadny popis.") . '</p>
                        <p class="card-text">
                            <small class="text-body-secondary">
                                <b>Pridané:</b>
                                <time datetime="' . $recept["pridany"] . '">' . date("d. m. Y", strtotime($recept['pridany'])) . '</time>
                            </small>
                        </p>
                    </article>
                </div>
            </div>
            </div>
            </div>';
        }

        $html .= '</div>';

        return $html;
    }
}
