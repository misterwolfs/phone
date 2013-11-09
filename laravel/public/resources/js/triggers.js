$(function() {

	/** PRODUCTION**/
	// console.log = function(){};

    mapController.initialize();

    /** Prevent anchors **/
    $("body").delegate("a:not(.open-menu, .close-menu)", "click", function(e) {
    	e.preventDefault();
    	return false;
    })

    /** Modal **/
	$("body").delegate(".close-modal, .dismiss", "click", function() {
		modalController.hide();
	});

	/** Sidebar **/
	$("body").delegate(".close-sidebar", "click", function() {
		sidebarController.hide();
	});

	$("body").delegate("#zoom-phone", "click", function() {
		mapController.zoom(new google.maps.LatLng($("input[name=lat]").val(),$("input[name=long]").val()));
	});

	/** Navivation **/
	$(".open-sidebar").on("click", function(e) {

		var id = $(this).parent().attr("id");
		addPhoneController.reset();

		if(id == "addphone") {
			addPhoneController.initialize();
		} else {
			addPhoneController.reset();
			sidebarController.trigger(id);
		}

	   	masterController.mobileNavigation();

	});

	$(".view-all").on("click", function(e) {
		masterController.mobileNavigation();
		masterController.reset();
		searchController.all();
	})

	$("body").delegate(".brands li", "click", function() {
		brand = $(this).text();
		console.log('delegate brand', brand);
		searchController.byBrand(brand);

		sidebarController.hide();
	});

	$("body").delegate("a[href=#howitworks]", "click", function(e) {
		sidebarController.trigger("how-it-works");
	});


	/** Forms and submit buttons **/
	$("body").delegate(".check-step", "click", function(e) {
		e.preventDefault();
		addPhoneController.checkEmpty($(this).parent().attr("id"));
		return false;
	})

	$("body").delegate("#editUser", "submit", function(e) {
		e.preventDefault();
		$.post('user/edit', $(this).serialize(), function() {
			modalController.trigger("user-information-changed");
			mapController.markerByUser.setMap(null);
		});

		$formname = $('#firstname').val();

		$('#user-panel h2').text('Hi, ' + $formname);

		return false; 
	});

	/** Facebook login **/
	$('#login').on('click', function() {
		window.location.href = "http://rephone.dev/login/fb";
	});



})