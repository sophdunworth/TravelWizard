document.addEventListener("DOMContentLoaded", function () {
    // Image Carousel
    const carousel = document.querySelector(".carousel");
    const images = document.querySelectorAll(".carousel img");
    const prevBtn = document.querySelector(".prev");
    const nextBtn = document.querySelector(".next");
    let index = 0;
    let interval;

    function updateCarousel() {
        carousel.style.transform = `translateX(-${index * 100}%)`;
    }

    function nextImage() {
        index = (index + 1) % images.length;
        updateCarousel();
    }

    function prevImage() {
        index = (index - 1 + images.length) % images.length;
        updateCarousel();
    }

    function startAutoSlide() {
        interval = setInterval(nextImage, 5000);
    }

    function resetInterval() {
        clearInterval(interval);
        startAutoSlide();
    }

    prevBtn.addEventListener("click", () => {
        prevImage();
        resetInterval();
    });

    nextBtn.addEventListener("click", () => {
        nextImage();
        resetInterval();
    });

    updateCarousel();
    startAutoSlide();

    // Accordion Functionality
    document.querySelectorAll(".accordion-header").forEach(button => {
        button.addEventListener("click", function () {
            const content = this.nextElementSibling;
            const icon = this.querySelector(".toggle-icon");

            // Toggle active state
            const isActive = content.classList.contains("show");

            // Close all other accordion sections
            document.querySelectorAll(".accordion-content").forEach(item => {
                item.classList.remove("show");
            });

            document.querySelectorAll(".toggle-icon").forEach(i => {
                i.textContent = "+";
            });

            // Open clicked section if not already open
            if (!isActive) {
                content.classList.add("show");
                icon.textContent = "−";
            }
        });
    });
});









