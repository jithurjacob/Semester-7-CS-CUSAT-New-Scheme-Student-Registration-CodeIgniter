var g_currentFeature = 0;
var g_numFeatures = 0;
var g_maxFeatures = 4;
var g_timeBetweenSwaps = 9000;
var g_timoutId = null;

jQuery(document).ready(function()
{
	g_numFeatures = jQuery('#homePageSS2 .featureImage').length;

	// go to next in g_timeBetweenSwaps seconds
	g_timoutId = setTimeout('nextFeature()', g_timeBetweenSwaps);
});

/**
 * Go to the next slide, loop around if at end
 */
function nextFeature()
{
	var newFeature = g_currentFeature + 1;
	if ( newFeature >= g_numFeatures )
		newFeature = 0;
	switchToNewFeature(newFeature);
}

/**
 * Go to the next slide, loop around if at end
 */
function prevFeature()
{
	var newFeature = g_currentFeature - 1;
	if ( newFeature < 0 )
		newFeature = g_numFeatures;
	switchToNewFeature(newFeature);
}

/**
 * Swaps from current slide to a new one
 * @param int 1-based index of the new slide
 */
function switchToNewFeature(newFeature)
{
	if ( g_currentFeature != newFeature )
	{
		clearTimeout(g_timoutId);

		// get current
		var jqCurrentFeature = jQuery('#homePageSS2 #feature'+g_currentFeature);

		// get next
		var jqNextFeature = jQuery('#homePageSS2 #feature'+newFeature);

		// make sure the new one is display:none
		jqNextFeature.css({display:'none'});
		var jqNextFeatureTitle = jqNextFeature.find('.mainFeatureTitleBG').add(jqNextFeature.find('.mainFeatureTitleText'));
		jqNextFeatureTitle.css({display:'none'});

		// move the new one to max z-index
		jqNextFeature.addClass('fadingInFeature');

		// fade in the new one
		jqNextFeature.fadeIn(500, function()
		{
			jqNextFeatureTitle.fadeIn(250);
			// set the 'current' (now old) one to display:none
			jqCurrentFeature.removeClass('activeFeature').css({display:'none'});

			// mark the 'new' (now current) one to active
			jqNextFeature.removeClass('fadingInFeature').addClass('activeFeature');

			// update buttons
			jQuery('.ss2_nav_button_active').removeClass('ss2_nav_button_active');
			jQuery('.ss2_nav #ss2_nav_feature'+newFeature).addClass('ss2_nav_button_active');

			// update current index
			g_currentFeature = newFeature;
		});

		// go to next in g_timeBetweenSwaps seconds
		g_timoutId = setTimeout('nextFeature()', g_timeBetweenSwaps);

	}// end if ( g_currentFeature != newFeature )
}// end function switchToNewFeature