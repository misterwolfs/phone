var modalController = {
	open: false,
	currentOpen: 'default',
	trigger: function(arg) {
		console.log('trigger modal');
		if(modalController.open) {
			if(arg != modalController.currentOpen) {
				$(".modal-window").animateCSS('bounceOutDown', function() {
					$.when($(this).remove()).then(modalController.create(arg));
				})
			}
		} else {
			modalController.create(arg);
		}
	},
	create: function(arg) {
		console.log('create modal');

		sidebarController.hide();
		addPhoneController.reset();
		formController.reset();

		modalController.open = true;
		modalController.currentOpen = arg;

		var close = $("<div/>")
						.addClass("close-modal");

		var content = $("<div/>")
						.addClass("content");				

		var modal = $("<div/>")
						.addClass("modal-window bounceInDown animated")
						.attr("id", arg)
						.append(close)
						.append(content);

		$.get("embeds/modal/"+arg, function(data){
			$(".modal-window .content").html(data);
		}).success(function(){
			if(arg == 'search-location')
			{
				mapController.checkLocation('location-search');
			}
			if(arg == 'nearyou')
			{
				mapController.checkLocation('cafe');
			}
		})			

		$("body").append(modal);

	},
	hide: function() {
		console.log('hide modal');
		if(modalController.open)
		{
			$(".modal-window").animateCSS('bounceOutDown', function() {
					$(this).remove();
					modalController.open = false;
			})
		}
	}
}

$(function() {
	$("body").delegate("button#add-phone", "click", function() {
		modalController.hide();
		addPhoneController.placeMarker();
	})

	//Ready placed marker
	$("body").delegate("button#form", "click", function() {
		nextStep("form");
	})

	$("body").delegate("button#ready-repair-location", "click", function() {
		nextStep("user/info");
	})

	function nextStep(arg) {
		if(mapController.markerByUser == null) {
			modalController.trigger("marker-warning");
		} else {
			sidebarController.trigger(arg);
			mapController.zoom(mapController.markerByUser.position);
		}
	}


})