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
	}
}