var searchController = {
	byBrand: function(brand) {
		//console.log('by brand new');

		//mapController.phoneList = new Array();
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
				      icon: mapController.markerIcon,
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
	},
}




// var searchController = {
// 	brand: null,
// 	marker: null,
// 	markers: new Array(),
// 	brandItem: null,
// 	getPhones: function($id) {

// 		//mapController.markers = [];

// 		//clearMarkers();


// 		// mapController.removeMarkers();

// 		searchController.markers = [];
// 		console.log('before markers', searchController.markers);

// 		$.get('search/brand/'+$id, 
// 			function(json)
// 			{	
// 				console.log('test', $id, json);
// 				for(objects in json)
// 				{
// 					branditem = json[objects];	

// 					marker = new google.maps.Marker({
// 				      position: new google.maps.LatLng(branditem.lat, branditem.long),
// 				      map: mapController.gmap,
// 				      animation: google.maps.Animation.DROP,
// 				      icon: mapController.markerIcon,
// 				      info: branditem.description,
// 				      title: branditem.model + ' ' + branditem.brand + ' ' + branditem.description
// 				    });

// 					mapController.bounds = new google.maps.LatLngBounds();
// 					mapController.bounds.extend(marker.position);
					
// 					searchController.markers.push(marker);
// 				// mapController.addMarkers(marker);
// 				}
// 			}, 
// 			'json'
// 		).success(function() {
// 			console.log('markers', searchController.markers);
// 			mapController.gmap.fitBounds(mapController.bounds);
// 			mapController.markerCluster = new MarkerClusterer(mapController.gmap, searchController.markers);
		
// 			console.log('after markers', searchController.markers);
// 		});   
// 	},
// 	all: function() {
// 		console.log('all');
		
// 		searchController.getPhones('all');


// 	},
// 	byBrand: function(item) {
	
// 			console.log('item', item);

// 			clearMarkers();

			
// 			searchController.brand = item;
// 			//console.log('test', searchController.brand);

// 			sidebarController.hide();
			
// 			mapController.markerByUser = null;

// 			searchController.getPhones(searchController.brand);
		
// 	},
// }


// // Removes the markers from the map, but keeps them in the array.

// // Deletes all markers in the array by removing references to them.
// function deleteMarkers() {
//   clearMarkers();
  
// }