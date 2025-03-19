function footerLogo() {
    const logo = document.querySelector('.js-footer-logo');
    const star = document.querySelector('.js-footer-star-highlight');

    if (!logo || !star) return;

    let targetX = 0, targetY = 0;
    let currentX = 0, currentY = 0;
    let isAnimating = false;

    // Cubic easing function for smoother transition
    function cubicEasing(t) {
        return t * t * (3 - 2 * t); // Smooth easing
    }

    function animate() {
        let progress = cubicEasing(0.2); // Easing progress factor
        currentX += (targetX - currentX) * progress;
        currentY += (targetY - currentY) * progress;

        star.style.transform = `translate(${currentX}px, ${currentY}px)`;

        // Continue the animation if it's still moving
        if (Math.abs(targetX - currentX) > 0.5 || Math.abs(targetY - currentY) > 0.5) {
            requestAnimationFrame(animate);
        } else {
            isAnimating = false;
        }
    }

    // Mousemove event to track mouse position relative to logo
    logo.addEventListener('mousemove', (event) => {
        const rect = logo.getBoundingClientRect();
        targetX = event.clientX - rect.left - rect.width / 2; // Calculate X position
        targetY = event.clientY - rect.top - rect.height / 2;  // Calculate Y position

        if (!isAnimating) {
            isAnimating = true;
            animate();
        }
    });

    // Mouseleave event to smoothly return to center
    logo.addEventListener('mouseleave', () => {
        // Apply easing to the center smoothly
        targetX = 0;
        targetY = 0;

        if (!isAnimating) {
            isAnimating = true;
            animate();
        }
    });
}

footerLogo();
