function initMenu(target) {
    // Cache elements and constants
    const menu = target.querySelector('.js-menu');
    const hbiOver = target.querySelector('.js-hbi-over');
    const hbiUnder = target.querySelector('.js-hbi-under');
    const menuOpen = target.querySelector('.js-hb-menu-open');
    const menuClose = target.querySelector('.js-hb-menu-close');
    const time = 700;

    const opacityHidden = '!opacity-0';
    const opacityVisible = '!opacity-100';
    const transitionClasses = ['transition-all', 'duration-700'];

    function openMenu() {
        lenis.stop();

        menu.classList.add('is-open');
        hbiOver.classList.add(opacityHidden, ...transitionClasses);
        hbiUnder.classList.add(opacityVisible, ...transitionClasses);

        menuOpen.classList.add('opacity-0');
        menuClose.classList.remove('opacity-0');

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

    function closeMenu() {
        if (menu) {
            menu.classList.remove('is-open');
            hbiOver.classList.remove(opacityHidden);
            hbiUnder.classList.remove(opacityVisible);

            menuOpen.classList.remove('opacity-0');
            menuClose.classList.add('opacity-0');

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
                target.querySelectorAll('.js-submenu-plus').forEach(plusSign => {
                    plusSign.style.transform = 'rotate(0deg)';
                });
            }, time);
        }
    }

    function handleMenuClick(event) {
        if (!event.target.classList.contains('js-hb-menu')) return;

        event.preventDefault();

        if (menu) {
            menu.classList.contains('is-open') ? closeMenu() : openMenu();
        }

    }

    document.addEventListener('click', handleMenuClick);

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
}

// Initialize menu on first load
initMenu(document);