function preloader() {

    const preloader = document.querySelector('.js-preloader');

    if (preloader) {

        // Hide all on the load > make visible after 0.8s.
        setTimeout(f => {

            lenis.scrollTo(0, {
                immediate: true
            });

            lenis.stop();

            html.style.opacity = '1';
            html.style.overflow = 'auto';

            const prelTransitionDelay = 500,
                prelTransitionEasing = 'easeOutCubic',
                prelTransitionY = 30;

            // Load body
            anime({
                targets: body,
                opacity: [0, 1],
                // marginTop: [transitionY, 0],
                translateY: [prelTransitionY, 0],
                // filter: ['blur(5px)', 'blur(0px)'],
                easing: prelTransitionEasing,
                duration: prelTransitionDelay,
                complete: function () {
                    lenis.start();

                    body.style.transform = '';
                }
            });

            anime({
                targets: document.querySelector('.js-page-wrapper'),
                opacity: [0, 1],
                // marginTop: [transitionY, 0],
                translateY: [prelTransitionY, 0],
                // filter: ['blur(5px)', 'blur(0px)'],
                easing: prelTransitionEasing,
                duration: prelTransitionDelay,
                complete: function () {
                    lenis.start();

                    document.querySelector('.js-page-wrapper').style.transform = '';
                }
            });


        }, 1500);

    }

}

preloader();
