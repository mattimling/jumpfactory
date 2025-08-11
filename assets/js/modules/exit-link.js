function exitLink() {
    document.addEventListener('click', event => {
        const self = event.target;

        if (self.classList.contains('js-exit-link')) {
            event.preventDefault();

            const url = self.getAttribute('href');

            const content = document.querySelector('.js-barba-content');

            content.classList.add('fade-out');

            setTimeout(() => {
                window.location.href = url;
            }, 500);
        }
    });
}

exitLink();
