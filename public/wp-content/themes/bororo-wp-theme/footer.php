<?php
/**
 * @package Bororó 25
 */
?>
		</div>

		<?php 
			$templateFile = get_post_meta( get_the_ID(), '_wp_page_template', TRUE );
			if ( (!is_home() && !is_front_page() && $templateFile != 'template-home.php') ||  $templateFile == 'template-posts.php') : 
		?>
		<div id="fb-root"></div>
		<footer class="footer">
			<div class="container">
				<div class="row">
					<div class="col-xs-6">
						<h5 class="title-menu">VAMOS CONVERSAR?</h5>
						
						<p class="text">
							Agende uma visita: <br />
							<strong>51 3346 6171</strong> <br />
							<strong>51 9692 8185</strong> <br />
							<a href="mailto: contato@bororo25.com.br">contato@bororo25.com.br</a>
						</p>
					
						<p class="text">
							Rua Bororó 25, Porto Alegre <br />
							Rio Grande do Sul, Brasil<br />
							<a href="https://www.google.com.br/maps/place/R.+Boror%C3%B3,+25+-+Vila+Assun%C3%A7%C3%A3o,+Porto+Alegre+-+RS,+91900-540/@-30.0972548,-51.2528578,17z/data=!3m1!4b1!4m2!3m1!1s0x951982055fcc3f63:0x4033935c0afa3a78" target="_blank">Veja nossa localização no mapa.</a>
						</p>

						<div class="box-newsletter">
							<h5 class="title">RECEBA AS NOVIDADES DA BORORÓ25</h5>
							<?php echo do_shortcode( '[mc4wp_form]' ) ?>
						</div>
					</div>
					<div class="col-xs-5">
						<div class="box-like">
							<div class="fb-page" data-href="https://www.facebook.com/Bororo25" data-width="350" data-height="420" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" data-show-posts="true"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/Bororo25"><a href="https://www.facebook.com/Bororo25">Bororó25</a></blockquote></div></div>
						</div>
					</div>
					<div class="col-xs-1">
						<div class="social">
							<a href="https://www.youtube.com/user/canalbororo" target="_blank"><i class="fa fa-youtube-play"></i></a>
							<a href="https://instagram.com/bororo25oficial/" target="_blank"><i class="fa fa-instagram"></i></a>
							<a href="https://www.flickr.com/photos/bororo25" target="_blank"><i class="fa fa-flickr"></i></a>
							<!-- <a href="https://twitter.com/bororo25" target="_blank"><i class="fa fa-twitter"></i></a> -->
						</div>
					</div>
				</div>
			</div>
		</footer>
		<?php endif ?>
		<script type="text/javascript">
			var bororo,
			templateDir = '<?php echo get_template_directory_uri() ?>';

			head.js(
				"<?php echo get_template_directory_uri() ?>/js/libs/jquery.fancybox.pack.js",
				"<?php echo get_template_directory_uri() ?>/js/libs/slick.min.js",
				"<?php echo get_template_directory_uri() ?>/js/libs/lazyYT.js",
				"//connect.facebook.net/pt_BR/sdk.js#xfbml=1&appId=483733905015356&version=v2.3",

				"<?php echo get_template_directory_uri() ?>/js/bororo.js?ver=20150825"
			);
		</script>

		<?php wp_footer() ?>

		<script type="text/javascript">
			var _gaq = _gaq || [];
			_gaq.push(['_setAccount', 'UA-66810641-1']);
			_gaq.push(['_trackPageview']);
			(function() {
				var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
				ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
				var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
			})();
		</script>
	</body>
</html>
