var sidebarController = {
	open: false,
	currentOpen: 'default',
	create: function(arg) {

		sidebarController.open = true;
		sidebarController.currentOpen = arg;
		var content;

		var close = $("<div/>")
						.addClass("close-sidebar");

		var sidebar = $("<div/>")
						.addClass("sidebar sidebarIn animated")
						.attr("id", arg)
						.append(close);

		$.get(arg, function(data){
			$(".sidebar").html(data);
		})

		$("#main").append(sidebar);

	},
	hide: function(arg) {
		$(".sidebar > *").fadeOut();
		arg.animateCSS('sidebarOut', function() {
				$(this).remove();
				sidebarController.open = false;
		})
	}
}

$("ul.subnav li a, .view-profile").on("click", function() {
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
	sidebarController.hide($(this).parent());
});

$("body").delegate("#addPhone", "submit", function(e) {
	e.preventDefault();
	$.post('addphone', $(this).serialize(), alert("HipHoi, toegevoegd!"));
	return false; 
});

