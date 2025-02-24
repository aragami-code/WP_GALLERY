<li class="image">
	<h3>
		<span class="handle"></span>
		<span class="heading"><?php echo esc_html(trim($image['title']) ? trim($image['title']) : "Image $index") ?></span>
	</h3>
	<div class="image-content">
		<div class="section">
			<label class="huge"><?php _e('Image', 'mbg')?></label>
			<div class="columns-2">
				<div class="column">
					<div class="field">
						<label><?php _e('Main image', 'mbg')?></label>
						<div class="image-selector no-image mbg-manual-main-image">
							<input name="mbg[sources][manual][images][<?php echo $index ?>][image]" value="<?php echo $image['image'] ?>" type="hidden">
							<?php if ($image['image']): ?>
								<img src="<?php echo esc_url(mbg_get_wp_image_src($image['image'])) ?>">
							<?php endif ?>
							<div class="overlay"></div>
							<div class="actions-wrapper">
								<button class="select-image button "><?php _e('Select image', 'mbg')?></button>
								<br>
								<a href="#" class="image-delete"><?php _e('Remove image', 'mbg')?></a>
							</div>
						</div>
					</div>
				</div>
				<div class="column">
					<div class="field">
						<label><?php _e('Title', 'mbg')?></label>
						<input type="text" name="mbg[sources][manual][images][<?php echo $index ?>][title]" value="<?php echo esc_attr($image['title']) ?>" class="full-width title">
					</div>
					<div class="field">
						<label><?php _e('Description', 'mbg')?></label>
						<textarea name="mbg[sources][manual][images][<?php echo $index ?>][description]" class="full-width description"><?php echo esc_textarea($image['description'])?></textarea>
					</div>
					<div class="field">
						<label><?php _e('Link URL', 'mbg')?></label>
						<input type="text" name="mbg[sources][manual][images][<?php echo $index ?>][url]" value="<?php echo esc_attr($image['url']) ?>" class="full-width">
					</div>
					<div class="field">
						<label><?php _e('Tags (comma-separated)', 'mbg')?></label>
						<input type="text" name="mbg[sources][manual][images][<?php echo $index ?>][tags]" value="<?php echo esc_attr($image['tags']) ?>" class="full-width">
					</div>
				</div>
			</div>
			<br class="clear">
		</div>
		<div class="section collapsed">
			<label class="huge"><?php _e('Lightbox')?></label>
			<div class="columns-2">
				<div class="column">
					<div class="field">
						<label><?php _e('Lightbox image (leave empty for video or google map)', 'mbg')?></label>
						<div class="image-selector no-image mbg-manual-lightbox-image">
							<input name="mbg[sources][manual][images][<?php echo $index ?>][lightbox][image]" value="<?php echo $image['lightbox']['image'] ?>" type="hidden">
							<?php if ($image['lightbox']['image']): ?>
								<img src="<?php echo esc_attr(mbg_get_wp_image_src($image['lightbox']['image'])) ?>">
							<?php endif ?>
							<div class="overlay"></div>
							<div class="actions-wrapper">
								<button class="select-image button "><?php _e('Select image', 'mbg')?></button>
								<br>
								<a href="#" class="image-delete"><?php _e('Remove image', 'mbg')?></a>
							</div>
						</div>
					</div>
				</div>
				<div class="column">
					<div class="field">
						<label><?php _e('Title', 'mbg')?></label>
						<input type="text" name="mbg[sources][manual][images][<?php echo $index ?>][lightbox][title]" value="<?php echo esc_attr($image['lightbox']['title']) ?>" class="full-width mbg-lightbox-title">
					</div>
					<div class="field">
						<label><?php _e('Description', 'mbg')?></label>
						<textarea name="mbg[sources][manual][images][<?php echo $index ?>][lightbox][description]" class="full-width mbg-lightbox-description"><?php echo esc_textarea($image['lightbox']['description'])?></textarea>
					</div>
				</div>
			</div>
			<br class="clear">
		</div>
		<div class="section submitdiv">
			<a href="#" class="cell-cancel"><?php echo _e('Cancel', 'mbg')?></a>
			<span class="separator">|</span>
			<a href="#" class="cell-delete"><?php echo _e('Remove', 'mbg')?></a>
		</div>
	</div>
</li>
