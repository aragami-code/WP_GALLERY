<?php /*
Plugin Name: Gallery 
Description: Its help you to make awesome photo galery.
Author: Mage NGOUMA TIMOTHEE FREDY
Version: 1.0
*/

require_once(ABSPATH . "/wp-admin/includes/plugin.php");
load_plugin_textdomain('mbg', false, dirname(plugin_basename(__FILE__)) . '/languages/');
$mbg_plugin_data = get_plugin_data(__FILE__);
define('MBG_VERSION', $mbg_plugin_data['Version']);

define('MBG_REQUIRED_WP', '3.7');
define('MBG_MAIN', __FILE__);
define('MBG_PATH', dirname(__FILE__) . "/");
define('MBG_URL', trailingslashit(plugins_url(basename(dirname(__FILE__)))));
define('MBG_TIMTHUMB_URL', MBG_URL . "resize.php");
define('MBG_POST_TYPE', 'mb-gallery');
define('MBG_CONFIG', 'mbg-config.php');
define('MBG_CACHE_DIR', 'mb-gallery-cache');

//define('ASG_NO_CACHE', true);
//define('ASG_NO_BACKUP', true);
//require(ASG_PATH . "constants.php");
require(MBG_PATH . 'functions.php');
require(MBG_PATH . 'admin/support.class.php');
require(MBG_PATH . 'admin/environment.class.php');
global $mbg_envrironment;
global $mbg_source_editors;
global $mbg_sources;

$mbg_environment = new MBG_Environment();
$mbg_source_editors = array();
$mbg_sources = array();

if (!defined('MBG_MAX_IMAGES'))
	define('MBG_MAX_IMAGES', 500);

if ($mbg_environment->load_requirements_met()){
	require(MBG_PATH . 'load.php');
	if (is_admin()){
		new MB_Updater_2_0(
				'',
				'mb-gallery',
				plugin_basename(MBG_MAIN));
	}

}
