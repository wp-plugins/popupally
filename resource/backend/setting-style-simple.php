<div class="wrap">
	<h2><?php _e('Popup Style Settings'); ?></h2>
	<?php settings_errors('popupally_style'); ?>

	<p>Need help setting up the popups? See the tutorial on <a href="<?php echo PopupAlly::HELP_URL; ?>">our website</a>!</p>
	<form enctype="multipart/form-data" method="post" action="options.php"> 
		<?php settings_fields( 'popupally_style_settings' ); ?>

		<?php foreach ($style as $id => $setting) { ?>
		<a class="anchor" name="popup-<?php echo $id; ?>"></a> 
		<div class="popupally-setting-div">
			<h3><?php echo $id; ?>. <input name="<?php echo PopupAlly::SETTING_KEY_STYLE . '[' . $id . ']'; ?>[name]" type="text" value="<?php echo esc_attr($setting['name']); ?>"/></h3>

			<div>
				<fieldset class="popupally-fieldset">
					<legend>Integration settings</legend>
					<input type="hidden" name="<?php echo PopupAlly::SETTING_KEY_STYLE . '[' . $id . ']'; ?>[sign-up-form-action]" id="sign-up-form-action-<?php echo $id; ?>" value="<?php echo $setting['sign-up-form-action']; ?>" />
					<table class="form-table form-table-popupally-style-integration">
						<tbody>
							<tr valign="top">
								<th scope="row">Sign-up form HTML</th>
								<td>
									<textarea class="full-width sign-up-form-raw-html" popup-id="<?php echo $id; ?>" name="<?php echo PopupAlly::SETTING_KEY_STYLE . '[' . $id . ']'; ?>[signup-form]" rows="6"><?php echo esc_attr($setting['signup-form']); ?></textarea>
									<small class="sign-up-error" id="sign-form-error-<?php echo $id;?>"></small>
								</td>
							</tr>
							<tr valign="top" class="sign-up-form-valid-dependent-<?php echo $id; ?>">
								<th scope="row">Name field</th>
								<td>
									<select class="sign-up-form-select-<?php echo $id; ?>" sign-up-form-field="name" name="<?php echo PopupAlly::SETTING_KEY_STYLE . '[' . $id . ']'; ?>[sign-up-form-name-field]">
										<?php if (isset($setting['other-form-fields-name'])) {
										foreach($setting['other-form-fields-name'] as $field_id => $name) { ?>
										<option value="<?php echo $name; ?>" <?php selected($setting['sign-up-form-name-field'], $name); ?>><?php echo $name; ?></option>
										<?php }
										} ?>
									</select>
								</td>
							</tr>
							<tr valign="top" class="sign-up-form-valid-dependent-<?php echo $id; ?>">
								<th scope="row">Email field</th>
								<td>
									<select class="sign-up-form-select-<?php echo $id; ?>" sign-up-form-field="email" name="<?php echo PopupAlly::SETTING_KEY_STYLE . '[' . $id . ']'; ?>[sign-up-form-email-field]">
										<?php if (isset($setting['other-form-fields-name'])) {
										foreach($setting['other-form-fields-name'] as $field_id => $name) { ?>
										<option value="<?php echo $name; ?>" <?php selected($setting['sign-up-form-email-field'], $name); ?>><?php echo $name; ?></option>
										<?php }
										} ?>
									</select>
								</td>
							</tr>
						</tbody>
					</table>
				</fieldset>
				<div>
					<fieldset class="popupally-fieldset popupally-style-preview">
						<legend>Preview</legend>
						<div id="popup-box-preview-<?php echo $id; ?>" class="fancybox-outer-sxzw">
							<div class="fancybox-inner-sxzw">
								<div class="fancybox-center-sxzw">
									<div class="desc-sxzw customizable-color-text-<?php echo $id; ?>" style="cursor: pointer;" id="preview-headline-<?php echo $id; ?>"></div>
									<div class="logo-row-sxzw" id="logo-row-<?php echo $id; ?>">
										<div class="clear-sxzw"></div>
										<img class="logo-img-sxzw" id="preview-img-<?php echo $id; ?>" src="" alt="">
										<div class="logo-text-sxzw customizable-color-text-<?php echo $id; ?>" id="preview-sales-text-<?php echo $id; ?>"></div>
										<div class="clear-sxzw"></div>
									</div>
									<div class="content-sxzw">
										<input type="text" name="name" class="field-sxzw" placeholder="Enter your first name here"/>
										<input type="text" id="email" name="email" class="field-sxzw" placeholder="Enter a valid email here"/>
										<input type="button" id="subscribe-button-<?php echo $id; ?>" class="submit-sxzw no-click-through" value=""/>
									</div>
									<div class="privacy-sxzw customizable-color-text-<?php echo $id; ?>" id="privacy-text-<?php echo $id; ?>"></div>
								</div>
							</div>
						</div>
					</fieldset>
					<fieldset class="popupally-fieldset popupally-style-customization">
						<legend>Customization</legend>
						<input type="hidden" name="<?php echo PopupAlly::SETTING_KEY_STYLE . '[' . $id . ']'; ?>[logo-img-action]" id="logo-img-<?php echo $id; ?>" value="<?php echo empty($setting['image-url']) ? 'upload' : 'url'; ?>" />
						<input type="hidden" name="<?php echo PopupAlly::SETTING_KEY_STYLE . '[' . $id . ']'; ?>[display-headline]" id="display-headline-<?php echo $id; ?>" preview-update-target-css-hide="#preview-headline-<?php echo $id; ?>" value="<?php echo $setting['display-headline']; ?>" />
						<input type="hidden" name="<?php echo PopupAlly::SETTING_KEY_STYLE . '[' . $id . ']'; ?>[display-logo-row]" id="display-logo-row-<?php echo $id; ?>" preview-update-target-css-hide="#logo-row-<?php echo $id; ?>" value="<?php echo $setting['display-logo-row']; ?>" />
						<input type="hidden" name="<?php echo PopupAlly::SETTING_KEY_STYLE . '[' . $id . ']'; ?>[display-logo-img]" id="display-logo-img-<?php echo $id; ?>" preview-update-target-css-hide="#preview-img-<?php echo $id; ?>" value="<?php echo $setting['display-logo-img']; ?>" />
						<input type="hidden" name="<?php echo PopupAlly::SETTING_KEY_STYLE . '[' . $id . ']'; ?>[display-privacy]" id="display-privacy-<?php echo $id; ?>" preview-update-target-css-hide="#privacy-text-<?php echo $id; ?>" value="<?php echo $setting['display-privacy']; ?>" />
						<table class="form-table form-table-popupally-style-customization">
							<tbody>
								<tr valign="top">
									<th scope="row">Background color</th>
									<td><input size="8" class="color-picker-input" name="<?php echo PopupAlly::SETTING_KEY_STYLE . '[' . $id . ']'; ?>[background-color]" type="text" value="<?php echo $setting['background-color']; ?>" preview-update-target-css="#popup-box-preview-<?php echo $id; ?>" preview-update-target-css-property="background-color" data-default-color="#FFFFFF"></td>
								</tr>
								<tr valign="top">
									<th scope="row">Text color</th>
									<td><input size="8" class="color-picker-input" name="<?php echo PopupAlly::SETTING_KEY_STYLE . '[' . $id . ']'; ?>[text-color]" type="text" value="<?php echo $setting['text-color']; ?>" preview-update-target-css=".customizable-color-text-<?php echo $id; ?>" preview-update-target-css-property="color" data-default-color="#444444"></td>
								</tr>
								<tr valign="top">
									<th scope="row">Headline (HTML code allowed)</th>
									<td><textarea rows="3" class="full-width" input-empty-check="#display-headline-<?php echo $id; ?>" name="<?php echo PopupAlly::SETTING_KEY_STYLE . '[' . $id . ']'; ?>[headline]" preview-update-target="#preview-headline-<?php echo $id; ?>"><?php echo esc_attr($setting['headline']); ?></textarea></td>
								</tr>
								<tr valign="top" hide-toggle data-dependency="logo-img-<?php echo $id; ?>" data-dependency-value="upload">
									<th scope="row">Logo Image<br />
										<small><a click-value="url" click-target="#logo-img-<?php echo $id; ?>" href="#">Specify a url instead</a></small>
									</th>
									<td>
										<input type="file" name="img-file-<?php echo $id; ?>"><br />
										<small>The image will be uploaded on submit. Leave this field blank if you do not want to show an image with the popup.</small>
									</td>
								</tr>
								<tr valign="top" hide-toggle data-dependency="logo-img-<?php echo $id; ?>" data-dependency-value="url">
									<th scope="row">Logo Image<br />
										<small><a click-value="upload" click-target="#logo-img-<?php echo $id; ?>" href="#">Upload an image instead</a></small>
									</th>
									<td>
										<input class="full-width" type="text" input-empty-check="#display-logo-img-<?php echo $id; ?>" input-all-empty-check="#display-logo-row-<?php echo $id; ?>" preview-update-target-img="#preview-img-<?php echo $id; ?>" name="<?php echo PopupAlly::SETTING_KEY_STYLE . '[' . $id . ']'; ?>[image-url]" value="<?php echo(esc_attr($setting['image-url'])); ?>" /><br />
										<small>Leave this field blank if you do not want to show an image with the popup.</small>
									</td>
								</tr>
								<tr valign="top">
									<th scope="row">Introduction Text (HTML code allowed)</th>
									<td><textarea rows="3" class="full-width" name="<?php echo PopupAlly::SETTING_KEY_STYLE . '[' . $id . ']'; ?>[sales-text]" preview-update-target="#preview-sales-text-<?php echo $id; ?>" input-all-empty-check="#display-logo-row-<?php echo $id; ?>"><?php echo esc_attr($setting['sales-text']); ?></textarea></td>
								</tr>
								<tr valign="top">
									<th scope="row">Subscribe button text</th>
									<td><input class="full-width" name="<?php echo PopupAlly::SETTING_KEY_STYLE . '[' . $id . ']'; ?>[subscribe-button-text]" type="text" value="<?php echo esc_attr($setting['subscribe-button-text']); ?>" preview-update-target-value="#subscribe-button-<?php echo $id; ?>"></td>
								</tr>
								<tr valign="top">
									<th scope="row">Subscribe button color</th>
									<td><input size="8" class="color-picker-input" name="<?php echo PopupAlly::SETTING_KEY_STYLE . '[' . $id . ']'; ?>[subscribe-button-color]" type="text" value="<?php echo $setting['subscribe-button-color']; ?>" preview-update-target-css="#subscribe-button-<?php echo $id; ?>" preview-update-target-css-property="background-color" data-default-color="#00c98d"></td>
								</tr>
								<tr valign="top">
									<th scope="row">Subscribe button text color</th>
									<td><input size="8" class="color-picker-input" name="<?php echo PopupAlly::SETTING_KEY_STYLE . '[' . $id . ']'; ?>[subscribe-button-text-color]" type="text" value="<?php echo $setting['subscribe-button-text-color']; ?>" preview-update-target-css="#subscribe-button-<?php echo $id; ?>" preview-update-target-css-property="color" data-default-color="#ffffff"></td>
								</tr>
								<tr valign="top">
									<th scope="row">Privacy Text (HTML code allowed)</th>
									<td><textarea rows="3" class="full-width" input-empty-check="#display-privacy-<?php echo $id; ?>" name="<?php echo PopupAlly::SETTING_KEY_STYLE . '[' . $id . ']'; ?>[privacy-text]" preview-update-target="#privacy-text-<?php echo $id; ?>"><?php echo esc_attr($setting['privacy-text']); ?></textarea></td>
								</tr>
							</tbody>
						</table>
					</fieldset>
				</div>
			</div>
		</div>
		<?php } ?>

		<p class="submit">
			<input type="submit" id="popupally-style-submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
		</p>
	</form>
</div>