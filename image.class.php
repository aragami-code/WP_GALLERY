<?php

class MBG_Image extends MBG_VisualElement {
	var $url;
	var $thumbnail_url;
	var $width;
	var $height;

	var $caption_1;
	var $caption_2;
	var $tags;
	var $link_url;
	var $slug;
	var $meta;

	var $lightbox_url;
	var $lightbox_caption_1;
	var $lightbox_caption_2;
	var $link_attr = array();
	var $options;
	// WP Attachment ID when available
	var $attachment_id;

}
