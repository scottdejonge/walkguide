/*
 * Require
 */

var $ = require('jquery');


/*
 * Variables
 */

var map;
var $map = $('[data-map]').get(0);
var mapOptions =  {
	zoom: 8,
	scrollwheel: false,
	center: {
		lat: -34.397,
		lng: 150.644
	}
};


/*
 * Initialise
 */

function initialise() {
	google.maps.event.addDomListener(window, 'load', initialiseMap);
}

/*
 * Initialise Map
 */

function initialiseMap() {
	map = new google.maps.Map($map, mapOptions);
}


/*
 * Module
 */

module.exports = {
	initialise: initialise
};