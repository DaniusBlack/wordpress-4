<?php
/*
Template Name: Alternate Page Design
*/
	get_header();
	the_post();
?>

<h1><?php the_title(); ?></h1>
<?php the_content(); ?>

<strong>This is the alt. template.</strong>

<?php dynamic_sidebar('home-br'); ?>

<?php get_footer(); ?>