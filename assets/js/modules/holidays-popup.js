function holidaysPopup() {
    document.addEventListener('click', event => {
        // Open popup
        if (event.target.classList.contains('js-holidays-popup-open')) {
            event.preventDefault();

            const holidaysPopup = document.querySelector('.js-holidays-popup');
            holidaysPopup.classList.add('is-open');

            lenis.stop();
        }

        // Close popup
        if (event.target.classList.contains('js-holidays-popup-close')) {
            event.preventDefault();

            const holidaysPopup = document.querySelector('.js-holidays-popup');
            holidaysPopup.classList.remove('is-open');

            lenis.start();
        }
    });
}

holidaysPopup();