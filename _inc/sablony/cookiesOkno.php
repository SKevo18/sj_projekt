<?php
if (!isset($_COOKIE["cookies"]) || $_COOKIE["cookies"] !== "ano") {
?>
  <div class="modal d-block opacity-100" id="cookiesOkno" tabindex="-1" aria-labelledby="cookiesOknoStitok" aria-hidden="false">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5 text-center w-100" id="cookiesOknoStitok">Cookies?</h1>
        </div>
        <div class="modal-body">
          Táto stránka používa pre svoje správne fungovanie <b>súbory cookies</b>.
        </div>
        <div class="modal-footer">
          <form method="POST">
            <button type="submit" name="cookies" value="ano" class="btn btn-primary">
              Súhlasím
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
<?php
}
if (isset($_POST["cookies"])) {
  setcookie("cookies", $_POST["cookies"], time() + 60 * 60 * 24 * 365);
}
?>