var searchController = {
	byBrand: function(brand) {
		//console.log('by brand new');

		//mapController.phoneList = new Array();

		searchController.getPhones(brand);

		
	},
	all: function() {
		searchController.getPhones('all');
	},
	getPhones: function(brand) {
		mapController.removeMarkers();

		$.get('search/brand/'+brand, 
			function(json)
			{	

				//console.log(json);

				for(objects in json)
				{
					branditem = json[objects];	

					//console.log(branditem);

					mapController.marker = new google.maps.Marker({
				      position: new google.maps.LatLng(branditem.lat, branditem.long),
				      map: mapController.gmap,
				      animation: google.maps.Animation.DROP,
				      icon: "/resources/img/icons/phones/" + branditem.brand + ".png",
				      info: branditem.description,
				      title: branditem.model + ' ' + branditem.brand + ' ' + branditem.description
				    });

				  //  console.log('marker', mapController.marker);

					 
					mapController.bounds.extend(mapController.marker.position);
					mapController.phoneList.push(mapController.marker);

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
	}
}

