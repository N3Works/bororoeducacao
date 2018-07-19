<?php 
/*
Template Name: Full width page
*/

get_header();?>
						<div id="pagecontent">
						<div class="breadcrumb"> <?php phi_breadcrumbs();?></div>
							<!-- TOP IMAGE OR VIDEO -->
						<?php while (have_posts()) : the_post();?>
						<?php if (get_post_meta($post->ID,'phi_imageoptions',true)== 'phi_top'):?>
						<?php insertPostImage('top','post'); ?>
						<?php endif;?>
						<?php endwhile; ?>
						<?php if (get_post_meta($post->ID,'phi_videooptions',true)== 'phi_full'):?>
						<?php makeVideo(get_post_meta($post->ID,'phi_videourl',true),'large','','','');?>
						<?php endif;?>
							
						
						
																
									
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
			<?php get_footer();?>