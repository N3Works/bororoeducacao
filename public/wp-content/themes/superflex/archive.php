<?php get_header();?>

<div id="pagecontent">
			<div class="breadcrumb">
						<?php phi_breadcrumbs();?>
			</div>
			
			
			<?php get_sidebar();?>
			<div class="two-third no-margin">
			<!-- TOP IMAGE OR VIDEO -->
			
			
						
						<?php
						$pager = get_option(phi_blog_pager);
						query_posts($query_string."&posts_per_page=$pager");
						
						
						if (have_posts()): while (have_posts()) : the_post(); 

global $post;
global $more;    // Declare global $more (before the loop).
$more = 0; 




						?>
						
						<div class="post">
												
												

												<div class="post-image">
															<?php 
															
															if (get_post_meta($post->ID,'phi_blog_video',true)){
															makeVideo(get_post_meta($post->ID,'phi_videourl',true),'small','','','');
															}
															
															else{
																
																insertPostImage('blog','','permalink');
																}
																				
															?>
														
															
												</div>
												<div class="post-info">
															<div class="meta">
																		<?php if($hideauthor == false):?>
																		<?php echo get_option('phi_trans_postedby');?>
																		<?php the_author();?>
																		<?php echo get_option('phi_trans_postedon');?>
																		<?php endif;?>
																		
																		<?php if($hidepublishdate == false):?>
																		
																		<?php the_time('F j, Y');?>
																		<?php endif;?>
																		
																		
																		<?php if($hidecategories == false):?>
																		<?php echo get_option('phi_trans_incategory');?>
																		<?php the_category('  |  ') ?>
																		<?php endif;?>
															</div>
															<h2>
																		<?php the_title();?>
															</h2>
															<?php if($usecontent == false):?>
															<?php the_excerpt();?>
															<?php else:?>
															<?php the_content('');?>
															<?php endif;?>
															
															<a href="<?php the_permalink();?>"><?php echo get_option('phi_trans_readmore');?></a> </div>
									</div>
									<?php
									
									endwhile;
						endif;
						wp_pagenavi();	
						wp_reset_query();
						?>
			</div>
</div>
<?php get_footer();?>