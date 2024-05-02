<h2>Suroviny</h2>
<?php
$suroviny = new Surovina();
$suroviny = $suroviny->vsetkySuroviny();
?>

<table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Názov</th>
            <th scope="col">Kcal</th>
            <th scope="col">Jednotka</th>
            <th scope="col">Cena</th>
            <th scope="col">Akcie</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($suroviny as $surovina) : ?>
            <tr>
                <form action="admin_crud/surovina.php" method="POST">
                    <th scope="row"><input type="text" readonly size="2" name="id" value="<?= $surovina["id"] ?>"></th>
                    <td><input type="text" size="30" name="nazov" value="<?= $surovina["nazov"] ?>"></td>
                    <td><input type="number" name="kcal" style="width: 60px;" value="<?= $surovina["kcal"] ?>"></td>
                    <td><input type="text" size="3" name="jednotka" value="<?= $surovina["jednotka"] ?>"></td>
                    <td><input type="text" size="6" name="cena" value="<?= $surovina["cena"] ?>"></td>
                    <td style="display: flex; gap: 4px;">
                        <input type="submit" name="upravit" value="Upraviť" class="btn btn-primary">
                        <input type="submit" name="zmazat" value="Zmazať" class="btn btn-danger">
                    </td>
                </form>
            </tr>
        <?php endforeach; ?>
        <tr>
            <form action="admin_crud/surovina.php" method="POST">
                <th scope="row">Nová</th>
                <td><input type="text" size="30" name="nazov"></td>
                <td><input type="number" name="kcal" style="width: 60px;"></td>
                <td><input type="text" size="3" name="jednotka"></td>
                <td><input type="text" size="6" name="cena"></td>
                <td><input type="submit" name="vytvorit" value="Vytvoriť" class="btn btn-success"></td>
            </form>
        </tr>
    </tbody>
</table>