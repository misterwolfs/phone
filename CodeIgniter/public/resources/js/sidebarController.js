var sidebarController = {
	open: false,
	base_url : $('.hidden').text(),
	currentOpen: 'default',
	create: function(arg) {

		sidebarController.open = true;
		sidebarController.currentOpen = arg;

		var close = $("<div/>")
						.addClass("close-sidebar");

		var sidebar = $("<div/>")
						.addClass("sidebar sidebarIn animated")
						.attr("id", arg)
						.load( base_url + 'public/resources/embeds/' + arg + '.html');	

		$("#main").append(sidebar);

	},
	hide: function(arg) {
		$(".sidebar > *").hide();
		arg.animateCSS('sidebarOut', function() {
				$(this).remove();
				sidebarController.open = false;
		})
	}
}

$("ul.subnav li, .view-profile").on("click", function() {
	var id = $(this).attr('id');
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
	sidebarController.hide($(this).parent());
});