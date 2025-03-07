function starHighlight() {
    const heroStars = document.querySelectorAll('.js-hero-star');

    if (!heroStars.length) return;

    lenis.on('scroll', ({ scroll }) => {
        const rotation = scroll * 0.25; // Rotate based on scroll
        heroStars.forEach((star) => {
            star.style.transform = `rotate(${rotation}deg)`;
        });
    });
}

starHighlight();
