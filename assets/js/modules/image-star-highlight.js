function starHighlightParallax() {
    const images = document.querySelectorAll('.js-image-star-highlight-image img'); // Target the inner <img>

    if (!images.length) return;

    lenis.on('scroll', ({ scroll }) => {
        images.forEach((img) => {
            const rect = img.parentElement.getBoundingClientRect(); // Get parent container position
            const speed = 0.2; // Parallax intensity

            if (rect.top < window.innerHeight && rect.bottom > 0) {
                const offset = (window.innerHeight / 2 - rect.top) * speed; // Move based on scroll position
                img.style.transform = `translateY(${offset}px)`;
            }
        });
    });
}

// starHighlightParallax();
