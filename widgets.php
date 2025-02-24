<?php
class MBG_Widget extends WP_Widget{
	function __construct() {
		$widget_ops = array('classname' => 'widget_mb_gallery', 'description' => __('MB Gallery',
			'mbg'));
		parent::__construct('mb_gallery', __('MB Gallery', 'mb_gallery'), $widget_ops);
	}

	function widget( $args, $instance ) {
		extract($args);
		$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );
		echo $before_widget;
		if ( !empty( $title ) ) { echo $before_title . $title . $after_title; };
		echo mb_gallery($instance['id']);
		echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['id'] = (int)$new_instance['id'];
		return $instance;
	}

	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'id' => '' ) );
		$title = strip_tags($instance['title']);
		?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>
		<p>
			<label for="<?php echo $this->get_field_id('id') ?>"><?php _e('Gallery', 'gallery')?>:</label>
			<select name="<?php echo $this->get_field_name('id') ?>" id="<?php echo $this->get_field_id('id')?>">
				<?php foreach(get_posts('post_type=' . MBG_POST_TYPE . '&posts_per_page=-1') as $grid): ?>
					<option value="<?php echo $grid->ID ?>" <?php selected($grid->ID, $instance['id'])?>><?php echo $grid->ID ?>: <?php echo esc_html($grid->post_title)?></option>
				<?php endforeach ?>
			</select>
		</p>
	<?php
	}
}

add_action('widgets_init', 'mb_gallery_widgets_init');
function mb_gallery_widgets_init(){
	register_widget('MBG_Widget');
}

?>
