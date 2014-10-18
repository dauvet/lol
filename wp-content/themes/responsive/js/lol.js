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

	$(".facebook-1 iframe").contents().find("body,div,span").css({
		"color" : "#5d6365 !important"
	});

});