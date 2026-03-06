<?php
/**
 * Plugin Name: Erica Yang Realtor – Neighborhood Leaflet Maps
 * Description: Enqueues Leaflet.js and injects color-coded map markers for
 *              neighborhood pages. Bypasses wpautop by using wp_add_inline_script.
 * Version: 1.0
 */

add_action( 'wp_enqueue_scripts', 'eryr_enqueue_leaflet_map' );

function eryr_enqueue_leaflet_map(): void {
	if ( ! is_page( 'cambridge-ma' ) ) {
		return;
	}

	wp_enqueue_style(
		'leaflet',
		'https://unpkg.com/leaflet@1.9.4/dist/leaflet.css',
		[],
		'1.9.4'
	);

	wp_enqueue_script(
		'leaflet',
		'https://unpkg.com/leaflet@1.9.4/dist/leaflet.js',
		[],
		'1.9.4',
		true // load in footer
	);

	wp_add_inline_script( 'leaflet', eryr_cambridge_map_js() );
}

function eryr_cambridge_map_js(): string {
	return <<<'JS'
(function() {
    var mapEl = document.getElementById('cambridge-map');
    if (!mapEl || typeof L === 'undefined') return;

    var map = L.map('cambridge-map', { scrollWheelZoom: false })
               .setView([42.3736, -71.1097], 13);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '\u00a9 <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
        maxZoom: 18
    }).addTo(map);

    function makeIcon(color) {
        var dot = document.createElement('div');
        dot.style.cssText = 'background:' + color + ';width:14px;height:14px;border-radius:50%;border:2px solid #fff;box-shadow:0 1px 4px rgba(0,0,0,.5);';
        return L.divIcon({ className: '', html: dot.outerHTML, iconSize: [14,14], iconAnchor: [7,7], popupAnchor: [0,-8] });
    }

    // Red Line stations
    [
        [42.3953, -71.1426, 'Alewife Station'],
        [42.3885, -71.1194, 'Porter Square Station'],
        [42.3736, -71.1190, 'Harvard Square Station'],
        [42.3652, -71.1037, 'Central Square Station'],
        [42.3624, -71.0862, 'Kendall / MIT Station'],
        [42.3608, -71.0683, 'Charles / MGH Station']
    ].forEach(function(s) {
        L.marker([s[0],s[1]], {icon: makeIcon('#e74c3c')}).addTo(map)
         .bindPopup('<strong>\ud83d\udd34 Red Line</strong><br>' + s[2]);
    });

    // Parks & Recreation
    [
        [42.3875, -71.1491, 'Fresh Pond Reservation'],
        [42.3649, -71.0969, 'Charles River Esplanade'],
        [42.3711, -71.1199, 'John F. Kennedy Memorial Park'],
        [42.3802, -71.1372, 'Cambridge Common']
    ].forEach(function(p) {
        L.marker([p[0],p[1]], {icon: makeIcon('#27ae60')}).addTo(map)
         .bindPopup('<strong>\ud83d\udfe2 Park / Recreation</strong><br>' + p[2]);
    });

    // Shopping & Dining
    [
        [42.3732, -71.1189, 'Harvard Square'],
        [42.3729, -71.1042, 'Inman Square'],
        [42.3656, -71.1040, 'Central Square'],
        [42.3626, -71.0852, 'Kendall Square / Innovation District'],
        [42.3838, -71.1197, 'Porter Square Shopping Center']
    ].forEach(function(d) {
        L.marker([d[0],d[1]], {icon: makeIcon('#2980b9')}).addTo(map)
         .bindPopup('<strong>\ud83d\udd35 Shopping & Dining</strong><br>' + d[2]);
    });

    // Schools & Universities
    [
        [42.3770, -71.1167, 'Harvard University'],
        [42.3601, -71.0942, 'MIT'],
        [42.3772, -71.1094, 'Cambridge Rindge & Latin School'],
        [42.3714, -71.1188, 'Buckingham Browne & Nichols (BB&N)'],
        [42.3746, -71.1113, 'Shady Hill School']
    ].forEach(function(u) {
        L.marker([u[0],u[1]], {icon: makeIcon('#e6b800')}).addTo(map)
         .bindPopup('<strong>\ud83d\udfe1 School / University</strong><br>' + u[2]);
    });
})();
JS;
}
