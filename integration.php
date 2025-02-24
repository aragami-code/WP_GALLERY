<?php
class MBG_Integration {
	function __construct(){
		add_action('init', array($this, '_register_post_types'));
		add_action('admin_print_scripts-post.php', array($this, '_enqueue_scripts'), 99);
		add_action('admin_print_scripts-post-new.php', array($this, '_enqueue_scripts'), 99);
		if (!is_admin()){
			add_action('wp_enqueue_scripts', array($this, '_enqueue_scripts'), 99);
		}
	}
	function _register_post_types(){
		register_post_type(MBG_POST_TYPE, array(
			'label' => __('MB Gallery', 'mbg'),
			'labels' => array(
				'add_new' => __('Add new gallery', 'mbg'),
				'add_new_item' => __('Add new gallery', 'mbg'),
				'edit_item' => __('Edit gallery', 'mbg'),
				'search_items' => __('Search gallery', 'mbg'),
				'not_found' => __('No galleries yet', 'mbg')

			),
			'public' => false,
			'show_ui' => true,
			'supports' => array('title')
		));
	}

	function _enqueue_scripts(){
		global $wp_scripts;
		if (is_admin())
			return;
		mbg_enqueue_styles();
	}
}
new MBG_Integration;
