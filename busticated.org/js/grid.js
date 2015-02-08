bsted.currentScript = function() {
	var theX = 0;
	var theY = 0;
	function aniBg(e, x, y) {
		var oldX = x;
		var oldY = y;
		x = Math.floor(Math.random()*-193);
		x = 12 * Math.round(x / 12);
		y = Math.round(Math.floor(Math.random()*-193) / 12);
		y = 12 * Math.round(y / 12);
		var range = 48;
		if (oldX >= x - range && oldX <= x + range) {
			x = Math.abs(oldX) + range;
			x = -x;
		}
		if (oldY >= y - range && oldY <= y + range) {
			y = Math.abs(oldY) + range;
			y = -y;
		}
		theY = y;
		theX = x;
		e.css({
			"background-position" : x  + "px" + " " + y  + "px"
		});
	};
	$(".close").click(function(e) {
		e.preventDefault();
		var $bgImg = $("body");
		(function loopIt() {
			aniBg($bgImg, theX, theY);
			bsted.utils.setTimer(loopIt, 40);
		})();
		
		$("#warning").fadeOut("slow");
	});
};