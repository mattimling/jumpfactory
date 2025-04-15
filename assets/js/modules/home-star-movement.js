function homeStarMovement(time) {
    const logo = document.querySelector('.js-home');
    const star = document.querySelector('.js-home-star');

    if (!logo || !star) return;

    let targetX = 0, targetY = 0;
    let currentX = 0, currentY = 0;
    let isAnimating = false;

    function cubicEasing(t) {
        return t * t * (3 - 2 * t);
    }

    function animate() {
        let progress = cubicEasing(0.2);
        currentX += (targetX - currentX) * progress;
        currentY += (targetY - currentY) * progress;

        star.style.transform = `translate(${currentX}px, ${currentY}px) translate(-50%, -50%)`;

        if (Math.abs(targetX - currentX) > 0.5 || Math.abs(targetY - currentY) > 0.5) {
            requestAnimationFrame(animate);
        } else {
            isAnimating = false;
        }
    }

    function applyHoverEffect() {
        if (window.innerWidth > 1024) {
            logo.addEventListener('mousemove', handleMouseMove);
            logo.addEventListener('mouseleave', handleMouseLeave);
        } else {
            logo.removeEventListener('mousemove', handleMouseMove);
            logo.removeEventListener('mouseleave', handleMouseLeave);
        }
    }

    function handleMouseMove(event) {
        const rect = logo.getBoundingClientRect();
        targetX = event.clientX - (rect.left + rect.width / 2);
        targetY = event.clientY - (rect.top + rect.height / 2);

        if (!isAnimating) {
            isAnimating = true;
            animate();
        }
    }

    function handleMouseLeave() {
        targetX = 0;
        targetY = 0;

        if (!isAnimating) {
            isAnimating = true;
            animate();
        }
    }

    applyHoverEffect();

    window.addEventListener('resize', applyHoverEffect);

    // Star movement
    const starHighlight = document.querySelector('.js-home-star .js-hero-star-static');

    if (starHighlight) {
        setTimeout(() => {
            anime({
                targets: starHighlight,
                rotate: [0, 135],
                easing: 'easeInOutCubic',
                duration: 800,
                complete: function () {
                    html.style.pointerEvents = 'auto';
                }
            });
        }, time);
    }
}

homeStarMovement(1000);

function setupStarHoverClass() {
    const home = document.querySelector('.js-home');
    const star = home?.querySelector('.js-home-star');
    if (!home || !star) return;

    const links = home.querySelectorAll('.js-home-hoverable');

    links.forEach(link => {
        link.addEventListener('mouseenter', () => {
            star.classList.add('is-hovered');
        });

        link.addEventListener('mouseleave', () => {
            star.classList.remove('is-hovered');
        });
    });
}

setupStarHoverClass();