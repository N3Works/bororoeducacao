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
  Últimas Notícias</h5>
</div>

<?php $page = (get_query_var('paged')) ? get_query_var('paged') : 1; query_posts("showposts=1&cat=21&paged=$page"); while ( have_posts() ) : the_post() ?>

			<div class="post" id="post-<?php the_ID(); ?>">

			
			<div class="entry">
				            <?php if( get_post_meta($post->ID, "hpbottom", true) ): ?>
		<a href="<?php the_permalink() ?>" rel="bookmark"><img style="float:left;margin:0px 10px 0px 0px; border: 3px #CCCCCC solid;" src="<?php echo get_post_meta($post->ID, "hpbottom", true); ?>" alt="<?php the_title(); ?>" /></a>
        <?php else: ?>
				   	<?php endif; ?>
			<div style="font-size:20px;"><?php the_time('d/m/Y') ?> - <strong><a href="<?php the_permalink() ?>" rel="bookmark" style="font-size:20px; color:#528795;" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></strong></div><?php
the_excerpt(__('Veja Mais »'));?><div style="clear:both;"></div>
			<div align="right"><b><a href="<?php the_permalink() ?>" rel="bookmark">Veja mais</a></b></div>

			</div>
		
	
			</div>
	
								

  <?php endwhile; ?>
  
  <div style="padding-top:6px; background-image:url(<?php bloginfo('template_directory'); ?>/images/divisao2.gif); background-repeat:no-repeat; background-position:bottom; padding-bottom:20px;">
  <?php $page = (get_query_var('paged')) ? get_query_var('paged') : 1; query_posts("showposts=3&cat=21&paged=$page&offset=1"); while ( have_posts() ) : the_post() ?>

			<div class="post2" id="post-<?php the_ID(); ?>">

			
			<div class="entry">
				            <?php the_time('d/m/Y') ?> - <strong><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></strong><div style="clear:both;"></div>

			</div>
		
	
			</div>
	
								

  <?php endwhile; ?>
  	</div>
    
  					<div class="quemsomos">
                    <h5>Quem Somos</h5>
                   <p>Estamos situados na Vila Assunção, em Porto Alegre, rodeados por uma natureza generosa que nos abriga à sombra de uma figueira. Aconchegados entre mantas e poltronas, chás e cafés, salgadinhos e biscoitos, aprendemos a utilizar conceitos fundamentais para o bem viver e o método Curação. </p>
                    <p>As responsáveis pela criação do Espaço Terapêutico Bororó25 são as irmãs Christiane Ganzo e Denise Aerts. Christiane é psico-analista e Denise é médica, terapeuta familiar com experiência acadêmica. Juntas consolidaram, em 2007, o Espaço Terapêutico Bororó25, com a proposta de subverter a filosofia platônica, questionar a ética do poder e os desígnios da moral, convidando para a desinstalação do sofrimento, da arrogância e da culpa. </p>
					</div>
            </div>


<?php get_footer(); ?>