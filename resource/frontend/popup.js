jQuery(document).ready(function($) {
	var configuration_selector = ".popupally-configuration",
		currently_opened = false,
		priority = false;
	function initializeConfig(element) {
		args = parseParameters($(element).html());
		var result = new Object;
		result.checking = false;
		result.previousY = -1;
		result.open_trigger = getOptionalArgValue(args, "open-trigger", "");
		result.close_trigger = getOptionalArgValue(args, "close-trigger", "");
		result.timed_popup_delay = getOptionalArgValue(args, "timed-popup-delay", -1);
		result.enable_exit_intent = getOptionalArgValue(args, "enable-exit-intent-popup", false);
		result.enable_scroll = getOptionalArgValue(args, "enable-scroll-popup", false);
		result.scroll_percent = getOptionalArgValue(args, "scroll-percent", -1);
		result.scroll_trigger = getOptionalArgValue(args, "scroll-trigger", "");
		result.popup_selector = getOptionalArgValue(args, "popup-selector", "");
		result.popup_class = getOptionalArgValue(args, "popup-class", "");
		result.cookie_duration = getOptionalArgValue(args, "cookie-duration", 0);
		result.cookie_name = getOptionalArgValue(args, "cookie-name", "");
		result.priority = getOptionalArgValue(args, "priority", 0);
		return result;
	}
	initialize();
	function timedPopup(config) {
		if (false === priority || priority < config.priority) {
			openPopup(config);
			createPopupCookie(config.cookie_name, config.cookie_duration);
		}
	}
	function checkExitIntentPopup(config) {
		if (config.checking && (false === priority || priority < config.priority)) {
			openPopup(config);
			createPopupCookie(config.cookie_name, config.cookie_duration);
		}
		config.checking=false;
	}
	function checkScrollPopup(config) {
		if (false === priority || priority < config.priority) {
			var window_view_bottom = $(window).scrollTop() + $(window).height(),
					total_height = $(document).height();
			if (config.scroll_percent >= 0) {
				if (window_view_bottom > total_height * config.scroll_percent / 100) {
					openPopup(config);
				}
			}
			if (config.scroll_trigger) {
				$(config.scroll_trigger).each(function(index, e) {
					if (false === priority || priority < config.priority) {
						var elem_top = $(e).offset().top;
						if (elem_top < window_view_bottom) {
							openPopup(config);
						}
					}
				});
			}
		}
	}
	function initialize() {
		var arr = [];
		$(configuration_selector).each(function(index) {
			var config = initializeConfig(this),
				hasOpenedCookie = readPopupCookie(config.cookie_name),
				hasOnFunction = $.isFunction($.fn.on);
			if (hasOpenedCookie !== '1') {
				if (config.timed_popup_delay >= 0) {
					setTimeout(function() {timedPopup(config);},config.timed_popup_delay*1000);
				}
				if (config.enable_exit_intent) {
					$(document).mousemove(function(e) {trackMouse(e, config);});
				}
				if (config.enable_scroll && (config.scroll_percent >= 0 || config.scroll_trigger)) {
					if (hasOnFunction) {
						$(window).on('scroll', function(e) {checkScrollPopup(config);});
					} else {
						$(window).bind('scroll', function(e) {checkScrollPopup(config);});
					}
				}
			}
			if (config.open_trigger) {
				if (hasOnFunction) {
					$('html').on('click', config.open_trigger, function(e) {
						if( e.target !== this ) 
							return;
						openPopup(config);
						return false;
					});
				} else {
					$(config.open_trigger).bind('click', function(e) {
						if( e.target !== this ) 
							return;
						openPopup(config);
						return false;
					});
				}
			}
			if (config.close_trigger) {
				if (hasOnFunction) {
					$('html').on('click', config.close_trigger, function(e) {
						if( e.target !== this ) 
							return;
						closePopup(config);
						return false;
					});
				} else {
					$(config.close_trigger).bind('click', function(e) {
						if( e.target !== this ) 
							return;
						closePopup(config);
						return false;
					});
				}
			}
			arr.push(config);
		});

		$(document).keyup(function(e) {
			if (e.keyCode != 27)
				return;
			for (var i = 0; i < arr.length; i++) {
				closePopup(arr[i]);
			}
			return false;
		});
	}
	function getOptionalArgValue(args, key, orig) {
		var value = null;
		if (key in args) {
			value = args[key];
			if (typeof orig == "boolean") {
				return value == "true";
			}
			if (typeof orig == "number") {
				return parseInt(value);
			}
			return value;
		}
		return orig;
	}
	function parseParameters(value) {
		var results = jQuery.parseJSON(value),
				key = null;
		for (key in results) {
			if ('string' === typeof results[key]) {
				results[key] = results[key].replace(/&quot;/g, '"');
				results[key] = results[key].replace(/&#039;/g, "'");
				results[key] = results[key].replace(/&lt;/g, '<');
				results[key] = results[key].replace(/&gt;/g, '>');
				results[key] = results[key].replace(/&amp;/g, '&');
			}
		}
		return results;
	}
	function trackMouse(e, config) {
		if (config.hasOpened) return;
		config.checking=false;
		if (e.clientY < config.previousY) {
			var predictedY = e.clientY + (e.clientY - config.previousY);
			if (predictedY<=10) {
				config.checking=true;
				setTimeout(function(){checkExitIntentPopup(config);},1);
			}
		}
		config.previousY = e.clientY;
	}
	function closePopup(config) {
		currently_opened = false;
		if (config.popup_selector && config.popup_class) {
			$(config.popup_selector).removeClass(config.popup_class);
		}
	}
	function openPopup(config) {
		priority = config.priority;
		if (currently_opened) return;
		currently_opened = true;
		if (config.popup_selector && config.popup_class) {
			$(config.popup_selector).addClass(config.popup_class);
		}
	}
	function createPopupCookie(cookie_name,days) {
		var expires = "",
			date = null;
		if (cookie_name) {
			if (days !== 0) {
				date = new Date();
				date.setTime(date.getTime()+(days*24*60*60*1000));
				expires = "; expires="+date.toGMTString();
			}
			document.cookie = cookie_name+"=1"+expires+"; path=/";
		}
	}
	function readPopupCookie(cookie_name) {
		if (cookie_name) {
			var nameEQ = cookie_name + "=",
			cookie = document.cookie,
			index = cookie.indexOf(nameEQ);
			if (index >= 0) {
				index += nameEQ.length;
				endIndex = cookie.indexOf(';', index);
				if (endIndex < 0) endIndex = cookie.length;
				return cookie.substring(index, endIndex);
			}
		}
		return null;
	}
});