function elementBlurin() {
    if (window.innerWidth <= 1024) return;

    const elements = document.querySelectorAll('.js-element-blurin, .js-element-blurin-scale');
    const childrenElements = document.querySelectorAll('.js-element-blurin-children > *');

    if (!elements.length && !childrenElements.length) return;

    const allElements = [...elements, ...childrenElements];

    // Helper function to apply the blur effect
    function applyBlurEffect(element) {
        const rect = element.getBoundingClientRect();
        const viewportHeight = window.innerHeight;
        const maxBlur = 15;
        const blurDistance = viewportHeight / 4;
        const transformDistance = viewportHeight / 4;

        const opacityProgress = Math.min(Math.max(0, viewportHeight - rect.top) / blurDistance, 1);
        let transformProgress = Math.min(Math.max(0, viewportHeight - rect.top) / transformDistance, 1);
        transformProgress = 0.5 * (1 - Math.cos(Math.PI * transformProgress));

        const blurAmount = maxBlur * (1 - opacityProgress);
        const opacityAmount = opacityProgress;
        const translateAmount = 50 * (1 - transformProgress);

        // element.style.filter = `blur(${blurAmount}px)`; // Optional
        element.style.opacity = opacityAmount;
        element.style.transform = `translateY(${translateAmount}px)`;
    }

    function onScroll() {
        allElements.forEach(applyBlurEffect);
    }

    // Initial call
    onScroll();

    // Listen to Lenis scroll
    lenis.on('scroll', onScroll);

    // ✅ Watch for any size/position changes using ResizeObserver
    const resizeObserver = new ResizeObserver(() => {
        requestAnimationFrame(onScroll);
    });

    allElements.forEach(el => resizeObserver.observe(el));

    // ✅ Also listen to window resize in case of layout changes
    window.addEventListener('resize', () => {
        requestAnimationFrame(onScroll);
    });
}

elementBlurin();
