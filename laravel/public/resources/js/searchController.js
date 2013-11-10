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

				console.log('json2', json);

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

						console.log('markers', mapController.phonelist);
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
	searchLocation: function() {
		
		sidebarController.hide();

		mapController.removeMarkers();
		
		$.get('search/brand/all', 
			function(json)
			{	

				console.log('json4', json);

				for(objects in json)
				{
					branditem = json[objects];	

					//console.log(branditem);

					mapController.marker = new google.maps.Marker({
				      position: new google.maps.LatLng(branditem.lat, branditem.long),
				      map: mapController.gmap,
				      animation: google.maps.Animation.DROP,
				      icon : "/resources/img/icons/phones/" + branditem.brand + ".png" ,
				      title : branditem.model + ' ' + branditem.brand + ' ' + branditem.description,
				      url : branditem.phoneID
				    });

				

					

					

					
					// 	mapController.bounds.extend(mapController.marker.position);
				
					 mapController.phoneList.push(mapController.marker);
					 mapController.markerClickedHandler('brand', mapController.marker);  

					 // console.log('logs', mapController.phoneList);

					// 	console.log('markers', mapController.phonelist);
					//console.log('phonelist', mapController.phoneList);
					// mapController.addMarkers(marker);
				}

				
			}, 
			'json'
		).success(function () {

				// mapController.gmap.fitBounds(mapController.bounds);
				// console.log('succes', mapController.phoneList);
				mapController.markerCluster = new MarkerClusterer(mapController.gmap, mapController.phoneList);

				// console.log(mapController.bounds);
				// console.log('full', mapController.bounds.isEmpty());
				// console.log(mapController.markerCluster);
		});   	
	
		
		var place = mapController.autocomplete.getPlace();

		console.log('place', place);
	    // if (!place.geometry) {
	    //   // Inform the user that the place was not found and return.
	    //   alert('not found');
	    // }

	   
	      mapController.gmap.setCenter(place.geometry.location);
	     
	     var zoom = 0;

	      if(place.types[0] == 'country')
	      {
				zoom = 6;
	      }
	      else if(place.types[0] == 'route')
	      {
				zoom = 17;
	      }
	      else if(place.types[0] == 'locality')
	      {
	      		zoom = 13;
	      }

	      mapController.gmap.setZoom(zoom); 
	 

	},
	allCafes: function() {
		// mapController.removeMarkers();
		searchController.getData('repaircafe', 'all');
	},
}

