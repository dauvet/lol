$(document).on("ready", function() {
	// init events
	$(".news-with-tabs").each(function() {
		var _self = $(this);
		$(this).find(".tabs-section .tabs-name").on("click", function() {
			var rel = $(this).attr("rel");
			_self.find(".tabs-section .tabs-name").removeClass("active")
			_self.find(".content-section").hide();
			_self.find(".content-section[rel='"+ rel +"']").show();
			$(this).addClass("active");
			_self.find("a.see-more").attr("href", $(this).attr("see-more-link"));
			truncate($(".content-section[rel='"+$(this).attr('rel')+"']"));
		});
		$(this).find(".tabs-section .tabs-name.active").trigger("click");
	});

	// init scroll bar
	$(".scrollbar-arrow").scrollbar({
		"onUpdate" : function() {
			//$(this.container).css({ "width" : "195px" });
			$(this.scrolly.scrollbar).css({ "height" : "195px" });
		}
	});

	// truncate
	function truncate(ele) {
		var e = null
		if(typeof ele !== "undefined") {
			e = ele.find('.truncate');
		} else {
			e = $('.truncate');
		}
		e.each(function() {
			var size = $(this).width();
			var moreText = '...';
			var title = $(this).text();
			if(title.length + moreText.length < $(this).attr('title-text').length) {
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

	$(".mobile ul.menu").after('<a href="#" id="pull">Menu</a>');

	$(function() {
		var pull 		= $('#pull');
		menu 		= $('nav ul');
		menuHeight	= menu.height();

		$(pull).on('click', function(e) {
			e.preventDefault();
			menu.slideToggle();
		});

		$(window).resize(function(){
			var w = $(window).width();
			if(w > 320 && menu.is(':hidden')) {
				menu.removeAttr('style');
			}
		});
	});

	jQuery(function($) {

		var _oldShow = $.fn.show;

		$.fn.show = function(speed, oldCallback) {
			return $(this).each(function() {
				var obj         = $(this),
					newCallback = function() {
						if ($.isFunction(oldCallback)) {
							oldCallback.apply(obj);
						}
						obj.trigger('afterShow');
					};

				// you can trigger a before show if you want
				obj.trigger('beforeShow');

				// now use the old function to show the element passing the new callback
				_oldShow.apply(obj, [speed, newCallback]);
			});
		}
	});

	jQuery(function($) {
		$('.wpcf7-response-output')
			.bind('beforeShow', function() {
				//alert('beforeShow');
				var _self = $(this);
				var to = setTimeout(function() {
					_self.fadeOut();
					clearTimeout(to);
				}, 3000);
			})
			.bind('afterShow', function() {
				//alert('afterShow');
			})
			.show(1000, function() {
				//alert('in show callback');
			})
			.show();
	});

    $(".fancybox-modal").fancybox({
        maxWidth	: 800,
        maxHeight	: 600,
        fitToView	: true,
        width		: '70%',
        height		: '70%',
        autoSize	: true,
        closeClick	: false,
        openEffect	: 'none',
        closeEffect	: 'none'
    });
});