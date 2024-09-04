var map;

function initMap() {
    map = new google.maps.Map(document.getElementById("map"), {
        center: { lat: 0, lng: 0 },
        zoom: 8,
    });
}

function createMarker(place) {
    console.log(place.latitude, place.longitude);
    var marker = new google.maps.Marker({
        position: {
            lat: parseFloat(place.latitude),
            lng: parseFloat(place.longitude),
        },
        map: map,
    });
    
    
    var request = {
        location: new google.maps.LatLng(
            parseFloat(place.latitude),
            parseFloat(place.longitude)
        ),
        radius: 1000,
    };
    
    const infowindow = new google.maps.InfoWindow();
    var service = new google.maps.places.PlacesService(map);
    
    service.nearbySearch(request, (results, status) => {
        if (status === google.maps.places.PlacesServiceStatus.OK) {
            const placeId = results[0].place_id;
            
            const requestDetails = {
                placeId: placeId,
                fields: [
                    "name",
                    "formatted_address",
                    "opening_hours",
                    "geometry",
                ], // Customize fields as needed
            };

            console.log(results);
            
            google.maps.event.addListener(marker, "click", function () {
                service.getDetails(requestDetails, (foundPlace, status) => {
                    if (
                        status === google.maps.places.PlacesServiceStatus.OK &&
                        foundPlace
                    ) {
                        const content = `
                            <div>
                            <strong>${foundPlace.name}</strong><br>
                            ${foundPlace.formatted_address}<br>
                            Rating: ${
                                foundPlace.rating || "Not Available"
                            } stars<br>
                            Website: ${foundPlace.website || "Not Available"}
                            </div>`;

                        infowindow.setContent(content);
                        infowindow.open(map, this);

                        marker.setPosition({
                            lat: foundPlace.geometry.location.lat(),
                            lng: foundPlace.geometry.location.lng(),
                        });
                    }
                });
            });
        }
    });

    centerMap(place.latitude, place.longitude);
}

function addMarkerList() {
    const places = document.querySelectorAll(".coord");

    places.forEach((place) => {
        const latitude = parseFloat(place.dataset.lat);
        const longitude = parseFloat(place.dataset.lng);

        place = {
            latitude: latitude,
            longitude: longitude,
        }
        createMarker(place);
    });
}

function centerMap(latitude, longitude) {
    const center = new google.maps.LatLng(
        parseFloat(latitude),
        parseFloat(longitude)
    );
    map.setCenter(center);
}

function centerMapOnUserPosition() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(
            function(position) {
                console.log("Pos:", position.coords.latitude, position.coords.longitude);
                centerMap(
                    position.coords.latitude,
                    position.coords.longitude,
                    { enableHighAccuracy: true, timeout:  
                        5000, maximumAge: 0 }
                );
            },
            errorCallback
        );
    } else {
        console.log("Geolocation is not supported by this browser.");
    }
}

function createDraggableMarker() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(
            successCallback,
            errorCallback
        );
    } else {
        console.log("Geolocation is not supported by this browser.");
    }
}

function successCallback(position) {
    const latitude = position.coords.latitude;
    const longitude = position.coords.longitude;

    var marker = new google.maps.Marker({
        position: {
            lat: parseFloat(place.latitude),
            lng: parseFloat(place.longitude),
        },
        map: map,
    });

    marker.addListener("dragend", function () {
        const lat = marker.getPosition().lat();
        const lng = marker.getPosition().lng();

        document.getElementById("latitude").value = lat;
        document.getElementById("longitude").value = lng;
    });
}

function errorCallback(error) {
    console.error("Error getting location:", error);
    centerMap(0,0);
    map.setZoom(1);
}
