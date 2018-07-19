
<div class="inner">

<div id="teaser-cycle" >
<div class="teaser-slide">
			
<?php		
	
global $post;

$querystr = "
SELECT wposts.*
FROM $wpdb->posts wposts, $wpdb->postmeta wpostmeta
WHERE wposts.ID = wpostmeta.post_id 
AND wpostmeta.meta_key = 'phi_featured_page'
AND wposts.post_status = 'publish' 
AND wposts.post_type = 'page' 
ORDER BY wposts.menu_order asc
";						
	
$pageposts = $wpdb->get_results($querystr, OBJECT);

if ($pageposts):
$counter = 0;
foreach ($pageposts as $post): 
$counter ++;
setup_postdata($post);
$excerpt = get_post_meta($post->ID,'phi_customexcerpt',true);
$image = wp_get_attachment_image_src(get_post_thumbnail_id(), '');
?>
		
		<div class="one-third-teaser <?php if (($counter % 3)==0){echo 'last';}?>">
				<?php insertPostImage('300','','');?>
				<div class="info">
					<h3><?php the_title();?></h3>
					<p><?php echo $excerpt;?></p>
				</div>
		</div>
						<?php if (($counter % 3)==0){echo '</div><div class="teaser-slide">';}?>
								
						<?php 
						
						endforeach;
						endif;?>
	</div>
</div>

<?php if($counter > 3):?>
<div class="bolk-wrapper">
<a href="#"><span id="prev-teaser" class="prev-bolk"></span></a>
<a href="#"><span id="next-teaser" class="next-bolk"></span></a>
</div>
<?php endif;?>
</div>
	


