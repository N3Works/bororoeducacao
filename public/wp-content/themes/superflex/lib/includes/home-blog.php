			<div class="module">
			<?php if(is_home() ):?>
			<div class="caption"><span>Not&iacute;cias</span></div>
			<br class="break"/>
			<?php endif;?>
			
			<?php get_sidebar();?>
			<div class="two-third no-margin">
			<h1>
									<?php if(is_tag()):?>
									Tag:
									<?php single_tag_title(); ?>
									<?php elseif(is_category()):?>
									<?php single_cat_title(); ?>
									<?php elseif(is_archive()):?>
									<?php $prefix = ' '; echo single_month_title( $prefix, $display ); ?>
									<?php elseif(is_search()):?>
									Search Result for
									<?php /* Search Count */ $allsearch = &new WP_Query("s=$s&showposts=-1"); $key = wp_specialchars($s, 1); $count = $allsearch->post_count; _e(''); _e(''); echo $key; _e(''); _e(' - '); echo $count . ' '; _e('articles'); wp_reset_query(); ?>
									
									<?php endif;?>
						</h1>
			
						<!--<div id="content-default">-->
<?php	
global $post;

if(is_archive() || is_tag() || is_category()){
	
	$page = (get_query_var('paged')) ? get_query_var('paged') : 1;
	query_posts($query_string."&posts_per_page=$pager");
	
	
}

if(is_search()){
	
	$page = (get_query_var('paged')) ? get_query_var('paged') : 1;
	$s = get_query_var('s');
	query_posts("s=$s&paged=$page&showposts=-1");
	
	
	
	
}

else{
	$pager = get_option(phi_home_blog_pager);
	$query_string ="showposts=$pager&paged=$paged";
	query_posts($query_string);
}
if ( is_home() ) {
query_posts($query_string . '&cat=-48');
}
if (have_posts()): while (have_posts()) : the_post(); 

global $post;
global $more;    // Declare global $more (before the loop).
$more = 0; 
?>									
									<?php if(!is_search()):?>	
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
									
									<?php elseif(is_search()):?>
									<div class="archive-list">
												
												
																													
															
												
												<div class="post-info"  style="width:620px;">
													
															<h2>
																		<?php the_title();?>
															</h2>
									
															
															
															<?php 
															if(has_excerpt()){
															the_excerpt();
															}
															?>
															
															<a href="<?php the_permalink();?>"><?php echo get_option('phi_trans_readmore');?></a> 
														</div>
															
															
									</div>
									
									
									<?php endif;?>
									<?php 
						
						endwhile;
						endif;
						wp_pagenavi();	
						wp_reset_query();?>
						</div>
			</div>

