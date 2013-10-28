$(function() {

    mapController.initialize();

    var beachMarker = new google.maps.Marker({
      position: new google.maps.LatLng(mapController.antwerpLat, mapController.antwerpLng),
      map: mapController.gmap,
      icon: mapController.markerIcon,
      info: "test"
    });

    mapController.addMarkers(beachMarker);

	$("ul.subnav li a, .view-profile a").on("click", function() {
		var id = $(this).parent().attr("id");
		addPhoneController.reset();

		if(id == "add-phone") {
			addPhoneController.initialize();
		} else {
			addPhoneController.reset();
			sidebarController.trigger(id);
		}

	});


	$("body").delegate(".close-sidebar", "click", function() {
		sidebarController.hide();
	});

	$("body").delegate("#addPhone", "submit", function(e) {
		e.preventDefault();
		$.post('addphone', $(this).serialize(), alert("HipHoi, toegevoegd!"));
		return false; 
	});

	$("body").delegate("#editUser", "submit", function(e) {
		console.log('test clicked');
		e.preventDefault();
		$.post('user/edit', $(this).serialize(), alert("HipHoi, geedit!"));
		return false; 
	});

	$('#login').on('click', function() {
		window.location.href = "http://rephone.dev/login/fb";
	});

	$("body").delegate(".close-modal", "click", function() {
		modalController.hide($(this).parent());
	});

})