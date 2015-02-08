bsted.currentScript = function() {
//page-specific code here
	var stage = (function () {
		var name = "stage";
		var $target = $("#" + name);
		var height = $target.innerHeight();
		var width = $target.innerWidth();

		var paper = Raphael(name, width, height);

		return {
			"name" : name,
			"target" : $target,
			"height" : height,
			"width" : width,
			"paper" : paper,
			"hRatio" : function (elementHeight){
				var base = this.height;
				var ratio = elementHeight / base;
				return ratio;
			},
			"resetID" : function(elementID){
				this.name = elementID;
				this.target = $("#" + elementID);
			},
			"resetSize" : function(){
				this.height = this.target.innerHeight();
				this.width = this.target.innerWidth();
			}
		}
	})();

	var bullseye = {
		"strokeWidth" : 10,
		"color" : "#00aeef",
		"radius" : (stage.width > stage.height) ? stage.width : stage.height,
		"draw" : function(){
			var x = Math.round(stage.width / 2);
			var y = Math.round(stage.height / 2);
			var r = this.radius;
					
			var mult = 10;

			var set = stage.paper.set();

			while (r > 0){
				set.push(
					stage.paper.circle(x, y, r).attr({
						"stroke-width" : this.strokeWidth + "px",
						"stroke-opacity" : 0.75,
						"stroke" : this.color
					})
				);
				r = (r - this.strokeWidth) - mult;
			}

			//force draw in webkit (ironically chrome is the problem child here)
			stage.paper.safari();

			return set;
		}
	}

	var hypnotize = {
		"state" : 1,
		"go" : function(obj1, obj2, speed) {
			var that = this;
			this.state = this.state * -1;

			obj1.animate({
				"translation" : this.state * (stage.width / 2) + ",0"
			},speed);

			obj2.animate({
				"translation" : this.state * -(stage.width / 2) + ",0"
			},speed, function (){
				if (bsted.currentPage.name === "hypno") {
					that.go(obj1, obj2, speed);
				} else {
					delete hypnotize
				}
			});
		}
	}
			
	var circleOne = bullseye.draw();
	bullseye.color = "#FF0000";
	var circleTwo = bullseye.draw();

	bsted.utils.setTimer(function(){
		hypnotize.go(circleOne, circleTwo, 3000);
	},1000);

	//assign click handler to stage
	$("#stage").click(function(){
		bsted.nav.home();
	});	
};