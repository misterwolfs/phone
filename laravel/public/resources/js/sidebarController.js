var sidebarController = {
	open: false,
	currentOpen: 'default',
	trigger: function(arg) {
		console.log('oke');
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

		modalController.hide();
		addPhoneController.reset();
		
		sidebarController.open = true;
		sidebarController.currentOpen = arg;

		var close = $("<div/>")
						.addClass("close-sidebar");

		var content = $("<div/>")
						.addClass("content");

		var sidebar = $("<div/>")
						.addClass("sidebar sidebarIn animated")
						.attr("id", arg)
						.append(close)
						.append(content);

		$("#main").append(sidebar);

		$.get(arg, function(data){
			// console.log(arg, data);

			// if(arg == 'getuserinfo') 
			// {
			// 	console.log('userinfo');

			// 	sidebarController.userInfo(data);
				
			// }
			// else {
				$(".content").html(data);

				if(arg == 'brand')
				{
					searchController.byBrand();
				}
			//}
		}).success(function() {
			//console.log()
			$('#lat').val(mapController.markerByUser.position.nb);
			$('#long').val(mapController.markerByUser.position.ob);
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

		// var user_name = $('<div/>')
		// 				.text(user['firstname'] + " " + user['lastname'])
		// 				.addClass('user_name');

		// var user_photo = $('<img/>')
		// 				.attr('src', user['photo'])
		// 				.attr('alt', user['name'])
		// 				.addClass('user_photo');			

		// $(".content")
		// 	.append(user_name)
		// 	.append(user_photo);
	}
}

