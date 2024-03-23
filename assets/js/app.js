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

// PO NAČÍTANÍ HTML:
document.addEventListener("DOMContentLoaded", () => {
  const cookies_okno = new bootstrap.Modal(`#${COOKIES_OKNO_ID}`, {
    keyboard: false,
  });

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
