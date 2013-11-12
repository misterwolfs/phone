var formController = {
	started: false,
	setLocation: false,
	repairChange: function() {
		$("body").delegate("#repairder", "change", function()
		{
		    if ($(this).is(":checked")) {
		        $("#repair-location").show();
		        formController.setLocation = true;
		    } else {
		    	$("#repair-location").hide();
		    	formController.setLocation = false;
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
						
				if(formController.setLocation)
				{	

					console.log('chanced to lat and long');
					$('#lat').val(mapController.markerByUser.position.lat());
					$('#long').val(mapController.markerByUser.position.lng());
					console.log('checkbox', $('#repairder'));
					$('input[name=repairder]').attr('checked', true);

					$('#message').text("Okay! We've got your location. Don't forget to save!").show();

				}	

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