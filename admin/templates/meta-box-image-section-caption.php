<script>
	window.mbgGoogleFonts = <?php echo json_encode($this->get_google_fonts()) ?>;
</script>
<p id="caption-mode">
	<label><?php _e('Show', 'mbg')?></label>
	<select name="mbg[caption][mode]">
		<option value="off" <?php selected($gallery['caption']['mode'], 'off') ?>><?php _e('Off', 'mbg')?></option>
		<option value="on-hover" <?php selected($gallery['caption']['mode'], 'on-hover') ?>><?php _e('On-hover', 'mbg')?></option>
		<option value="off-hover" <?php selected($gallery['caption']['mode'], 'off-hover') ?>><?php _e('Off-hover', 'mbg')?></option>
		<option value="on" <?php selected($gallery['caption']['mode'], 'on') ?>><?php _e('Constantly on', 'mbg')?></option>
	</select>
</p>

<p id="caption-color">
	<label><?php _e('Color', 'mbg')?></label>
	<input type="text" name="mbg[caption][color]" value="<?php echo esc_attr($gallery['caption']['color']) ?>" placeholder="#FFF">
</p>
<p id="caption-color2">
	<label><?php _e('Secondary color', 'mbg')?></label>
	<input type="text" name="mbg[caption][color2]" value="<?php echo esc_attr($gallery['caption']['color2']) ?>" placeholder="#FFF">
</p>
<p id="caption-background-color">
	<label><?php _e('Background color', 'mbg')?></label>
	<input type="text" name="mbg[caption][background_color]" value="<?php echo esc_attr($gallery['caption']['background_color']) ?>" placeholder="#000">
</p>
<p id="caption-opacity">
	<label><?php _e('Opacity', 'mbg')?></label>
	<input type="number" name="mbg[caption][opacity]" value="<?php echo esc_attr($gallery['caption']['opacity']) ?>" placeholder="0.8" step="any">
</p>
<p id="caption-position">
	<label><?php _e('Position', 'mbg')?></label>
	<select name="mbg[caption][position]">
		<option value="fill" <?php selected($gallery['caption']['position'], 'fill')?>><?php _e('Fill', 'mbg')?></option>
		<option value="bottom" <?php selected($gallery['caption']['position'], 'bottom') ?>><?php _e('Bottom', 'mbg')?></option>
		<option value="center" <?php selected($gallery['caption']['position'], 'center') ?>><?php _e('Center', 'mbg')?></option>
	</select>
</p>
<p class="fonts">
	<label><?php _e('Caption 1 font', 'mbg')?></label>
	<select role="font" name="mbg[caption][font1][family]" data-font="<?php echo $gallery['caption']['font1']['family'] ?>">
		<option value=""><?php _e ('Default', 'mbg')?></option>
	</select>
	<select role="style" name="mbg[caption][font1][style]" data-font="<?php echo $gallery['caption']['font1']['style'] ?>">
		<option value=""><?php _e('Default', 'mbg')?></option>
	</select>
	<input type="number" name="mbg[caption][font1][size]" value="<?php echo (int)$gallery['caption']['font1']['size'] ?>">px
</p>
<p class="fonts">
	<label><?php _e('Caption 2 font', 'mbg')?></label>
	<select role="font" name="mbg[caption][font2][family]" data-font="<?php echo $gallery['caption']['font2']['family'] ?>">
		<option value=""><?php _e ('Default', 'mbg')?></option>
	</select>
	<select role="style" name="mbg[caption][font2][style]" data-font="<?php echo $gallery['caption']['font2']['style'] ?>">
		<option value=""><?php _e('Default', 'mbg')?></option>
	</select>
	<input type="number" name="mbg[caption][font2][size]" value="<?php echo (int)$gallery['caption']['font2']['size'] ?>">px
</p>

<p id="caption-align">
	<label><?php _e('Align', 'mbg')?></label>
	<select name="mbg[caption][align]">
		<option value="left" <?php selected($gallery['caption']['align'], 'left') ?>><?php _e('Left', 'mbg')?></option>
		<option value="center" <?php selected($gallery['caption']['align'], 'center') ?>><?php _e('Center', 'mbg')?></option>
		<option value="right" <?php selected($gallery['caption']['align'], 'right') ?>><?php _e('Right', 'mbg')?></option>
	</select>
</p>

<p id="caption-mode">
	<label><?php _e('Effect', 'mbg')?></label>
	<select name="mbg[caption][effect]">
		<option value="off" <?php selected($gallery['caption']['effect'], 'off') ?>><?php _e('Off', 'mbg')?></option>
		<option value="fade" <?php selected($gallery['caption']['effect'], 'fade') ?>><?php _e('Fade', 'mbg')?></option>
		<option value="slide" <?php selected($gallery['caption']['effect'], 'slide') ?>><?php _e('Slide', 'mbg')?></option>
		<option value="zoom-in" <?php selected($gallery['caption']['effect'], 'zoom-in') ?>><?php _e('Zoom in', 'mbg')?></option>
	</select>
</p>
