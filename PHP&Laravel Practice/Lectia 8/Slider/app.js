const slides = document.getElementsByClassName("slide");
const left = document.getElementById("left");
const right = document.getElementById("right");

// daca dorim sa operam cu o clasa in JS trebuie mai intai sa o transformam intr-un array (cu Array.from(class element)...)
Array.from(slides).forEach(slide => slide.style.display = "none");

let slideToShow = 0;

slides[slideToShow].style.display = "inline-block";

left.addEventListener("click", () => {
    if (slideToShow > 0) {
        slideToShow -= 1;
    } else {
        slideToShow = slides.length - 1;
    }
    Array.from(slides).forEach(slide => slide.style.display = "none");
    slides[slideToShow].style.display = "inline-block";
})

right.addEventListener("click", () => {
    if (slideToShow < slides.length - 1) {
        slideToShow += 1;
    } else {
        slideToShow = 0;
    }
    Array.from(slides).forEach(slide => slide.style.display = "none");
    slides[slideToShow].style.display = "inline-block";
})