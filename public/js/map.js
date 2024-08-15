var map

function initMap() {
    map = new google.maps.Map(document.getElementById('map'), {
        center: { lat: -20.231800, lng: -46.445800 },
        zoom: 8
    });

}

function createMarker(latitude, longitude){
    var marker = new google.maps.Marker({
        position: { lat: parseFloat(latitude), lng: (longitude) },
        title: "Teste"
    });
    
    marker.setMap(map);
}

function addMarkerList(){
    const places = document.querySelectorAll('.coord');

    places.forEach(place => {
        const latitude = parseFloat(place.dataset.lat);
        const longitude = parseFloat(place.dataset.lng);
        createMarker(latitude, longitude);
    });
}

function centerMap(latitude, longitude){
    const center = new google.maps.LatLng(parseFloat(latitude), parseFloat(longitude));
    map.setCenter(center);
}
