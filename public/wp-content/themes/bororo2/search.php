<?php get_header(); ?>
<?php get_sidebar(); ?>
	
	<div id="content">
	<?php if (have_posts()) : ?>

		<h2>Resultado da Busca</h2>
		
		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; Anteriores') ?></div>
			<div class="alignright"><?php previous_posts_link(' &raquo;') ?></div>
		</div>


		<?php while (have_posts()) : the_post(); ?>	
			<div class="post">
				<h3 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h3>
				<small><?php the_time('j \d\e F \d\e Y') ?></small>
				
				<div class="entry">
					<?php the_excerpt() ?>
				</div>
		
				<p class="postmetadata">Arquivado em: <?php the_category(', ') ?> <strong>|</strong> <?php edit_post_link('Editar','','<strong>|</strong>'); ?>  <?php comments_popup_link('Nenhum comentário &#187;', '1 Comentário &#187;', '% Comentários &#187;'); ?></p>
			</div>
	
		<?php endwhile; ?>

		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; Anteriores') ?></div>
			<div class="alignright"><?php previous_posts_link('Próximas &raquo;') ?></div>
		</div>
	
	<?php else : ?>

		<h2>Não encontrado</h2>
		
	<?php endif; ?>
		
	</div>


<?php get_footer(); ?>