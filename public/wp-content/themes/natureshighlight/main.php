<?php   
/* 
Template Name: Main 
*/  
?>  
<?php get_header(); ?>
<?php get_sidebar(); ?>

	<div id="content">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="post" id="post-<?php the_ID(); ?>">
            		<div class="breadcrumba">
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
        		<div class="entry">
				<?php the_content('<p>Continue lendo &raquo;</p>'); ?>
	
				<?php //if page is split into more than one
					link_pages('<p>Paginas: ', '</p>', 'number'); ?>
			</div>
			<?php edit_post_link('(editar esta página)', '<p>', '</p>'); ?>
		</div>
	  <?php endwhile; endif; ?>
	

</div>


<?php get_footer(); ?>