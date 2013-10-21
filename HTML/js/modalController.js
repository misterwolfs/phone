var modalController = {
	open: false,
	currentOpen: 'default',
	create: function(arg) {

		modalController.open = true;
		modalController.currentOpen = arg;

		var close = $("<div/>")
						.addClass("close-modal");

		var modal = $("<div/>")
						.addClass("modal-window bounceInDown animated")
						.attr("id", arg)
						.append(close);	

		$("body").append(modal);

	},
	hide: function(arg) {
		arg.animateCSS('bounceOutDown', function() {
				$(this).remove();
				modalController.open = false;
		})
	}
}

$(".open-modal").on("click", function() {
	var id = $(this).attr("id");
	if(modalController.open) {
		if(id != modalController.currentOpen) {
			$(".modal-window").animateCSS('bounceOutDown', function() {
				$.when($(this).remove()).then(modalController.create(id));
			})
		} else {
			$.when($(".modal-window").attr("class", "modal-window" )).then($(".modal-window").animateCSS('shake'));
		}
	} else {
		modalController.create(id);
	}
});

$("body").delegate(".close-modal", "click", function() {
	modalController.hide($(this).parent());
});