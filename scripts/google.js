var latLng = new google.maps.LatLng(19.42523, -99.14645);

var sw = new google.maps.LatLng(19.0486327883719, -99.3648434381694);
var ne = new google.maps.LatLng(19.5926458801042, -98.939375606691);

var latlngbound = new google.maps.LatLngBounds(sw,ne);
var mapOptions = {
    center: latLng,
    zoom: 17,
    draggable:true,
    mapTypeId: google.maps.MapTypeId.ROADMAP
}

var divgle = document.getElementById('googlemap');

var map_google  = new google.maps.Map(divgle, mapOptions);

map_google.fitBounds(latlngbound);
input = document.getElementById('txtDireccion');
var autocomplete = new google.maps.places.Autocomplete(input,{
	strictBounds:true
});

autocomplete.setBounds(latlngbound);
autocomplete.bounds = latlngbound
autocomplete.setComponentRestrictions({
	country: 'MX'
});

//autocomplete.bindTo('bounds', map_google);

//let map = this.map;

autocomplete.addListener('place_changed', function() {
	var place = autocomplete.getPlace();

	   var lendireccion = place.address_components.length;

	   if (!place.geometry) {
			return;
		}

		// If the place has a geometry, then present it on a map.


		var ptPoint = L.latLng(place.geometry.location.lat(),place.geometry.location.lng());
		objMap._map.setView(ptPoint, 16);


		var latlon = {
			coords:{
				latitude:place.geometry.location.lat(),
				longitude:place.geometry.location.lng()
			}
		};
		coordsUbicacion(latlon);

		var address = '';
		if (place.address_components) {
			address = [
				(place.address_components[0] && place.address_components[0].short_name || ''),
				(place.address_components[1] && place.address_components[1].short_name || ''),
				(place.address_components[2] && place.address_components[2].short_name || '')
			].join(' ');
		}
		$("#txtDireccion").val('');
});
