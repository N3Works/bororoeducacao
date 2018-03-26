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
</div>	<?php if (have_posts()) : ?>
	<?php while (have_posts()) : the_post(); ?>
	<?php if (in_category(1)) continue; ?>
					
		<div class="post" id="post-<?php the_ID(); ?>">

			<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>
			<small>por <?php the_author() ?> ~ <?php the_time('j \d\e F \d\e Y') ?> <?php edit_post_link('(editar)'); ?></small>
				
			<div class="entry">
				<?php the_content('Continue lendo &raquo;'); ?>
			</div>
		
			<p class="postmetadata"><?php if(function_exists("the_tags")) the_tags('Tagged: ', ', ', '<br/>'); ?>Arquivado em: <?php the_category(', ') ?> :: <?php comments_popup_link('Seja o primeiro a comentar', '1 Comentário', '% Comentários'); ?><br/><?php if(function_exists('wp_print')) { print_link(); } ?> <?php if(function_exists('wp_email')) {email_link(); } ?></p>
			</div>
	
		<?php endwhile; ?>

			<div class="navigation">
				<?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } else { ?>

        <div class="alignleft"><?php next_posts_link('&laquo; Artigos Anteriores') ?></div>
        <div class="alignright"><?php previous_posts_link('Próximos Artigos &raquo;') ?></div>
        <?php } ?>
			</div>
    <?php else : ?>

		<h2>Não Encontrado</h2>
		<p>O que você está procurando não foi encontrado.</p>
		<?php include (TEMPLATEPATH . "/searchform.php"); ?>

	<?php endif; ?>
	
</div>



<?php get_footer(); ?>