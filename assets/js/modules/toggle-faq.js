function toggleFaq() {
    document.querySelectorAll(".js-faq").forEach((faq) => {
        const toggle = faq.querySelector(".js-faq-toggle");
        const content = faq.querySelector(".js-faq-content");

        if (!toggle || !content) return;

        toggle.addEventListener("click", function () {
            const isOpen = content.style.maxHeight && content.style.maxHeight !== "0px";

            // Close all other FAQs in the same group
            faq.parentElement.querySelectorAll(".js-faq").forEach((otherFaq) => {
                const otherContent = otherFaq.querySelector(".js-faq-content");
                const otherToggle = otherFaq.querySelector(".js-faq-toggle");

                if (otherContent !== content) {
                    otherContent.style.maxHeight = "0px";
                    otherToggle.classList.remove("is-active");
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

    // Auto-open the first `.js-faq-open` in each section
    document.querySelectorAll(".js-faq-open").forEach((faq, index) => {
        if (index === 0) { // Ensure only the first one is clicked
            const firstToggle = faq.querySelector(".js-faq-toggle");
            if (firstToggle) {
                firstToggle.click();
            }
        }
    });

    // Recalculate max-height on window resize
    window.addEventListener("resize", () => {
        document.querySelectorAll(".js-faq-content").forEach((content) => {
            if (content.style.maxHeight && content.style.maxHeight !== "0px") {
                content.style.maxHeight = content.scrollHeight + "px";
            }
        });
    });
}

// Initialize the function
toggleFaq();
