<?php get_header();?>

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
			<?php get_sidebar();?>
			<div class="two-third no-margin">
						<!-- Page content -->
						<?php 
									
									// Post video medium
									if(get_post_meta($post->ID,'phi_videooptions',true)== 'phi_medium'){
										makeVideo(get_post_meta($post->ID,'phi_videourl',true),'medium','','','');
									}
									
									// Post image medium
									
									if (get_post_meta($post->ID,'phi_imageoptions',true)== 'phi_content'){
										insertPostImage('620','','prettyPhoto'); 
										}
									
									
									echo '<h1>'.get_the_title().'</h1>';
									the_content();
									wp_pagenavi(); 
									
											if (get_option('phi_display_authorbox')==true){
												authorBox();
												}
				
			
											if (get_option('phi_display_related')==true){
											relatedPosts();
											}

										
									comments_template(); 
									
									
									
									?>
						
							
						<!-- end page content -->
			</div>
</div>
<?php get_footer();?>