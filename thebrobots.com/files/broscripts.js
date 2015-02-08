$(document).ready(function(){
//Hide menu content on load
	$("#menuWrapper, div.menuContent").css({
		visibility : "visible"
		});
// Set disclaimer position on load
	var disclaimerleft = $(window).width() - 22;
	var disclaimertop = $(window).height() / 1.5;
	var sidebaroffset = 120;
	var closedwidth = 22;
	var openwidth = 184;
	$("#disclaimerwrapper").css({
		top : disclaimertop + "px",
		left : disclaimerleft + "px",
		visibility : "visible"
		});
	$("#sidetabwrapper").css({
		top : disclaimertop - sidebaroffset + "px",
		left : disclaimerleft + "px",
		visibility : "visible"
		});
// Fix disclaimer position on resize
	$(window).resize(function(){
		disclaimerleft = $(window).width() - 22;
		disclaimertop = $(window).height() / 1.5;
		$("#disclaimerwrapper").css({
			top : disclaimertop + "px",
			left : disclaimerleft + "px",
			width : closedwidth + "px"
			});
		$("#sidetabwrapper").css({
			top : disclaimertop - sidebaroffset + "px",
			left : disclaimerleft  + "px",
			width : closedwidth + "px"
		});
	});
// Open and close side tabs on click
	$("#disclaimerwrapper, #sidetabwrapper").click(function (){
		if ($(this).css("width") == closedwidth+"px"){
			$(this).animate({ 
				left : disclaimerleft - 162 + "px",
				width : openwidth + "px"
			}, 600 );
		} else {
			$(this).animate({ 
				left : disclaimerleft + "px",
				width : "22px"
			}, 400 );
		}
	});
// Open and Close Menu on Click	
	$("div.menuHeader").click(function() {
		if ($(this).is(".menuHeaderSelected")){
			$("div.menuContent").slideUp("normal");
			$(this).removeClass().addClass("menuHeader");
		} else {
			$("div.menuContent").slideUp("normal");	
			$(this).next().slideDown("normal");
			$("div.menuHeaderSelected").removeClass().addClass("menuHeader");
			$(this).removeClass().addClass("menuHeaderSelected");
		}
	});
// URL encode and pass to twitter via song.ly
	$(".tweetmp3").click(function(){
		var inputString= $(this).attr("href");
		var encodedInputString=escape(inputString);
		encodedInputString=encodedInputString.replace("+", "%2B");
		encodedInputString=encodedInputString.replace("/", "%2F");
		var gotolink = "http://song.ly/?src=btn&preview=no&url=" + encodedInputString;
		$(this).attr({
			href: gotolink
		});
	});
});