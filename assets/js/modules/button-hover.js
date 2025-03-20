function buttonHover() {

    const buttons = document.querySelectorAll('.button-big-inner');

    buttons.forEach(button => {
        button.addEventListener('mouseenter', function (e) {
            const parentOffset = button.getBoundingClientRect();
            const relX = e.clientX - parentOffset.left;
            const relY = e.clientY - parentOffset.top;
            const circle = button.previousElementSibling;
            circle.style.left = `${relX}px`;
            circle.style.top = `${relY}px`;
            circle.classList.remove('big-button-desplode');
            circle.classList.add('big-button-explode');
        });
    });

    buttons.forEach(button => {
        button.addEventListener('mouseleave', function (e) {
            const parentOffset = button.getBoundingClientRect();
            const relX = e.clientX - parentOffset.left;
            const relY = e.clientY - parentOffset.top;
            const circle = button.previousElementSibling;
            circle.style.left = `${relX}px`;
            circle.style.top = `${relY}px`;
            circle.classList.remove('big-button-explode');
            circle.classList.add('big-button-desplode');
        });
    });

}

buttonHover();