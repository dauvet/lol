$(document).on("ready", function() {

	if(!$(".mobile").is(":hidden")) {
		var mobileResize = function() {
			var winW = $(window).width();
			var winH = 1798 * winW / 640;
			$(".mobile").css({
				"width" : winW,
				"height" : winH
			});
		};
		$(window).on("resize", function() {
			mobileResize();
		});
		$(window).trigger("resize");
	}

});