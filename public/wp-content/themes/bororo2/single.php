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
  	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="post" id="post-<?php the_ID(); ?>">
		<div class="clear"></div>
			<h2><a href="<?php echo get_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
			<small>por <?php the_author() ?> ~ <?php the_time('j \d\e F \d\e Y') ?>. Arquivado em: <?php the_category(', ') ?>. <?php edit_post_link('(editar)'); ?></small>
	
			<div class="entry">
				<?php the_content('<p>Continue lendo &raquo;</p>'); ?>
			</div>
		</div>
		
		<?php comments_template(); ?>

	<?php endwhile; else: ?>
	
	<p>Desculpe, nenhum artigo encontrado para sua busca.</p>
	
	<?php endif; ?>
	
	</div>

<?php get_footer(); ?>
