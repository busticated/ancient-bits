bsted.currentScript = function() {
	var stage = bsted.raph.setStage();
	var relHeight = stage.height / 863,
		relWidth = stage.width / 1920,
		relScale = (relHeight > relWidth) ? relWidth : relHeight, //set scale based on browser dimensions (choose the smaller dimension and use that scale)
		waterLine = stage.height * .35;
	var shipYard = function(objSpec) {
		var origin = stage.width * objSpec["origin"] || 0,
			displacement = objSpec["displacement"],
			direction = -1 * objSpec["direction"],
			instructions = objSpec["instructions"],
			name = objSpec["name"];
		var boat = {
			"name" : name,
			"instructions" : instructions,
			"direction" : direction,
			"speed" : null,
			"target" : null,
			"targetDetected" : false,
			"targetAlert" : null,
			"x" : null,
			"y" : null,
			"width" : null,
			"height" : null,
			"hull" : null,
			"sail" : null,
			"sonarOn" : true,
			"sonar" : null,
			"startDrag" : null,
			"doDrag" : null,
			"endDrag" : null
		};
		boat.hull = stage.paper.path(objSpec["path"]).scale(relScale, relScale);
		var sizePosition = boat.hull.getBBox();
		boat.height = sizePosition.height;
		boat.width = sizePosition.width;
		boat.x = sizePosition.x;
		boat.y = sizePosition.y;
		boat.hull.translate(-boat.x, -boat.y);
		boat.hull.attr({
			"title": boat.name + " - " + boat.instructions,
			"stroke": "none",
			"fill": "#000000",
			"fill-opacity" : 1,
			"translation" : origin + "," + (waterLine - (boat.height * displacement))
		});
		sizePosition = boat.hull.getBBox();
		boat.x = sizePosition.x;
		boat.y = sizePosition.y;
		stage.paper.safari();
		boat.sail = function(speed){
			boat.speed = stage.width * speed;
			that = this;
			function exhaust() {
				var chimneyOffset = (boat.direction > 0) ? 0 : -0.4,
					x = boat.x + (boat.width / (2.5 + chimneyOffset)),
					y = boat.y - (boat.height / 4.5),
					cloudPuffs = [
						"M437.22,13.705c-1.404,0-2.745,0.223-3.989,0.612c-1.18-4.347-4.341-7.465-8.065-7.465c-2.84,0-5.35,1.817-6.908,4.604 c-1.003-0.742-2.217-1.178-3.525-1.178c-3.44,0-6.229,2.998-6.229,6.696c0,0.003,0.001,0.006,0.001,0.009 c-4.784,0.813-8.41,4.68-8.41,9.336c0,5.246,4.602,9.5,10.277,9.5c2.357,0,4.521-0.741,6.255-1.973 c0.724,4.632,4.087,8.137,8.134,8.137c4.484,0,8.126-4.304,8.27-9.676c1.3,0.43,2.711,0.674,4.191,0.674 c6.33,0,11.462-4.315,11.462-9.638S443.55,13.705,437.22,13.705z",
						"M396.044,8.785c0-4.852-6.842-8.785-15.282-8.785c-5.554,0-10.401,1.708-13.076,4.256c-2.301-1.658-5.556-2.699-9.175-2.699 c-6.967,0-12.613,3.835-12.613,8.565c0,2.679,1.813,5.069,4.648,6.639c-2.603,1.186-4.338,3.276-4.338,5.664 c0,3.699,4.148,6.697,9.267,6.697c0.671,0,1.323-0.054,1.952-0.152c0,0.051-0.006,0.101-0.006,0.152c0,5.418,3.277,9.811,7.32,9.811 c4.042,0,7.318-4.393,7.318-9.811c0-0.158-0.012-0.312-0.018-0.469c1.105,0.299,2.287,0.469,3.521,0.469 c5.979,0,10.824-3.8,10.824-8.488c0-1.244-0.35-2.421-0.963-3.485C391.583,16.015,396.044,12.7,396.044,8.785z",
						"M332.348,18.531c0-4.301-5.603-7.788-12.514-7.788c-1.779,0-3.468,0.234-5.001,0.651c-1.672-3.126-4.361-5.165-7.402-5.165 c-1.229,0-2.397,0.337-3.469,0.937c-1.342-2.987-3.746-4.986-6.498-4.986c-4.215,0-7.631,4.671-7.631,10.434 c0,1.176,0.148,2.303,0.41,3.358c-4.192,1.208-7.264,5.064-7.264,9.646c0,5.548,4.498,10.045,10.045,10.045 c0.507,0,1-0.05,1.486-0.122c-0.001,0.041-0.006,0.081-0.006,0.122c0,4.903,3.834,8.877,8.564,8.877s8.566-3.974,8.566-8.877 c0-0.264-0.017-0.523-0.039-0.781c1.486,1.904,3.711,3.117,6.202,3.117c4.473,0,8.099-3.904,8.099-8.721 c0-1.324-0.282-2.573-0.771-3.697C329.388,24.339,332.348,21.653,332.348,18.531z",
						"M167.258,11.057c0-4.214-3.695-7.631-8.254-7.631c-3.439,0-6.385,1.946-7.625,4.71c-1.768-1.741-4.32-2.842-7.17-2.842 c-3.886,0-7.226,2.041-8.757,4.976c-0.922-0.196-1.903-0.304-2.925-0.304c-5.245,0-9.498,2.789-9.498,6.229 c0,3.441,4.253,6.23,9.498,6.23c0.18,0,0.354-0.011,0.532-0.018c-0.635,1.022-0.997,2.194-0.997,3.443 c0,3.956,3.625,7.163,8.098,7.163c3.393,0,6.294-1.847,7.499-4.465c1.256,1.605,2.943,2.597,4.805,2.597 c3.87,0,7.008-4.253,7.008-9.5c0-1.036-0.126-2.03-0.353-2.964C163.625,18.625,167.258,15.235,167.258,11.057z",
						"M102.162,7.475c-0.003,0-0.006,0-0.009,0c0.001-0.053,0.009-0.104,0.009-0.156c0-4.042-3.685-7.319-8.229-7.319 c-3.955,0-7.254,2.481-8.047,5.787c-1.113-0.313-2.317-0.492-3.58-0.492c-5.548,0-10.045,3.312-10.045,7.397 c0,1.268,0.434,2.46,1.197,3.503c-2.611,1.447-4.312,3.765-4.312,6.386c0,4.387,4.741,7.943,10.59,7.943 c2.671,0,5.104-0.748,6.966-1.971c1.56,1.425,3.517,2.281,5.648,2.281c4.585,0,8.374-3.93,9.065-9.064 c0.246,0.019,0.494,0.032,0.746,0.032c4.645,0,8.409-3.208,8.409-7.164C110.571,10.683,106.806,7.475,102.162,7.475z",
						"M46.097,10.278c-2.176,0-4.207,0.448-5.959,1.216c-0.563-4.065-3.101-7.134-6.149-7.134c-3.198,0-5.832,3.38-6.215,7.743 c-1.474-0.904-3.219-1.436-5.095-1.436c-4.032,0-7.47,2.423-8.858,5.84c-1.413-0.983-3.114-1.557-4.944-1.557 C3.974,14.95,0,19.064,0,24.139c0,3.669,2.083,6.827,5.087,8.3c-0.315,0.629-0.493,1.316-0.493,2.037c0,3,3.006,5.432,6.713,5.432 c2.723,0,5.062-1.313,6.114-3.199c1.416,0.424,3.005,0.668,4.693,0.668c3.745,0,7.028-1.176,8.911-2.943 c1.398,1.064,3.104,1.697,4.949,1.697c4.416,0,8.048-3.586,8.513-8.189c0.528,0.054,1.063,0.092,1.61,0.092 c6.537,0,11.836-3.975,11.836-8.877C57.933,14.252,52.634,10.278,46.097,10.278z"
					],
					smoke = stage.paper.path(cloudPuffs[Math.floor(Math.random()*6)]).scale(relScale, relScale);
				var sizePosition = smoke.getBBox();
				smoke.translate(-sizePosition.x, -sizePosition.y);
				smoke.attr({
					"stroke": "none",
					"fill": "#CCC",
					"fill-opacity" : 0.5,
					"translation" : x + "," + y,
					"scale" : (relScale * 0.8) + "," + (relScale * 0.8)
				}).animate({
					"translation" : (boat.direction * -40) + "," + -waterLine,
					"fill-opacity" : 0.0,
					"scale" : (relScale * 1.5) + "," + (relScale * 1.5)
				}, (1200 / relScale), function() {
					smoke.remove();
					delete smoke;
				});
				bsted.utils.setTimer(exhaust, 500);
			};
			function sailing() {
				var distance = (stage.width + (boat.width * 1.25));
				boat.direction = -boat.direction;
				that.hull.scale((boat.direction * relScale) , relScale).animate({
					"translation" : (boat.direction * distance) + ", 0"
				}, boat.speed, sailing).onAnimation(function() {
					if (bsted.currentPage.name != "ping") {
						that.hull.stop();
						sailing = null;
						delete sailing;
					}
					var sizePosition = boat.hull.getBBox();
					boat.x = sizePosition.x;
					boat.y = sizePosition.y;
				});
			};
			exhaust();
			sailing();
		};
		boat.sonar = function(target) {
			boat.target = boat.target || target;
			var sonarOffset = (boat.direction > 0) ? 0 : 0.3,
				x = boat.x + (boat.width / (1.89 + sonarOffset)),
				y = boat.y + (boat.height / 1.09),
				wave = stage.paper.circle(x, y, (2 * relScale)).scale(relScale, relScale).insertAfter(ocean.waves);
				wave.attr({
					"stroke": "#fff",
					"stroke-opacity" : 1,
					"stroke-width" : (8 * relScale),
					"fill" : "#fff",
					"fill-opacity" : 0.3
				}).animate({
					"scale" : "900, 900",
				}, (4000 / relScale), function() {
					wave.remove();
					delete wave;
				}).onAnimation(function() {
					var waveClear = {},
						sizePosition = wave.getBBox();
					wave.left = sizePosition.x;
					wave.right = sizePosition.x + sizePosition.width;
					wave.top = sizePosition.y;
					wave.bot = sizePosition.y + sizePosition.height;
					var waveClearOffset = (30 * relScale);
					waveClear.left = sizePosition.x + waveClearOffset;
					waveClear.right = sizePosition.x + (sizePosition.width - (waveClearOffset * 2));
					waveClear.top = sizePosition.y + waveClearOffset;
					waveClear.bot = sizePosition.y + (sizePosition.height - (waveClearOffset * 2));
					var targetOffset = (20 * relScale);
					boat.target.left = boat.target.x + (targetOffset * 4);
					boat.target.right = boat.target.x + (boat.target.width - (targetOffset * 8));
					boat.target.top = boat.target.y + (targetOffset * 1.7);
					boat.target.bot = boat.target.y + (boat.target.height - (targetOffset * 2));
					var collision = 0;
					if (wave.bot < boat.target.top) { return;}
					if (wave.top > boat.target.bot)  { return;}
					if (wave.right < boat.target.left) { return;}
					if (wave.left > boat.target.right) { return;}
					if (waveClear.bot < boat.target.top === false) { collision += 1;}
					if (waveClear.top > boat.target.bot === false) { collision += 1;}
					if (waveClear.right < boat.target.left === false) { collision += 1;}
					if (waveClear.left > boat.target.right === false) { collision += 1;}
					if (collision === 4) {
						return;
					} 
					if (boat.targetDetected === false) {
						boat.targetDetected = true;
						if (doesAudio) {
							audio2.volume = 0.3;
							if (!audio2.paused) {
								audio2.pause();
								audio2.currentTime = 0.0;
							}
							audio2.play();
						}
						boat.targetAlert = stage.paper.text(boat.target.x, boat.target.y, "( ( ping! ) )").attr({
							"font-family" : "",
							"font-size" : Math.round((32 * relScale)),
							"font-weigh" : "bold",
							"stroke" : "none",
							"fill" : "#FFFFFF",
							"rotation" : -45
						}).animate({
							"fill-opacity" : 0
						}, 2000, function() {
							boat.targetAlert.remove();
							boat.targetDetected = false;
						});
						var rawTime = new Date(),
							months = ["january", "february", "march", "april", "may", "june", "july", "august", "september", "october", "november", "december"]
							timeStamp = rawTime.getHours() + ":" + rawTime.getMinutes() + ":" + rawTime.getSeconds() + " - " + rawTime.getDate() + " " + months[rawTime.getMonth()] + " " + rawTime.getFullYear();
						$alertElement.children("p").children("#detectedDate").html(timeStamp);
						$alertElement.show();
					}
				});
		};
		boat.startDrag = function(destroyer) {
			this.ox = 0;
			this.oy = 0;
			this.attr({
				"opacity" : 0.8
			});
		};
		boat.doDrag = function(dx, dy) {
			this.translate(dx - this.ox, dy - this.oy);
			this.ox = dx;
			this.oy = dy;
		};
		boat.endDrag = function() {
			this.attr({"opacity" : 1});
			boat.x = this.getBBox().x;
			boat.y = this.getBBox().y;
		};
		$(boat.hull.node).attr({"id" : name});
		return boat;
	};
	var ocean = {
		"wave" : function wave(min, max) {
			var minVal = min || 10,
				maxVal = max || 15,
				newRandNum = minVal + (Math.random() * (maxVal - minVal));
			newRandNum = Math.round(newRandNum);
			return newRandNum;
		},
		"water" : function() {
			var path = "",
				wavePoints = 50,
				xInterval = stage.width / wavePoints,
				pathY = waterLine,
				pathStart = "M0, " + pathY + " ",
				pathEnd =  "L " + stage.width + " " + pathY + " L " + stage.width + " " + stage.height + " L " + (-stage.width) + " " + stage.height + " Z",
				curveX = null;
			curveX = this.wave();
			path = pathStart;
			for (var i = xInterval; i <= stage.width; i += xInterval) {
				path += "s";
				path += curveX - (curveX / 1.5) + "," + (-this.wave()) + ", ";
				path += xInterval + "," + 0 + " ";
			}
			path += pathEnd;
			return path;
		},
		"draw" : function(toBack) {
			var paper = stage.paper;
			ocean.waves = paper.path(ocean.water())
				.attr({
					"stroke": "none",
					"fill": "#7DA7D8",
					"fill-opacity" : 0.8
				});
			$(ocean.waves.node).attr({"id" : "water"});
			if (toBack) {
				ocean.waves.toBack();
			}
		},
		"animate" : function animate() {
			ocean.waves.animate({
				"path" : ocean.water()
			}, 150, "backIn", function(){
				ocean.animate();
			});
		},
		"waves" : null
	}
	var destroyer = shipYard({
		"name" : "USSBustication",
		"instructions" : "Click me to search for subs!",
		"origin" : -0.25,
		"displacement" : 0.7,
		"direction" : 1,
		"path" : "M335.001,57.205 l-8.812,12.96H294.99 l29.107-66.851 l-1.834-0.799 l-28.93,66.443 V3.401h-2 v64.905 L266.423,0.265 l-1.878,0.688 l25.34,69.211 h-31.172 l-0.93-24.403 l-20.476-2.792 l-0.93,11.167 h-15.306 l-9.435-37.878 h-24 l9.03,38.808 h-22.641 l-0.507,16.098 h-49.081l29.239-68.126 l-1.838-0.787 l-28.929,67.403 V3.133 h-2.001 v65.854 L96.003,0 l-1.882,0.68 l25.449,70.484 h-46.05 L67,61.859H0 l14.878,40.948 h27 l5.456,14.889 h167.563 c0.824,21.781,27.608,22.103,28.421,0 h163.363 l26.986-60.491 H335.001 z"
	});
	var sub = shipYard({
		"name" : "UBK8D",
		"instructions" : "Drag me to avoid detection!",
		"origin" : .6,
		"displacement" : -5,
		"direction" : -1,
		"path" : "M260.036,44.956h-70.519v-4.815h16.308v-3.493h-16.748v-2.644h-5.292v3.084h-3.964v3.088h3.964v4.78h-16.747V26.444H148.97 v-9.256h-5.292V0h-12.34v16.308h-14.983v22.92H86.823V28.92h-2.645v10.308h-5.728l-24.24-3.121v-6.543h4.408v-4.906H46.324v4.839 h4.359v6.156l-16.748-2.156H0l32.615,44.075l11.932-0.157c0.638,9.844,12.146,8.77,12.72-0.168l142.387-1.879l66.991-4.172h48.043 l1.614-2.386h5.98v2.157h2.032v-5.169h-2.032v1.846h-5.191l1.781-2.632h8.155l10.468,10.468h9.808V63.468h10.576v-12.34 L260.036,44.956z"
	});
	setTimeout(function() {
		destroyer.sail(12);
	}, 500);
	sub.hull.drag(sub.doDrag, sub.startDrag, sub.endDrag);
	ocean.draw();
	ocean.draw(true);
	if (bsted.utils.doesAudio()) {
		var audio = document.getElementsByTagName("audio"),
			audio2 = audio[1],
			doesAudio = true;
		audio = audio[0];
	}
	$("#" + destroyer.name).click(function() {
		if (doesAudio) {
			audio.volume = 0.3;
			if (!audio.paused) {
				audio.pause();
				audio.currentTime = 0.0;
			}
			audio.play();
		}
		destroyer.sonarOn = true;
		destroyer.sonar(sub);
	});
	$alertElement = $("#detectedAlert");
	$("#close").click(function(){
		$alertElement.hide();
	});
};