var searchController = {
	brand: null,
	marker: null,
	brandItem: null,
	getPhones: function($id) {

		//mapController.markers = [];

		mapController.removeMarkers();

		console.log('before markers', mapController.markers);

		$.get('search/brand/'+$id, 
			function(json)
			{	
				console.log('test', $id, json);
				for(objects in json)
				{
					branditem = json[objects];
					

					marker = new google.maps.Marker({
				      position: new google.maps.LatLng(branditem.lat, branditem.long),
				      map: mapController.gmap,
				      animation: google.maps.Animation.DROP,
				      icon: mapController.markerIcon,
				      info: branditem.description
				    });

					mapController.bounds.extend(marker.position);
					
					mapController.markers.push(marker);
				// mapController.addMarkers(marker);
				}
			}, 
			'json'
		).success(function() {
			//console.log('markers', mapController.markers);
			mapController.gmap.fitBounds(mapController.bounds);
			mapController.markerCluster = new MarkerClusterer(mapController.gmap, mapController.markers);
		
			console.log('after markers', mapController.markers);
		});   
	},
	all: function() {
		console.log('all');
		
		searchController.getPhones('all');


	},
	byBrand: function() {
	
		$(".brands li").on("click", function() {
			console.log($(this));
			
			searchController.brand = $(this).text();
			//console.log('test', searchController.brand);

			sidebarController.hide();
			
			mapController.markerByUser = null;

			searchController.getPhones(searchController.brand);
		});
	},
}