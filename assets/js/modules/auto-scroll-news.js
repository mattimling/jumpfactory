function autoScrollNews() {
    const container = document.querySelector('.js-news');
    if (!container) return;

    const speed = parseFloat(container.getAttribute('data-scroll-speed')) || 4; // Get speed from data attribute
    let animationFrame;
    const newsItemsContainer = container.querySelector('.js-news-items'); // The container to be duplicated

    function startScroll() {
        container.scrollLeft += speed;

        // Check if we're nearing the end of the container and duplicate the news items container
        if (container.scrollLeft + container.offsetWidth >= container.scrollWidth - 50) {
            duplicateContent();
        }

        animationFrame = requestAnimationFrame(startScroll);
    }

    function duplicateContent() {
        if (newsItemsContainer) {
            const clonedContainer = newsItemsContainer.cloneNode(true); // Clone the entire js-news-items container
            container.appendChild(clonedContainer); // Append the cloned container to the main container
        }
    }

    startScroll(); // Start the animation
}

autoScrollNews();
