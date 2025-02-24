<p id="overlay-type">
	<label><?php _e('Overlay type', 'mbg')?></label>
	<select name="mbg[overlay][mode]">
		<option value="off" <?php selected($gallery['overlay']['mode'], 'off') ?>><?php _e('Off', 'mbg')?></option>
		<option value="on-hover" <?php selected($gallery['overlay']['mode'], 'on-hover') ?>><?php _e('On-hover', 'mbg')?></option>
		<option value="off-hover" <?php selected($gallery['overlay']['mode'], 'off-hover') ?>><?php _e('Off-hover', 'mbg')?></option>
		<option value="on" <?php selected($gallery['overlay']['mode'], 'on') ?>><?php _e('Constantly on', 'mbg')?></option>
	</select>
</p>
<p id="overlay-color">
	<label><?php _e('Overlay color', 'mbg')?></label>
	<input type="text" name="mbg[overlay][color]" value="<?php echo esc_attr($gallery['overlay']['color']) ?>" placeholder="#000">
</p>
<p id="overlay-opacity">
	<label><?php _e('Overlay opacity', 'mbg')?></label>
	<input type="number" name="mbg[overlay][opacity]" value="<?php echo esc_attr($gallery['overlay']['opacity']) ?>" step="any" placeholder="0.3" max="1" min="0">
</p>
<p id="overlay-type">
	<label><?php _e('Overlay effect', 'mbg')?></label>
	<select name="mbg[overlay][effect]">
		<option value="none" <?php selected($gallery['overlay']['effect'], 'none') ?>><?php _e('None', 'mbg')?></option>
		<option value="fade" <?php selected($gallery['overlay']['effect'], 'fade') ?>><?php _e('Fade', 'mbg')?></option>
		<option value="slide" <?php selected($gallery['overlay']['effect'], 'slide') ?>><?php _e('Slide', 'mbg')?></option>
	</select>
</p>

<div id="overlay-image" class="field">
	<label><?php _e('Overlay image', 'mbg')?></label>
	<div class="image-selector no-image">
		<input name="mbg[overlay][image]" value="<?php echo $gallery['overlay']['image'] ?>" type="hidden">
		<?php if ($gallery['overlay']['image']): ?>
			<img src="<?php echo esc_url(mbg_get_wp_image_src($gallery['overlay']['image'])) ?>">
		<?php endif ?>
		<div class="overlay"></div>
		<div class="actions-wrapper">
			<button class="select-image button "><?php _e('Select image', 'mbg')?></button>
			<br>
			<a href="#" class="image-delete"><?php _e('Remove image', 'mbg')?></a>
		</div>
	</div>
	<br class="clear">
</div>
