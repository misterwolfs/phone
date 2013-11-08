var formController = {
	started: false,
	repairChange: function() {
		$("body").delegate("#repairder", "change", function()
		{
		    if ($(this).is(":checked")) {
		        $("#repair-location").show();
		    } else {
		    	$("#repair-location").hide();
		    }
		})
	},
	setLocation: function(){
		formController.started = true;
		modalController.trigger("add-repair-info");
	},
	placeMarker: function() {
		//Let the user place a marker
		mapController.drawingManager.setDrawingMode(google.maps.drawing.OverlayType.MARKER);

		var button = $("<button/>")
						.attr("id", "ready-repair-location")
						.attr("class", "btn icon shadow round green ready absolute bounceInDown animated")
						.text("I'm ready !");

		$("#main").append(button);
	},
	reset: function() {
		if(formController.started) 
		{
			mapController.drawingManager.setDrawingMode(null);
			$("button#ready-repair-location").animateCSS('slideOutUp', function() {
				$(this).remove();
			});
		}
	}
}

$(function() {
	formController.repairChange();

	$("body").delegate("#repair-location", "click", formController.setLocation);

	$("body").delegate("button#add-repair-location", "click", function() {
		modalController.hide();
		formController.placeMarker();
	})


})