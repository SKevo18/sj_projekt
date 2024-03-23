<!DOCTYPE html>
<html lang="en">
<?php
  require_once "_inc/config.php";
  require_once "_inc/components.php";
  include_once 'sablony/head.php';
?>

<body>
  <?php include_once 'sablony/cookiesOkno.php'; ?>
  <?php include_once 'sablony/header.php'; ?>

  <div class="container py-4 mt-4">
    <h2 class="my-4 text-center">Zoznam receptov</h2>

    <div class="row">
      <div class="col-lg d-flex align-items-stretch">
        <div class="card mb-3">
          <div class="row g-0">
            <div class="col-4 d-flex">
              <img src="assets/img/galeria/halusky.png" class="img-fluid rounded-start" alt="Bryndzové halušky" />
            </div>
            <div class="col-8">
              <article class="card-body">
                <h5 class="card-title">
                  <a href="halusky.html" class="stretched-link">Bryndzové halušky</a>
                </h5>
                <p class="card-text">
                  Tradičné slovenské jedlo s ovčím syrom a slaninou.
                </p>
                <p class="card-text">
                  <small class="text-body-secondary d-flex flex-column gap-1">
                    <span><b>Pridané:</b>
                      <time datetime="2023-11-12">12. novembra 2023</time></span>
                    <span><b>Kalórie:</b> 163 kcal</span>
                  </small>
                </p>
              </article>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg d-flex align-items-stretch">
        <div class="card mb-3">
          <div class="row g-0">
            <div class="col-4 d-flex">
              <img src="assets/img/galeria/domace_slize.jpg" class="img-fluid rounded-start" alt="Domáce slíže" />
            </div>
            <div class="col-8">
              <article class="card-body">
                <h5 class="card-title">
                  <a href="domace_slize.html" class="stretched-link">Domáce slíže</a>
                </h5>
                <p class="card-text">
                  Recept na domáce slíže, vhodné ako cestovina do polievok.
                </p>
                <p class="card-text">
                  <small class="text-body-secondary d-flex flex-column gap-1">
                    <span><b>Pridané:</b>
                      <time datetime="2023-12-04">4. decembra 2023</time></span>
                    <span><b>Kalórie (na 100 g):</b> 340 kcal</span>
                  </small>
                </p>
              </article>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php include_once 'sablony/footer.php'; ?>
</body>

</html>