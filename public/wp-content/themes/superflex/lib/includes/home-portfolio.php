
<div class="module">
			<div class="caption"><span>See some of our latest work</span> </div>
			<br class="break"/>
			<?php		
	
global $post;
query_posts("$post_type='phiportfolio'&posts_per_page=8");
$counter = 0;

if (have_posts()): while (have_posts()) : the_post(); 

$counter ++;

$excerpt = get_post_meta($post->ID,'phi_customexcerpt',true);
$image = wp_get_attachment_image_src(get_post_thumbnail_id(), '');
?>
			<div class="one-fourth portfolio <?php if (($counter % 4)==0){echo 'last';}?>">
						<?php insertPostImage('220','','');?>
						<div class="info">
									<h4>
												<?php the_title();?>
									</h4>
									<p><?php echo $excerpt;?></p>
						</div>
			</div>
			 <?php if (($counter % 4)==0){echo '<br class="break"/>';}?>
			<?php endwhile; endif;?>
			<?php wp_reset_query();?>
</div>
