var modalController = {
	open: false,
	currentOpen: 'default',
	trigger: function(arg) {
		if(modalController.open) {
			if(arg != modalController.currentOpen) {
				$(".modal-window").animateCSS('bounceOutDown', function() {
					$.when($(this).remove()).then(modalController.create(arg));
				})
			} else {
				// $.when($(".sidebar").attr("class", "sidebar" )).then($(".sidebar").animateCSS('pulse'));
			}
		} else {
			modalController.create(arg);
		}
	},
	create: function(arg) {

		sidebarController.hide();
		addPhoneController.reset();

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
		})				

		$("body").append(modal);

	},
	hide: function() {
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
		if(mapController.markerByUser == null) {
			modalController.trigger("marker-warning");
		} else {
			sidebarController.trigger("form");
			mapController.fitMarker();
		}
	})


})