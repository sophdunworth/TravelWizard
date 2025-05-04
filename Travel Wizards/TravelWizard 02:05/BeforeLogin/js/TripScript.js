document.addEventListener("DOMContentLoaded", function () {
    const carousel = document.querySelector(".carousel");
    const images = document.querySelectorAll(".carousel img");
    const prevBtn = document.querySelector(".prev");
    const nextBtn = document.querySelector(".next");
    let index = 1; // Start at 1 due to clone at beginning
    let interval;
    const totalImages = images.length;

    // Clone first and last image
    const firstClone = images[0].cloneNode(true);
    const lastClone = images[totalImages - 1].cloneNode(true);
    firstClone.classList.add("clone");
    lastClone.classList.add("clone");

    carousel.appendChild(firstClone);
    carousel.insertBefore(lastClone, images[0]);

    const allImages = document.querySelectorAll(".carousel img");
    const totalSlides = allImages.length;

    function updateCarousel() {
        carousel.style.transition = "transform 0.5s ease-in-out";
        carousel.style.transform = `translateX(-${index * 100}%)`;
    }

    function nextImage() {
        if (index >= totalSlides - 1) return;
        index++;
        updateCarousel();
    }

    function prevImage() {
        if (index <= 0) return;
        index--;
        updateCarousel();
    }

    function startAutoSlide() {
        interval = setInterval(nextImage, 5000);
    }

    function resetInterval() {
        clearInterval(interval);
        startAutoSlide();
    }

    carousel.addEventListener("transitionend", () => {
        if (allImages[index].classList.contains("clone")) {
            carousel.style.transition = "none";
            if (index === totalSlides - 1) {
                index = 1; // Reset to first real image
            } else if (index === 0) {
                index = totalSlides - 2; // Reset to last real image
            }
            carousel.style.transform = `translateX(-${index * 100}%)`;
        }
    });

    prevBtn.addEventListener("click", () => {
        prevImage();
        resetInterval();
    });

    nextBtn.addEventListener("click", () => {
        nextImage();
        resetInterval();
    });

    // Initial setup
    carousel.style.transform = `translateX(-${index * 100}%)`;
    startAutoSlide();
});











