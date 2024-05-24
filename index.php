<?php
require_once '_inc/config.php';
include_once '_inc/sablony/head.php';
?>

<body>
  <?php include_once '_inc/sablony/header.php'; ?>

  <!-- Automatický slideshow: -->
  <div class="slideshow">
    <section class="card rounded-0 text-bg-dark mh-25 mt-5">
      <img src="assets/img/domov_1.png" class="card-img" alt="Titulný obrázok rozmanitých švédskych stolov" style="filter: brightness(50%); object-fit: none; object-position: center;" height="400" width="100%" />
      <div class="mx-5 card-img-overlay d-flex flex-column align-items-center justify-content-center">
        <h2 class="text-center card-title display-md-3">Receptovač</h1>
          <p class="text-center"><i>Stránka so zoznamom receptov pre slovenské jedlá.</i></p>

          <a href="recepty.php" class="btn btn-outline-light">Zoznam Jedál</a>
      </div>
    </section>

    <section class="card rounded-0 text-bg-dark mh-25 mt-5">
      <img src="assets/img/domov_2.png" class="card-img" alt="Titulný obrázok s jedlom" style="filter: brightness(50%); object-fit: none; object-position: center;" height="400" width="100%" />
      <div class="mx-5 card-img-overlay d-flex flex-column align-items-center justify-content-center">
        <h2 class="text-center card-title display-md-3">Chutné recepty každý deň</h1>
          <p class="text-center"><i>Ako od starej mamy...</i></p>

          <a href="kontakt.php" class="btn btn-outline-light">Povedzte nám Váš recept</a>
      </div>
    </section>

    <div class="position-relative">
      <button class="btn btn-outline text-white predosla position-absolute" style="bottom: 200px; left: 2.5vw;">
        <i class="fas fa-lg fa-chevron-left"></i>
      </button>
      <button class="btn btn-outline text-white nasledujuca position-absolute" style="bottom: 200px; right: 2.5vw;">
        <i class="fas fa-lg fa-chevron-right"></i>
      </button>
    </div>
  </div>

  <!-- Najnovšie recepty: -->
  <div class="container py-4">
    <h2 class="my-4">Najnovšie pridané recepty:</h2>

    <?php
    $recepty = new Recept();
    $vsetkyRecepty = $recepty->vsetkyRecepty(2);

    echo $recepty->vykresliZoznam($vsetkyRecepty);
    ?>
  </div>

  <!-- QnA -->
  <div class="container-fluid bg-primary text-bg-dark py-5">
    <div class="container">
      <h2 class="mb-4">Často kladené otázky</h2>

      <div class="accordion">
        <?php
        $qna_obj = new Qna();
        $qna = $qna_obj->vsetkyQna();

        for ($i = 0; $i < count($qna); $i++) {
        ?>
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#otazka<?= $i ?>" aria-expanded="false" aria-controls="otazka<?= $i ?>">
                <?= $qna[$i]["otazka"] ?>
              </button>
            </h2>
            <div id="otazka<?= $i ?>" class="accordion-collapse collapse">
              <div class="accordion-body">
                <?= $qna[$i]["odpoved"] ?>
              </div>
            </div>
          </div>
        <?php
        }
        ?>
      </div>
    </div>
  </div>

  <?php include_once '_inc/sablony/footer.php'; ?>