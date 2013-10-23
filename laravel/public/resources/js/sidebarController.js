var sidebarController = {
	open: false,
	currentOpen: 'default',
	create: function(arg) {

		sidebarController.open = true;
		sidebarController.currentOpen = arg;
		var content;

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
			//}
		})

		

	},
	hide: function() {
		$(".sidebar > *").fadeOut();
		$(".sidebar").animateCSS('sidebarOut', function() {
				$(this).remove();
				sidebarController.open = false;
		})
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

$("ul.subnav li a, .view-profile a").on("click", function() {
	var id = $(this).parent().attr("id");
	if(sidebarController.open) {
		if(id != sidebarController.currentOpen) {
			$(".sidebar > *").hide();
			$(".sidebar").animateCSS('sidebarOut', function() {
				$.when($(this).remove()).then(sidebarController.create(id));
			})
		} else {
			$.when($(".sidebar").attr("class", "sidebar" )).then($(".sidebar").animateCSS('pulse'));
		}
	} else {
		sidebarController.create(id);
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

