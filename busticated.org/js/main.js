function tabDrawer(element, state) {
	//mesure tab dimensions and calculate open & close (height) positions
	var tabID = $(element);
	var parentID = tabID.parent();
	var containerHeight = parentID.outerHeight();
	var contentID = tabID.next();
				
	var titleHeight = tabID.outerHeight();
	var containerHeight = parentID.outerHeight();
	var contentHeight = contentID.outerHeight(true);

	var titleBorder = parseInt(tabID.css("border-bottom-width"), 10);
	var height = (titleHeight - titleBorder) - containerHeight;

	//open and close tab
	state = state || height;
	parentID.animate({
		"bottom" : state
	}, 300, function() {
		// Animation complete.
		tabID.data("tabState" , state);
	});
}

$(".tabTitle").live("click", function() {
	var state = $(this).data("tabState") || -1;
	if (state < 0) {
		tabDrawer(this, 1);
	}
	else {
		tabDrawer(this);
	}
});
bsted.pageReady(function() {
//page-specific code here
	//create home icon and attach click handler
	var homeIcn = (function(){
		//hack to handle a missing subNav element - for the pages that don't need it
		if ($("#subNav").length === 0) {
			return;
		}
		//create stage
		var paper = bsted.raph.setStage("subNav");
	
		//create icon and draw to stage
		var path = "M351.544,219.525l-61.069-61.072c-0.683-0.681-1.573-1.018-2.476-1.02c-0.906,0.002-1.795,0.339-2.476,1.02l-61.07,61.072 c-0.681,0.679-1.018,1.568-1.02,2.476c0.002,0.903,0.341,1.793,1.02,2.472l7.073,7.072c0.677,0.679,1.568,1.019,2.472,1.021 c0.908-0.002,1.797-0.339,2.476-1.021l46.929-46.928c1.264-1.266,2.938-1.9,4.597-1.897c1.658-0.002,3.331,0.631,4.596,1.897 l46.929,46.928c0.681,0.679,1.57,1.017,2.476,1.019c0.904-0.002,1.795-0.339,2.474-1.019l7.07-7.07 c0.679-0.683,1.018-1.572,1.02-2.476C352.562,221.093,352.225,220.204,351.544,219.525z M287.999,185.719 c-0.906,0.002-1.795,0.339-2.476,1.02L243,229.263V271c0,2.75,2.25,5,5,5h22v-40c0-2.761,2.238-5,5-5h26c2.762,0,5,2.239,5,5v40 h22c2.75,0,5-2.25,5-5v-41.737l-42.528-42.524C289.792,186.058,288.904,185.721,287.999,185.719z";
		var bg = paper.rect(10, 10, 55, 55, 10).attr({
			"stroke": "none",
			"fill": "#000",
			"fill-opacity" : 0.5
		});

		var icon = paper.path(path).attr({
			"stroke": "none",
			"fill": "#fff",
			"fill-opacity" : 1,
			"scale" : "0.3, 0.3"
		})
		.translate(-250, -180)
		.toFront();

		//force draw in webkit (ironically chrome is the problem child here)
		paper.safari();

		//make the links visibile
		$(bg.node).css({"cursor" : "pointer"}).next().css({"cursor" : "pointer"});

		//assign the event handler
		bg.node.onclick = icon.node.onclick = function () {
			window.location = "index.htm";
		};

		//create the collection
		var set = paper.set();
		set.push(bg, icon);
		set.attr({
			"translation" : "10, 10"
		});

		return {
			"icon" : icon,
			"bg" : bg,
			"set" : set
		}
	})();
});