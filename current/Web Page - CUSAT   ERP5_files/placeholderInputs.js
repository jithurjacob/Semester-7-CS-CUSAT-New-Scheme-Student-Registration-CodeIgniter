var g_placeHolderSupport = false;
// easy function to clear out placeholders if they're "empty"
function clearPlaceholderValues()
{
	jQuery('input[placeholder]').each(function(idx)
	{
		if ( jQuery(this).val() == jQuery(this).attr('placeholder') )
		{
			jQuery(this).val("");
		}
	});
}

jQuery(document).ready(function()
{
	var fakeInput = document.createElement("input");
	g_placeHolderSupport = ("placeholder" in fakeInput);

	// Applies placeholder attribute behavior in web browsers that don't support it
	if ( !g_placeHolderSupport )
	{
		jQuery('input[placeholder]').each(function(idx)
		{
			var originalText = jQuery(this).attr('placeholder');
			jQuery(this).data('placeholder',originalText);

			if ( jQuery(this).val() == '' )
				jQuery(this).val(originalText).addClass("placeholder").get(0).blur();

			jQuery(this).parents("form").bind("submit", function ()
			{
				clearPlaceholderValues();
			});
		});
		jQuery('input.placeholder').bind("focus", function()
		{
			if ( jQuery(this).val() == jQuery(this).attr('placeholder') )
			{
				jQuery(this).val("").removeClass("placeholder");
			}
		});
		jQuery('input.placeholder').bind("blur", function ()
		{
			if ( jQuery(this).val().length == 0 )
			{
				jQuery(this).val(jQuery(this).attr('placeholder')).addClass("placeholder");
			}
		});

		/*/ Clear at form submission to avoid submitting placeholder
		jQuery('form').submit(function()
		{
			clearPlaceholderValues();
		});//*/

		// Clear at window reload to avoid submitting placeholder
		jQuery(window).bind("unload", function ()
		{
			clearPlaceholderValues();
		});//*/
	}
});