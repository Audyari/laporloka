<h5 style="margin-bottom: 16px">Location</h5>
<div id="map" style="height: 300px;"></div>

<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function () {

        var map = L.map('map').setView([{{ $lat }}, {{ $lng }}], 13);

        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; OpenStreetMap contributors'
        }).addTo(map);

        L.marker([{{ $lat }}, {{ $lng }}]).addTo(map)
            .bindPopup("{{ $address }}")
            .openPopup();
    });
</script>
