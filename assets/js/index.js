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
