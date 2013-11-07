var searchController = {
	brand: null,
	marker: null,
	markers: [],
	brandItem: null,
	getPhones: function($id) {

		//mapController.markers = [];

		//clearMarkers();


		// mapController.removeMarkers();

		searchController.markers = [];
		console.log('before markers', searchController.markers);

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
				      info: branditem.description,
				      title: branditem.model + ' ' + branditem.brand + ' ' + branditem.description
				    });

					mapController.bounds.extend(marker.position);
					
					searchController.markers.push(marker);
				// mapController.addMarkers(marker);
				}
			}, 
			'json'
		).success(function() {
			console.log('markers', searchController.markers);
			mapController.gmap.fitBounds(mapController.bounds);
			mapController.markerCluster = new MarkerClusterer(mapController.gmap, searchController.markers);
		
			console.log('after markers', searchController.markers);
		});   
	},
	all: function() {
		console.log('all');
		
		searchController.getPhones('all');


	},
	byBrand: function() {
	
		$(".brands li").on("click", function() {

			clearMarkers();

			console.log($(this));
			
			searchController.brand = $(this).text();
			//console.log('test', searchController.brand);

			sidebarController.hide();
			
			//mapController.markerByUser = null;

			searchController.getPhones(searchController.brand);
		});
	},
}


// Sets the map on all markers in the array.
function setAllMap(map) {
 

}

// Removes the markers from the map, but keeps them in the array.
function clearMarkers() {
   for (var i = 0; i < searchController.markers.length; i++) {
  	console.log('remove');


    searchController.markers[i].setMap(null);
  }

  mapController.markerCluster = null;
  searchController.markers = [];
}

// Deletes all markers in the array by removing references to them.
function deleteMarkers() {
  clearMarkers();
  
}