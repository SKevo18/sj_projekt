// ŠABLÓNY:
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
