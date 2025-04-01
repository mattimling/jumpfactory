function headerColorChange() {

    const hbiOver = document.querySelectorAll('.js-hbi-over');

    hbiOver.forEach(item => {

        const hbiUnder = item.closest('.js-hbi').querySelector('.js-hbi-under');

        if (!hbiOver || !hbiUnder) return;

        const startScroll = 200; // Start animation at 200px
        const endScroll = 500; // Complete animation at 500px

        function updateOpacity(scrollY) {
            if (scrollY < startScroll) {
                item.style.opacity = 0; // Hidden before 200px
                hbiUnder.style.opacity = 1; // Ensure hbiUnder is visible
            } else if (scrollY >= endScroll) {
                item.style.opacity = 1; // Fully visible at 500px
                hbiUnder.style.opacity = 0; // Fully hidden at 500px
            } else {
                let opacity = (scrollY - startScroll) / (endScroll - startScroll);
                item.style.opacity = opacity;
                hbiUnder.style.opacity = 1 - opacity; // hbiUnder fades out
            }
        }

        // Listen to Lenis scroll events
        lenis.on("scroll", ({ scroll }) => {
            updateOpacity(scroll);
        });

    });

}

headerColorChange();
