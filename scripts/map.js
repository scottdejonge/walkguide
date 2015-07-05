/*
 * Require
 */

var $ = require('jquery');


/*
 * Variables
 */

var map;
var $map = $('[data-map]');
var mapStyles = [{"featureType":"water","elementType":"all","stylers":[{"hue":"#7fc8ed"},{"saturation":55},{"lightness":-6},{"visibility":"on"}]},{"featureType":"water","elementType":"labels","stylers":[{"hue":"#7fc8ed"},{"saturation":55},{"lightness":-6},{"visibility":"off"}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"hue":"#83cead"},{"saturation":1},{"lightness":-15},{"visibility":"on"}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"hue":"#f3f4f4"},{"saturation":-84},{"lightness":59},{"visibility":"on"}]},{"featureType":"landscape","elementType":"labels","stylers":[{"hue":"#ffffff"},{"saturation":-100},{"lightness":100},{"visibility":"off"}]},{"featureType":"road","elementType":"geometry","stylers":[{"hue":"#ffffff"},{"saturation":-100},{"lightness":100},{"visibility":"on"}]},{"featureType":"road","elementType":"labels","stylers":[{"hue":"#bbbbbb"},{"saturation":-100},{"lightness":26},{"visibility":"on"}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"hue":"#ffcc00"},{"saturation":100},{"lightness":-35},{"visibility":"simplified"}]},{"featureType":"road.highway","elementType":"geometry","stylers":[{"hue":"#ffcc00"},{"saturation":100},{"lightness":-22},{"visibility":"on"}]},{"featureType":"poi.school","elementType":"all","stylers":[{"hue":"#d7e4e4"},{"saturation":-60},{"lightness":23},{"visibility":"on"}]}];
var mapOptions =  {
	zoom: 8,
	styles: mapStyles,
	scrollwheel: false
};



/*
 * Initialise
 */

function initialise() {
	if (!window.google || !window.google.maps || ($map.length == 0)) {
		return;
	}
	google.maps.event.addDomListener(window, 'load', initialiseMap);
}

/*
 * Initialise Map
 */

function initialiseMap() {
	var walkId = $map.data('walk-id');
	console.log(walkId);

	// Create Map
	map = new google.maps.Map($map.get(0), mapOptions);

	var polylineLayer = new google.maps.KmlLayer({
		url: 'http://walkguide.staging.bigfish.tv/walks/' + walkId + '/kml'
	});
	console.log(polylineLayer);
	polylineLayer.setMap(map);
}


/*
 * Module
 */

module.exports = {
	initialise: initialise
};