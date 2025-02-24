<p>
	<label><?php _e('Layout mode', 'mbg')?></label>
	<select name="mbg[layout][mode]" id="mbg-layout-mode">
		<option value="horizontal-flow" <?php selected($gallery['layout']['mode'], 'horizontal-flow')?>><?php _e('Horizontal flow', 'mbg')?></option>
		<option value="vertical-flow" <?php selected($gallery['layout']['mode'], 'vertical-flow')?>><?php _e('Vertical flow', 'mbg')?></option>
		<option value="usual" <?php selected($gallery['layout']['mode'], 'usual')?>><?php _e('Grid', 'mbg')?></option>
	</select>
</p>
<p id="mbg-image-width">
	<label><?php _e('Image width', 'mbg')?></label>
	<input type="number" name="mbg[layout][width]" value="<?php echo esc_attr($gallery['layout']['width']) ?>" placeholder="240">px
</p>
<p id="mbg-image-height">
	<label><?php _e('Image height', 'mbg')?></label>
	<input type="number" name="mbg[layout][height]" value="<?php echo esc_attr($gallery['layout']['height']) ?>" placeholder="190">px
</p>
<p id="mbg-image-gap">
	<label><?php _e('Gap', 'mbg')?></label>
	<input type="number" name="mbg[layout][gap]" value="<?php echo esc_attr($gallery['layout']['gap']) ?>" placeholder="190">px
</p>
<p id="mbg-image-alignment">
	<label><?php _e('Alignment', 'mbg') ?></label>
	<select name="mbg[layout][align]">
		<option value="center" <?php selected($gallery['layout']['align'], 'center') ?>><?php _e('Center', 'mbg') ?></option>
		<option value="left" <?php selected($gallery['layout']['align'], 'left') ?>><?php _e('Left', 'mbg') ?></option>
		<option value="right" <?php selected($gallery['layout']['align'], 'right') ?>><?php _e('Right', 'mbg') ?></option>
	</select>
</p>
<p id="mbg-disallow-hanging-images">
	<label><?php _e('Hanging images', 'mbg')?></label>
	<select name="mbg[layout][hanging]">
		<option value="show" <?php selected($gallery['layout']['hanging'], 'show')?>><?php _e('Show', 'mbg')?></option>
		<option value="hide" <?php selected($gallery['layout']['hanging'], 'hide')?>><?php _e('Hide', 'mbg')?></option>
	</select>
</p>
