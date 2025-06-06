function barbaPageTransition() {

    const transitionDelay = 500,
        transitionEasing = 'easeOutCubic',
        transitionTarget = document.querySelector('.js-page-wrapper'),
        transitionY = 10,
        delay = (ms = transitionDelay * 2) => new Promise(resolve => setTimeout(resolve, ms));

    function to(data) {

        // Stop lenis scroll
        lenis.stop();

        // Animate fade out
        anime({
            targets: transitionTarget,
            opacity: [1, 0],
            // translateY: [0, -transitionY],
            top: [0, -transitionY],
            easing: transitionEasing,
            duration: transitionDelay,
        });

        // Menu fadeOut
        menuOpen = document.querySelector('.js-menu.is-open');

        if (menuOpen) {

            menuOpen.classList.remove('transition-all', 'duration-700');

            anime({
                targets: document.querySelector('.js-menu'),
                // opacity: [1, 0],
                // translateY: [0, -transitionY],
                top: [0, -transitionY],
                easing: transitionEasing,
                duration: transitionDelay,
            });

        }

    }

    function ti(data) {

        // Start lenis scroll
        lenis.start();

        // Animate fade in
        anime({
            targets: transitionTarget,
            opacity: [0, 1],
            // translateY: [transitionY, 0],
            top: [transitionY, 0],
            easing: transitionEasing,
            duration: transitionDelay,
            complete: function () {

                // Start lenis scroll
                lenis.start();

                transitionTarget.style.transform = '';

            }
        });

        setTimeout(timer => {
            ifFunctionExist('hero');
            ifFunctionExist('elementBlurin');
            ifFunctionExist('starHighlight');
            ifFunctionExist('footerLogo');
            ifFunctionExist('buttonHover');
            ifFunctionExist('toggleFaq');
            ifFunctionExist('imageSlider');
            ifFunctionExist('autoScrollNews');
            ifFunctionExist('locationMap');
            ifFunctionExist('jumpZones');
            ifFunctionExist('headerColorChange');
            ifFunctionExist('homeStarMovement', 0);
            ifFunctionExist('setupStarHoverClass');
        }, 100);

    }

    barba.init({
        schema: {
            wrapper: 'js-barba-wrapper',
            container: 'js-barba-content',
        },
        sync: true,
        // debug: true,
        timeout: 10000,
        transitions: [{
            async leave(data) {

                const done = this.async();
                to(data);
                await delay((transitionDelay));
                done();

            },

            async enter(data) {

                ti(data);

            },

            async once(data) {

            },
        },],
        prevent: ({ el }) => el.classList && el.classList.contains('_brb-prv')
    })

    barba.hooks.enter(() => {

        document.body.scrollTop = document.documentElement.scrollTop = 0;

    })

    barba.hooks.beforeEnter((data) => {

        // Only run during a page transition - not initial load.
        if (data.current.container) {
            const nh = data.next.html;
            const p = new DOMParser();
            const dc = p.parseFromString(nh.replace(/(<\/?)body( .+?)?>/gi, '$1notbody$2>', nh), 'text/html');
            const bc = dc.querySelector('notbody').getAttribute('class');
            body.setAttribute('class', bc);
        }

    });

}

barbaPageTransition();