let slideIndex = 0;

function showCarousel() {
  const slides = document.getElementsByClassName("my_slides");
  const labels = document.getElementsByClassName("my_labels");

  for (let i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }

  for (let i = 0; i < labels.length; i++) {
    labels[i].style.display = "none";
  }

  slideIndex++;
  if (slideIndex > slides.length) {
    slideIndex = 1;
  }

  if (slides.length > 0) {
    slides[slideIndex - 1].style.display = "block";
  }

  if (labels.length > 0) {
    labels[slideIndex - 1].style.display = "block";
  }

  setTimeout(showCarousel, 3000);
}

document.addEventListener("DOMContentLoaded", showCarousel);