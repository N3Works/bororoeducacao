<?php get_header(); ?>
<?php get_sidebar(); ?>
	
	<div id="content">
		<?php if (have_posts()) : ?>
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
			<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
			 
			<?php /* If this is a category archive */ if (is_category()) { ?>				
			<h2 class="archivetitle">Categoria '<?php echo single_cat_title(); ?>'</h2>
			
			<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
			<h2 class="archivetitle">Archive for <?php the_time('F jS, Y'); ?></h2>
			
			<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
			<h2 class="archivetitle">Archive for <?php the_time('F, Y'); ?></h2>
	
			<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
			<h2 class="archivetitle">Archive for <?php the_time('Y'); ?></h2>
			
			<?php /* If this is a search */ } elseif (is_search()) { ?>
			<h2 class="archivetitle">Search Results</h2>
			
			<?php /* If this is an author archive */ } elseif (is_author()) { ?>
			<h2 class="archivetitle">Author Archive</h2>
	
			<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
			<h2 class="archivetitle">Blog Archive</h2>

		<?php } ?>

		<?php while (have_posts()) : the_post(); ?>
		<div class="post">
			<h2 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>
			<small><?php the_time('j \d\e F \d\e Y') ?></small>
				
			<div class="entry">
				<?php the_content('Continue lendo &raquo;'); ?>
			</div>
		
			<p class="postmetadata">Arquivado em: <?php the_category(', ') ?> <strong>|</strong> <?php edit_post_link('Editar','','<strong>|</strong>'); ?>  <?php comments_popup_link('Nenhum Comentário &#187;', '1 Comentário &#187;', '% Comentários &#187;'); ?></p> 

		</div>
	
		<?php endwhile; ?>

		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; Artigos Anteriores') ?></div>
			<div class="alignright"><?php previous_posts_link('Próximos Artigos &raquo;') ?></div>
		</div>
	
	<?php else : ?>

		<h2>Não encontrado</h2>
		<?php include (TEMPLATEPATH . '/searchform.php'); ?>
	<?php endif; ?>
		
	</div>


<?php get_footer(); ?>