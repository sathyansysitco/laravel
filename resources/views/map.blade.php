<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Qatar Famous Places</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <style>
        #map {
            height: 600px;
            width: 65%;
            float: left;border-radius:10px;
        }
        #list {
            height: 600px;
            width: 35%;
            float: left;
            overflow-y: auto;
           
        }
        .place {
            display: flex;
            align-items: center;
            width: 97%;
            height: auto;
            overflow: hidden;
           margin-bottom:15px;
            cursor: pointer;  box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
  transition: all 0.3s cubic-bezier(.25,.8,.25,1);border-radius:6px;
        }
         .place h2{font-size:18px;}
        .place img {
            width: 50%;
            height: auto;
        }
        .place .info {
            margin-left: 10px;
        }
        .place p{font-size:14px;}
        #location {
            margin: 10px 0px;
            display: block;
            width: 33%;
            height: 50px;
            padding: 10px;
            border-radius: 10px;
        }
        .gm-style-iw-chr{    float: left;display: inline-flex;
    position: absolute;right: 0px;top: 0px;font-size: 13px;}
    </style>
</head>
<body>

<select id="location">
    <option value="all">All Locations</option>
    <option value="the-pearl">The Pearl-Qatar</option>
    <option value="katara">Katara Cultural Village</option>
    <option value="museum">Museum of Islamic Art</option>
    <option value="souq">Souq Waqif</option>
</select>

<div id="list"></div>
<div id="map"></div>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDRX2zvksd0lDvIny0Aip4KIoIpS6WbUDI&callback=initMap" async defer></script>

<script>
    const locations = {
        "the-pearl": [
            { name: "Pearl Restaurant", lat: 25.3605, lng: 51.5345, img: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTHkw5QSuu5g8nzauX0RP7U0cQs5M7lWOq5YQ&s", type: "restaurant", amenities: "WiFi, Outdoor Seating" },
            { name: "Pearl Mall", lat: 25.3610, lng: 51.5355, img: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTHkw5QSuu5g8nzauX0RP7U0cQs5M7lWOq5YQ&s", type: "mall", amenities: "Shopping, Parking" },
        ],
        "katara": [
            { name: "Katara Cafe", lat: 25.3665, lng: 51.5410, img: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTHkw5QSuu5g8nzauX0RP7U0cQs5M7lWOq5YQ&s", type: "cafe", amenities: "Coffee, Free WiFi" },
            { name: "Katara Market", lat: 25.3670, lng: 51.5405, img: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTHkw5QSuu5g8nzauX0RP7U0cQs5M7lWOq5YQ&s", type: "market", amenities: "Local Products" },
        ],
        "museum": [
            { name: "Museum Cafe", lat: 25.2918, lng: 51.5315, img: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTHkw5QSuu5g8nzauX0RP7U0cQs5M7lWOq5YQ&s", type: "cafe", amenities: "Coffee, Snacks" },
        ],
        "souq": [
            { name: "Souq Waqif Restaurant", lat: 25.2878, lng: 51.5325, img: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTHkw5QSuu5g8nzauX0RP7U0cQs5M7lWOq5YQ&s", type: "restaurant", amenities: "Traditional Food" },
            { name: "Souq Waqif Mall", lat: 25.2880, lng: 51.5315, img: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTHkw5QSuu5g8nzauX0RP7U0cQs5M7lWOq5YQ&s", type: "mall", amenities: "Shopping, Dining" },
        ],
    };

    const markerIcons = {
        restaurant: '<i class="fa fa-utensils"></i>',
        cafe: '<i class="fa fa-coffee"></i>',
        mall: '<i class="fa fa-shopping-bag"></i>',
        market: '<i class="fa fa-store"></i>',
    };

    const markerColors = {
        restaurant: "#FF5722", 
        cafe: "#3F51B5",       
        mall: "#4CAF50",       
        market: "#FF9800",     
    };

    let markers = [];
    let map;

   function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
            center: { lat: 25.276987, lng: 51.520008 },
            zoom: 10,
            styles: [ // Light-themed map style
                {
                    "elementType": "geometry",
                    "stylers": [{ "color": "#ffffff" }]
                },
                {
                    "elementType": "labels.icon",
                    "stylers": [{ "visibility": "off" }]
                },
                {
                    "elementType": "labels.text.fill",
                    "stylers": [{ "color": "#000000" }]
                },
                {
                    "elementType": "labels.text.stroke",
                    "stylers": [{ "color": "#ffffff" }]
                },
                {
                    "featureType": "administrative.land_parcel",
                    "elementType": "labels.text.fill",
                    "stylers": [{ "color": "#000000" }]
                },
                {
                    "featureType": "landscape",
                    "elementType": "geometry",
                    "stylers": [{ "color": "#f0f0f0" }]
                },
                {
                    "featureType": "poi",
                    "elementType": "geometry",
                    "stylers": [{ "color": "#f0f0f0" }]
                },
                {
                    "featureType": "road",
                    "elementType": "geometry",
                    "stylers": [{ "color": "#ffffff" }]
                },
                {
                    "featureType": "water",
                    "elementType": "geometry",
                    "stylers": [{ "color": "#e0e0e0" }]
                }
            ]
        });

        const locationSelect = document.getElementById('location');
        locationSelect.addEventListener('change', () => filterPlaces(locationSelect.value));

        // Initialize with all places
        filterPlaces('all');
    }

    function addPlaceToList(place, marker) {
        const listItem = document.createElement('div');
        listItem.className = 'place';
        listItem.innerHTML = `
            <img src="${place.img}" alt="${place.name} thumbnail">
            <div class="info">
            <p><i class="fa fa-map-marker-alt"></i> : Doha - ${place.amenities}</p>
                <h2>${place.name}</h2>
                
            </div>`;
        
        // Scroll to the item and show bubble on click
        listItem.onclick = () => {
            map.setCenter(marker.getPosition());
            map.setZoom(15);
            showInfoBubble(place, marker);
        };
        
        document.getElementById('list').appendChild(listItem);

        // Add marker click event
        marker.addListener('click', () => {
            listItem.scrollIntoView({ behavior: 'smooth', block: 'center' });
            showInfoBubble(place, marker);
        });
    }

    function showInfoBubble(place, marker) {
        const contentString = `
            <div>
                <h2>${place.name}</h2>
                <p>Amenities: ${place.amenities}</p>
            </div>`;
        const infoWindow = new google.maps.InfoWindow({
            content: contentString,
        });
        infoWindow.open(map, marker);
    }

    function getMarkerIcon(iconHtml, color) {
        return `
            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50">
                <text x="50%" y="50%" dominant-baseline="middle" text-anchor="middle" font-family="Font Awesome 5 Free" font-size="16" fill="white">
                    ${encodeURIComponent(iconHtml)}
                </text>
                <circle cx="25" cy="25" r="20" fill="${color}" />
            </svg>`;
    }

    function filterPlaces(locationKey) {
        // Clear previous markers and list
        markers.forEach(({ marker }) => marker.setMap(null));
        markers = [];
        document.getElementById('list').innerHTML = '';

        const placesToShow = locationKey === 'all' ? Object.values(locations).flat() : locations[locationKey] || [];

        placesToShow.forEach(place => {
            const iconSvg = encodeURIComponent(getMarkerIcon(markerIcons[place.type], markerColors[place.type]));

            const marker = new google.maps.Marker({
                position: { lat: place.lat, lng: place.lng },
                map: map,
                title: place.name,
                icon: {
                    url: `data:image/svg+xml;charset=UTF-8,${iconSvg}`,
                },
            });
            markers.push({ place, marker });
            addPlaceToList(place, marker);
        });
    }
</script>

</body>
</html>
