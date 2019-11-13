<section>
    <div id="map"></div>
</section>
<script>
    function initMap() {
        // Styles a map in night mode.
        var trivium = {
            lat: 29.7503441,
            lng: -95.4852004
        };

        var map = new

        google.maps.Map(document.getElementById('map'), {
            center: trivium,
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
            position: trivium,
            map: map,
            icon: ' ',
            title: 'Trivium Advisors'
        });
    }

</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBawvbiEZukKCRz186ZkbPBKjzZ96ua8iY&callback=initMap" async defer></script>


<?php global $pgfooterclass; ?>
</div><!-- #site-content -->

</div> <!-- #site-wrapper -->

<footer class="<?php echo $pgfooterclass ?>" id="site-footer">

    <div class="container">

        <?php if(is_active_sidebar('footer-left') || is_active_sidebar('footer-middle') || is_active_sidebar('footer-right')) { ?>

        <div class="row">
            <?php if(is_active_sidebar('footer-left')) {
						echo '<div class="col-12 col-sm-12 col-md-4">';
							dynamic_sidebar ('footer-left'); 
						echo '</div>';
						} ?>

            <?php if(is_active_sidebar('footer-middle')) {
						echo '<div class="col-12 col-sm-12 col-md-4">';
							dynamic_sidebar ('footer-middle'); 
						echo '</div>';
						} ?>

            <?php if(is_active_sidebar('footer-right')) {
						echo '<div class="col-12 col-sm-12 col-md-4">';
							dynamic_sidebar ('footer-right'); 
						echo '</div>';
						} ?>

        </div> <!-- row -->

        <?php } ?>

        <div class="row py-3 flex-row align-items-center small justify-content-between">

            <div class="col-12 col-sm-12 col-md-12 py-3">
                <?php echo '&copy; ' . date('Y') . ' ' .get_bloginfo('name') . ', All Rights Reserved.	'; ?>
            </div>

        </div>

    </div>

</footer><!-- #colophon -->

<script type="text/javascript">
    // ADA Compliance - External Links open dialog
    jQuery('a').filter(function() {
        return this.hostname && this.hostname !== location.hostname;
    }).click(function(e) {
        if (!confirm("You are about to proceed to an external website.")) {
            // if user clicks 'no' then dont proceed to link.
            e.preventDefault();
        };
    });

</script>

<?php wp_footer(); ?>

</body>

</html>
