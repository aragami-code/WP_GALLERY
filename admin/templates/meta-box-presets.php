<div class="field">
	<label><?php _e('Load preset:', 'mbg') ?></label>
	<select name="preset">
		<?php foreach ( mbg_get_presets() as $key => $preset): ?>
			<option value="<?php echo esc_attr($key) ?>"><?php echo esc_html($preset['name']) ?></option>
		<?php endforeach ?>
	</select>
</div>
<div class="field">
	<button class="button"><?php _e('Load the preset', 'mbg') ?></button>
	<br class="clear" />
</div>
