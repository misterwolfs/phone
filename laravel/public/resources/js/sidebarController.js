var sidebarController = {
	open: false,
	currentOpen: 'default',
	trigger: function(arg) {
		if(sidebarController.open) {
			if(arg != sidebarController.currentOpen) {

				$(".sidebar > *").hide();
				$(".sidebar").animateCSS('sidebarOut', function() {
					$.when($(this).remove()).then(sidebarController.create(arg));
				})
			} else {
				// $.when($(".sidebar").attr("class", "sidebar" )).then($(".sidebar").animateCSS('pulse'));
			}
		} else {
			sidebarController.create(arg);
		}
	},
	create: function(arg) {

		console.log('arg', arg);

		modalController.hide();
		addPhoneController.reset();
		formController.reset();
		
		var close = $("<div/>")
							.addClass("close-sidebar");

		var content = $("<div/>")
						.addClass("content");

		var sidebar = $("<div/>")
						.addClass("sidebar sidebarIn animated")
						.attr("id", arg)
						.append(close);

		$.get(arg, function(data){
			content.html(data);
		}).success(function() {
			if(arg=='form') {
				$('#lat').val(mapController.markerByUser.position.nb);
				$('#long').val(mapController.markerByUser.position.ob);
				addPhoneController.startForm();
			}
			sidebar.append(content);
			$("#main").append(sidebar);

			sidebarController.open = true;
			sidebarController.currentOpen = arg;
			
		})
	},
	hide: function() {
		if(sidebarController.open)
		{
			$(".sidebar > *").fadeOut();
			$(".sidebar").animateCSS('sidebarOut', function() {
					$(this).remove();
					sidebarController.open = false;
			})
		}
	},
	userInfo: function(user) {
		sidebarController.create('userform');
	}
}

