<?php
/*
Template Name: Blog
*/

 get_header();?>

<div id="pagecontent">
			<div class="breadcrumb">
						<?php phi_breadcrumbs();?>
			</div>
			<!-- TOP IMAGE OR VIDEO -->
			<!-- Page content -->
			<?php 
									
									
									
									$pager = get_option(phi_blog_pager);
									include(TEMPLATEPATH.'/lib/includes/home-blog.php');
									
									
									?>
			<!-- end page content -->
</div>
<?php get_footer();?>