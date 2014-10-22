$(document).on("ready", function() {
	var truncate = function() {
		$('.truncate').each(function() {
			var size = $(this).width();
			var moreText = '...';
			var title = $(this).text();

			$(this).html($(this).attr("title-text"));

			$(this).truncate({
				width: size,
				token: moreText,
				side: 'right',
				multiline: false
			});
		});
	}

	var mobileResize = function() {
		var winW = $(window).width();
		var winH = 1798 * winW / 640;
		$(".mobile").css({
			"width" : winW,
			"height" : winH
		});
		truncate();
	};

	$(window).on("resize", function() {
		var isMobileSize = !$(".mobile").is(":hidden");
		if(isMobileSize) {
			mobileResize();
		}
	});
	$(window).trigger("resize");

});