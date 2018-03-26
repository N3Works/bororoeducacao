<?php get_header(); ?>
<?php get_sidebar(); ?>
	
<div id="content">
<div class="breadcrumb">
<?php if (class_exists('bcn_breadcrumb'))
{
// New breadcrumb object
$mybreadcrumb = new bcn_breadcrumb;
// Assemble the breadcrumb
$mybreadcrumb->assemble();
// Display the breadcrumb
$mybreadcrumb->display();
} ?>
<h5><br />
  Agenda Bororó25</h5>
</div>	<?php $page = (get_query_var('paged')) ? get_query_var('paged') : 1; query_posts("showposts=10&cat=21&paged=$page"); while ( have_posts() ) : the_post() ?>

			<div class="post" id="post-<?php the_ID(); ?>">

			
			<div class="entry">
				            <?php if( get_post_meta($post->ID, "hpbottom", true) ): ?>
		<a href="<?php the_permalink() ?>" rel="bookmark"><img style="float:left;margin:0px 10px 0px 0px; border: 3px #CCCCCC solid;" src="<?php echo get_post_meta($post->ID, "hpbottom", true); ?>" alt="<?php the_title(); ?>" /></a>
        <?php else: ?>
				   	<?php endif; ?>
			<?php the_time('d/m/Y') ?> - <strong><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></strong><?php
the_excerpt(__('Veja Mais »'));?><div style="clear:both;"></div>
			<div align="right"><b><a href="<?php the_permalink() ?>" rel="bookmark">Veja mais</a></b></div>

			</div>
		
	
			</div>
	
								

  <?php endwhile; ?>
            </div>


<?php get_footer(); ?>