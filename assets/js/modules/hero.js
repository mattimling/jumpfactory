function hero() {
    const hero = document.querySelector('.js-hero');
    const heroMedia = document.querySelector('.js-hero-media');
    const heroImage = heroMedia?.querySelector('.js-hero-media-inner'); // Target the image inside
    const heroTitles = document.querySelector('.js-hero-titles'); // Titles (may not exist)
    const heroIcons = document.querySelectorAll('.js-hero-icon'); // Multiple hero icons
    const heroVideo = heroImage?.querySelector('video'); // Check for a video inside

    if (!hero || !heroMedia || !heroImage) return;

    function update() {
        const maxScroll = hero.offsetHeight; // Use hero height as max scroll range

        lenis.on('scroll', ({ scroll }) => {
            const scrollRatio = Math.min(scroll / maxScroll, 1); // Clamps between 0 and 1

            const scaleValue = 1 - scrollRatio * 0.3; // Shrinks slightly
            const borderRadius = scrollRatio * 20; // Goes from 0 to 15px
            const parallaxOffset = scroll * 0.2; // Parallax effect (adjust speed)

            heroMedia.style.transform = `scale(${scaleValue})`;
            heroMedia.style.borderRadius = `${borderRadius}px`;
            heroImage.style.transform = `translateY(${parallaxOffset}px)`; // Moves image inside

            if (heroTitles) {
                const opacityValue = 1 - scrollRatio * 2; // Opacity decrease
                heroTitles.style.opacity = Math.max(opacityValue, 0); // Fades out titles
                heroTitles.style.transform = `scale(${scaleValue})`;
            }

            // Apply slower parallax effect for each heroIcon
            heroIcons.forEach((icon, index) => {
                let multiplier = index === 1 ? 0.02 : 0.12; // Second icon moves slower
                const slowerParallaxOffset = scroll * multiplier; // Slower parallax effect
                icon.style.transform = `translateY(${slowerParallaxOffset}px)`; // Moves hero icon slower
            });
        });

        // Play video
        if (heroVideo) {
            heroVideo.play();
        }
    }

    update(); // Run once on load
    window.addEventListener('resize', update); // Update on resize
}

hero();
