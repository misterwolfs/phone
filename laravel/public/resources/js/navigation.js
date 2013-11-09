$(".toggle-menu").on("click", function(e) {
	if(!$(this).hasClass("no-toggle"))
	{
		e.preventDefault();
	}
	if($(this).parent().hasClass("active")) {
		$(".nav-parent li").removeClass("active");
	} else {
		masterController.reset();
		$(".nav-parent li").removeClass("active");
		$(this).parent().addClass("active");
	}
});