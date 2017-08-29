(function($){

	$(function(){

		// Tabs
		$("#wr-tabs").on("click", ".tab", function(){

			var tabs = $("#wr-tabs .tab"),
				cont = $("#wr-tabs .tab-cont");

			tabs.removeClass("active");
			cont.removeClass("active");

			$(this).addClass("active");
			cont.eq($(this).index()).addClass("active");

			return false;
		});
	});
})(jQuery);