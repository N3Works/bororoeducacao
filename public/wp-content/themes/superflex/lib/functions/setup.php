<?php

function content_install() {
	
	global $user_ID;
			
	update_option('calibra_theme_status', 'installed' );
	
	$menu_id = wp_create_nav_menu( 'primary' );
	$theme = get_current_theme();
	$mods = get_option("mods_$theme");
	$key = key($mods['nav_menu_locations']);
	$mods['nav_menu_locations'][$key] = $menu_id;
	update_option("mods_$theme", $mods);
	
	$menu_id2 = wp_create_nav_menu( 'shortcuts' );
	$theme2 = get_current_theme();
	$mods2 = get_option("mods_$theme2");
	$key2 = key($mods2['nav_menu_locations']);
	$mods2['nav_menu_locations'][$key2] = $menu_id2;
	update_option("mods_$theme2", $mods2);
	
	$menu_id3 = wp_create_nav_menu( 'footer' );
	$theme3 = get_current_theme();
	$mods3 = get_option("mods_$theme3");
	$key3 = key($mods3['nav_menu_locations']);
	$mods3['nav_menu_locations'][$key3] = $menu_id3;
	update_option("mods_$theme3", $mods3);
	
	
	
	// Create shortcuts-menu top level item
	wp_update_nav_menu_item(
	$menu_id2,
	0,
	array(
			'menu-item-title' => 'Shortcuts',
			'menu-item-type' => 'custom',
			'menu-item-classes' => '',
			'menu-item-url' => '#',
			'menu-item-position' => 0,
			'menu-item-status' => 'publish')
			 );

			
			
	// -------------------------------------------------------------------------------------------------
	// Create pages
			
			
	// Page content
			
	$homecontent ='<h2>Welcome to Phoenix</h2><p><strong>Take a look at some of the theme-features:</strong></p>
				<ul><li><a href="#">Great shortcodes</a></li>
				<li><a href="#">Custom widgets</a></li>
				<li><a href="#">Many video options</a></li>
				<li><a href="#">Custom post types</a></li>
				<li><a href="#">Extensive documentation</a></li>
				</ul>
				<h6>For more extensive in-depth theme info, please check out the theme <a href="#">documentation</a>.</h6>
				';
				
			$loremipsum = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed porta porttitor massa, ut feugiat ipsum consequat id. Nunc arcu magna, hendrerit vel imperdiet id, adipiscing sit amet nisi. Phasellus pellentesque egestas turpis a porttitor. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Etiam nec nibh vel tellus viverra ultricies. Etiam non nulla nulla. Vivamus tincidunt sem vel leo posuere pretium. Fusce a nunc nibh. Aenean aliquet mattis elit nec laoreet. Vestibulum consequat lorem et est pretium mattis aliquam felis tristique. Quisque nec turpis arcu. Ut et dui nisi, sed blandit ligula. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.

Vestibulum a urna eget augue gravida elementum ut non erat. Integer est nibh, faucibus eget egestas vel, porta a lorem. Fusce viverra luctus tellus, quis eleifend diam egestas sagittis. Praesent adipiscing gravida nibh, ut malesuada purus dignissim et. Nam purus nisl, porttitor quis dapibus vel, vulputate a metus. Nullam sollicitudin risus a felis dignissim pretium. Proin nec dui vitae velit ultricies eleifend. Vivamus consequat, orci id vehicula semper, nisi neque porta nibh, rutrum eleifend turpis massa nec quam. Quisque facilisis vulputate molestie. Quisque nec dui sit amet lorem ornare ultrices. Sed vulputate arcu massa, a ornare ipsum.';

			$home_main_excerpt = '<b>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque nisl mauris, venenatis vel placerat in, aliquet et dui. Nunc lacus erat, ultricies convallis adipiscing ac, mattis vitae elit.</b><br/><br/> Pellentesque pharetra, magna nec interdum euismod, lectus purus dapibus ligula, ut feugiat ipsum libero id massa.';
			
			$slidecontent = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque nisl mauris, venenatis vel placerat in, aliquet et dui. Nunc lacus erat, ultricies convallis adipiscing ac, mattis vitae elit';
			
			
				
				// Blog page
				
				$blog_id = wp_insert_post(array(
						
						'post_title' => 'Blog', 
						'post_type' => 'page',
						'post_status' => 'publish',
						'post_author' => $user_ID,
						'post_parent' => 0,
						'post_content' => '',
						
						
						)
					);
				
				update_post_meta($blog_id, '_wp_page_template', 'blog.php');
			
				
				// Contact page
				
				$contact_id = wp_insert_post(array(
						
						'post_title' => 'Contact', 
						'post_type' => 'page',
						'post_status' => 'publish',
						'post_author' => $user_ID,
						'post_parent' => 0,
						'post_content' => '[contactform]'
						)
					);
				update_post_meta($contact_id, "phi_customtitle", "Contact us");
				update_post_meta($contact_id, "phi_customexcerpt", "This is a contact page. Contactform added with shortcode");
				
				
				
				// -------------------------------------------------------------------------------------------------
				// Populate menus
			
						
				
				// Blog page menu item
				
				wp_update_nav_menu_item(
				$menu_id,
				0,
				array(
						 'menu-item-title' => 'Blog',
						 'menu-item-type' => 'post_type',
						 'menu-item-object' => 'page',
						 'menu-item-object-id' => $blog_id,
						 'menu-item-position' => 1,
						 'menu-item-status' => 'publish')
						
					  );
				

				// Contact page menu item

				wp_update_nav_menu_item(
				$menu_id,
				0,
				array(
						 'menu-item-title' => 'Contact',
						 'menu-item-type' => 'post_type',
						 'menu-item-object' => 'page',
						 'menu-item-object-id' => $contact_id,
						 'menu-item-position' => 2,
						 'menu-item-status' => 'publish')
						
					  );
				} 
				
				
				function siteSettings(){
		
				// -------------------------------------------------------------------------------------
				// SITE SETTINGS	
			 				
				update_option( 'phi_logo_url', get_bloginfo('template_directory').'/lib/img/shared/logo.png','','yes' );
				
				update_option("posts_per_page",1);
				update_option("phi_resize",'wordpress');
				
				
				update_option('phi_credits','Copyright 2010 - Itworx Studios. All rights reserved.');
				
				
				// HOME PAGE
				update_option( 'phi_home_module_1', '/lib/includes/slideshow.php' );
				update_option( 'phi_disable_accordion', true );
				update_option( 'phi_slideshow', 'cycle' );
				update_option( 'phi_slider_effect', 'fade' );
				update_option( 'phi_slider_timeout', '5' );
				update_option( 'phi_home_center', $home_main_id );
				
				
				// BLOG PAGE
				update_option('phi_blog_pager','4');
				
				// PORTFOLIO PAGE
				update_option('phi_thumbnail_click','lightbox');
				
				// SOCIAL MEDIA
				update_option( 'phi_smi_image_1', get_bloginfo('template_directory').'/lib/img/icons/facebook.png','','yes' );
				update_option( 'phi_smi_url_1', '#' );
				update_option( 'phi_smi_text_1', 'Facebook' );
				
				update_option( 'phi_smi_image_2', get_bloginfo('template_directory').'/lib/img/icons/blogger.png','','yes' );
				update_option( 'phi_smi_url_2', '#' );
				update_option( 'phi_smi_text_2', 'Blogger' );
				
				update_option( 'phi_smi_image_3', get_bloginfo('template_directory').'/lib/img/icons/flickr.png','','yes' );
				update_option( 'phi_smi_url_3', '#' );
				update_option( 'phi_smi_text_3', 'Flickr' );
				
				update_option( 'phi_smi_image_4', get_bloginfo('template_directory').'/lib/img/icons/linkedin.png','','yes' );
				update_option( 'phi_smi_url_4', '#' );
				update_option( 'phi_smi_text_4', 'LinkedIn' );
				
				update_option( 'phi_smi_image_5', get_bloginfo('template_directory').'/lib/img/icons/myspace.png','','yes' );
				update_option( 'phi_smi_url_5', '#' );
				update_option( 'phi_smi_text_5', 'Myspace' );
				
				update_option( 'phi_smi_image_6', get_bloginfo('template_directory').'/lib/img/icons/twitter.png','','yes' );
				update_option( 'phi_smi_url_6', '#' );
				update_option( 'phi_smi_text_6', 'Twitter' );
				
				// IMAGES
				
				update_option('phi_3col_image_height','180');
				update_option('phi_4col_image_height','150');
				update_option('phi_blog_image_height','150');
				update_option('phi_post_large_image_height','150');
				
				
				update_option( 'phi_slide_image_height', '400' );
				update_option( 'phi_blog_image_height', '200' );
				update_option( 'phi_post_image_height', '200' );
				update_option( 'phi_post_large_image_height', '400' );
				update_option( 'phi_4col_image_height', '136' );
				update_option( 'phi_3col_image_height', '176' );
				update_option( 'phi_2col_image_height', '260' );
				update_option( 'phi_featured_image_height', '90' );
				
				// STYLE AND LAYOUT
				update_option( 'phi_cufonfont', 'ptsans' );
				update_option( 'phi_titlefont', 'Tahoma, Geneva, sans serif');
				update_option( 'phi_htmlfont', 'Tahoma, Geneva, sans serif' );
				update_option( 'phi_menufont', 'Tahoma, Geneva, sans serif' );
				update_option('phi_sidebarposition', 'right');
				
				
				// *************************************************************
								
				// TRANSLATION
				update_option( 'phi_trans_home', 'Home' );
				update_option( 'phi_trans_readmore', 'Les mer' );
				
				// Blog and archive
				update_option( 'phi_trans_postedon', 'Posted on' );	
				update_option( 'phi_trans_postedby', 'by' );
				update_option( 'phi_trans_incategory', 'in ' );
				update_option( 'phi_trans_withtags', 'tags' );
				
				// Post comments
				update_option( 'phi_trans_replies', 'Replies' );
				update_option( 'phi_trans_reply', 'Reply' );
				update_option( 'phi_trans_leaveareply', 'Leave a reply' );
				update_option( 'phi_trans_leavereplyto', 'Leave a reply to' );
				update_option( 'phi_trans_youmustbeloggedin', 'You must be logged iin' );
				update_option( 'phi_trans_loggedinas', 'Logged in as' );
				update_option( 'phi_trans_logout', 'Log out' );
				update_option( 'phi_trans_oneresponse', 'One response' );
				update_option( 'phi_trans_noresponses', 'No responses' );
				update_option( 'phi_trans_responses', 'responses' );
				update_option( 'phi_trans_awaitingmoderation', 'awaiting moderation' );
							
				// Contactform
				update_option( 'phi_trans_name', 'Name' );
				update_option( 'phi_trans_nameerror', 'Please enter your name' );
				update_option( 'phi_trans_email', 'Email' );
				update_option( 'phi_trans_emailerror', 'Please enter a valid email adress' );
				update_option( 'phi_trans_telephone', 'Telephone' );
				update_option( 'phi_trans_comment', 'Comment' );
				update_option( 'phi_trans_commenterror', 'Please enter a comment' );
				update_option( 'phi_trans_receipt', 'We will be in touch soon' );
				update_option( 'phi_trans_submitcomment', 'Submit comment' );
				update_option( 'phi_trans_submitreply', 'Submit form' );
				update_option( 'phi_trans_thanks', 'Thanks' );
				update_option( 'phi_trans_message', 'Your email was successfully sent. We will be in touch soon.');
				
				// Breadcrumb
				update_option( 'phi_trans_breadcrumb', 'You are here:' );
				
				// Misc words and phrases
				update_option( 'phi_trans_to', 'to' );
				update_option( 'phi_trans_in', 'in' );
				update_option( 'phi_trans_website', 'Website' );
				update_option( 'phi_trans_edit', 'edit' );
				update_option( 'phi_trans_says', 'says' );
				update_option( 'phi_trans_required', 'required' );
				update_option( 'phi_trans_notpublished', 'Not published' );				
 }    
 
 
 function content_reset() {
	
	global $user_ID;
	global $wpdb;
	
	// Get page id by name
   $home_id = $wpdb->get_var( "SELECT ID FROM $wpdb->posts WHERE post_name = 'Home'");
	$blog_id = $wpdb->get_var( "SELECT ID FROM $wpdb->posts WHERE post_name = 'Blog'");
	$contact_id = $wpdb->get_var( "SELECT ID FROM $wpdb->posts WHERE post_name = 'Contact' ");
	$news_id = $wpdb->get_var( "SELECT ID FROM $wpdb->posts WHERE post_name = 'News' ");
	
	$news_1_id = $wpdb->get_var( "SELECT ID FROM $wpdb->posts WHERE post_name = 'Newspost-1'");
	
	$featured_1_id = $wpdb->get_var( "SELECT ID FROM $wpdb->posts WHERE post_name = 'Featured-1'");
	$featured_2_id = $wpdb->get_var( "SELECT ID FROM $wpdb->posts WHERE post_name = 'Featured-2'");
	$featured_3_id = $wpdb->get_var( "SELECT ID FROM $wpdb->posts WHERE post_name = 'Featured-3'");
	
	$slide_1_id = $wpdb->get_var( "SELECT ID FROM $wpdb->posts WHERE post_name = 'Demoslide-1'");
	$slide_2_id = $wpdb->get_var( "SELECT ID FROM $wpdb->posts WHERE post_name = 'Demoslide-2'");
	$slide_3_id = $wpdb->get_var( "SELECT ID FROM $wpdb->posts WHERE post_name = 'Demoslide-3'");
	
	$portfolio_1_id = $wpdb->get_var( "SELECT ID FROM $wpdb->posts WHERE post_name = 'Demopost-1'");
	$portfolio_2_id = $wpdb->get_var( "SELECT ID FROM $wpdb->posts WHERE post_name = 'Demopost-2'");
	
	
	//Delete the pages	
	wp_delete_post($home_id, $force_delete = true);
	wp_delete_post($blog_id, $force_delete = true);
	wp_delete_post($contact_id, $force_delete = true);
	wp_delete_post($news_id, $force_delete = true);
	wp_delete_post($news_1_id, $force_delete = true);
	
	wp_delete_post($slide_1_id, $force_delete = true);
	wp_delete_post($slide_2_id, $force_delete = true);
	wp_delete_post($slide_3_id, $force_delete = true);
	
	wp_delete_post($featured_1_id, $force_delete = true);
	wp_delete_post($featured_2_id, $force_delete = true);
	wp_delete_post($featured_3_id, $force_delete = true);
	wp_delete_post($portfolio_1_id, $force_delete = true);
	wp_delete_post($portfolio_2_id, $force_delete = true);
	
	
	$myterms = get_terms('phiportfoliocats', array('hide_empty'=>false));
				$phi_getTerms = array();
				foreach ($myterms as $term_list ) {
					$phi_getTerms [$term_list->name] = $term_list->term_id;
					
					}
	wp_delete_term( $term_list->term_id, 'phiportfolio');
	
	wp_delete_nav_menu( 'primary' );
	wp_delete_nav_menu( 'shortcuts' );
		
	update_option('calibra_theme_status', 'uninstalled' );
	update_option('calibra_theme_activated', '' );
	}
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 ?>