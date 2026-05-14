(function ($) {
	var mcd = {
		init: function(){
			$("section").hide();
			$("a.tab").click(function(){
				$("a.tab").removeClass("selected");
				$(this).addClass("selected");
				$("section").hide();
				$("section"+$(this).attr("href")).show();
				return false;
			});
			$("a.tab:first").click();
		}
	}
	
	$(document).ready(function(){
		mcd.init();
	});
})(jQuery);