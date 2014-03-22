<div id="popup-box-sxzw-{{num}}" class="fancybox-overlay-sxzw-{{num}} popup-click-close-trigger-{{num}}">
	<div class="fancybox-outer-sxzw-{{num}}">
		<div class="fancybox-inner-sxzw-{{num}}">
			<div class="fancybox-center-sxzw">
				<div class="desc-sxzw">{{headline}}</div>
				<div class="logo-row-sxzw">
					<div class="clear-sxzw"></div>
					<img class="logo-img-sxzw" src="{{image-url}}" alt="">
					<div class="logo-text-sxzw">{{sales-text}}</div>
					<div class="clear-sxzw"></div>
				</div>
				<form action="{{sign-up-form-action}}" class="content-sxzw" method="post">
{{hidden-fields}}
					<input type="text" name="{{sign-up-form-name-field}}" class="field-sxzw" placeholder="Enter your first name here"/>
					<input type="text"  name="{{sign-up-form-email-field}}" class="field-sxzw" placeholder="Enter a valid email here"/>
					<input type="submit" class="submit-sxzw" value="{{subscribe-button-text}}" />
				</form>
				<div class="privacy-sxzw">{{privacy-text}}</div>
			</div>
		</div>
		<a title="Close" class="fancybox-close-sxzw popup-click-close-trigger-{{num}}" href="#">x</a>
	</div>
</div>