document.addEventListener("DOMContentLoaded", function () {

    let map = null;
    let mapVisible = false;
    let markers = [];

    const locations = {
        tajmahal: { coords: [27.1751, 78.0421], name: "Taj Mahal" },
        ladakh: { coords: [34.1526, 77.5770], name: "Ladakh" },
        kerala: { coords: [10.8505, 76.2711], name: "Kerala" },
        goa: { coords: [15.2993, 74.1240], name: "Goa" }
    };

    function initMap() {
        if (!map) {
            map = L.map("map").setView([20.5937, 78.9629], 5);

            L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
                attribution: "© OpenStreetMap contributors"
            }).addTo(map);
        }
    }

    function showLocation(key) {
        if (!locations[key]) return;

        initMap();

        const location = locations[key];

        map.setView(location.coords, 8);

        const marker = L.marker(location.coords)
            .addTo(map)
            .bindPopup(location.name)
            .openPopup();

        markers.push(marker);
    }

    // Toggle Map
    const logo = document.getElementById("logo-link");

    logo.addEventListener("click", function (e) {
        e.preventDefault();

        const mapDiv = document.getElementById("map");

        if (!mapVisible) {
            mapDiv.style.display = "block";
            initMap();

            setTimeout(function () {
                map.invalidateSize();
            }, 200);

            mapVisible = true;
        } else {
            mapDiv.style.display = "none";
            mapVisible = false;
        }
    });

    // Card Click Events
    const cards = document.querySelectorAll(".destination-card");

    cards.forEach(function (card) {
        card.addEventListener("click", function () {
            const key = card.getAttribute("data-location");
            showLocation(key);
        });
    });

});