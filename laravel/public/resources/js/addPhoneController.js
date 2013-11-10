var addPhoneController = {
	started: false,
	currentStep: 1,
	initialize: function() {
		addPhoneController.started = true;
		
		// Display how to add a phone
		mapController.removeMarkers();
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
			addPhoneController.currentStep = 1;
			mapController.drawingManager.setDrawingMode(null);
			$("button#form").animateCSS('slideOutUp', function() {
				$(this).remove();
			});
		}
	},
	checkEmpty: function(arg) {
	    var empty = $("#"+arg).find("input").filter(function() {
	        return this.value === "";
	    });
	    if(empty.length) {
	        $("#notification").text("Make sure everything is filled in.")
	    } else {
	    	addPhoneController.nextStep();
	    	$("#notification").text("")
	    }
	},
	startForm: function() {
		$("#step2, #step3").hide();
	},
	nextStep: function() {
		if(addPhoneController.currentStep == 3) 
		{	
			$.post('addphone', $("#addPhone").serialize(), function() {
				modalController.trigger("phone-added");
				mapController.markerByUser.setMap(null);
			});
		} else 
		{
			addPhoneController.currentStep++;
			$(".step").hide();
			$("#step"+addPhoneController.currentStep).show();	
		}
	}
}