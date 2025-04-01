function jumpZones() {
    const maps = document.querySelectorAll(".js-zone-map");
    const buttons = document.querySelectorAll(".js-zone-button");

    // Ensure the first map and button are active by default
    if (maps.length > 0 && buttons.length > 0) {
        maps[0].classList.add("is-active");
        buttons[0].classList.add("is-active");
    }

    document.addEventListener('click', function (event) {
        const self = event.target;

        if (self.classList.contains('js-zone-button')) {
            event.preventDefault();

            const zone = self.getAttribute('data-zone');
            const maps = document.querySelectorAll(".js-zone-map");
            const buttons = document.querySelectorAll(".js-zone-button");

            // Remove is-active class from all maps and buttons
            maps.forEach(map => map.classList.remove("is-active"));
            buttons.forEach(button => button.classList.remove("is-active"));

            // Add is-active class to the clicked button and the corresponding map
            const activeMap = document.querySelector(`.js-zone-map[data-zone="${zone}"]`);
            const activeButton = document.querySelector(`.js-zone-button[data-zone="${zone}"]`);

            if (activeMap) {
                activeMap.classList.add("is-active");
            }
            if (activeButton) {
                activeButton.classList.add("is-active");
            }
        }
    });
}

jumpZones();