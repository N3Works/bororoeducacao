<?php
/*
Template Name: Archives Page
*/
?>

<?php get_header(); ?>
<?php get_sidebar(); ?>

<div id="content">
<div class="post">


<?php while(have_posts()) : the_post(); ?>

<h2><?php the_title(); ?></h2>

<h3>Arquivos por mês</h3>
<ul><?php wp_get_archives('type=monthly&show_post_count=1') ?></ul>

<h3>Arquivos por assunto</h3>
<ul><?php wp_list_cats('sort_column=name&optioncount=1') ?></ul>

<?php endwhile; ?>

</div>
</div>


<?php get_footer(); ?>