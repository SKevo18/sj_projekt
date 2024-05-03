<h2>Pouzivatelia</h2>
<?php
$pouzivatelia = new Pouzivatel();
$pouzivatelia = $pouzivatelia->vsetciPouzivatelia();
?>

<table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Používateľské meno</th>
            <th scope="col">Heslo</th>
            <th scope="col">Oprávnenia</th>
            <th scope="col">Akcie</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($pouzivatelia as $pouzivatel) : ?>
            <tr>
                <form action="admin_crud/pouzivatel.php" method="POST">
                    <th scope="row"><input type="text" readonly size="2" name="id" value="<?= $pouzivatel["id"] ?>"></th>
                    <td><input type="text" size="30" name="pouzivatelske_meno" value="<?= $pouzivatel["pouzivatelske_meno"] ?>"></td>
                    <td><input type="password" size="30" name="heslo" value=""></td>

                    <td>
                        <select name="opravnenia">
                            <option value="<?= Pouzivatel::REDAKTOR ?>" <?= $pouzivatel["opravnenia"] == Pouzivatel::REDAKTOR ? "selected" : "" ?>>Redaktor</option>
                            <option value="<?= Pouzivatel::ADMIN ?>" <?= $pouzivatel["opravnenia"] == Pouzivatel::ADMIN ? "selected" : "" ?>>Admin</option>
                        </select>
                    </td>
                    <td style="display: flex; gap: 4px;">
                        <input type="submit" name="upravit" value="Upraviť" class="btn btn-primary">
                        <input type="submit" name="zmazat" value="Zmazať" class="btn btn-danger">
                    </td>
                </form>
            </tr>
        <?php endforeach; ?>
        <tr>
            <form action="admin_crud/pouzivatel.php" method="POST">
                <th scope="row">Nový</th>
                <td><input type="text" size="30" name="pouzivatelske_meno"></td>
                <td><input type="password" size="30" name="heslo"></td>
                <td>
                    <select name="opravnenia">
                        <option value="<?= Pouzivatel::REDAKTOR ?>">Redaktor</option>
                        <option value="<?= Pouzivatel::ADMIN ?>">Admin</option>
                    </select>
                </td>
                <td><input type="submit" name="vytvorit" value="Vytvoriť" class="btn btn-success"></td>
            </form>
        </tr>
    </tbody>
</table>
