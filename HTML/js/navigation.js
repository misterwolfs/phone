
$(".nav-parent li.parent a").on("click", function(e) {
	e.preventDefault();
	if($(this).parent().hasClass("active")) {
		$(".nav-parent li").removeClass("active");
	} else {
		$(".nav-parent li").removeClass("active");
		$(this).parent().addClass("active");
	}
});