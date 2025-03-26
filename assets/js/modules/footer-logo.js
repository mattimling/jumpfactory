function footerLogo() {
    const logo = document.querySelector('.js-footer-logo');
    const star = document.querySelector('.js-footer-star-highlight');

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

        star.style.transform = `translate(${currentX}px, ${currentY}px)`;

        if (Math.abs(targetX - currentX) > 0.5 || Math.abs(targetY - currentY) > 0.5) {
            requestAnimationFrame(animate);
        } else {
            isAnimating = false;
        }
    }

    // Function to apply hover effect based on screen width
    function applyHoverEffect() {
        if (window.innerWidth > 1024) {
            // Mousemove effect
            logo.addEventListener('mousemove', handleMouseMove);
            logo.addEventListener('mouseleave', handleMouseLeave);
        } else {
            // Remove event listeners if window width is smaller than 1024px
            logo.removeEventListener('mousemove', handleMouseMove);
            logo.removeEventListener('mouseleave', handleMouseLeave);
        }
    }

    // Mousemove event handler
    function handleMouseMove(event) {
        const rect = logo.getBoundingClientRect();
        targetX = event.clientX - rect.left - rect.width / 2;
        // targetY = event.clientY - rect.top - rect.height / 2;

        if (!isAnimating) {
            isAnimating = true;
            animate();
        }
    }

    // Mouseleave event handler
    function handleMouseLeave() {
        targetX = 0;
        targetY = 0;

        if (!isAnimating) {
            isAnimating = true;
            animate();
        }
    }

    // Initial hover effect application
    applyHoverEffect();

    // Add resize event listener to check when the window is resized
    window.addEventListener('resize', applyHoverEffect);
}

footerLogo();
