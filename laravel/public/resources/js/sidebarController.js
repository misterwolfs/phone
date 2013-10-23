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

		$.get(arg, function(data){
			$(".content").html(data);
		})

		$("#main").append(sidebar);

	},
	hide: function() {
		$(".sidebar > *").fadeOut();
		$(".sidebar").animateCSS('sidebarOut', function() {
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
	sidebarController.hide();
});

$("body").delegate("#addPhone", "submit", function(e) {
	e.preventDefault();
	$.post('addphone', $(this).serialize(), alert("HipHoi, toegevoegd!"));
	return false; 
});

