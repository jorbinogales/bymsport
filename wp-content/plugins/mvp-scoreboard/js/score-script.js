jQuery(document).ready(function($) {
"use strict";

	$('.carousel').elastislide({
		imageW : 100,
		minItems : 2,
		margin : 7
	});

	$('.tabber-container').each(function() {
		$(this).find(".tabber-content").hide(); //Hide all content
		$(this).find("ul.mvp-col-tabs li.mvp-feat-col-tab").addClass("active").show(); //Activate first tab
		$(this).find(".tabber-content:first").show(); //Show first tab content
	});
	$(".mvp-score-nav-menu select").change(function(e) {
		$(this).parents('.tabber-container').find(".tabber-content").hide(); //Hide all tab content
		var activeTab = $(this).find("option:selected").val(); //Find the href attribute value to identify the active tab + content
		$(this).parents('.tabber-container').find(activeTab).fadeIn(); //Fade in the active ID content
		e.preventDefault();
	});
	$("ul.mvp-col-tabs li").on('click', function(e) {
		$(this).parents('.tabber-container').find("ul.mvp-col-tabs li").removeClass("active"); //Remove any "active" class
		$(this).addClass("active"); //Add "active" class to selected tab
		$(this).parents('.tabber-container').find(".tabber-content").hide(); //Hide all tab content
		var activeTab = $(this).find("a").attr("href"); //Find the href attribute value to identify the active tab + content
		$(this).parents('.tabber-container').find(activeTab).fadeIn(); //Fade in the active ID content
		e.preventDefault();
	});
	$(".mvp-scores-menu select").change(function(e) {
		$(this).parents('.tabber-container').find(".tabber-content").hide(); //Hide all tab content
		var activeTab = $(this).find("option:selected").val(); //Find the href attribute value to identify the active tab + content
		$(this).parents('.tabber-container').find(activeTab).fadeIn(); //Fade in the active ID content
		e.preventDefault();
	});
	$("select.mvp-score-tabs option a").change(function(e) {
		e.preventDefault();
	})

});