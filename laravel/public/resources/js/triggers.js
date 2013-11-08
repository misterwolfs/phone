$(function() {

    mapController.initialize();

    /** Modal **/
	$("body").delegate(".close-modal, .dismiss", "click", function() {
		modalController.hide($(this).parent());
	});

	/** Sidebar **/
	$("body").delegate(".close-sidebar", "click", function() {
		sidebarController.hide();
	});

	/** Navivation **/
	$(".open-sidebar").on("click", function() {
		var id = $(this).parent().attr("id");
		addPhoneController.reset();

		if(id == "addphone") {
			addPhoneController.initialize();
		} else {
			addPhoneController.reset();
			sidebarController.trigger(id);
		}
	});

	$(".view-all").on("click", function() {
		sidebarController.hide();
		modalController.hide();
		searchController.all();
	})

	$("body").delegate(".brands li", "click", function() {
		brand = $(this).text();
		console.log('delegate brand', brand);
		searchController.byBrand(brand);
		
		sidebarController.hide();
	});

	$("body").delegate("a[href=#howitworks]", "click", function() {
		sidebarController.trigger("how-it-works");
	});


	/** Forms and submit buttons **/
	$("body").delegate("#addPhone", "submit", function(e) {
		e.preventDefault();
		$.post('addphone', $(this).serialize(), function() {
			modalController.trigger("phone-added");
			mapController.markerByUser.setMap(null);
		});
		return false; 
	});

	$("body").delegate("#editUser", "submit", function(e) {
		e.preventDefault();
		$.post('user/edit', $(this).serialize(), function() {
			modalController.trigger("user-information-changed");
			mapController.markerByUser.setMap(null);
		});
		return false; 
	});

	/** Facebook login **/

	$('#login').on('click', function() {
		window.location.href = "http://rephone.dev/login/fb";
	});



})