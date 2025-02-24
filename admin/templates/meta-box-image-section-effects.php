<p>
	<label><?php _e('Image blur', 'mbg') ?></label>
	<select name="mbg[image][blur]">
		<option value="off"  <?php selected($gallery['image']['blur'], 'off') ?>>
			<?php _e('Off', 'mbg') ?>
		</option>
		<option value="on-hover"  <?php selected($gallery['image']['blur'], 'on-hover') ?>>
			<?php _e('On-hover', 'mbg') ?>
		</option>
		<option value="off-hover"  <?php selected($gallery['image']['blur'], 'off-hover') ?>>
			<?php _e('Off-hover', 'mbg') ?>
		</option>
	</select>
	<small><?php _e('Excluding IE10', 'mbg') ?></small>
</p>
<p>
	<label><?php _e('Black & white', 'mbg') ?></label>
	<select name="mbg[image][bw]">
		<option value="off"  <?php selected($gallery['image']['bw'], 'off') ?>><?php _e('Off', 'mbg') ?></option>
		<option value="on" <?php selected($gallery['image']['bw'], 'on') ?>><?php _e('On', 'mbg') ?></option>
		<option value="on-hover"  <?php selected($gallery['image']['bw'], 'on-hover') ?>><?php _e('On-hover', 'mbg') ?></option>
		<option value="off-hover"  <?php selected($gallery['image']['bw'], 'off-hover') ?>>
			<?php _e('Off-hover', 'mbg') ?>
		</option>
	</select>
	<small><?php _e('Excluding IE10', 'mbg') ?></small>
</p>
