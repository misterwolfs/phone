var searchController = {
	brand: null,
	marker: null,
	brandItem: null,
	byBrand: function() {
		$("body").delegate(".brand", "click", function() {
			brand = $(this).text();
			//console.log('test', searchController.brand);

			sidebarController.hide();
			

			$.get('search/brand/' + brand, 
				function(json)
				{
					
					
					for(objects in json)
					{
						branditem = json[objects];
						console.log(branditem); 

						marker = new google.maps.Marker({
					      position: new google.maps.LatLng(branditem.lat, branditem.long),
					      map: mapController.gmap,
					      icon: "/resources/img/icons/phones/" + branditem.brand + "/5.png",
					      info: branditem.description
					    });

					     mapController.addMarkers(marker);
					}

				}, 
				'json'
			);

			

		   

		});
	},
}