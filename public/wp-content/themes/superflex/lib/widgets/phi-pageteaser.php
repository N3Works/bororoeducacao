<?php
/**
 * Plugin Name: PHI Insert Page
 * Plugin URI: http://themeforest.net
 * Description: A widget that displays page content, and it's child pages.
 * Version: 0.1
 * Author: Phi - Andreas Wilthil
 * Author URI: http://themeforest.net/user/Phi - http://itworx.no - http://phiworx.com
 */

/**
 * Add function to widgets_init that'll load our widget.
 * @since 0.1
 */
add_action( 'widgets_init', 'mediabox_pageteaser_load_widgets' );

/**
 * Register our widget.
 * 'mediabox_Latestposts_Widget' is the widget class used below.
 *
 * @since 0.1
 */
function mediabox_pageteaser_load_widgets() {
	register_widget( 'Mediabox_Pageteaser_Widget' );
}

/**
 * Example Widget class.
 * This class handles everything that needs to be handled with the widget:
 * the settings, form, display, and update.  Nice!
 *
 * @since 0.1
 */
class Mediabox_Pageteaser_Widget extends WP_Widget {

	/**
	 * Widget setup.
	 */
	function Mediabox_Pageteaser_Widget() {
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'example', 'description' => __('A widget that displays page content, and child pages', 'example') );

		/* Widget control settings. */
		$control_ops = array( 'width' => 240, 'height' => 350, 'id_base' => 'mediabox-pageteaser-widget' );

		/* Create the widget. */
		$this->WP_Widget( 'mediabox-pageteaser-widget', __('PHI // INSERT PAGE', 'example'), $widget_ops, $control_ops );
	}

	/**
	 * How to display the widget on the screen.
	 */
	function widget( $args, $instance ) {
		extract( $args );

		/* Our variables from the widget settings. */
		$title = apply_filters('widget_title', $instance['title'] );
		$mypages = $instance['mypages'];
		$displaythumbnail = $instance['showthumbnail'];
		$displaysub = $instance['showsub'];
		$displaysubthumbnail = $instance['showsubthumbnail'];
		$excludepages = $instance['excludepages'];
		
		echo $before_title;
		echo $title; 
		echo $excludepages;
		echo $after_title;
		
		
		
		

		/* Before widget (defined by themes). */
		echo $before_widget;
		
		
		
		
		

		global $post;
		
				
		query_posts(array('post_type' => 'page', 'name' => $mypages));
		
		
		if (have_posts()) : while (have_posts()) : the_post();
		
		if(has_post_thumbnail() && $displaythumbnail){
			echo '<div class="alignright-nomarginbottom">';
			insertPostImage('300','','permalink');
			echo '</div>';
			}
		?>
			<h1><?php the_title();?></h1>
									
			<?php the_content();
		
			endwhile;
		
		
		
		 	// Display sub pages
		 	if($displaysub){
			echo '<div class="border-top">';
		 	query_posts(array('post_parent' => $post->ID , 'post_type' => 'page', 'orderby' => 'menu_order', 'post__not_in' => array($excludepages),'showposts' => '-1'));
		
			$count=0;
			while (have_posts()) : the_post();
			$excerpt = get_post_meta($post->ID,'phi_customexcerpt',true);
			 
			$count++;
			if (($count % 3) == 0){$position = 'last'; $break = '<br class="break"/>';}
			else{$position =''; $break = '';}
			
			echo '<div class="one-third '.$position.'">';
			echo '<h4><a href="'.get_permalink().'">'.get_the_title().'</a></h4>';
			if(has_post_thumbnail() && $displaysubthumbnail){
			insertPostImage('featured','','permalink');
			}
			echo '<p>'.$excerpt.'</p>';
			echo '</div>'. $break;
		  			
			endwhile;
			echo '</div>';
			}
			
 			endif;
			wp_reset_query();

		 
		 echo $after_widget;}

	/**
	 * Update the widget settings.
	 */
		function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Strip tags for title and name to remove HTML (important for text inputs). */
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['mypages'] = $new_instance['mypages'];
		$instance['showthumbnail'] = ( isset( $new_instance['displaythumbnail'] ) ? 1 : 0 );
		$instance['showsub'] = ( isset( $new_instance['displaysub'] ) ? 1 : 0 );
		$instance['showsubthumbnail'] = ( isset( $new_instance['displaysubthumbnail'] ) ? 1 : 0 );
		$instance['excludepages'] = strip_tags( $new_instance['excludepages'] );
					
		return $instance;
	}

	/**
	 * Displays the widget settings controls on the widget panel.
	 * Make use of the get_field_id() and get_field_name() function
	 * when creating your form elements. This handles the confusing stuff.
	 */
	function form( $instance ) {

		/* Set up some default widget settings. */
		
		$defaults = array( 'title' => __('Page title', 'example') );
		$instance = wp_parse_args( (array) $instance, $defaults ); 
?>
<!-- Widget Title: Text Input -->
<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>">
						<?php _e('Title:', 'hybrid'); ?>
			</label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:200px;" />
</p>
<p>
		
		
			<!-- Get page -->
			<label for="<?php echo $this->get_field_id( 'mypages' ); ?>">Pages:</label>
			<select name="<?php echo $this->get_field_name('mypages' ); ?>" id="<?php echo $this->get_field_id( 'mypages' ); ?>" style="width:200px;">
			
			<option>Please Select</option>
			<?php 
			
			$pages = get_pages();
			$phi_getpages = array();
			foreach ($pages as $page ) {
			?>
			<option <?php if ($page->post_ID = $page->post_name == $instance['mypages']) echo 'selected="selected"'; ?>
			value="<?php echo  $page->post_ID = $page->post_name; ?>">
			<?php echo $page->post_ID = $page->post_name; ?>
			</option>	
			<?php } ?>
			</select>
			</p>
			
			<p>
			<input class="checkbox" type="checkbox" <?php checked( $instance['showthumbnail'], true ); ?> id="<?php echo $this->get_field_id( 'displaythumbnail' ); ?>" name="<?php echo $this->get_field_name( 'displaythumbnail' ); ?>" />
			<label for="<?php echo $this->get_field_id( 'displaythumbnail' ); ?>">
						<?php _e('Display thumbnail', 'example'); ?>
			</label>
			</p>
			
			<p>
			<input class="checkbox" type="checkbox" <?php checked( $instance['showsub'], true ); ?> id="<?php echo $this->get_field_id( 'displaysub' ); ?>" name="<?php echo $this->get_field_name( 'displaysub' ); ?>" />
			<label for="<?php echo $this->get_field_id( 'displaysub' ); ?>">
						<?php _e('Display sub pages', 'example'); ?>
			</label>
			</p>
			
			<p>
			<input class="checkbox" type="checkbox" <?php checked( $instance['showsubthumbnail'], true ); ?> id="<?php echo $this->get_field_id( 'displaysubthumbnail' ); ?>" name="<?php echo $this->get_field_name( 'displaysubthumbnail' ); ?>" />
			<label for="<?php echo $this->get_field_id( 'displaysubthumbnail' ); ?>">
						<?php _e('Display thumbnail on sub pages', 'example'); ?>
			</label>
			</p>
			
			<p>
			<label for="<?php echo $this->get_field_id( 'excludepages' ); ?>">
						<?php _e('Exclude sub pages: Page ID. Separate with commas', 'hybrid'); ?>
			</label>
			<input id="<?php echo $this->get_field_id( 'excludepages' ); ?>" name="<?php echo $this->get_field_name( 'excludepages' ); ?>" value="<?php echo $instance['excludepages']; ?>" style="width:200px;" />
</p>





<?php
	}
}

?>
