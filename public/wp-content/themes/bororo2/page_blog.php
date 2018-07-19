<?php   
/* 
Template Name: page_blog
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
</div>	<?php $page = (get_query_var('paged')) ? get_query_var('paged') : 1; query_posts('cat=1,3,7'); while ( have_posts() ) : the_post() ?>

			<div class="post" id="post-<?php the_ID(); ?>">

			<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>
			<small>por <?php the_author() ?> ~ <?php the_time('j \d\e F \d\e Y') ?> <?php edit_post_link('(editar)'); ?></small>
				
			<div class="entry">
				<?php the_content('Continue lendo &raquo;'); ?>
			</div>
		
			<p class="postmetadata"><?php if(function_exists("the_tags")) the_tags('Tagged: ', ', ', '<br/>'); ?>Arquivado em: <?php the_category(', ') ?> :: <?php comments_popup_link('Seja o primeiro a comentar', '1 Comentário', '% Comentários'); ?><br/><?php if(function_exists('wp_print')) { print_link(); } ?> <?php if(function_exists('wp_email')) {email_link(); } ?></p>
			</div>
	
								

			<?php endwhile; ?>

			

			<p><?php posts_nav_link(); ?></p>
</div>


<?php get_footer(); ?>