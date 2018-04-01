<?php
/**
 * @package Bororó 25
 */
?>

<?php
	global $page_;
?>

<?php get_template_part( 'module', 'nav' ) ?>

<?php get_template_part( 'module', 'top' ) ?>

<section class="section-internal-content">
	<div class="box-tabs">
		<div class="box-tab-content">
			<div class="tab-content">
				<div class="tab-pane active">
					<div class="container">
						<div class="row">
							<div class="col-xs-12">
								<h3 class="title">Tudo o que acontece na Bororó25</h3>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12">
								<?php echo do_shortcode( '[calendar views="false"]' ) ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
