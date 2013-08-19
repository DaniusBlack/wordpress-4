<?php
	get_header();
	the_post();
?>

<h1><?php the_title(); ?></h1>
<?php the_content(); ?>

<?php dynamic_sidebar('default-bar'); ?>

<?php get_footer(); ?>