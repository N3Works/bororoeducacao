<?php   
/* 
Template Name: page_artigos
*/  
?>  
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
</div>	
<div class="titulo"><h2>Artigos</h2></div>
<?php $page = (get_query_var('paged')) ? get_query_var('paged') : 1; query_posts('cat=48'); while ( have_posts() ) : the_post() ?>

			<div class="post" id="post-<?php the_ID(); ?>">

		
			<div class="entry">
<div style="font-size:16px; padding-top:15px;"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></div><?php the_excerpt(); ?> 

			<div style="padding-left:364px; text-align:right;"><b><a href="<?php the_permalink() ?>" rel="bookmark">Leia mais</a></b></div>			</div>
		
			</div>
	
								

			<?php endwhile; ?>

			

			<div style="text-align:center; padding-top:10px; padding-bottom:10px;"><?php wp_pagenavi(); ?></div>
</div>


<?php get_footer(); ?>