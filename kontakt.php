<!DOCTYPE html>
<html lang="en">
  <?php include 'sablony/head.php'; ?>
  <body>
    <?php include 'sablony/cookiesOkno.php'; ?>
    <?php include 'sablony/header.php'; ?>

    <div class="col-8 mx-auto mt-5 pt-4">
      <h1>Kontakt</h1>
      <p>
        Kontaktujte nás, a možno sa Váš recept stane súčasťou našej stránky!
      </p>

      <form action="kontakt_podakovanie.html" method="GET">
        <div class="mb-3">
          <label for="meno" class="form-label">Meno</label>
          <input required type="text" name="meno" class="form-control" id="meno" placeholder="Jožko Mrkvička" />
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">E-mail</label>
          <input required type="email" name="email" class="form-control" id="email" placeholder="jozo@dezo.sk" />
        </div>
        <div class="mb-3">
          <label for="sprava" class="form-label">Správa</label>
          <textarea
            placeholder="Sem napíšte Vašu správu..."
            required
            class="form-control"
            id="sprava"
            name="sprava"
            rows="4"
          ></textarea>
        </div>

        <div class="mb-3">
          <input required id="suhlas" name="suhlas" type="checkbox" />
          <label for="suhlas" class="form-label"
            >Súhlasím s podmienkami Spracovania osobných údajov</label
          >
        </div>
        <button type="submit" class="btn btn-primary">Odoslať</button>
      </form>
    </div>

    <?php include 'sablony/footer.php'; ?>
  </body>
</html>
