$(document).on("ready", function() {
	$('.fancybox-media').fancybox({
		height: "80%",
		openEffect  : 'none',
		closeEffect : 'none',
		helpers : {
			media : {}
		}
	});


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
		var winH = 820 * winW / 640;
		$(".top_section").css({
			"width" : winW,
			"height" : winH
		});
		//truncate();
        var evW = $(".events-section").width();
        $(".events-section").css({
            "height": evW * 413 / 614
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