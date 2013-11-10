var searchController = {
	byBrand: function(brand) {
		console.log('by brand new');
		searchController.getData('brand', brand);		
	},
	all: function() {
		searchController.getData('brand', 'all');
	},
	getData: function($type, $item) {
		// console.log('getphones');

		mapController.removeMarkers();

		$.get('search/' + $type + '/'+ $item, 
			function(json)
			{	

				console.log('json', json);

				for(objects in json)
				{
					branditem = json[objects];	

					//console.log(branditem);

					if ($type == 'brand')
					{	
						mapController.marker = new google.maps.Marker({
					      position: new google.maps.LatLng(branditem.lat, branditem.long),
					      map: mapController.gmap,
					      animation: google.maps.Animation.DROP,
					      icon : "/resources/img/icons/phones/" + branditem.brand + ".png" ,
					      title : branditem.model + ' ' + branditem.brand + ' ' + branditem.description,
					      url : branditem.phoneID
					    });

					}

					if ($type == 'repaircafe')
					{
						mapController.marker = new google.maps.Marker({
					      position: new google.maps.LatLng(branditem.lat, branditem.long),
					      map: mapController.gmap,
					      animation: google.maps.Animation.DROP,
					      url : branditem.cafeID
					    });
					};

					

					 
					mapController.bounds.extend(mapController.marker.position);
					mapController.phoneList.push(mapController.marker);
					mapController.markerClickedHandler($type, mapController.marker);  

					//console.log('phonelist', mapController.phoneList);
				// mapController.addMarkers(marker);
				}

				
			}, 
			'json'
		).success(function () {
				mapController.gmap.fitBounds(mapController.bounds);
				console.log('succes', mapController.phoneList);
				mapController.markerCluster = new MarkerClusterer(mapController.gmap, mapController.phoneList);

				console.log(mapController.bounds);
				console.log('full', mapController.bounds.isEmpty());
				console.log(mapController.markerCluster);
		});   
	},
	getAdvancedSearch: function($form) {
		console.log('getAdvancedSearch');


		$.post('search/advanced/get', $form.serialize(), 
			function($data) {
				
				sidebarController.hide();

				mapController.removeMarkers();

				for(objects in $data)
				{

					branditem = $data[objects];	

					console.log(branditem);

					mapController.marker = new google.maps.Marker({
				      position: new google.maps.LatLng(branditem.lat, branditem.long),
				      map: mapController.gmap,
				      animation: google.maps.Animation.DROP,
				      icon: "/resources/img/icons/phones/" + branditem.brand + ".png",
				      info: branditem.description,
				      title: branditem.model + ' ' + branditem.brand + ' ' + branditem.description,
				      url : branditem.phoneID
				    });

				 			 
					mapController.bounds.extend(mapController.marker.position);
					mapController.phoneList.push(mapController.marker);
					mapController.markerClickedHandler(mapController.marker);  

					//console.log('phonelist', mapController.phoneList);
				// mapController.addMarkers(marker);
				}
			}, 
			'json'
		).success(function () {
				mapController.gmap.fitBounds(mapController.bounds);
				console.log('succes', mapController.phoneList);
				mapController.markerCluster = new MarkerClusterer(mapController.gmap, mapController.phoneList);

				console.log(mapController.bounds);
				console.log('full', mapController.bounds.isEmpty());
				console.log(mapController.markerCluster);
		});

		
	},
	searchLocation: function($form) {
		 var location = $form.find('#location').val();

		

		$.get('http://maps.googleapis.com/maps/api/geocode/json?address='+location+'&sensor=true', function(location) {
				console.log(location);

				sidebarController.hide();

				if(location.status == 'OK')
				{
					var location_lat = location.results[0].geometry.location.lat;
					var location_long = location.results[0].geometry.location.lng;

					var location = new google.maps.LatLng(location_lat, location_long);

					mapController.gmap.setZoom(13);
					mapController.gmap.setCenter(location);
    				


				}
				else {
					alert('Deze locatie werd niet gevonden');
				}
		}, 'json');
	},
	allCafes: function() {
		searchController.getData('repaircafe', 'all');
	},
}

