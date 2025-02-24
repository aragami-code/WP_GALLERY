<?php
class MBG_GalleryList {
	function __construct(){
		add_action('init', array($this, '_init'));
	}

	function _init(){
		if (is_admin()){
			wp_enqueue_style('mbg-admin', MBG_URL . "assets/admin/css/admin.css");
		}
	}
}

new MBG_GalleryList;