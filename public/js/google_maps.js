

function initMap() {
		var latitude = (document.getElementById('latitude').value);
		var longitude = (document.getElementById('longitude').value);

        var map = new google.maps.Map(document.getElementById('map'), {
          center: new google.maps.LatLng(latitude, longitude),
          zoom: 15,
		  mapTypeId: google.maps.MapTypeId.ROADMAP
        });

        var input = (document.getElementById('pac-input'));

        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

        var autocomplete = new google.maps.places.Autocomplete(input);

        autocomplete.bindTo('bounds', map);

        var infowindow = new google.maps.InfoWindow();
		
        var marker = new google.maps.Marker({
          map: map,
          anchorPoint: new google.maps.Point(0, -29),
		  position: new google.maps.LatLng(latitude, longitude),
			draggable: false
        });
		
        autocomplete.addListener('place_changed', function() {
          	infowindow.close();
          	var place = autocomplete.getPlace();
          	if (!place.geometry) {
            	// User entered the name of a Place that was not suggested and
            	// pressed the Enter key, or the Place Details request failed.
            	window.alert("No details available for input: '" + place.name + "'");
            	return;
          	}

          	// If the place has a geometry, then present it on a map.
          	if (place.geometry.viewport) {
            	map.fitBounds(place.geometry.viewport);
          	} else {
            	map.setCenter(place.geometry.location);
            	map.setZoom(17);  // Why 17? Because it looks good.
          	}

          	marker.setIcon(/** @type {google.maps.Icon} */({
	            url: place.icon,
	            size: new google.maps.Size(71, 71),
	            origin: new google.maps.Point(0, 0),
	            anchor: new google.maps.Point(17, 34),
	            scaledSize: new google.maps.Size(35, 35)
          	}));

          	marker.setPosition(place.geometry.location);
          	marker.setVisible(true);

          	var address = '';
          	if (place.address_components) {
	            address = [
	              (place.address_components[0] && place.address_components[0].short_name || ''),
	              (place.address_components[1] && place.address_components[1].short_name || ''),
	              (place.address_components[2] && place.address_components[2].short_name || ''),
				  (place.address_components[3] && place.address_components[3].short_name || ''),
				  (place.address_components[4] && place.address_components[4].short_name || ''),
				  (place.address_components[5] && place.address_components[5].short_name || ''),
				  (place.address_components[6] && place.address_components[6].short_name || ''),
				  (place.address_components[7] && place.address_components[7].short_name || '')
	            ].join(' ');
          	}
          	//alert("Current Lat: " + address);
	        infowindow.setContent('<div><strong>' + place.name + '</strong><br>' + address);
	        infowindow.open(map, marker);
			//alert("Current longitude: " + place.geometry.location.lat().toFixed(7));
			//alert("Current latitude: " + place.geometry.location.lng().toFixed(7));
			document.getElementById('latitude').value = place.geometry.location.lat().toFixed(7);
			document.getElementById('longitude').value = place.geometry.location.lng().toFixed(7);
			document.getElementById('address').value = address;

        });
		
		


        /*
		google.maps.event.addListener(marker, 'dragend', function(evt){
		    document.getElementById('longitude').value = 'Current Lat: ' + evt.latLng.lat().toFixed(7) + ' Current Lng: ' + evt.latLng.lng().toFixed(7);
		    document.getElementById('pac-input').value = address;
		});

		google.maps.event.addListener(marker, 'dragstart', function(evt){
		    document.getElementById('latitude').value = 'Currently dragging marker...';
		});
		*/

		map.setCenter(myMarker.position);
		myMarker.setMap(map);


}

