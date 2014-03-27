=== Plugin Name ===

Contributors: rli
Plugin Name: PopupAlly
Plugin URI: http://popupally.com/
Donate link: http://popupally.com/
Tags: conversion, sign-up form, popup, exit-intent
Author URI: http://nathalielussier.com/
Author: Robin Li
Requires at least: 2.3
Tested up to: 3.8
Version: 1.1.5
Stable tag: 1.1.5
License: http://opensource.org/licenses/Artistic-2.0

PopupAlly allows you to create advanced popup signup forms in under 5 minutes without the need to deal with messy code.

== Description ==
Want to increase your subscriber base? Exit-intent popups allow you to capture lost visitors and have been shown to increase conversion by over 300%. PopupAlly allows you to create advanced popup signup forms in under 5 minutes, even if you don't know code. PopupAlly's visual editor allows you to customize the look-and-feel of your popups with an instant preview, saving you lots of time.

== Installation ==

1. Activate the PopupAlly plugin
2. Customize the plugin settings through the PopupAlly menu group

== Screenshots ==

1. PopupAlly Default popup preview
2. Customize the popup through the visual editor and know exact what it will look like instantly
3. Don't know code? Don't worry! Just paste in the copy and we will take care of the rest!
4. Control exactly when and where the popup will appear!

== Changelog ==

= 1.1.5 =
* Remove second parameter from json_encode so the function works with PHP pre-5.3

= 1.1.4 =
* Use 'bind' instead of 'on' for event handling if the site is using an earlier version of jQuery.

= 1.1.3 =
* Remove all 'fancybox' string to avoid conflict.

= 1.1.2 =
* Change deprecated jQuery handler live() to on()

= 1.1.1 =
* Define submit button height to be auto.

= 1.1.0 =
* Upgrade interface for better page/post selection.
* Add unique postfix to CSS class to avoid conflict.
    * Fix input field display error in Firefox when input[type="text"] has height defined.
    * Fix input field stretches outside border when class 'content' has width defined.
* Add non-inline mode for themes that do not implement the wp_head function.
* Add PHP version check and provide warning if PHP version is less than 5.3

= 1.0.4 =
* Do not generate hidden fields if none exists. This could be causing errors for more strict php implementations.

= 1.0.3 =
* Change field name storage structure to allow for '[' and ']' in field names.

= 1.0.2 =
* Update version number in the main plugin file.

= 1.0.1 =
* Fix sign-up form field selection issue.

= 1.0 =
* Initial release.

== Upgrade Notice ==

= 1.1.5 =
* Only affect sites with PHP version lower than 5.3. No action is required after update.

= 1.1.4 =
* Only affect sites with pre-1.7 jQuery. No action is required after update.

= 1.1.3 =
* Remove all 'fancybox' string to avoid conflict. Please re-save 'Style Settings' if 'Do NOT use inline Javascript/CSS' is checked under advanced settings.

= 1.1.2 =
* A minor backend fix that corrects Javascript error. No manual update is required and it does not affect front-end display.

= 1.1.1 =
* Define submit button height to be auto.

= 1.1.0 =
* Improves page/post selection on Display Setting. Fixes minor style issues when conflict with existing CSS. Add non-inline mode for themes that do not implement the wp_head function.

= 1.0.4 =
* Do not generate hidden fields if none exists. This update has no impact if you are not currently seeing errors.

= 1.0.3 =
Affects form parsing for Madmimi. Resave 'Style Settings' after upgrade. Upgrade immediately.

= 1.0.1 =
* Fix sign-up form field display issue. Upgrade immediately.

= 1.0 =
* Initial release.

== Frequently Asked Questions ==

= How many popups can I have? =
You can configure 2 popups without upgrading to the Pro version

= Can I setup the popup for every post and page on my site? =
Absolutely! You can enable the popup for every post and page with 1 click on the display settings!

= Do I need to know how to modify HTML/CSS code? =
No programming experience required! You can see all the customizations instantly in the Visual Editor.

= How do I put in my own sign up form? =
You just need to copy-and-paste in the HTML code from your CRM/list platform, and we will do the rest! No need to get your hands dirty with code.