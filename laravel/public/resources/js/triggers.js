$(function() {

	/** PRODUCTION**/
	console.log = function(){};

	$('#login').on('click', function() {
		window.location.href = mapController.base_url + "login/fb";
	});

	$("body").delegate(".new-window", "click", function(e) {
		e.preventDefault();
		var url = $(this).attr("id");
		window.open(url);
	});

    mapController.initialize();

    $(".parent, .brand, .view-profile").on('click', function() {
    	masterController.hideUserMarker();
    });

	$("body").delegate(".nav", "click", function() {
		masterController.mobileNavigation();
	});

	$("body").delegate("#hamburger a", "click", function() {
		masterController.reset();
	});

    /** Prevent anchors **/
    $("body").delegate("a:not(.open-menu, .close-menu)", "click", function(e) {
    	e.preventDefault();
    	return false;
    })

    /** Modal **/
	$("body").delegate(".close-modal, .dismiss", "click", function() {
		modalController.hide();
	});

	$('body').delegate(".phone-added", "click", function() {
		searchController.all();
	})

	$('body').delegate(".try-again-location", "click", function() {
		modalController.trigger('search-location');
	})

	$('body').delegate(".open-modal", "click", function() {
		modalController.trigger($(this).parent().attr("id"));
	})


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
		} 

		else {
			console.log('else', id);
			addPhoneController.reset();
			sidebarController.trigger(id);
		}
	});

	$(".view-all").on("click", function(e) {
		sidebarController.hide();
		searchController.all();
	})

	$(".repair-cafe-all").on("click", function(e) {
		sidebarController.hide();
		searchController.allCafes();
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

	$("body").delegate('#searchPhone', "submit", function(e) {
		e.preventDefault();
		searchController.getAdvancedSearch($(this));
	});

	$("body").delegate('#searchLocation, #searchLocationCafe', "submit", function(e) {
		e.preventDefault();
	});

	/** SOLD **/
	$('body').delegate('.sold', 'click', function() {
		$.post('phone/deletemyphone', function($data) {
			console.log('removed', $data);
			$('.phone' + $data).fadeOut('slow');

			
		});
	});

})