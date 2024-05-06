// Add scrolled class to navbar and button when scrolled, remove it otherwise
window.addEventListener("scroll", function () {
  const navbar = document.querySelector("nav");
  const button = document.getElementById("get-started-btn");

  if (window.scrollY > 0) {
    navbar.classList.add("scrolled");
    button.classList.add("scrolled");
  } else {
    navbar.classList.remove("scrolled");
    button.classList.remove("scrolled");
  }
});

// Smooth scroll to anchor links
document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
  anchor.addEventListener("click", function (e) {
    e.preventDefault();

    const targetId = this.getAttribute("href");
    document.querySelector(targetId).scrollIntoView({
      behavior: "smooth",
    });
  });
});

// Initialize Swiper for slider
document.addEventListener("DOMContentLoaded", function () {
  new Swiper(".swiper-container", {
    slidesPerView: 2,
    spaceBetween: 30,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
  });
});

// Adjust animation duration and delay for logo slider
document.addEventListener("DOMContentLoaded", function () {
  const logos = document.querySelectorAll("#logo-slider > div");
  const animationDuration = 50; // Animation duration in seconds
  const numberOfLogos = logos.length;
  const animationDelay = animationDuration / numberOfLogos;

  // Set animation duration for the slider
  document.getElementById("logo-slider").style.animationDuration =
    animationDuration + "s";

  // Set animation delay for each logo
  logos.forEach((logo, index) => {
    logo.style.animationDelay = (index * animationDelay) / 2 + "s";
  });
});
