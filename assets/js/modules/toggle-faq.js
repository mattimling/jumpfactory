function toggleFaq() {
    const toggles = document.querySelectorAll(".js-faq-toggle");

    toggles.forEach(toggle => {
        toggle.addEventListener("click", function () {
            const content = this.nextElementSibling;

            if (!content) return;

            const isOpen = content.style.maxHeight && content.style.maxHeight !== "0px";

            // Close all other open FAQ items (optional)
            document.querySelectorAll(".js-faq-content").forEach(item => {
                if (item !== content) {
                    item.style.maxHeight = "0px";
                }
            });

            document.querySelectorAll(".js-faq-toggle").forEach(item => {
                if (item !== this) {
                    item.classList.remove("is-active");
                }
            });

            // Toggle the clicked FAQ
            if (isOpen) {
                content.style.maxHeight = "0px";
                this.classList.remove("is-active");
            } else {
                content.style.maxHeight = content.scrollHeight + "px";
                this.classList.add("is-active");
            }
        });
    });
}

toggleFaq();
