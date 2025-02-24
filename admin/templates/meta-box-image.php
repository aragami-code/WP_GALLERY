<ul class="mbg-tabs">
	<li class="mbg-current"><a href="#mbg-image-caption"><?php _e('Caption', 'mbg') ?></a></li>
	<li><a href="#mbg-image-border"><?php _e('Border', 'mbg') ?></a></li>
	<li><a href="#mbg-image-shadow"><?php _e('Shadow', 'mbg') ?></a></li>
	<li><a href="#mbg-image-effects"><?php _e('Effects', 'mbg') ?></a></li>
	<li><a href="#mbg-image-overlay"><?php _e('Overlay', 'mbg') ?></a></li>
</ul>
<ul class="mbg-panels">
	<?php foreach(array('caption', 'border', 'shadow', 'effects', 'overlay') as $panel): ?>
		<li id="mbg-image-<?php echo $panel ?>" class="<?php echo $panel == 'caption' ? 'mbg-current' : '' ?>"><?php require("meta-box-image-section-$panel.php") ?></li>
	<?php endforeach ?>
</ul>
<br class="clear">
