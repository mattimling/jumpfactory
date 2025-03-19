function headerColorChange() {
    const hbiOver = document.querySelector(".js-hbi-over");
    const hbiUnder = document.querySelector(".js-hbi-under");
    if (!hbiOver || !hbiUnder) return;

    const startScroll = 200; // Start animation at 200px
    const endScroll = 500; // Complete animation at 500px

    function updateOpacity(scrollY) {
        if (scrollY < startScroll) {
            hbiOver.style.opacity = 0; // Hidden before 200px
            hbiUnder.style.opacity = 1; // Ensure hbiUnder is visible
        } else if (scrollY >= endScroll) {
            hbiOver.style.opacity = 1; // Fully visible at 500px
            hbiUnder.style.opacity = 0; // Fully hidden at 500px
        } else {
            let opacity = (scrollY - startScroll) / (endScroll - startScroll);
            hbiOver.style.opacity = opacity;
            hbiUnder.style.opacity = 1 - opacity; // hbiUnder fades out
        }
    }

    // Listen to Lenis scroll events
    lenis.on("scroll", ({ scroll }) => {
        updateOpacity(scroll);
    });
}

headerColorChange();
