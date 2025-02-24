<p id="mbg-filters-mode">
	<label><?php _e('Enabled', 'mbg')?></label>
	<select name="mbg[filters][enabled]">
		<option value="1" <?php selected($gallery['filters']['enabled'], 1)?>><?php _e('Enable', 'mbg')?></option>
		<option value="" <?php selected($gallery['filters']['enabled'], false)?>><?php _e('Disable', 'mbg')?></option>
	</select>
</p>
<p id="mbg-filters-style">
	<label><?php _e('Style', 'mbg')?></label>
	<select name="mbg[filters][style]">
		<option value="tabs" <?php selected($gallery['filters']['style'], 'tabs')?>><?php _e('Tabs', 'mbg')?></option>
		<option value="dropdown" <?php selected($gallery['filters']['style'], 'dropdown')?>><?php _e('Dropdown', 'mbg')?></option>
	</select>
</p>
<p id="mbg-filters-alignment">
	<label><?php _e('Align', 'mbg')?></label>
	<select name="mbg[filters][align]">
		<option value="left" <?php selected($gallery['filters']['align'], 'left')?>><?php _e('Left', 'mbg')?></option>
		<option value="right" <?php selected($gallery['filters']['align'], 'right')?>><?php _e('Right', 'mbg')?></option>
		<option value="center" <?php selected($gallery['filters']['align'], 'center')?>><?php _e('Center', 'mbg')?></option>
	</select>
</p>
<p id="mbg-filters-sorting">
	<label><?php _e('Sorting', 'mbg')?></label>
	<select name="mbg[filters][sort]">
		<option value="1" <?php selected($gallery['filters']['sort'], 1)?>><?php _e('Enable', 'mbg')?></option>
		<option value="" <?php selected($gallery['filters']['sort'], false)?>><?php _e('Disable', 'mbg')?></option>
	</select>
</p>
<p><label><?php _e('Color: ', 'uber-grid')?></label><input type="text" name="mbg[filters][color]" value="<?php echo esc_attr($gallery['filters']['color']) ?>"></p>
<p><label><?php _e('Background color: ', 'uber-grid')?></label><input type="text" name="mbg[filters][background_color]" value="<?php echo esc_attr($gallery['filters']['background_color']) ?>"></p>
<p><label><?php _e('Accent color: ', 'uber-grid')?></label><input type="text" name="mbg[filters][accent_color]" value="<?php echo esc_attr($gallery['filters']['accent_color']) ?>"></p>
<p><label><?php _e('Accent background color: ', 'uber-grid')?></label><input type="text" name="mbg[filters][accent_background_color]" value="<?php echo esc_attr($gallery['filters']['accent_background_color']) ?>"></p>
<p><label><?php _e('Border radius: ', 'uber-grid')?></label><input type="text" name="mbg[filters][border_radius]" value="<?php echo esc_attr($gallery['filters']['border_radius']) ?>"></p>
<p id="mbg-filters-all">
	<label><?php _e('All wording', 'mbg')?></label>
	<input type="text" name="mbg[filters][all]" value="<?php echo esc_attr($gallery['filters']['all']) ?>">
</p>
<p id="mbg-filters-list">
	<label><?php _e('Only show filters:', 'mbg') ?></label>
	<textarea name="mbg[filters][list]"><?php echo esc_textarea(trim($gallery['filters']['list'])) ?></textarea>
	<small><?php _e('Comma-separated filter list', 'mbg') ?></small>
</p>
