$(document).on("ready", function() {
	// init events
	$(".news-with-tabs").each(function() {
		var _self = $(this);
		$(this).find(".tabs-section a").on("click", function() {
			var rel = $(this).attr("rel");
			_self.find(".tabs-section a").removeClass("active")
			_self.find(".content-section").hide();
			_self.find(".content-section[rel='"+ rel +"']").show();
			$(this).addClass("active");
		});
		$(this).find(".tabs-section a.active").trigger("click");
	});
});