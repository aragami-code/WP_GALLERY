<input type="hidden" id="mbg-hack" name="mbg-hack" />
<?php global $mbg_source_editors ?>

<a href="edit.php?post_type=mb-gallery&amp;page=support&amp;url=<?php echo  urlencode(home_url() . $_SERVER['REQUEST_URI']) ?>" target="_blank" class="button-primary" id="support"><?php _e('Support', 'mbg')?></a>
<a href="options-general.php?page=mbg-options" class="button" id="settings" target="_blank"><?php _e('Global settings', 'mbg') ?></a>
<?php if ($post->post_status == 'publish'): ?>
	<div id="shortcode">
		<label><?php _e('Shortcode', 'mbg') ?>:</label> [mb-gallery id=<?php echo $post->ID?>]
	</div>
<?php endif ?>
<br class="clear"/>
<h2 class="nav-tab-wrapper" id="sources-tabs">
	<?php foreach($mbg_source_editors as $slug => $source): ?>
	<a href="#<?php echo esc_attr($source->slug) ?>" id="source-<?php echo esc_attr($source->slug) ?>-tab" class="nav-tab <?php echo $gallery['source'] == $source->slug ? 'nav-tab-active' : '' ?>"><?php echo esc_html($source->name) ?></a>
	<?php endforeach ?>
</h2>
<input id="current-source" type="hidden" value="<?php echo $gallery['source'] ?>" name="mbg[source]">
<div id="sources">
<?php foreach($mbg_source_editors as $slug => $source): ?>
	<div class="source <?php echo $gallery['source'] == $source->slug ? 'source-settings-active' : '' ?>" id="source-<?php echo $source->slug?>-settings">
		<?php $source->render_editor_tab($gallery['sources'][$source->slug]) ?>
	</div>
<?php endforeach ?>
</div>
