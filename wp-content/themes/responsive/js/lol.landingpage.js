$(document).on("ready", function() {
	var mobileResize = function() {
		var winW = $(window).width();
		var winH = 1798 * winW / 640;
		$(".mobile").css({
			"width" : winW,
			"height" : winH
		});
	};
	$(window).on("resize", function() {
		var isMobileSize = !$(".mobile").is(":hidden");
		if(isMobileSize) {
			mobileResize();
		}
	});
	$(window).trigger("resize");

});