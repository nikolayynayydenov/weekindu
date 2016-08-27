$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

// BEGIN google maps api config

var map;
var markers = [];

function initMap() {
    var haightAshbury = {lat: 42.6977, lng: 23.3219};

    map = new google.maps.Map(document.getElementById('google-map'), {
        zoom: 12,
        center: haightAshbury,
        mapTypeId: 'terrain'
    });

    // This event listener will call addMarker() when the map is clicked.
    map.addListener('click', function(event) {
        deleteMarkers();
        addMarker(event.latLng);
        // put location in form as a hidden field:
        let coordsField = $('#create-event-form [name=location_coordinates]');
        if (coordsField.length != 0) {
            // it exists
            coordsField.attr('value', event.latLng);
        } else {
            // it doesn't exists so create it:

            $('#create-event-form').append($('<input>')
                .attr('type', 'hidden')
                .attr('name', 'location_coordinates')
                .attr('value', event.latLng));
        }

    });

    // Adds a marker at the center of the map.
    // addMarker(haightAshbury);
}

// Adds a marker to the map and push to the array.
function addMarker(location) {
    var marker = new google.maps.Marker({
        position: location,
        map: map
    });
    markers.push(marker);
}

// Sets the map on all markers in the array.
function setMapOnAll(map) {
    for (var i = 0; i < markers.length; i++) {
        markers[i].setMap(map);
    }
}

// Removes the markers from the map, but keeps them in the array.
function clearMarkers() {
    setMapOnAll(null);
}

// Shows any markers currently in the array.
function showMarkers() {
    setMapOnAll(map);
}

// Deletes all markers in the array by removing references to them.
function deleteMarkers() {
    clearMarkers();
    markers = [];
}

$('#create-event-map-checkbox').change(function() {
    let isChecked = $(this).is(':checked');
    let googleMap = $('#google-map');

    if (isChecked) {
        initMap();
        googleMap.show();
    } else {
        googleMap.hide();
    }
});


// END google maps api config