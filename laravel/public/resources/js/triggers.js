$(function() {

    mapController.initialize();

	$("ul.subnav li a, .view-profile a").on("click", function() {
		var id = $(this).parent().attr("id");
		addPhoneController.reset();

		if(id == "addphone") {
			addPhoneController.initialize();
		} else {
			addPhoneController.reset();
			sidebarController.trigger(id);
		}

	});

	$("body").delegate("a[href=#howitworks]", "click", function() {
		sidebarController.trigger("how-it-works");
	});

	$("body").delegate(".close-sidebar", "click", function() {
		sidebarController.hide();
	});

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

	$('#login').on('click', function() {
		window.location.href = "http://rephone.dev/login/fb";
	});

	$("body").delegate(".close-modal", "click", function() {
		modalController.hide($(this).parent());
	});

	$("body").delegate(".dismiss", "click", function() {
		modalController.hide($(this).parent());
	});

	$("body").delegate(".brands li", "click", function() {
		brand = $(this).text();
		console.log('delegate brand', brand);
		searchController.byBrand(brand);

		sidebarController.hide();
	});

})