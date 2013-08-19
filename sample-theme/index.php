<?php
	get_header();
?>

<div role="main">
	<div class="grid-group clearfix">
		<div class="grid-item grid-2">
<?php
	while (have_posts()) :
		the_post();
?>
<article>
	<h2><?php the_title(); ?></h2>
	<?php the_excerpt(); ?>
	<a href="<?php the_permalink(); ?>">Read More</a>
</article>
<?php
	endwhile;
?>
		</div>
	</div>
</div>

<?php
	get_footer();
?>





