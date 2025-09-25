function popup() {
    document.addEventListener('click', event => {
        const target = event.target.closest('a, button');
        if (!target) return;

        // Open popup
        if (target.classList.contains('js-popup-open')) {
            event.preventDefault();

            // get href and strip leading "#" if present
            let popupId = target.getAttribute('href').replace(/^#/, '');
            const popup = document.querySelector(`.js-popup[data-popup-id="${popupId}"]`);

            if (popup) {
                popup.classList.add('is-open');
                lenis.stop();
            }
        }

        // Close popup
        if (target.classList.contains('js-popup-close')) {
            event.preventDefault();

            const popup = target.closest('.js-popup');
            if (popup) {
                popup.classList.remove('is-open');
                lenis.start();
            }
        }
    });
}

popup();