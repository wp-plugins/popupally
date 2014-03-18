<div class="wrap">
	<h2><?php _e('Popup Display Settings'); ?></h2>
	<?php settings_errors('popupally_display'); ?>

	<p>Need help setting up the popups? Watch the tutorial videos at <a href="<?php echo PopupAlly::HELP_URL; ?>">our website</a>!</p>
	<div class="popupally-display-sidebar">
		<a class="popupally-display-sidebar-1" target="_blank" href="http://30daylistbuildingchallenge.com/?utm_source=popupallyplugin&utm_medium=sidebarad&utm_campaign=30daylistbuildingchallenge">
			<img src="<?php echo $plugin_dir; ?>/resource/backend/popupally-side.png" alt="Check out the 30 Day List Building Challenge!" width="300" height="350">
		</a>
		<a class="popupally-display-sidebar-2" target="_blank" href="http://popupally.com/upgrade/?utm_source=popupallyplugin&utm_medium=sidebarad&utm_campaign=popupallyproupgrade">
			<img src="<?php echo $plugin_dir; ?>/resource/backend/popupally-side2.png" alt="Update to PopupAlly Pro!" width="300" height="300">
		</a>
		<a class="popupally-display-sidebar-3" target="_blank" href="http://wordpress.org/plugins/popupally/">
			<img src="<?php echo $plugin_dir; ?>/resource/backend/popupally-side3.png" alt="Leave us a review!" width="300" height="115">
		</a>
	</div>
	<form class="popupally-display-form" method="post" action="options.php"> 
		<?php settings_fields( 'popupally_display_settings' ); ?>

		<?php foreach ($display as $id => $setting) { ?>
		<div class="popupally-setting-div">
			<h3><?php echo $id; ?>. <?php echo esc_attr($style[$id]['name']); ?></h3>
			<fieldset class="popupally-fieldset">
				<legend>Show this popup as</legend>
				<table class="form-table form-table-popupally-style-integration">
					<tbody>
						<tr valign="top">
							<th scope="row">Time-delayed popup</th>
							<td>
								<input type="checkbox" input-all-false-check="popupally-conditional-display-<?php echo $id; ?>" id="timed-<?php echo $id; ?>" name="<?php echo PopupAlly::SETTING_KEY_DISPLAY . '[' . $id . ']'; ?>[timed]" <?php checked($setting['timed'], 'true'); ?> value="true"/>
								<label>Show after <input type="text" size="4" name="<?php echo PopupAlly::SETTING_KEY_DISPLAY . '[' . $id . ']'; ?>[timed-popup-delay]" readonly-toggle data-dependency="timed-<?php echo $id; ?>" data-dependency-value="true" value="<?php echo $setting['timed-popup-delay']; ?>"/> seconds</label>
								<small>(-1 to disable; 0 to show immediately on load)</small>
							</td>
						</tr>
						<tr valign="top">
							<th scope="row">Exit-intent popup</th>
							<td>
								<input type="checkbox" input-all-false-check="popupally-conditional-display-<?php echo $id; ?>" name="<?php echo PopupAlly::SETTING_KEY_DISPLAY . '[' . $id . ']'; ?>[enable-exit-intent-popup]" <?php checked($setting['enable-exit-intent-popup'], 'true'); ?> value="true"/>
							</td>
						</tr>
					</tbody>
				</table>
			</fieldset>
			<fieldset class="popupally-fieldset popupally-conditional-display-<?php echo $id; ?>">
				<legend>Show this popup on which posts/pages?</legend>
				<table id="page-settings-<?php echo $id; ?>" class="form-table form-table-popupally-style-integration">
					<tbody>
						<tr valign="top">
							<th scope="row">Show for all pages?</th>
							<td>
								<input type="checkbox" id="show-all-<?php echo $id; ?>" name="<?php echo PopupAlly::SETTING_KEY_DISPLAY . '[' . $id . ']'; ?>[show-all]" <?php checked($setting['show-all'], 'true'); ?> value="true"/>
							</td>
						</tr>
						<tr valign="top" hide-toggle data-dependency="show-all-<?php echo $id; ?>" data-dependency-value="false">
							<th scope="row">Use for only these posts/pages</th>
							<td>
								<input class="full-width" type="text" name="<?php echo PopupAlly::SETTING_KEY_DISPLAY . '[' . $id . ']'; ?>[include]" value="<?php if (!empty($setting['include'])) {echo implode(',', array_map('esc_attr', $setting['include']));} ?>"/>
								<small>Comma-delimited list of post/page id</small>
							</td>
						</tr>
						<tr valign="top" hide-toggle data-dependency="show-all-<?php echo $id; ?>" data-dependency-value="true">
							<th scope="row">Except for these posts/pages</th>
							<td>
								<input class="full-width" type="text" name="<?php echo PopupAlly::SETTING_KEY_DISPLAY . '[' . $id . ']'; ?>[exclude]" value="<?php if (!empty($setting['exclude'])) {echo implode(',', array_map('esc_attr', $setting['exclude']));} ?>"/>
								<small>Comma-delimited list of post/page id</small>
							</td>
						</tr>
					</tbody>
				</table>
			</fieldset>
			<fieldset class="popupally-fieldset popupally-conditional-display-<?php echo $id; ?>">
				<legend>How to stop showing this popup</legend>
				<table id="page-settings-<?php echo $id; ?>" class="form-table form-table-popupally-style-integration">
					<tbody>
						<tr valign="top">
							<th scope="row">Show popup every </th>
							<td>
								<input name="<?php echo PopupAlly::SETTING_KEY_DISPLAY . '[' . $id . ']'; ?>[cookie-duration]" type="text" size="4" value="<?php echo $setting['cookie-duration']; ?>"> days<br/>
								<small><ul>
										<li>-1: re-appear on every refresh/new page load</li>
										<li>0: re-appear after closing and re-opening the browser</li>
										<li>1+: re-appear after the defined number of days.</li>
									</ul>
								</small>
							</td>
						</tr>
						<tr valign="top">
							<th scope="row">Thank you page after signing-up</th>
							<td>
								<input class="full-width" type="text" name="<?php echo PopupAlly::SETTING_KEY_DISPLAY . '[' . $id . ']'; ?>[thank-you]" value="<?php if (!empty($setting['thank-you'])) {echo implode(',', array_map('esc_attr', $setting['thank-you']));} ?>"/>
								<small>Comma-delimited list of post/page id. This popup will never be shown on any pages after the user sees the Thank You page(s).</small>
							</td>
						</tr>
						<tr valign="top">
							<th scope="row">Or you can put the following script on the thank you page (need to be hosted on <?php $url_info = parse_url(get_bloginfo('wpurl')); echo esc_attr($url_info['host']); ?>)</th>
							<td>
								<textarea class="full-width" rows="4" readonly><?php echo esc_attr(str_replace('##cookie_name##', $style[$id]['cookie-name'], $disable)); ?></textarea>
							</td>
						</tr>
					</tbody>
				</table>
			</fieldset>
		</div>
		<?php } ?>
		<p class="submit">
			<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
		</p>
	</form>
</div>