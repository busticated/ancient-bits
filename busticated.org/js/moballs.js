bsted.currentScript = function() {
	var ballsObj = (function(){
		bsted.raph.setStage();
		var target = bsted.raph.paper;
		return {
			"target" : target,
			"ids" : [],
			"count" : null,
			"color" : null,
			"size" : null,
			"posX" : null,
			"posY" : null,
			"assnColor" : function(){
				var shades = [
					"#FF0000",
					"#ffff00",
					"#00aeef",
					"#00a651",
					"#acacac",
					"#000000"
				];
				var num = Math.floor(Math.random()*shades.length);
				this.color = shades[num];
				return shades[num];
			},
			"assnShape" : function(){
				var width = this.target.width;
				var height = this.target.height;
				this.posX = Math.floor(Math.random()*width);
				this.posY = Math.floor(Math.random()*height);
				this.size = Math.floor(Math.random()*(height / 2) + 1);
			},
			"colorMode" : function(bool){
				if (bool) {
					var attributes = {
						"fill" : this.color,
						"stroke" : "none",
						"opacity" : 0.6
					};
					this.count = 30;
					return attributes;
				}
				else {
					var attributes = {
					"stroke" : "#000000",
					"stroke-width" : 1
					};
					this.count = 600;
					return attributes;
				}
			},
			"cleanUp" : function(){
				var oldBall = this.ids.pop();
				oldBall.animate({
					"scale" : ".01, .01"
				}, 1000, function (){
					oldBall.remove();
					}
				);
			
			},
			"draw" : function(mode){
				mode = this.colorMode(mode);
				if (this.ids.length < this.count){
					this.assnShape();
					this.assnColor();
					var color = this.color,
						x = this.posX,
						y = this.posY,
						radius = this.size,
						ball = this.target.circle(x, y, (radius / 100)).attr(mode);
					ball.animate({
						"scale" : "100, 100"
					}, 1000, "bounce");
					this.ids.unshift(ball);
				}
				else {
					this.cleanUp();
				}
			},
			"animate" : function(mode){
				var that = this;
				(function loopIt(){
					that.draw(mode);
					if (bsted.currentPage.name === "moballs") {
						bsted.utils.setTimer(loopIt, 200);
					} else {
						delete ballsObj;
					}
				})();
			}
		}
	})();
	ballsObj.animate(true);
};