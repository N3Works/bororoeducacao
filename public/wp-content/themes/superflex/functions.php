<?php


if ( function_exists( 'add_image_size' ) ){
add_theme_support( 'post-thumbnails' );
}
// Create thumbnails

set_post_thumbnail_size( 300, get_option('phi_blog_image_height'), true ); // Normal post thumbnails

if ( function_exists( 'add_image_size' ) ){
add_image_size( '48', 48, 48, true ); // Micro thumbnail size
add_image_size( '100', 100, 100, true ); // Small thumbnail size
add_image_size( '460', 460, get_option('phi_2col_image_height'), true ); // Thumbnail for 2 column layout 
add_image_size( '300', 300, get_option('phi_3col_image_height'), true ); // Thumbnail for 3 column layout 
add_image_size( '220', 220, get_option('phi_4col_image_height'), true ); // Thumbnail for 4 column layout 
add_image_size( '172', 172, get_option('phi_5col_image_height'), true ); // Thumbnail for 5 column layout 
add_image_size( 'featured', 300, get_option('phi_home_thumbnail'), true ); // Featured thumbnail size
add_image_size( 'blog', 300,150, true ); // Blog thumbnail size
add_image_size( 'slider', 640, get_option('phi_slider_image_height'), true ); // Slideshow thumbnail size
add_image_size( '620',620, get_option('phi_post_image_height'), true ); // Post/page thumbnail size
add_image_size( '940', 940, get_option('phi_post_large_image_height'), true ); // Fullsize thumbnail size
}


// Load theme content install script
require_once(TEMPLATEPATH.'/lib/functions/setup.php');

// Install content

// Initial install on activation

//update_option('installStatus','uninstalled');

add_option('installStatus', 'uninstalled');

if(get_option('installStatus')=='uninstalled'){
	content_install();
	update_option('installStatus','installed');
	
}


add_option('calibra_theme_status', 'uninstalled');

if(get_option('calibra_theme_activated')=='install'){
	content_install();
	update_option('calibra_theme_activated', '');
}

elseif(get_option('calibra_theme_activated')== 'uninstall'){
	content_reset();
}



include(TEMPLATEPATH.'/lib/includes/vars.php');
// Register widgets
include(TEMPLATEPATH . '/lib/functions/registerWidgets.php');

// Load theme post-types
require_once(TEMPLATEPATH.'/lib/functions/post-types.php');

// Load theme options panel
include(TEMPLATEPATH . '/lib/admin/index.php');


// Load meta panels
include(TEMPLATEPATH . '/lib/includes/video_meta.php');
include(TEMPLATEPATH . '/lib/includes/page_meta.php');
include(TEMPLATEPATH . '/lib/includes/post-meta.php');

// Load widgets/plugins
include(TEMPLATEPATH . '/lib/widgets/phi-pageteaser.php');
include(TEMPLATEPATH . '/lib/widgets/phi-latestposts.php');
include(TEMPLATEPATH . '/lib/widgets/phi-subpagelist.php');

// Load shortcodes
include(TEMPLATEPATH . '/lib/functions/shortcodes.php');

// Load functions
include(TEMPLATEPATH . '/lib/functions/wp-pagenavi.php');
//include(TEMPLATEPATH . '/lib/functions/wp-pagenavi-return.php');

// Add WP3 nav menus
add_theme_support( 'nav-menus' );

// This theme uses wp_nav_menu() in two locations.
register_nav_menu('primary', 'Primary navigation');
register_nav_menu('shortcuts', 'Shortcut navigation');
register_nav_menu('footer', 'Footer navigation');






// Define Folder Constants
define('UBERGEIST_SCRIPTS_FOLDER', get_bloginfo('template_url') . '/lib/scripts');

function ubergeist_image_resize($width,$height,$img_url) {
	global $blog_id;
	

	// Get image-quality settings from theme options

	$imageQuality = 70;
	
	
	
	$image['url'] = $img_url;
	$image_path = explode($_SERVER['SERVER_NAME'], $image['url']);
	$image_path = $_SERVER['DOCUMENT_ROOT'] . $image_path[1];
	$image_info = @getimagesize($image_path);

	// If we cannot get the image locally, try for an external URL
	if (!$image_info)
		$image_info = @getimagesize($image['url']);

	$image['width'] = $image_info[0];
	$image['height'] = $image_info[1];
	if($img_url != "" && ($image['width'] != $width || $image['height'] != $height || !isset($image['width']))){
		
		//If WP MU
		if ( (defined('WP_ALLOW_MULTISITE')) && (WP_ALLOW_MULTISITE == true) ) {
			$the_image_src = $img_url;
			if (isset($blog_id) && $blog_id > 0) {
				$image_parts = explode('/files/', $the_image_src);
				if (isset($image_parts[1])) {
					$the_image_src = '/blogs.dir/' . $blog_id . '/files/' . $image_parts[1];
					
				}
			}
		
			$img_url = UBERGEIST_SCRIPTS_FOLDER."/timthumb.php?src=$the_image_src&amp;w=$width&amp;h=$height&amp;zc=1&amp;q=$imageQuality";
		}else{
			$img_url = UBERGEIST_SCRIPTS_FOLDER."/timthumb.php?src=$img_url&amp;w=$width&amp;h=$height&amp;zc=1&amp;q=$imageQuality";	
		}
	}
	
	return $img_url;
}


function insertPostImage($size,$type,$link){

global $post;

$imagesize = $size;
$pagetype = $type;
$link = $link;


$video = get_post_meta($post->ID,'phi_lightbox_image',true);
$featuredimage  = wp_get_attachment_image_src(get_post_thumbnail_id(), '');
$image = $featuredimage[0];

if($video){
	$largeimage = $video;
}
else{
	$largeimage = $image;
	}


if($link == 'prettyPhoto'){
	$linkstring = $largeimage.'" rel="prettyPhoto[gall]';
	}

elseif($link == 'permalink'){
	$linkstring = get_permalink();
}
else{
	$linkstring = $link;
	}		



		if(has_post_thumbnail() || $customimage){
		
			
					if($imagesize == 'featured'){
						if(get_option('phi_resize')== 'timthumb'){
						echo '<div class="image-wrap"><a href="'.$linkstring.'"><img src="'.ubergeist_image_resize(300,get_option('phi_home_thumbnail'),$image).'" alt=""/></a></div>';
						}
						elseif(get_option('phi_resize')== 'wordpress'){
						echo '<div class="image-wrap"><a href="'.$linkstring.'">'.get_the_post_thumbnail($post->ID,$imagesize).'</a></div>';
						}
					}
					
					
					
						
					if($imagesize == 'blog'){
						if(get_option('phi_resize')== 'timthumb'){
						echo '<div class="image-wrap"><a href="'.$linkstring.'"><img src="'.ubergeist_image_resize(300,get_option('phi_blog_image_height'),$image).'" alt=""/></a></div>';
						}
						elseif(get_option('phi_resize')== 'wordpress'){
						echo '<div class="image-wrap"><a href="'.$linkstring.'">'.get_the_post_thumbnail($post->ID,$imagesize).'</a></div>';
						}
					}
						
					
					
					if($imagesize == '940'){
						if(get_option('phi_resize')== 'timthumb'){
						echo '<div class="image-wrap-large"><img src="'.ubergeist_image_resize(940,get_option('phi_post_large_image_height'),$image).'" alt=""/></div>';
						}
						elseif(get_option('phi_resize')== 'wordpress'){
						echo '<div class="image-wrap-large"><a href="'.$linkstring.'">'.get_the_post_thumbnail($post->ID,$imagesize).'</a></div>';
						}
					}
					
					if($imagesize == 'slider'){
						if(get_option('phi_resize')== 'timthumb'){
						echo '<div class="image-wrap-large"><img src="'.ubergeist_image_resize(640,get_option('phi_slider_image_height'),$image).'" alt=""/></div>';
						}
						elseif(get_option('phi_resize')== 'wordpress'){
						echo '<div class="image-wrap"><a href="'.$linkstring.'">'.get_the_post_thumbnail($post->ID,$imagesize).'</a></div>';
						}
					}
						
						
					if($imagesize == '620'){
						if(get_option('phi_resize')== 'timthumb'){
						echo '<div class="image-wrap-large"><a href="'.get_permalink().'"><img src="'.ubergeist_image_resize(620,get_option('phi_post_image_height'),$image).'" alt=""/></a></div>';
						}
						elseif(get_option('phi_resize')== 'wordpress'){
						echo '<div class="image-wrap-large"><a href="'.$linkstring.'">'.get_the_post_thumbnail($post->ID,$imagesize).'</a></div>';
						}
					}
						
								
					if($imagesize == '100'){
						if(get_option('phi_resize')== 'timthumb'){
						echo '<div class="image-wrap-large"><a href="'.get_permalink().'"><img src="'.ubergeist_image_resize(100,100,$image).'" alt=""/></a></div>';
						}
						elseif(get_option('phi_resize')== 'wordpress'){
						echo '<div class="image-wrap"><a href="'.$linkstring.'">'.get_the_post_thumbnail($post->ID,$imagesize).'</a></div>';
						}				
					}	
						
					if($imagesize == '48'){
						if(get_option('phi_resize')== 'timthumb'){
						echo '<div class="image-wrap-large"><a href="'.get_permalink().'"><img src="'.ubergeist_image_resize(48,48,$image).'" alt=""/></a></div>';
						}
						elseif(get_option('phi_resize')== 'wordpress'){
						echo '<div class="image-wrap"><a href="'.$linkstring.'">'.get_the_post_thumbnail($post->ID,$imagesize).'</a></div>';
					}
				}
		}
}



function featuredPage($pageposts){
	
	global $post;
	$counter = 0;

foreach ($pageposts as $post):
	
$excerpt = get_post_meta($post->ID,'phi_customexcerpt',true);
$counter ++;
$image = wp_get_attachment_image_src(get_post_thumbnail_id(), '');

?>

<div class="one-third-teaser <?php if (($counter % 3)==0){echo 'last';}?>">
			<?php insertPostImage('300','','');?>
			<div class="info">
						<h3>
									<?php the_title();?>
						</h3>
						<p style="text-align:justify;"><?php echo $excerpt;?></p>
			</div>
</div>
<?php if (($counter % 3)==0){echo '</div><div class="teaser-slide">';}?>
<?php endforeach; }
						



function getImage($num) {
global $more;
$more = 1;
$link = get_permalink();
$content = get_the_content();
$count = substr_count($content, '<img');
$start = 0;
for($i=1;$i<=$count;$i++) {
$imgBeg = strpos($content, '<img', $start);
$post = substr($content, $imgBeg);
$imgEnd = strpos($post, '>');
$postOutput = substr($post, 0, $imgEnd+1);
$postOutput = preg_replace('/width="([0-9]*)" height="([0-9]*)"/', '',$postOutput);;
$image[$i] = $postOutput;
$start=$imgEnd+1;
}
if(stristr($image[$num],'<img')) { echo '<a href="'.$link.'">'.$image[$num]."</a>"; }
$more = 0;
}



// get all of the images attached to the current post
function phi_get_images_url() {
	global $post;

	$photos = get_children( array('post_parent' => $post->ID, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => 'ASC', 'orderby' => 'menu_order ID') );

	$results = array();

	if ($photos) {
		foreach ($photos as $photo) {
			// get the correct image html for the selected size
		
			$results[] = wp_get_attachment_url($photo->ID);
			//$image_url[] = apply_filters('the_title', $photo->post_title);
			
			
		}
	}
	
	return $results;
	
}




// INSERT GALLERY

function insertGallery($columns,$per_page,$page_id){
global $post;
$columns = $columns;
$maximum = $maximum -1;
$per_page = $per_page;
$page_id = $page_id;

if($page_id != 'none'){$my_page_id = $page_id;}
else{$my_page_id = get_the_ID();}

if ($columns == 2){$imagewidth = 460; $imageheight = get_option('phi_2col_image_height'); $divclass = 'one-half'; $imagewrap = 'image-wrap';}
if ($columns == 3){$imagewidth = 300; $imageheight = get_option('phi_3col_image_height'); $divclass = 'one-third'; $imagewrap = 'image-wrap';}
if ($columns == 4){$imagewidth = 220; $imageheight = get_option('phi_4col_image_height'); $divclass = 'one-fourth'; $imagewrap = 'image-wrap';}
if ($columns == 5){$imagewidth = 172; $imageheight = get_option('phi_5col_image_height'); $divclass = 'one-fifth'; $imagewrap = 'image-wrap';}

	
if ( $images = get_children(array(
		'post_parent' => $my_page_id,
		'post_type' => 'attachment',
		'post_mime_type' => 'image',
		'orderby' => 'menu_order ID',
		'order' => 'DESC',
	))) : 
	
		foreach( $images as $image ) : 
		$largephotos[]= wp_get_attachment_url($image->ID, 'large');
		$smallphotos[]= wp_get_attachment_image($image->ID, $imagewidth);
		endforeach; 
		endif;
		
//$smallphotos = phi_get_images($imagewidth);
									
$count = count($largephotos);

$wrapheight = ($per_page/$columns)*($imageheight+20);
$galleryString;
$galleryString .= '<div id="gallerycycle" class="module" style="overflow:hidden; height:'.$wrapheight.'px"><div class="galleryslide">';

$i=0;

while ($i < $count){
$i++;														
$a = $i - 1;
														
if(($i % $columns) == 0){$position = 'last'; }
elseif (($i % $columns) != 0){$position = ''; }
															
$galleryString;
$galleryString .=	 '<div class="'.$divclass.' portfolio '.$position.'" >';
$galleryString .=	 '<div class="'.$imagewrap.'">';
$galleryString .=	 '<a href="'.$largephotos[$a].'" rel="prettyPhoto[gall]"><span class="zoom"></span>';

if(get_option('phi_resize')== 'timthumb'){
$galleryString.= '<img src="'.ubergeist_image_resize($imagewidth,$imageheight,$largephotos[$a]).'" height="'.$imageheight.'" alt="" />'; 
}
elseif(get_option('phi_resize')== 'wordpress'){
$galleryString.= $smallphotos[$a]; 
}
$galleryString .=	 '</a></div>';
$galleryString .=	 '</div>';

//if(($i % ($maximum + 1)) == 0 && $i != $count){
if(($i % $per_page) == 0 && $i<$count){
	$galleryString .= '</div><div class="galleryslide">'; // Inserts new galleryslide for every X entries
	}
}


$galleryString .= '</div></div>';
if($count > $per_page):
$galleryString.='<div class="bolk-wrapper">
<a href="#"><span id="prev-gallery" class="prev-bolk"></span></a>
<a href="#"><span id="next-gallery" class="next-bolk"></span></a>
</div>';

endif;

return $galleryString;
}


function phi_get_images($size) {
	global $post;

	$photos = get_children( array('post_parent' => $post->ID, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => 'ASC', 'orderby' => 'menu_order ID') );

	$results = array();

	if ($photos) {
		foreach ($photos as $photo) {
			// get the correct image html for the selected size
			$results[] = wp_get_attachment_image($photo->ID, $size);
			
			
			
		}
	}

	return $results;
	
}

// INSERT GALLERY SLIDER

function insertGallerySlider($page_id){
global $post;

$page_id = $page_id;

$imagewidth = 940; 
$imageheight = get_option('phi_gallery_slider_image_height'); 


if($page_id != 'none'){$my_page_id = $page_id;}
else{$my_page_id = get_the_ID();}

if ( $images = get_children(array(
		'post_parent' => $my_page_id,
		'post_type' => 'attachment',
		'post_mime_type' => 'image',
		'orderby' => 'menu_order ID',
		'order' => 'DESC',
	))) : 
	
		foreach( $images as $image ) : 
		$largephotos[]= wp_get_attachment_url($image->ID, 'large');
		$smallphotos[]= wp_get_attachment_image($image->ID, $imagewidth);
		endforeach; 
		endif;
	
						

$galleryString;
$galleryString .= '<div id="gallerycycle" class="module" style="height:'.$imageheight.'px;"><div class="galleryslide">';

$i=0;

$count = count($largephotos);

while ($i < $count){
$i++;	
$a = $i - 1;
$galleryString;
$galleryString .=	 '<div class="image-wrap portfolio">';
$galleryString .=	 '<a href="'.$largephotos[$a].'" rel="prettyPhoto[gall]"><span class="zoom"></span>';

if(get_option('phi_resize')== 'timthumb'){
$galleryString.= '<img src="'.ubergeist_image_resize($imagewidth,$imageheight,$largephotos[$a]).'"  alt="" height="'.$imageheight.'"  />'; 
}
elseif(get_option('phi_resize')== 'wordpress'){
$galleryString.= $smallphotos[$a]; 
}


$galleryString.= '</a>';
$galleryString .=	 '</div>';


if($i < $count){

	$galleryString .= '</div><div class="galleryslide">'; // Inserts new galleryslide for every X entries
	}
	
	
	
}


$galleryString .= '</div>';
$galleryString.='</div>';

$galleryString.='<div class="bolk-wrapper">
<a href="#"><span id="prev-gallery" class="prev-bolk"></span></a>
<a href="#"><span id="next-gallery" class="next-bolk"></span></a>
</div>';


return $galleryString;
}








function relatedPosts(){
global $post;
$tags = wp_get_post_tags($post->ID);
if ($tags) {
	$tag_ids = array();
	foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;

	$args=array(
		'tag__in' => $tag_ids,
		'post__not_in' => array($post->ID),
		'showposts'=>5, // Number of related posts that will be shown.
		'caller_get_posts'=>1
	);
	
	$my_query = new wp_query($args);
	if( $my_query->have_posts() ) {
		
		echo '<h3>Related Posts</h3><div style="float:left; margin-bottom:30px;">';
		
			
		while ($my_query->have_posts()) {
		
		$my_query->the_post();	
		
		?>
<div class="archive-list">
			<?php 
															
															
														
															if(has_post_thumbnail()){
																echo '<div class="post-image">';
																insertPostImage('100','','');
																echo '</div>';
																}
																				
															?>
			<div class="post-info">
						<h3>
									<?php the_title();?>
						</h3>
						<div class="meta">
									<?php if($hideauthor == false):?>
									<?php echo get_option('phi_trans_postedby');?>
									<?php the_author();?>
									<?php endif;?>
									<?php if($hidepublishdate == false):?>
									<?php echo get_option('phi_trans_postedon');?>
									<?php the_time('F j, Y');?>
									<?php endif;?>
									<?php if($hidecategories == false):?>
									<?php echo get_option('phi_trans_incategory');?>
									<?php the_category('  |  ') ?>
									<?php endif;?>
						</div>
						<?php if($usecontent == false):?>
						<?php the_excerpt();?>
						<?php else:?>
						<?php the_content('');?>
						<?php endif;?>
						<a href="<?php the_permalink();?>"><?php echo get_option('phi_trans_readmore');?></a> </div>
</div>
<?php
		}
		wp_reset_query();
		echo '</div>';
		
		
	}
	
}
}

function authorBox(){

// If a user has filled out their description, show a bio on their entries.
if ( get_the_author_meta( 'description' ) ) : ?>
<div style="margin-top:30px;">
			<h3>About the author</h3>
			<div class="author-box">
						<div class="author-avatar"> <?php echo get_avatar( get_the_author_meta( 'user_email' )); ?> </div>
						<!-- #author-avatar -->
						<div class="author-description">
									<p>
												<?php the_author_meta( 'description' ); ?>
									</p>
						</div>
						<!-- #author-description	-->
			</div>
</div>
<!-- #entry-author-info -->
<?php	endif; 

}

function phi_comments($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
			<div id="comment-<?php comment_ID(); ?>" class="single-comment">
						<div class="comment-author vcard"> <?php echo get_avatar($comment,$size='48',$default='<path_to_url>' ); ?> <?php printf(__('<cite class="fn">%s</cite> <span class="says">'.get_option('phi_trans_says').'</span>'), get_comment_author_link()) ?> </div>
						<div class="comment-meta commentmetadata">
									<?php if ($comment->comment_approved == '0') : ?>
									<em><?php echo get_option('phi_trans_awaitingmoderation');?></em> <br />
									<?php endif; ?>
									<a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php printf(__('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?></a>
									<?php edit_comment_link(__(get_option('phi_trans_edit')),'  ','') ?>
									<?php comment_text() ?>
									<?php comment_reply_link(array_merge( $args, array('reply_text' => get_option('phi_trans_reply'),'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
						</div>
			</div>
			<?php  }
			


// BREADCRUMB SCRIPT

/* Breadcrumb */
function phi_breadcrumbs() {
	
	if(get_option('phi_breadcrumb')==false){
		
	echo '<div id="breadcrumb">';
	
 	if(get_option(phi_breadcrumb)==false){
	$delimiter = ' / ';
	
	$name = get_option('phi_trans_home');
	
	if ( !is_home() || !is_front_page() || is_paged() ) {
		global $post;
		$home = get_bloginfo('url');
		echo get_option('phi_trans_breadcrumb').' '.'<a href="' . $home . '">' . $name . '</a> ' . $delimiter . ' ';
 
		if ( is_category() ) {
			global $wp_query;
			$cat_obj = $wp_query->get_queried_object();
			$thisCat = $cat_obj->term_id;
			$thisCat = get_category($thisCat);
			$parentCat = get_category($thisCat->parent);
			if ($thisCat->parent != 0) echo(get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' '));
			echo 'Archive by category &#39;';
			single_cat_title();
			echo '&#39;';
 
		} elseif ( is_day() ) {
    	echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
    	echo '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
    	echo get_the_time('d');
 
		} elseif ( is_month() ) {
    	echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
    	echo get_the_time('F');
 
		} elseif ( is_year() ) {
    	echo get_the_time('Y');
 
		} elseif ( is_single() ) {
			$cat = get_the_category(); $cat = $cat[0];
			if($cat!=''){
			echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
			}
			
			the_title();
 
		} 
			
		
			elseif ( is_page() && !$post->post_parent ) {
			the_title();
 
		} elseif ( is_page() && $post->post_parent ) {
			$parent_id  = $post->post_parent;
			$breadcrumbs = array();
			while ($parent_id) {
				$page = get_page($parent_id);
				$breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
				$parent_id  = $page->post_parent;
			}
			$breadcrumbs = array_reverse($breadcrumbs);
			foreach ($breadcrumbs as $crumb) echo $crumb . ' ' . $delimiter . ' ';
			the_title();
 
		} elseif ( is_search() ) {
			echo 'Search results for &#39;' . get_search_query() . '&#39;';
 
		} elseif ( is_tag() ) {
			echo 'Posts tagged &#39;';
			single_tag_title();
			echo '&#39;';
 
		} elseif ( is_author() ) {
	 		global $author;
			$userdata = get_userdata($author);
			echo 'Articles posted by ' . $userdata->display_name;
		}
 
		if ( get_query_var('paged') ) {
			if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
			echo __('Page') . ' ' . get_query_var('paged');
			if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
		}
 
	}
}
echo '</div>';
}

}







// Install settings
if(get_option('setupComplete')!='complete'){
			setupOptions();
			update_option('setupComplete','complete');
	}

function setupOptions(){
				update_option("posts_per_page",1);
				
				// GLOBAL SETTINGS
				update_option( 'phi_logo_url', get_bloginfo('template_directory').'/lib/img/content/logo.png','','yes'  );
				update_option('phi_credits','Copyright 2010 - Itworx Studios. All rights reserved.');
				update_option( 'phi_footer', true );
				
				// HOME PAGE
				update_option( 'phi_home_module_1', '/lib/includes/slideshow.php' );
				update_option( 'phi_home_slider_effect', 'fade' );
				update_option( 'phi_home_slider_timeout', '15000' );
				update_option( 'phi_home_blog_pager','8');
				
				
				
				// BLOG PAGE
				update_option('phi_blog_pager','8');
				
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
				
				
				update_option( 'phi_slider_image_height', '400' );
				update_option( 'phi_blog_image_height', '200' );
				update_option( 'phi_post_image_height', '200' );
				update_option( 'phi_post_large_image_height', '400' );
				update_option( 'phi_5col_image_height', '112' );
				update_option( 'phi_4col_image_height', '136' );
				update_option( 'phi_3col_image_height', '176' );
				update_option( 'phi_2col_image_height', '260' );
				update_option( 'phi_gallery_slider_image_height', '400' );
				
				
				
				
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
?>
