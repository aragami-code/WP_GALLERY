<p>
	<label class="wizard-label"><?php _e('LINK MODE', 'mbg')?></label>
	<select name="mbg[sources][manual][link]" id="manual-link-type" data-value="model.link">
		<option value="lightbox" <?php selected($source['link'], 'lightbox')?>><?php _e('Link to lightbox', 'mbg')?></option>
		<option value="same-window" <?php selected($source['link'], 'same-window')?>><?php _e('Link to URL (same window)', 'mbg')?></option>
		<option value="new-window" <?php selected($source['link'], 'new-window')?>><?php _e('Link to URL (new window)', 'mbg')?></option>
		<option value="no-link" <?php selected($source['link'], 'no-link')?>><?php _e('No link', 'mbg')?></option>
	</select>
</p>
<h2 id="images-header">
	<?php _e('Images', 'mbg') ?>
	<button class="button" id="add-new-image" disabled="disabled"><?php _e('Add new image', 'mbg')?></button>
</h2>
<ul id="manual-images">
		<?php $index = 1 ?>
		<?php foreach($source['images'] as $image): ?>
			<?php require(dirname(__FILE__) . '/image.php') ?>
			<?php $index++ ?>
		<?php endforeach ?>
</ul>