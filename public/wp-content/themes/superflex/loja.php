<?php 
/*
Template Name: Loja
*/

get_header();?>

<div id="pagecontent">
			<div class="breadcrumb">
						<?php phi_breadcrumbs();?>
			</div>
			<!-- TOP IMAGE OR VIDEO -->
			<?php if (have_posts()) : the_post();?>
			<?php if (get_post_meta($post->ID,'phi_imageoptions',true)== 'phi_top'):?>
			<?php insertPostImage('940','',''); ?>
			<?php endif;?>
			<?php endif; ?>
			<?php if (get_post_meta($post->ID,'phi_videooptions',true)== 'phi_full'):?>
			<?php makeVideo(get_post_meta($post->ID,'phi_videourl',true),'large','','','');?>
			<?php endif;?>
			<?php include (TEMPLATEPATH . '/sidebar2.php'); ?>
			<div class="two-third no-margin">
						<!-- Page content -->
						<?php 
									if (have_posts()) : while (have_posts()) : the_post();
									// Post video medium
									if(get_post_meta($post->ID,'phi_videooptions',true)== 'phi_medium'){
										makeVideo(get_post_meta($post->ID,'phi_videourl',true),'medium','','','');
									}
									// Post image medium
									if(has_post_thumbnail()){
									if (get_post_meta($post->ID,'phi_imageoptions',true)== 'phi_content'){
										insertPostImage('content','post',''); 
										}
									}
									endwhile; 
									endif;
									echo '<h1>'.get_the_title().'</h1>';
									the_content();
									wp_pagenavi(); 
									?>
						
							
						<!-- end page content -->
			</div>
</div>
<?php get_footer();?>