$(document).on("ready", function() {
	// init events
	$(".news-with-tabs").each(function() {
		var _self = $(this);
		$(this).find(".tabs-section a:not(.see-more)").on("click", function() {
			var rel = $(this).attr("rel");
			_self.find(".tabs-section a").removeClass("active")
			_self.find(".content-section").hide();
			_self.find(".content-section[rel='"+ rel +"']").show();
			$(this).addClass("active");
			_self.find("a.see-more").attr("href", $(this).attr("see-more-link"))
		});
		$(this).find(".tabs-section a.active").trigger("click");
	});

	// init scroll bar
	$(".scrollbar-arrow").scrollbar({
		"onUpdate" : function() {
			//$(this.container).css({ "width" : "195px" });
			$(this.scrolly.scrollbar).css({ "height" : "195px" });
		}
	});

	// truncate
	function truncate() {
		$('.truncate').each(function() {
			var size = $(this).width();
			var moreText = '...';
			var title = $(this).text();
			if(title.length <= moreText.length) {
				$(this).html($(this).attr("title-text"));
			}

			$(this).truncate({
				width: size,
				token: moreText,
				side: 'right',
				multiline: false
			});
		});
	}
	truncate();
	$(window).on("resize", function() {
		truncate();
	});

});