function activeMenuItem() {
    document.addEventListener('click', event => {
        const self = event.target;
        const menu = self.closest('.js-main-menu');

        if (menu) {
            const menuItem = self.closest('a[href]');
            if (menuItem) {
                const href = menuItem.getAttribute('href');
                if (!href.includes('#')) {
                    menu.querySelectorAll('a').forEach(item => item.classList.remove('is-active'));
                    menu.querySelectorAll('li').forEach(item => item.classList.remove('current-menu-parent', 'current_page_item'));
                    menuItem.classList.add('is-active');
                    const parentLi = menuItem.closest('.menu-item-has-children');
                    if (parentLi) {
                        const parentA = parentLi.querySelector('a');
                        if (parentA) parentA.classList.add('is-active');
                    }
                }
            }
        }
    });
}

activeMenuItem();

function openSubmenu() {
    document.addEventListener('click', event => {
        const self = event.target;
        const menuItem = self.closest('li.menu-item-has-children');

        if (!menuItem || self.tagName !== 'A' || self.closest('.sub-menu')) return;

        event.preventDefault();
        const subMenu = menuItem.querySelector('.sub-menu');
        const plusSign = menuItem.querySelector('.js-submenu-plus');

        if (subMenu) {
            const isOpen = subMenu.style.maxHeight && subMenu.style.maxHeight !== '0px';
            if (isOpen) {
                subMenu.style.maxHeight = '0px';
                subMenu.style.opacity = '0';
                subMenu.style.visibility = 'hidden';
                plusSign.style.transform = 'rotate(0deg)';
            } else {
                subMenu.style.maxHeight = `${subMenu.scrollHeight}px`;
                subMenu.style.opacity = '1';
                subMenu.style.visibility = 'visible';
                plusSign.style.transform = 'rotate(135deg)';
            }
        }
    });
}

openSubmenu();

function toggleMenu() {

    document.addEventListener('click', event => {

        const self = event.target;

        if (self.classList.contains('js-hb-menu')) {

            event.preventDefault();

            const menu = self.closest('.js-content-wrapper').querySelector('.js-menu');
            const menuOpen = self.querySelector('.js-hb-menu-open');
            const menuClose = self.querySelector('.js-hb-menu-close');
            const hbiOver = self.closest('.js-hbi').querySelector('.js-hbi-over');
            const hbiUnder = self.closest('.js-hbi').querySelector('.js-hbi-under');
            const opacityHidden = '!opacity-0';
            const opacityVisible = '!opacity-100';
            const transitionClasses = ['transition-all', 'duration-700'];
            const time = 700;

            // Open menu
            if (!menu.classList.contains('is-open')) {

                lenis.stop();

                menu.classList.add('is-open');
                menuOpen.classList.add('opacity-0');
                menuClose.classList.remove('opacity-0');

                hbiOver.classList.add(opacityHidden, ...transitionClasses);
                hbiUnder.classList.add(opacityVisible, ...transitionClasses);

                const starHighlight = menu.querySelector('.js-hero-star-static');
                if (starHighlight) {
                    setTimeout(() => {
                        anime({
                            targets: starHighlight,
                            rotate: [0, 135],
                            easing: 'easeInOutCubic',
                            duration: 800,
                        });
                    }, time / 2.5);
                }

            }
            // Close menu
            else {

                lenis.start();

                menu.classList.remove('is-open');
                menuOpen.classList.remove('opacity-0');
                menuClose.classList.add('opacity-0');
                hbiOver.classList.remove(opacityHidden);
                hbiUnder.classList.remove(opacityVisible);

                setTimeout(() => {
                    lenis.start();

                    [hbiOver, hbiUnder].forEach(el => el.classList.remove(...transitionClasses));

                    // Close all open submenus
                    menu.querySelectorAll('.sub-menu').forEach(subMenu => {
                        subMenu.style.maxHeight = '0px';
                        subMenu.style.opacity = '0';
                        subMenu.style.visibility = 'hidden';
                    });

                    // Reset submenu toggle indicators
                    menu.querySelectorAll('.js-submenu-plus').forEach(plusSign => {
                        plusSign.style.transform = 'rotate(0deg)';
                    });
                }, time);

            }
        }

    });

}

toggleMenu();