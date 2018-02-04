<?php
/**
 * Template part for displaying Google Maps
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?>

<!-- Google Maps API -->
<script>
  function initMap() {
    var ft = {lat: 29.0387527, lng: -80.8975305};
    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 18,
      center: ft,
      zoomControl: true,
      mapTypeControl: false,
      streetViewControl: false,
      scrollwheel: false,
      styles: [{"featureType": "administrative.land_parcel", "elementType": "all", "stylers": [{"visibility": "off"} ] }, {"featureType": "poi", "elementType": "labels.text", "stylers": [{"visibility": "off"} ] }, {"featureType": "poi", "elementType": "labels.icon", "stylers": [{"visibility": "off"} ] } ]
    });

    var contentString = '<div id="map-content">'+
        '<div id="siteNotice">'+
        '</div>'+
        '<div id="bodyContent">'+
        '<div class="pull-left">'+
        '<img src="http://flaglertavern.com/wp-content/themes/flaglertavern/assets/images/logos/flagler-tavern-footer-logo.png" alt="Flagler Tavern" class="img-responsive">'+
        '</div>'+
        '<span class="map-title">Flagler Tavern</span>'+
        '<address>'+
        '<i aria-hidden="true" class="fa fa-map-marker fa-2"></i>&nbsp;&nbsp;&nbsp;414 Flagler Avenue<br />'+
        '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;New Smyrna Beach, FL 32169'+
        '</address>'+
        '<p><i aria-hidden="true" class="fa fa-phone fa-2"></i>&nbsp;&nbsp;&nbsp;&nbsp;(386) 402-8861<br />'+
        '<i aria-hidden="true" class="fa fa-clock-o fa-2"></i>&nbsp;&nbsp;&nbsp;Daily 11:30-2AM - SUN 10-2AM<br />'+
        '<i class="fa fa-envelope fa-2" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;<a href="mailto:info@flaglertavern.com">info@flaglertavern.com</a></p>'+
        '</div>'+
        '</div>';

    // Position center minus 100px
    map.panBy(0,-100);

    var infowindow = new google.maps.InfoWindow({
      content: contentString,
      maxWidth: 1000
    });

    var marker = new google.maps.Marker({
      position: ft,
      map: map,
      icon: {url: 'http://flaglertavern.com/wp-content/themes/flaglertavern/assets/images/logos/map-marker.png'},
      title: 'Flagler Tavern',
    });

    if ( window.innerWidth >= 767 ) {
        google.maps.event.addListenerOnce(map, 'idle', function() {
          infowindow.open(map, marker);
        });
    }
    marker.addListener('click', function() {
      infowindow.open(map, marker);
    });
  }
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB7--574xRXKipV_V5cGt6b_-slE1EWyqI&callback=initMap"></script>