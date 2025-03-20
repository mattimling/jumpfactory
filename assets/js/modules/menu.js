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
                duration: '800',
            });
        }, time / 2.5);
    }
}

function closeMenu() {
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
            subMenu.style.maxHeight = "0px";
            subMenu.style.opacity = "0";
            subMenu.style.visibility = "hidden";
        });

        // Reset submenu toggle indicators
        document.querySelectorAll('.js-submenu-plus').forEach(plusSign => {
            plusSign.style.transform = "rotate(0deg)";
        });
    }, time);
}

function handleMenuClick(event) {
    if (!event.target.classList.contains('js-hb-menu')) return;

    event.preventDefault();
    menu.classList.contains('is-open') ? closeMenu() : openMenu();
}

// Cache elements and constants
const menu = document.querySelector('.js-menu');
const hbiOver = document.querySelector('.js-hbi-over');
const hbiUnder = document.querySelector('.js-hbi-under');
const menuOpen = document.querySelector('.js-hb-menu-open');
const menuClose = document.querySelector('.js-hb-menu-close');
const time = 700;

const opacityHidden = '!opacity-0';
const opacityVisible = '!opacity-100';
const transitionClasses = ['transition-all', 'duration-700'];

// Add event listener
document.addEventListener('click', handleMenuClick);

function openSubmenu() {
    document.addEventListener("click", (event) => {
        const self = event.target;

        // Check if clicked element is a top-level `<a>` inside `.menu-item-has-children`
        const menuItem = self.closest("li.menu-item-has-children");

        if (!menuItem || self.tagName !== "A" || self.closest(".sub-menu")) return;

        event.preventDefault(); // Prevent default link behavior

        const subMenu = menuItem.querySelector(".sub-menu");
        const plusSign = menuItem.querySelector(".js-submenu-plus");

        if (subMenu) {
            const isOpen = subMenu.style.maxHeight && subMenu.style.maxHeight !== "0px";

            if (isOpen) {
                // Close submenu
                subMenu.style.maxHeight = "0px";
                subMenu.style.opacity = "0";
                subMenu.style.visibility = "hidden";
                plusSign.style.transform = "rotate(0deg)";
            } else {
                // Open submenu
                subMenu.style.maxHeight = `${subMenu.scrollHeight}px`;
                subMenu.style.opacity = "1";
                subMenu.style.visibility = "visible";
                plusSign.style.transform = "rotate(135deg)"; // Rotate `+` to `X`
            }
        }
    });
}

openSubmenu();

function activeMenuItem() {

    document.addEventListener("click", (event) => {
        const self = event.target;
        const menu = self.closest('.js-main-menu');

        if (menu) {

            const menuItem = menu.querySelector('a');

            if (menuItem) {

                menu.querySelectorAll('a').forEach(item => {
                    item.classList.remove('is-active');
                });

                self.classList.toggle('is-active');

            };

        }

    });

}

activeMenuItem();