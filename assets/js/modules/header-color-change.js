function headerColorChange() {
    const hbiOverItems = document.querySelectorAll('.js-hbi-over');
    if (!hbiOverItems.length) return;

    const elements = [];

    hbiOverItems.forEach(item => {
        const hbiParent = item.closest('.js-hbi.js-hbi-no-hero');
        if (!hbiParent) return;
        const hbiUnder = hbiParent.querySelector('.js-hbi-under');
        if (!hbiUnder) return;

        elements.push({ item, hbiUnder });
    });

    function updateOpacity(scrollY) {
        elements.forEach(({ item, hbiUnder }) => {
            const startScroll = 200;
            const endScroll = 500;

            if (scrollY < startScroll) {
                item.style.opacity = 0;
                hbiUnder.style.opacity = 1;
            } else if (scrollY >= endScroll) {
                item.style.opacity = 1;
                hbiUnder.style.opacity = 0;
            } else {
                let opacity = (scrollY - startScroll) / (endScroll - startScroll);
                item.style.opacity = opacity;
                hbiUnder.style.opacity = 1 - opacity;
            }
        });
    }

    lenis.on("scroll", ({ scroll }) => {
        updateOpacity(scroll);
    });
}

headerColorChange();
