<h2>Otázky a Odpovede</h2>

<?php
$qna_obj = new Qna();
$vsetky_qna = $qna_obj->vsetkyQna();
?>

<table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Otázka</th>
            <th scope="col">Odpoveď</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($vsetky_qna as $qna) { ?>
            <tr>
                <form action="admin_crud/qna.php" method="POST">
                    <th scope="row"><input type="text" readonly size="2" name="id" value="<?= $qna["id"] ?>"></th>
                    <td><input type="text" size="50" name="otazka" value="<?= $qna["otazka"] ?>"></td>
                    <td><input type="text" size="50" name="odpoved" value="<?= $qna["odpoved"] ?>"></td>


                    <td style="display: flex; gap: 4px;">
                        <input type="submit" name="upravit" value="Upraviť" class="btn btn-primary">
                        <input type="submit" name="zmazat" value="Zmazať" class="btn btn-danger">
                    </td>
                </form>
            </tr>
        <?php }; ?>
        <tr>
            <form action="admin_crud/qna.php" method="POST">
                <th scope="row">Nová</th>
                <td><input type="text" size="50" name="otazka"></td>
                <td><input type="text" size="50" name="odpoved"></td>

                <td><input type="submit" name="vytvorit" value="Vytvoriť" class="btn btn-success"></td>
            </form>
        </tr>
    </tbody>
</table>