<?php include_once 'cookiesOkno.php'; ?>

<header id="header">
  <nav class="navbar navbar-expand-sm fixed-top bg-body-tertiary">
    <div class="container">
      <a class="navbar-brand" href="index.php">
        <img src="assets/img/logo.png" width="25" class="me-1" />
        <span>Receptovač</span>
      </a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navigacia" aria-controls="navigacia" aria-label="Prepnúť navigáciu">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navigacia">
        <ul class="navbar-nav nav-underline me-auto">
          <?php echo html_nav($GLOBALS["ODKAZY"]) ?>
        </ul>
      </div>
    </div>
  </nav>
</header>