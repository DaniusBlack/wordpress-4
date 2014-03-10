<?php
	get_header();
	the_post();
?>

<article>
	<header>
		<h1><?php the_title(); ?></h1>
	</header>
	<footer>
		<p>
			Published <?php echo get_the_date('Y-m-d h:i:s a'); ?>
			By <?php the_author(); ?>
		</p>
	</footer>
	<?php the_content(); ?>
</article>

<?php get_footer(); ?>
