function popup() {
    document.addEventListener('click', event => {
        // Open popup
        if (event.target.classList.contains('js-popup-open')) {
            event.preventDefault();

            const popup = document.querySelector('.js-popup');
            popup.classList.add('is-open');

            lenis.stop();
        }

        // Close popup
        if (event.target.classList.contains('js-popup-close')) {
            event.preventDefault();

            const popup = document.querySelector('.js-popup');
            popup.classList.remove('is-open');

            lenis.start();
        }
    });
}

popup();