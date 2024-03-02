// ŠABLÓNY:
const SABLONY = {
  header: `
<header id="header">
  <nav class="navbar navbar-expand-sm fixed-top bg-body-tertiary">
    <div class="container">
      <a class="navbar-brand" href="index.html">
        <img src="img/logo.png" width="25" class="me-1" />
        <span>eceptovač</span>
      </a>

      <button
        class="navbar-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navigacia"
        aria-controls="navigacia"
        aria-label="Prepnúť navigáciu"
      >
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navigacia">
        <ul id="odkazyHeader" class="navbar-nav nav-underline me-auto"></ul>
      </div>
    </div>
  </nav>
</header>
`,
  footer: `
<footer id="footer" class="container-fluid pt-4 pb-2">
  <div
    class="container d-flex justify-content-evenly my-4"
  >
    <div class="d-flex flex-column">
      <h2 class="fs-6 fw-bold">Zoznam stránok:</h2>
      <ul id="odkazyFooter" class="list-unstyled"></ul>
    </div>
    <div class="d-flex flex-column">
      <h2 class="fs-6 fw-bold">Zdroje obrázkov:</h2>
      <a
        href="https://openai.com/dall-e-3"
        class="text-decoration-none"
        target="_blank"
        >DALL&bullet;E 3</a
      >
      <a
        href="https://unsplash.com"
        class="text-decoration-none"
        target="_blank"
        >Unsplash</a
      >
    </div>

    <p class="align-self-center text-center">
      <br/>

      <!-- kreatívny bod -->
      <i class="text-center">&copy; <b>Kevin Svitač</b> <span id="aktualnyRok"></span>. Všetky práva vyhradené.</i>
    </p>
  </div>
</footer>
`,
  cookiesOkno: `
<div
  class="modal fade"
  id="cookiesOkno"
  tabindex="-1"
  aria-labelledby="cookiesOknoStitok"
  aria-hidden="false"
>
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5 text-center w-100" id="cookiesOknoStitok">Cookies?</h1>
        <button
          type="button"
          class="btn-close"
          data-bs-dismiss="modal"
          aria-label="Nesúhlasím!"
        ></button>
      </div>
      <div class="modal-body">
        Táto stránka používa pre svoje správne fungovanie <b>súbory cookies</b>.
      </div>
      <div class="modal-footer">
        <button
          type="button"
          class="btn btn-secondary"
          onclick="potvrditCookies(false);"
        >
          Nesúhlasím!
        </button>
        <button
          type="button"
          class="btn btn-primary"
          onclick="potvrditCookies(true);"
        >
          Súhlasím
        </button>
      </div>
    </div>
  </div>
</div>
`,
};

ODKAZY = {
  '<i class="fas fa-home mr-4"></i> <span>Domov</span>': "index.html",
  '<i class="fas fa-receipt mr-4"></i> <span>Recepty</span>': "recepty.html",
  '<i class="fas fa-envelope mr-4"></i> <span>Kontakt</span>': "kontakt.html",
};

function nacitatOdkazy() {
  const odkazyHeader = document.getElementById("odkazyHeader");
  const odkazyFooter = document.getElementById("odkazyFooter");

  odkazHtml = (jeHeader, nazov) => {
    if (jeHeader) {
      let aktualnaURI =
        window.location.pathname.split("/").pop() || "index.html";
      return `<li class="nav-item"><a class="nav-link d-flex align-items-center gap-2 ${
        aktualnaURI == ODKAZY[nazov] ? "active" : ""
      }" href="${ODKAZY[nazov]}">${nazov}</a></li>`;
    } else {
      return `<li><a class="text-decoration-none d-flex align-items-center gap-2" href="${ODKAZY[nazov]}">${nazov}</a></li>`;
    }
  };

  for (let nazov in ODKAZY) {
    odkazyHeader.innerHTML += odkazHtml(true, nazov);
    odkazyFooter.innerHTML += odkazHtml(false, nazov);
  }
}

function nacitatSablony() {
  const cookiesOkno = document.getElementById("cookiesOkno");
  const header = document.getElementById("header");
  const footer = document.getElementById("footer");

  cookiesOkno.outerHTML = SABLONY.cookiesOkno;
  header.outerHTML = SABLONY.header;
  footer.outerHTML = SABLONY.footer;
}

// COOKIES OKNO:
const COOKIES_OKNO_ID = "cookiesOkno";
const COOKIES_LS_PREMENNA = "cookiesPotvrdene";

function zobrazitCookiesListu(cookies_okno) {
  let potvrdenie = localStorage.getItem(COOKIES_LS_PREMENNA);

  if (potvrdenie == null) {
    cookies_okno.show();
  } else if (potvrdenie != "ano") {
    alert("Cookies musia byť potvrdené!");
    cookies_okno.show();
  }
}

function potvrditCookies(potvrdenie) {
  localStorage.setItem(COOKIES_LS_PREMENNA, potvrdenie ? "ano" : "nie");
  location.reload();
}

// VÝPIS ROKU:
function napisatAktualnyRok() {
  let rokElement = document.getElementById("aktualnyRok");
  let aktualnyRok = new Date().getFullYear();
  rokElement.innerText = aktualnyRok;
}

// PO NAČÍTANÍ HTML:
document.addEventListener("DOMContentLoaded", () => {
  nacitatSablony();
  nacitatOdkazy();

  const cookies_okno = new bootstrap.Modal(`#${COOKIES_OKNO_ID}`, {
    keyboard: false,
  });

  napisatAktualnyRok();
  zobrazitCookiesListu(cookies_okno);
});

// SLIDESHOW
const SLIDESHOW_ELEMENTY = document.querySelectorAll(".slideshow");

function zmenitSnimku(slideshow_element, index) {
  let snimky = slideshow_element.getElementsByTagName("section");

  for (let i = 0; i < snimky.length; i++) {
    snimky[i].style.display = "none";
  }

  snimky[index].style.display = "block";
}

for (let i = 0; i < SLIDESHOW_ELEMENTY.length; i++) {
  let slideshow_element = SLIDESHOW_ELEMENTY[i];
  let snimky = slideshow_element.getElementsByTagName("section");

  let index = 0;
  snimky[index].style.display = "block";

  let predosla = slideshow_element.querySelector(".predosla");
  let nasledujuca = slideshow_element.querySelector(".nasledujuca");

  let _zmenit = () => {
    index = (index + 1) % snimky.length;
    zmenitSnimku(slideshow_element, index);
  };

  predosla.onclick = () => {
    index = (index - 1 + snimky.length) % snimky.length;
    zmenitSnimku(slideshow_element, index);
  };

  nasledujuca.onclick = _zmenit;
  setInterval(_zmenit, 5000);
}
