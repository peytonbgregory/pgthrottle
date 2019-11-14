<section>
    <div id="map"></div>
</section>
<script>
    function initMap() {
        // Styles a map in night mode.
        var address = {
            lat: 29.7503441,
            lng: -95.4852004
        };

        var map = new

        google.maps.Map(document.getElementById('map'), {
            center: address,
            disableDefaultUI: true,
            zoom: 13,
            styles: [{
                    elementType: 'geometry',
                    stylers: [{
                        color: '#343a40'
                    }]
                },
                {
                    elementType: 'labels.text.stroke',
                    stylers: [{
                        color: '#343a40'
                    }]
                },
                {
                    elementType: 'labels.text.fill',
                    stylers: [{
                        color: '#6c757d'
                    }]
                },
                {
                    featureType: 'administrative.locality',
                    elementType: 'labels.text.fill',
                    stylers: [{
                        color: '#f8f9fa'
                    }]
                },
                {
                    featureType: 'poi',
                    elementType: 'labels.text.fill',
                    stylers: [{

                        visibility: 'off'
                    }]
                },
                {
                    featureType: 'poi.park',
                    elementType: 'geometry',
                    stylers: [{

                        visibility: 'off'
                    }]
                },
                {
                    featureType: 'poi.park',
                    elementType: 'labels.text.fill',
                    stylers: [{

                        visibility: 'off'
                    }]
                },
                {
                    featureType: 'road',
                    elementType: 'geometry',
                    stylers: [{
                        color: '#38414e'
                    }]
                },
                {
                    featureType: 'road',
                    elementType: 'geometry.stroke',
                    stylers: [{
                        color: '#212a37'
                    }]
                },
                {
                    featureType: 'road',
                    elementType: 'labels.text.fill',
                    stylers: [{
                        color: '#9ca5b3'
                    }]
                },
                {
                    featureType: 'road.highway',
                    elementType: 'geometry',
                    stylers: [{
                        color: '#6c757d'
                    }]
                },
                {
                    featureType: 'road.highway',
                    elementType: 'geometry.stroke',
                    stylers: [{
                        color: '#6c757d'
                    }]
                },
                {
                    featureType: 'road.highway',
                    elementType: 'labels.text.fill',
                    stylers: [{
                        color: '#6c757d'
                    }]
                },
                {
                    featureType: 'transit',
                    elementType: 'geometry',
                    stylers: [{

                        visibility: 'off'
                    }]
                },
                {
                    featureType: 'transit.station',
                    elementType: 'labels.text.fill',
                    stylers: [{

                        visibility: 'off'
                    }]
                },
                {
                    featureType: 'water',
                    elementType: 'geometry',
                    stylers: [{
                        color: '#17263c'
                    }]
                },
                {
                    featureType: 'water',
                    elementType: 'labels.text.fill',
                    stylers: [{
                        color: '#007bff'
                    }]
                },
                {
                    featureType: 'water',
                    elementType: 'labels.text.stroke',
                    stylers: [{
                        color: '#007bff'
                    }]
                }
            ]
        });
        var marker = new google.maps.Marker({
            position: address,
            map: map,
            icon: ' ',
            title: 'Trivium Advisors'
        });
    }

</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBawvbiEZukKCRz186ZkbPBKjzZ96ua8iY&callback=initMap" async defer></script>
