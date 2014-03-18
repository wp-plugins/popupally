<table class="form-table" style="text-align:center;">
	<tbody>
		<tr valign="top">
			<th style="padding:0 5px;">#</th>
			<th style="font-size:12px;padding:0 5px;">Time delayed</th>
			<th style="font-size:12px;padding:0 5px;">Exit intent</th>
		</tr>
		<?php foreach($to_show as $id=>$type) { ?>
		<tr valign="top">
			<th scope="row" style="width:50%;">
				<?php echo '<a href="' . esc_attr(add_query_arg('page', PopupAlly::SETTING_KEY_STYLE, admin_url() . 'admin.php')) . '#popup-' . $id . '">' . $id . '</a>'; ?>
			</th>
			<td>
				<?php echo in_array('timed', $type) ? '&#x2714;' : ''; ?>
			</td>
			<td>
				<?php echo in_array('exit-intent', $type) ? '&#x2714;' : ''; ?>
			</td>
		</tr>
		<?php } ?>
	</tbody>
</table>