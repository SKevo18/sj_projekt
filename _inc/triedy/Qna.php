<?php

class Qna extends Databaza
{
    public function vytvorQna(array $qna): void
    {
        $this->insert("qna", array(
            "otazka" => $qna["otazka"],
            "odpoved" => $qna["odpoved"]
        ));
    }

    public function upravQna(int $id, array $data): void
    {
        $this->update("qna", $id, $data);
    }

    public function vsetkyQna(): array
    {
        return $this->fetchAll("SELECT * FROM `qna`");
    }

    public function zmazQna(int $id): void
    {
        $this->delete("qna", $id);
    }
}
