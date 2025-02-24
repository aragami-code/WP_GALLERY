
<ul class="mbg-tabs">
	<?php foreach(mbg_get_custom_css_sections() as $name => $section): ?>
		<li><a href="#"><?php echo esc_html($name) ?></a></li>
	<?php endforeach ?>
</ul>
<ul class="mbg-panels">
	<?php foreach(mbg_get_custom_css_sections() as $name => $section): ?>
		<li>
			<?php foreach($section as $param => $data): ?>
				<?php $label = $data['title'] ?>
				<p>
					<label><?php echo esc_html($label) ?></label>
					<textarea name="mbg[custom_css][<?php echo $param ?>]" placeholder="<?php _e('color: #555', 'mbg') ?>"><?php echo esc_textarea($gallery['custom_css'][$param]) ?></textarea>
				</p>
			<?php endforeach ?>
		</li>
	<?php endforeach ?>
</ul>
<br class="clear">
