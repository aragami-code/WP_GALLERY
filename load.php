<?php
require(MBG_PATH . "visual-element.class.php");
require(MBG_PATH . "image.class.php");
require(MBG_PATH . 'integration.php');
require(MBG_PATH . 'source.class.php');
require(MBG_PATH . 'gallery.class.php');
require(MBG_PATH . 'sources/load.php');
require(MBG_PATH . 'admin/source-editor.class.php');
require(MBG_PATH . "sources/load-editors.php");
require(MBG_PATH . 'shortcodes.php');
require(MBG_PATH . 'widgets.php');
if (is_admin()){
	require('admin/load.php');
} else {
}
