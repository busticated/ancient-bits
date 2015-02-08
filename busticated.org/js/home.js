bsted.currentScript = function() {
	var pages = bsted.pages;
	var nav = "";
	jQuery.each(pages, function(index, value){
		if(value["num"] > 0 ) {
			nav += "<li style=\"background: url(" + value["thumbnail"] + ") no-repeat top left;\" ><a href=\"?p=" + value["name"] + "\" title=\"" + value["name"] + "\">" + value["num"] + ".</a></li>";
		}
	});
	$("#nav").html(nav);
	var homeAni = {
		"target" : null,
		"title" : null,
		"titleAsArray" : [],
		"guessText" : "abcdefhiklmnorstuvwxz1234567890.,!$&?",
		"hasViewed" : function(){
			if ($.cookies.get("viewedAni") === null){
				return false;
			}
			else {
				return true;
			}
		},
		"animation" : function (){
			var that = this;
			var wordsArray = this.titleAsArray;
			bsted.utils.setTimer(function(){
				var charNum = 9;
				var looping = true;
				(function loopIt(){
					if (!looping) {
						return;
					}
					var guess = Math.floor(Math.random() * that.guessText.length);
					var guessChar = that.guessText.substring(guess, (guess + 1));
					wordsArray[charNum] = "<span class=\"titleText\">" + guessChar + "</span>";
					if (guessChar === that.title.substring(charNum, (charNum + 1))) {
						wordsArray[charNum] = guessChar;
						that.target.html(wordsArray.join(""));
						bsted.utils.setTimer(loopIt, 900);
						return;
					}
					else {
						that.target.html(wordsArray.join(""));
						bsted.utils.setTimer(loopIt, 25);
					}
				})();
			}, 3000);
		},
		"intro" : function(){
			var charNum = 0;
			var wordsArray = [];
			var that = this;
			wordsArray.length = this.title.length;
			var looping = true;
			(function loopIt(){
				if (!looping) {
					return;
				}
				var guess = Math.floor(Math.random() * that.guessText.length);
				var guessChar = that.guessText.substring(guess, (guess + 1));
				wordsArray[charNum] = "<span class=\"titleText\">" + guessChar + "</span>";
				if (guessChar === that.title.substring(charNum, (charNum + 1))) {
					wordsArray[charNum] = guessChar;
					charNum++;
				}
				if (charNum === that.title.length) {
					looping = false;
					$("#nav").fadeIn(3000, function() {
					});
					that.titleAsArray = wordsArray;
					that.animation();
				}
				that.target.html(wordsArray.join(""));
				bsted.utils.setTimer(loopIt, 20);
			})();
			$.cookies.set("viewedAni","true")
		},
		"init" : function(){
			this.target = $("#title");
			if (this.hasViewed() === false){
				this.title = this.target.text();
				this.target.text("").show();
				this.intro();
			}
			else {
				this.target.show();
				this.title = this.target.text();
				this.titleAsArray = this.title.split("");
				$("#nav").show();
				this.animation();
			}
		}
	};
	homeAni.init();
};