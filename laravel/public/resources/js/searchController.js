var searchController = {
	location: false,
	byBrand: function(brand) {
		console.log('by brand new');
		searchController.getData('brand', brand);		
	},
	all: function() {
		searchController.getData('brand', 'all');
	},
	getData: function($type, $item) {
		// console.log('getphones');

	

		if($type == 'location-search')
		{
			$type = 'brand';
			searchController.location = true;
		}
		else if($type == 'location-cafe-search')
		{
			$type = 'repairder';
			searchController.location = true;
		}
		else {
			searchController.location = false;
		}

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

						var myIcon = new google.maps.MarkerImage(mapController.base_url + "resources/img/icons/phones/" + branditem.brand + ".png",  null, null, null, new google.maps.Size(42,79));

						console.log('icon', myIcon);

						mapController.marker = new google.maps.Marker({
					      position: new google.maps.LatLng(branditem.lat, branditem.long),
					      map: mapController.gmap,
					      animation: google.maps.Animation.DROP,
					      icon : myIcon,
					      title : branditem.model + ' ' + branditem.brand + ' ' + branditem.description,
					      url : branditem.phoneID
					    });

					}

					if ($type == 'repaircafe')
					{
					
						var myIcon = new google.maps.MarkerImage(mapController.base_url + "resources/img/icons/phones/repaircafe.png",  null, null, null, new google.maps.Size(42,79));

						console.log('icon', myIcon);

						mapController.marker = new google.maps.Marker({
					      position: new google.maps.LatLng(branditem.lat, branditem.long),
					      map: mapController.gmap,
					      animation: google.maps.Animation.DROP,
					      url : branditem.cafeID,
					      icon : myIcon
					    });
					};

					if ($type == 'repairder')
					{
						

						var myIcon = new google.maps.MarkerImage(mapController.base_url + "resources/img/icons/phones/repaircafe.png",  null, null, null, new google.maps.Size(42,79));

						console.log('icon', myIcon);
						mapController.marker = new google.maps.Marker({
					      position: new google.maps.LatLng(branditem.lat, branditem.long),
					      map: mapController.gmap,
					      animation: google.maps.Animation.DROP,
					      url : branditem.userID,
					      icon : myIcon
					    });
					};

					


					if(!searchController.location)
					{

						mapController.bounds.extend(mapController.marker.position);
					}
				
					mapController.phoneList.push(mapController.marker);
					mapController.markerClickedHandler($type, mapController.marker);  

						console.log('markers', mapController.phonelist);
					//console.log('phonelist', mapController.phoneList);
				// mapController.addMarkers(marker);
				}

				
			}, 
			'json'
		).success(function () {

				
				
				mapController.markerCluster = new MarkerClusterer(mapController.gmap, mapController.phoneList);

				

				if(!searchController.location)
				{
					
						mapController.gmap.fitBounds(mapController.bounds);
				}
				else {

					console.log('else succes location');
					var place = mapController.autocomplete.getPlace();

					console.log('place', place);
				    if (!place.geometry) {
				     	mapController.removeMarkers();
				     	modalController.trigger('location-not-found');
				    }

				   
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
				      else if(place.types[0] == 'locality' || place.types[0] == 'sublocality')
				      {
				      		zoom = 13;
				      }
				      else {
				      		zoom = 15;
				      }

				      mapController.gmap.setZoom(zoom); 

				      console.log('searchLocation', mapController.phoneList);
				}
		});   
	},
	getAdvancedSearch: function($form) {
		console.log('getAdvancedSearch');


		$.post('search/advanced/get', $form.serialize(), 
			function($data) {
				
				console.log('post data', $data);

				sidebarController.hide();

				mapController.removeMarkers();

				for(objects in $data)
				{

					branditem = $data[objects];	

					console.log('test', branditem);

					var myIcon = new google.maps.MarkerImage(mapController.base_url + "resources/img/icons/phones/" + branditem.brand + ".png",  null, null, null, new google.maps.Size(42,79));

					console.log('icon', myIcon);
					mapController.marker = new google.maps.Marker({
				      position: new google.maps.LatLng(branditem.lat, branditem.long),
				      map: mapController.gmap,
				      animation: google.maps.Animation.DROP,
				      icon: myIcon,
				      info: branditem.description,
				      title: branditem.model + ' ' + branditem.brand + ' ' + branditem.description,
				      url : branditem.phoneID
				    });

				 			 
					mapController.bounds.extend(mapController.marker.position);
					mapController.phoneList.push(mapController.marker);
					mapController.markerClickedHandler('brand', mapController.marker);  

					//console.log('phonelist', mapController.phoneList);
				// mapController.addMarkers(marker);
				}
			}, 
			'json'
		).success(function () {
			mapController.markerCluster = new MarkerClusterer(mapController.gmap, mapController.phoneList);

			
				mapController.gmap.fitBounds(mapController.bounds);
			

			
				// console.log('succes', mapController.phoneList);
				

				// console.log(mapController.bounds);
				// console.log('full', mapController.bounds.isEmpty());
				// console.log(mapController.markerCluster);
		});

		
	},
	searchLocation: function($arg) {
		
		console.log('searchlocation', $arg)
		modalController.hide();

		searchController.getData($arg, 'all');

	},
	allCafes: function() {

		// console.log('allCafes', mapController.phoneList);
		// mapController.removeMarkers();
		searchController.getData('repaircafe', 'all');
	},
}

