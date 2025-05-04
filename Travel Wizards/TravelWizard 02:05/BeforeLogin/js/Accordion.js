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