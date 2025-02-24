<p>
	<label><?php _e('Show', 'mbg') ?></label>
	<select name="mbg[shadow][mode]">
		<option value="off"  <?php selected($gallery['shadow']['mode'], 'off') ?>>
			<?php _e('Do not show', 'mbg') ?>
		</option>
		<option value="on"  <?php selected($gallery['shadow']['mode'], 'on') ?>>
			<?php _e('Show all the time', 'mbg') ?>
		</option>
		<option value="on-hover"  <?php selected($gallery['shadow']['mode'], 'on-hover') ?>>
			<?php _e('Show on hover', 'mbg') ?>
		</option>
		<option value="off-hover"  <?php selected($gallery['shadow']['mode'], 'off-hover') ?>>
			<?php _e('Hide on hover', 'mbg') ?>
		</option>
	</select>
<p>
	<label><?php _e('Radius', 'mbg')?></label>
	<input type="number" name="mbg[shadow][radius]" value="<?php echo esc_attr($gallery['shadow']['radius']) ?>" placeholder="3" step="1">
</p>
<p>
	<label><?php _e('Opacity', 'mbg')?></label>
	<input type="number" name="mbg[shadow][opacity]" value="<?php echo esc_attr($gallery['shadow']['opacity']) ?>" placeholder="0.2" step="0.01">
</p>
<p>
	<label><?php _e('Color', 'mbg')?></label>
	<input type="text" name="mbg[shadow][color]" value="<?php echo esc_attr($gallery['shadow']['color']) ?>" placeholder="#000000">
</p>
