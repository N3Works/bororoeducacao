<?php
/**
 * @package Bororó 25
 */
?>

<?php
	global $page_;
	$postType = get_query_var( 'post_type' );
?>

<?php if ( $page_ == 1 ) : ?>
	
	<?php get_template_part( 'module', 'nav' ) ?>

<?php endif ?>

<div class="site mosaic-type intern container-fluid">
	<div class="row">
		
		<?php if ( $page_ == 1 ) : ?>

			<?php get_template_part( 'module', 'header-mobile' ) ?>
			<?php get_template_part( 'module', 'hamburger-menu' ) ?>

			<?php if ( $postType == 'veiculos' || $postType == 'tabelas' ) : ?>

				<?php get_template_part( 'module', 'list-filter-1' ) ?>

			<?php elseif ( $postType == 'projetos' || $postType == 'cases' ) : ?>

				<?php get_template_part( 'module', 'list-filter-2' ) ?>

			<?php endif ?>

		<?php endif ?>

		<?php if ( have_posts() ) : ?>

			<div class="wrap-mosaic">
				<div class="infinite-scroll">
					<?php get_template_part( 'module', 'list' ) ?>
				</div>

				<div class="navigation-container hidden">
					<?php frontend_paging_nav() ?>
				</div>

				<?php if ( $page_ == 1 ) : ?>

					<div class="row container-mosaics type-a loading pagination pagination-container" style="display:none">
						<article class="mosaic slot slot-a"></article>
						<article class="mosaic slot slot-a"><span class="loading-txt">Carregando...</span></article>
						<article class="mosaic slot slot-a"></article>
					</div>

				<?php endif ?>

			</div>

		<?php else : ?>

			<div class="wrap-mosaic">
				<div class="row container-mosaics type-a">
					<article class="mosaic slot slot-a"></article>
					<article class="mosaic slot slot-a"></article>
					<article class="mosaic slot slot-a"></article>
				</div>

				<div class="row container-mosaics type-a">
					<article class="mosaic slot slot-a"></article>
					<article class="mosaic slot slot-a"></article>
					<article class="mosaic slot slot-a"></article>
				</div>

				<div class="row container-mosaics type-a">
					<article class="mosaic slot slot-a"></article>
					<article class="mosaic slot slot-a"></article>
					<article class="mosaic slot slot-a"></article>
				</div>

				<div class="row container-mosaics type-a">
					<article class="mosaic slot slot-a"></article>
					<article class="mosaic slot slot-a"></article>
					<article class="mosaic slot slot-a"></article>
				</div>

				<div class="wrap-404">
					<div class="message-404">
						<h1>Ops! Nenhum resultado encontrado!</h1>
					</div>
				</div>
			</div>

		<?php endif ?>

	</div>
</div>
