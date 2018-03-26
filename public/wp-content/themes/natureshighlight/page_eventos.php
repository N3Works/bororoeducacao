<?php   
/* 
Template Name: page_eventos
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
</div>	<?php $page = (get_query_var('paged')) ? get_query_var('paged') : 1; query_posts("showposts=5&cat=10&paged=$page"); while ( have_posts() ) : the_post() ?>

			<div class="post" id="post-<?php the_ID(); ?>">

			<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>
			<small>por <?php the_author() ?> ~ <?php the_time('j \d\e F \d\e Y') ?> <?php edit_post_link('(editar)'); ?></small>
				
			<div class="entry">
				            <?php if( get_post_meta($post->ID, "hpbottom", true) ): ?>
		</br><a href="<?php the_permalink() ?>" rel="bookmark"><img style="float:left;margin:0px 10px 0px 0px; border: 3px #CCCCCC solid;" src="<?php echo get_post_meta($post->ID, "hpbottom", true); ?>" alt="<?php the_title(); ?>" /></a>
        <?php else: ?>
				   	<?php endif; ?>
			<?php if(is_category() || is_archive()) {
     the_excerpt(__('Veja Mais »'));
 } else {
     the_content();
 } ?><div style="clear:both;"></div>
			<p><div align="right"><b><a href="<?php the_permalink() ?>" rel="bookmark">Veja mais</a></b></div></p>

			</div>
		
			<p class="postmetadata"><?php if(function_exists("the_tags")) the_tags('Tagged: ', ', ', '<br/>'); ?>Arquivado em: <?php the_category(', ') ?> :: <?php comments_popup_link('Seja o primeiro a comentar', '1 Comentário', '% Comentários'); ?><br/><?php if(function_exists('wp_print')) { print_link(); } ?> <?php if(function_exists('wp_email')) {email_link(); } ?></p>
			</div>
	
								

			<?php endwhile; ?>

			

			<p><?php posts_nav_link(); ?></p>
</div>


<?php get_footer(); ?>