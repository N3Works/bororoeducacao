<?php
/**
 * @package Bororó 25
 */
?>

<?php
	$tabLivroItens = get_posts(
		array(
			'post_type' => 'livro',
			'posts_per_page' => -1
		)
	);
?>


<div class="row">
	<div class="col-xs-12">
		<h3 class="title">Editora Bororó25</h3>
	</div>
</div>
<div class="row">
	<div class="col-xs-4">
		<div class="box-photo-detail">
			<div class="box-image">
				<img src="<?php echo get_template_directory_uri() ?>/images/markers/tab-books.jpg" alt="" />
			</div>
		</div>
	</div>
	<div class="col-xs-8">
		<h3 class="title title-a">
			Editora Bororó25
		</h3>
		<p class="text text-a">A Editora Bororó25 nasceu do desejo de compartilhar nossos escritos com autonomia editorial. Nossa movimentação solitária num universo tão desconhecido, foi desafiadora. Neste sentido, o que temos hoje produzido e distribuído dentro deste site, tem por nós um valor inestimável da guerrilha da educação para a saúde emocional. A produção literária das autoras cumpre o propósito, e o desejo, de divulgar a sua metodologia própria: o Método Curação.</p>
		<p class="text text-a">A Editora Bororó25 tem seis títulos publicados: os três primeiros livros: A Vida como ela é para cada um de nós; Curação: a arte de bem cuidar-se e A Felicidade Possível. </p>
		<p class="text text-a">A arte de SE fazer feliz, série pocket com 3 libretos, é uma releitura dos primeiros livros, com um olhar que revisita  os conceitos anteriormente formulados, criando  novos conceitos..</p>
		<p class="text text-a">O libreto3 da série, traz de forma inédita uma das dinâmicas do Método CurAção: a Equação da Felicidade Possível.</p>
		<p class="text text-a">O objeto de interesse de todo o conhecimento produzido é o sujeito e sua capacidade de construir saúde emocional, por meio do autoconhecimento. Esta produção de autonomia coloca a pessoa como o gestor de suas emoções e alcança ferramentas para que cada um faça seu próprio trabalho emocional.</p>
		<p class="text text-a">A Bororó25 acredita que a felicidade possível é construída por meio de conhecimentos específicos sobre o funcionamento da alma e que estes conhecimentos, quando aplicados ao viver, produzem autoconhecimento.</p>
	</div>
</div>
<br /><br />
<div class="row">
	<div class="col-xs-12">
		<?php if ( sizeof( $tabLivroItens ) ) : ?>
		<?php
			$contLivros = 0;
		?>
		<div class="box-cards">
			<?php
				foreach ( $tabLivroItens as $tabLivroItem ) :
					$titulo = apply_filters( 'the_title', $tabLivroItem->post_title );
					$subtitulo = get_post_meta( $tabLivroItem->ID, 'wpcf-subtitulo', TRUE );
					$link = get_post_meta( $tabLivroItem->ID, 'wpcf-livro-url', TRUE );
					$imagem = wp_get_attachment_image_src( get_post_thumbnail_id($tabLivroItem->ID ), '300x300');
					$contLivros++;
				?>
				<?php if ( $contLivros % 2 != 0  ) : ?>
				<div class="row">
				<?php endif ?>

					<article class="article article-a">
						<div class="row">
							<div class="col-xs-4">
								<div class="box-photo-detail">
									<div class="box-image" <?php if ( ! empty( $imagem ) ) echo 'style="background-image:url('. $imagem[0] .')"' ?>>
										<a href="<?php echo $link ?>" title="<?php echo $titulo ?>"><?php echo $titulo ?></a>
									</div>
								</div>
							</div>
							<div class="col-xs-8">
								<h3 class="title title-b"><a href="<?php echo $link ?>" title="<?php echo $titulo ?>"><?php echo $titulo ?></a></h3>
								<p class="text text-b"><?php echo $subtitulo ?></p>
								<a href="<?php echo $link ?>" class="link">Visite nossa loja</a>
							</div>
						</div>
					</article>
				
				<?php if ( ( $contLivros % 2 == 0 ) || ($contLivros == sizeof( $tabLivroItens ) ) ) : ?>
				</div>
				<br />
				<?php endif ?>
				
					
			<?php endforeach ?>
		</div>
		<?php endif ?>
	</div>
</div>

