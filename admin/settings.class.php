<?php
class MBG_Settings{
	function __construct(){
		add_action('admin_menu', array($this, '_admin_menu'));
		add_action('admin_init', array($this, '_admin_init'));
		add_action('admin_enqueue_scripts', array($this, '_enqueue_scripts'));
	}

	function _admin_menu(){
	}

	function _admin_init(){
		$settings = array(
			'mbg_shortcode_hack' => 'intval',
			'mbg_scroll_binder' => 'stripslashes',
			'mbg_lightbox' => 'stripslashes',
			'mbg_link_rel' => 'stripslashes',
			'mbg_link_custom_attr_name' => 'stripslashes',
			'mbg_link_custom_attr_value' => 'stripslashes',
			'mbg_link_class' => 'stripslashes',
			'mbg_disable_buttons' => 'intval'
		);
		foreach($settings as $setting => $filter)
			register_setting('mbg-options', $setting, $filter);
	}

	function _enqueue_scripts(){
		global $hook_suffix;
		if ($hook_suffix != 'settings_page_mbg-options')
			return;
		wp_enqueue_style('mbg-settings',
			MBG_URL . "assets/admin/css/settings.css");
	}

	function build_option_pages(){
	?>
		<div class="wrap">
			<div class="icon32" id="icon-options-general"><br></div>
			<h2><?php _e('MB Gallery Settings', 'mbg')?></h2>
			<form method="post" action="options.php" id="mbg-settings">
				<?php settings_fields( 'mbg-options' ) ?>
				<ul>
					<li class="clear-after"><h3><?php _e('General', 'mbg') ?></h3></li>
					<li class="clear-after">
						<label class="mbg-options-label">
							<?php _e('Hide buttons at frontend', 'mbg') ?></label>
						<p class="inputs">
							<label class="checkbox-label">
								<input type="checkbox" name="mbg_disable_buttons" value="1"
									<?php echo checked(get_option('mbg_disable_buttons')) ?>>
							</label>
							<em><?php _e('This will disable the buttons appearing to the admins next to the gallery', 'mbg') ?></em>
						</p>
					</li>
					<li class="clear-after">
						<h3><?php _e('Compatibility', 'mbg')?></h3></li>
					<li class="clear-after">
						<label class="mbg-options-label"><?php _e('Use shortcode hack', 'mbg')?></label>
						<p class="inputs">
							<label class="checkbox-label">
								<input type="checkbox" name="mbg_shortcode_hack" value="1"
									<?php echo checked(get_option('mbg_shortcode_hack')) ?>>
							</label>
							<em>
								<?php _e('Try this if Awesome Gallery looks strange on your site', 'mbg') ?>
							</em>
						</p>
					</li>
					<li class="clear-after">
						<h3><?php _e('Endless scroll', 'mbg') ?></h3></li>
					<li class="clear-after">
						<label class="mbg-options-label"><?php _e('Endless scroll binder selector', 'mbg') ?></label>
						<p class="inputs">
							<input name="mbg_scroll_binder" value="<?php echo esc_attr(get_option('mbg_scroll_binder')) ?>" class="regular-text" type="text" placeholder="jQuery selector here">
							<em><?php _e('jQuery selector for your binder element if some scrolling plugin is used') ?></em>
						</p>
					</li>
				</ul>
				<?php submit_button(); ?>
			</form>
		</div>
<?php
	}
}
new MBG_Settings;
