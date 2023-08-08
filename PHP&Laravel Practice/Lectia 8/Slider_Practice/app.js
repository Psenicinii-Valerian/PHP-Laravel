const giphs = document.getElementsByClassName("giphs");
const rightButton = document.getElementById("right");
const leftButton = document.getElementById("left");
let giphToShow = 0;

// id - 1 element
// class - mai multe elemente (1+)
// inline - ia doar latimea de content si nu putem utiliza pentru el padding/margin/border etc.
// inline-block - ia doar latimea de ecran si putem utiliza pentru el padding/margin/border etc.
// block - display care ia latimea la tot ecranul si putem utiliza pentru el padding/margin/border etc.

Array.from(giphs).forEach(giph => giph.style.display = "none");
giphs[giphToShow].style.display = "inline-block";

leftButton.addEventListener("click", () => {
    if (giphToShow > 0) {
        giphToShow -= 1;
    } else {
        giphToShow = giphs.length - 1;
    }
    Array.from(giphs).forEach(giph => giph.style.display = "none");
    giphs[giphToShow].style.display = "inline-block";
});

rightButton.addEventListener("click", () => {
    if (giphToShow < giphs.length -1) {
        giphToShow += 1;
    } else {
        giphToShow = 0;
    }
    Array.from(giphs).forEach(giph => giph.style.display = "none");
    giphs[giphToShow].style.display = "inline-block";
});