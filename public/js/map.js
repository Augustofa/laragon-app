var map;

function initMap() {
    map = new google.maps.Map(document.getElementById("map"), {
        center: { lat: -20.2318, lng: -46.4458 },
        zoom: 8,
    });
}

function createMarker(place) {
    var marker = new google.maps.Marker({
        position: { lat: parseFloat(place.latitude), lng: parseFloat(place.longitude) },
        map: map
    });

    var request = {
        location: new google.maps.LatLng(parseFloat(place.latitude), parseFloat(place.longitude)),
        radius: 1000
    };

    const infowindow = new google.maps.InfoWindow();
    var service = new google.maps.places.PlacesService(map);

    service.nearbySearch(request, (results, status) => {
        if (status === google.maps.places.PlacesServiceStatus.OK) {
            const placeId = results[0].place_id;
        
            const requestDetails = {
                placeId: placeId,
                fields: ['name', 'formatted_address', 'opening_hours', 'geometry'] // Customize fields as needed
            };
        
            google.maps.event.addListener(marker, "click", function () {
                service.getDetails(requestDetails, (foundPlace, status) => {
                    if (status === google.maps.places.PlacesServiceStatus.OK && foundPlace) {
                        const content = `
                            <div>
                            <strong>${foundPlace.name}</strong><br>
                            ${foundPlace.formatted_address}<br>
                            Rating: ${foundPlace.rating || 'Not Available'} stars<br>
                            Website: ${foundPlace.website || 'Not Available'}
                            </div>`;

                        infowindow.setContent(content);
                        infowindow.open(map, this);

                        marker.setPosition({
                            lat: foundPlace.geometry.location.lat(),
                            lng: foundPlace.geometry.location.lng()
                        });
                    }
                });
            });
        }
    });
}

function addMarkerList() {
    const places = document.querySelectorAll(".coord");

    places.forEach((place) => {
        const latitude = parseFloat(place.dataset.lat);
        const longitude = parseFloat(place.dataset.lng);
        createMarker(latitude, longitude);
    });
}

function centerMap(latitude, longitude) {
    const center = new google.maps.LatLng(
        parseFloat(latitude),
        parseFloat(longitude)
    );
    map.setCenter(center);
}
