<?php
class MBG_Manual_Source_Editor extends MBG_Source_Editor{
	public $slug = 'manual';
	public $name = 'Manual';
	public $js_editor = 'manualSource';



	function get_defaults(){
		return array(
			'images' => array(),
			'link' => 'lightbox',
			'lightbox' => array()
		);
	}

	function get_image_defaults(){
		return array(
			'title' => '',
			'lightbox' => array('title' => '', 'description' => '', 'image' => '', 'enable' => ''),
			'description' => '',
			'image' => '',
			'url' => '',
			'tags' => ''
		);
	}

	function render_editor_invisibles(){
		echo '<div id="manual-source-image-template">';
		$image = $this->get_image_defaults();
		$index = 0;
		require(dirname(__FILE__) . '/image.php');
		echo "</div>";
	}

}

global $mbg_source_editors;
$mbg_source_editors['manual'] = new MBG_Manual_Source_Editor;
