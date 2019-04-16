let currentSlide = 1;

// Initiate dot navigation
for (let i = 0; i < $(".ns-image-container img").length; i++) {
  $(".dotnav").append(`<span class="dot"></span>`);  
}

// Set global variables
const slides = $(".ns-image-container img");
const dotnav = $(".dotnav span");

// Show current slide
const showSlide = function (n) {
  
  if (n > slides.length ) {
    currentSlide = 1;
  }

  if (n < 1) {
    currentSlide = slides.length;
  }

  for (i = 0; i < slides.length; i++) {
    slides.eq(i).css("display", "none")
  }

  for (i = 0; i < dotnav.length; i++) {
    dotnav.eq(i).removeClass("active");
  }

  slides.eq(currentSlide - 1).css("display", "block");
  dotnav.eq(currentSlide - 1).addClass("active");

}

// Next and prevoius controls
$("#next").click(() => {showSlide(currentSlide += 1);});
$("#prev").click(() => {showSlide(currentSlide += -1);});

showSlide();