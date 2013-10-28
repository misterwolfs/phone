var addPhoneController = {
	started: false,
	initialize: function() {
		addPhoneController.started = true;
		// Display how to add a phone
		modalController.trigger("add-phone-info");
	},
	placeMarker: function() {
		//Let the user place a marker
		mapController.drawingManager.setDrawingMode(google.maps.drawing.OverlayType.MARKER);

		var button = $("<button/>")
						.attr("id", "form")
						.attr("class", "btn icon shadow round green ready absolute bounceInDown animated")
						.text("I'm ready !");

		$("#main").append(button);
	},
	reset: function() {
		if(addPhoneController.started) 
		{
			mapController.drawingManager.setDrawingMode(null);
			$("button#form").animateCSS('bounceOutDown', function() {
				$(this).remove();
			});
		}
	}
}