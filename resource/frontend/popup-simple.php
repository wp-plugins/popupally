<div id="popup-box-{{num}}" class="fancybox-overlay-{{num}} popup-click-close-trigger-{{num}}">
	<div class="fancybox-outer-{{num}}">
		<div class="fancybox-inner-{{num}}">
			<div class="fancybox-center">
				<div class="desc" style="cursor: pointer;">{{headline}}</div>
				<div class="logo-row">
					<div class="clear"></div>
					<img class="logo-img" src="{{image-url}}" alt="">
					<div class="logo-text">{{sales-text}}</div>
					<div class="clear"></div>
				</div>
				<form action="{{sign-up-form-action}}" class="content" method="post">
{{hidden-fields}}
						<input type="text" name="{{sign-up-form-name-field}}" class="field" placeholder="Enter your first name here"/>
						<input type="text"  name="{{sign-up-form-email-field}}" class="field" placeholder="Enter a valid email here"/>
						<input type="submit" class="submit" value="{{subscribe-button-text}}" />
						<div class="privacy">{{privacy-text}}</div>
				</form>
			</div>
		</div>
		<a title="Close" class="fancybox-close popup-click-close-trigger-{{num}}" href="#">x</a>
	</div>
</div>