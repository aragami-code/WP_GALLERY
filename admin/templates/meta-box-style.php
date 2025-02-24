<p>
	<label><?php _e('Style', 'mbg')?></label>
	<select name="mbg[style][style]" value="<?php echo $gallery['style']['style'] ?>">
		<option value="default" <?php selected($gallery['style']['style'], 'default')?>><?php _e('Default', 'mbg')?></option>
		<option value="custom" <?php selected($gallery['style']['style'], 'custom')?>><?php _e('Custom CSS', 'mbg')?></option>
		<option value="builder" <?php selected($gallery['style']['style'], 'builder')?>><?php _e('Use builder', 'mbg')?></option>
		<?php foreach(mbg_get_style_presets() as $preset): ?>
			<option value="<?php echo esc_attr($preset) ?>" <?php selected($gallery['style']['style'], $preset)?>><?php echo esc_html($preset) ?></option>
		<?php endforeach ?>
	</select>
</p>