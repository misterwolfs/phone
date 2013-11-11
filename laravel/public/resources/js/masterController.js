var masterController = {
	reset: function() {
		modalController.hide();
		sidebarController.hide();
	},
	mobileNavigation: function() {
	    var hash = location.hash.replace('#','');

	    if(hash != ''){
	        // Clear the hash in the URL
	        location.hash = '';
	    }
	},
	hideUserMarker: function() {
		if(mapController.markerByUser != null) {
			mapController.markerByUser.setMap(null);
		    mapController.drawingManager.setDrawingMode(null);
		   	mapController.removeMarkers(); 
		}
	}
}