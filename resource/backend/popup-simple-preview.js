jQuery(document).ready(function($) {
	$('.no-click-through').on('click', function(e) {
		return false;
	});
	$('[preview-update-target]').on('change propertychange keyup input paste', function(e) {
		var target_selector = $(this).attr('preview-update-target');
		$(target_selector).html($(this).val());
	});
	$('[preview-update-target-value]').on('change propertychange keyup input paste', function(e) {
		var target_selector = $(this).attr('preview-update-target-value');
		$(target_selector).val($(this).val());
	});
	$('[preview-update-target-img]').on('change paste', function(e) {
		var target_selector = $(this).attr('preview-update-target-img');
		$(target_selector).attr('src', $(this).val());
	});
	$('[preview-update-target-css][preview-update-target-css-property]').on('change propertychange keyup input paste', function(e) {
		var target_selector = $(this).attr('preview-update-target-css');
		var css_property = $(this).attr('preview-update-target-css-property');
		$(target_selector).css(css_property, $(this).val());
	});
	$('[preview-update-target-css-hide]').on('change', function(e) {
		var target_selector = $(this).attr('preview-update-target-css-hide');
		$(target_selector).css('display', $(this).val());
	});
	$('[preview-update-target]').change();
	$('[preview-update-target-value]').change();
	$('[preview-update-target-img]').change();
	$('[preview-update-target-css][preview-update-target-css-property]').change();
	$('[preview-update-target-css-hide]').change();
});