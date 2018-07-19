<!-- FEATURED BLOCK - BIG SLIDER-->

<div id="feature" class="module">

<?php		
global $post;
$ihSlide = get_option('phi_slide_image_height');

       	


query_posts(array('post_type' => 'phislide', 'showposts' => '-1'));

if (have_posts()): while (have_posts()) : the_post(); 		
						
						$content = get_the_content();
						$content = apply_filters('the_content', $content);
						$content = str_replace(']]>', ']]&gt;', $content);
						$slideurl = get_post_meta($post->ID,'phi_customurl',true);
						$slideurlname = get_post_meta($post->ID,'phi_customurlname',true);
												
?>
			<div class="slider-full">
						<div class="image">
									<?php insertPostImage('slider','',$slideurl);?>
									<span class="prev-slide"></span>
									<span class="next-slide"></span>
						</div>
						<div class="info">
									
									<?php echo $content;?>
									
									<?php if($slideurl):?>
									<div class="caption"><a href="<?php echo $slideurl;?>"><span><?php echo $slideurlname;?></span></a></div>
									<?php endif;?>
						</div>
			</div>
			<?php endwhile; ?>
			<?php endif; ?>
			<?php wp_reset_query();?>
</div>
<!-- / FEATURED BLOCK -->
