function locationMap() {
    document.querySelectorAll(".js-location-group").forEach((group) => {
        const locationLinks = group.querySelectorAll(".js-location-link");
        const locationMaps = group.querySelectorAll(".js-location-map");

        // Hide all maps except the first one with a fade effect
        locationMaps.forEach((map, index) => {
            if (index === 0) {
                map.classList.add("is-active");
                map.style.opacity = "1";
                map.style.pointerEvents = "auto";
            } else {
                map.style.opacity = "0";
                map.style.pointerEvents = "none";
            }
        });

        locationLinks.forEach((link) => {
            link.addEventListener("click", function () {
                const selectedTitle = this.getAttribute("data-title");

                locationMaps.forEach((map) => {
                    if (map.getAttribute("data-title") === selectedTitle) {
                        map.classList.add("is-active");
                        map.style.opacity = "1";
                        map.style.pointerEvents = "auto";
                    } else {
                        map.classList.remove("is-active");
                        map.style.opacity = "0";
                        map.style.pointerEvents = "none";
                    }
                });
            });
        });
    });
}

// Initialize for all groups
locationMap();
