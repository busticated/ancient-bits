var bsted = (function () {
	var urlKey = "p";
	var devMode = window.location.hostname === "localhost" ? true : false;
	if (!devMode) {
		window._gaq = window._gaq || [];
		window._gaq.push(["_setAccount", "UA-17332084-1"]);
		window._gaq.push(["_setDomainName", ".busticated.org"]);
	}
	return {
		"pages" : null,
		"currentPage" : {},
		"currentScript" : {},
		"currentTimers" : [],
		"urlKey" : urlKey,
		"devMode" : devMode,
		"parseURL" : function(name, url) {
			name = name.replace(/[\[]/,"\\\[").replace(/[\]]/,"\\\]");
			var regexS = "[\\?&]" + name + "=([^&#]*)";
			var regex = new RegExp(regexS);
			var target = url || window.location.href;
			var results = regex.exec(target);
			if (results === null) {
				return null;
			}
			else {
				return results[1];
			}
		},
		"setPage" : function(key, goto){
			key = key || this.urlKey;
			var page = goto || this.parseURL(key) || this.parseURL("page") || "home";
			if (this.pages[page] === undefined) {
				page = "404"
			};
			this.currentPage = this.pages[page];
			var requireScripts = [
				"libs/jquery.cookies.2.2.0.min.js",
				"libs/jquery.Sexy.min.js",
				"libs/raphael-min.js"
			]
			if (!this.devMode) {
				requireScripts.unshift(this.ga.src);
			}
			var that = this;
			require(requireScripts, function() {
				that.loadPage();
			});
		},
		"load" : function() {
			$("#global").load("views/global.htm", function() {
				bsted.setPage();
			});
		},
		"loadPage" : function(){
			$("#page").html("");
			$("#pageStyle").remove();
			$("#pageScript").remove();
			$.getScript("js/" + this.currentPage.name + ".js", function() {
				$(this).attr("id", "pageScript");
			});
			Sexy
				.css("css/" + bsted.currentPage.name + ".css", function (data) {
					$(data).attr("id", "pageStyle");
				})
				.html("views/" + bsted.currentPage.name + ".htm", function (data) {
					$("#page").html(data);
					document.title = "busticated.org - " + bsted.currentPage.name; 
					if (bsted.currentPage.description.length > 0) {	
						var timeStamp = Date.parse(bsted.currentPage.createDate);
						timeStamp = new Date(timeStamp);
						timeStamp = "<strong>Posted:</strong> " + (timeStamp.getMonth() + 1) + "/" + timeStamp.getDate() + "/" + timeStamp.getFullYear() + " @ " + timeStamp.toLocaleTimeString();
						var $info = $("#info"),
							imgTag = (bsted.currentPage.image === "") ? "" : "<img src=\"" + bsted.currentPage.image + "\" />",
							postContent = imgTag + bsted.currentPage.description,
							attributionHTML = timeStamp + "<span><a href=\"index.htm?p=" + bsted.currentPage.name + "\">+</a></span>",
							postTitle = "<a href=\"index.htm?p=" + bsted.currentPage.name + "\">" + bsted.currentPage.name + "</a>";
						$info.children(".tabContent").children(".insetBox").children(".postTitle").html(postTitle);
						$info.children(".tabContent").children(".insetBox").children(".postContent").html(postContent);						
						$info.children(".tabContent").children(".insetAttr").html(attributionHTML);
						$(".tabTitle").removeData("tabState");
						$info.removeAttr("style");
						$info.show();
					}
					else {
						$("#info").hide();
					}
					if (!bsted.icons.home) {
						bsted.icons.drawHome();
					}
					if (bsted.currentPage.hasSubNav) {
						bsted.icons.home.show();
					} else {
						bsted.icons.home.hide();
					}
					bsted.ga.setPage();
					$("#loading").remove();
					bsted.pageReady();
			});
		},
		"pageReady" : function(){
			if (typeof bsted.currentScript === "function" && bsted.currentTimers.length === 0) {
				bsted.currentScript();
			} 
			else { 
				setTimeout(function() {
					bsted.pageReady();
				}, 13);
			}
		},
		"nav" : {
			"killTimers" : function() {
				for (var i = 0; i < bsted.currentTimers.length; i++) {
					clearTimeout(bsted.currentTimers[i]);
				}
				bsted.currentTimers = [];
			},
			"page" : function(page) {
				bsted.nav.killTimers();
				bsted.currentScript = null;
				delete bsted.currentScript;
				bsted.setPage("", page);
			},
			"next" : function() {
			},
			"home" : function() {
				bsted.nav.killTimers();
				bsted.currentScript = null;
				bsted.setPage("", "home");
			},
			"prev" : function() {
			}
		},
		"icons" : {
			"home": null,
			"drawHome" : function() {
				var stage = bsted.raph.setStage("subNav");
				var path = "M351.544,219.525l-61.069-61.072c-0.683-0.681-1.573-1.018-2.476-1.02c-0.906,0.002-1.795,0.339-2.476,1.02l-61.07,61.072 c-0.681,0.679-1.018,1.568-1.02,2.476c0.002,0.903,0.341,1.793,1.02,2.472l7.073,7.072c0.677,0.679,1.568,1.019,2.472,1.021 c0.908-0.002,1.797-0.339,2.476-1.021l46.929-46.928c1.264-1.266,2.938-1.9,4.597-1.897c1.658-0.002,3.331,0.631,4.596,1.897 l46.929,46.928c0.681,0.679,1.57,1.017,2.476,1.019c0.904-0.002,1.795-0.339,2.474-1.019l7.07-7.07 c0.679-0.683,1.018-1.572,1.02-2.476C352.562,221.093,352.225,220.204,351.544,219.525z M287.999,185.719 c-0.906,0.002-1.795,0.339-2.476,1.02L243,229.263V271c0,2.75,2.25,5,5,5h22v-40c0-2.761,2.238-5,5-5h26c2.762,0,5,2.239,5,5v40 h22c2.75,0,5-2.25,5-5v-41.737l-42.528-42.524C289.792,186.058,288.904,185.721,287.999,185.719z";
				var bg = stage.paper.rect(10, 10, 55, 55, 10).attr({
					"stroke": "none",
					"fill": "90-#000-#a1a1a1",
					"fill-opacity" : 1
				});
				var icon = stage.paper.path(path).attr({
					"title" : "Click to go to the home page",
					"stroke": "none",
					"fill": "#fff",
					"fill-opacity" : 1,
					"scale" : "0.3, 0.3"
				})
				.translate(-250, -180)
				.toFront();
				stage.paper.safari();
				$(bg.node).css({"cursor" : "pointer"}).next().css({"cursor" : "pointer"});
				bg.node.onclick = icon.node.onclick = function () {
					bsted.nav.home();
				};
				var set = stage.paper.set();
				set.push(bg, icon);
				set.attr({
					"translation" : "10, 10"
				});
				this.home = set;
			}
		},
		"utils" : {
			"setTimer" : function(code, interval) {
				bsted.currentTimers.push(setTimeout(code, interval));
			},
			"activeTimer" : null,
			"getSize" : function(element) {
				var result = element.width();
				return result;
			},
			"setSize" : function() {
			},
			"link" : function(){
			},
			"tabDrawer" : function (element, state) {
				var $tabID = $(element),
					parentID = $tabID.parent(),
					containerHeight = parentID.outerHeight(),
					contentID = $tabID.next(),
					titleHeight = $tabID.outerHeight(),
					containerHeight = parentID.outerHeight(),
					contentHeight = contentID.outerHeight(true),
					titleBorder = parseInt($tabID.css("border-bottom-width"), 10),
					height = (titleHeight - titleBorder) - containerHeight;
				state = state || height;
				parentID.animate({
					"bottom" : state
				}, (-height / 0.75), function() {
					$tabID.data("tabState" , state);
				});
			},
			"doesAudio" : function() {
				return !!document.createElement("audio").canPlayType;
			}
		},
		"ga" : {
			"src" : ("https:" == document.location.protocol ? "https://ssl" : "http://www") + ".google-analytics.com/ga.js",
			"id" : "UA-17332084-1",
			"setPage" : function (page) {
				page = page || bsted.currentPage.name;
				if (!bsted.devMode) {
					_gaq.push(
						['_setAccount', 'UA-17332084-1'],
						["_trackPageview", "/" + page]
					);
					if (bsted.parseURL("iam") === "mirande"){
						_gaq.push(
							["_setVar", "noTrack"]
						);
					}
				}
				else {
				}
			}
		},
		"raph" : {
			"name" : null,
			"target" : null,
			"paper" : null,
			"height" : null,
			"width" : null,
			"setStage" : function(id){
				this.name = id || "stage";
				this.target = $("#" + this.name);
				this.height = this.target.innerHeight();
				this.width = this.target.innerWidth();
				this.paper = Raphael(this.name, this.width, this.height);
				return {
					"paper" : this.paper,
					"target" : this.target,
					"width" : this.width,
					"height" : this.height
				}
			}
		}
	}
})();
$.getJSON("data/pages.json", function(data) {
	bsted.pages = data;
	bsted.load();
});
$("a").live("click", function(){
	var href = $(this).attr("href") || "",
		patt = /^\?/gi;
	if (href.match(patt)) {
		href = bsted.parseURL(bsted.urlKey, href);
		bsted.nav.page(href);
		return false;
	}
});
$(".tabTitle").live("click", function() {
	var state = $(this).data("tabState") || -1;
	if (state < 0) {
		bsted.utils.tabDrawer(this, 1);
	}
	else {
		bsted.utils.tabDrawer(this);
	}
});