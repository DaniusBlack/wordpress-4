<?php
	get_header();
	the_post(); // Initialize the connection to the database

	// Everything in WordPress is considered a post:
	//  links, comments, pages, media, etc.
	// We can use `get_posts()` to pull out posts of any type
	$files = get_posts(array(
		'numberposts' => 1
		, 'post_type' => 'attachment'
		, 'post_parent' => $post->ID
	));
?>

<nav class="nav-tabs">
	<?php
		wp_nav_menu(array(
			'theme_location' => 'tabs'
			, 'container' => ''
			, 'menu_class' => ''
		));
	?>
</nav>

<div class="wrapper">
	<div class="feature-wrapper">
		<div class="feature">
			<aside class="feature-item">
				<div class="feature-inner"><img src="<?php echo wp_get_attachment_url($files[0]->ID); ?>" alt=""></div>
				<div class="feature-info">
					<p><?php echo $files[0]->post_content; ?></p>
					<p class="readmore"><a href="<?php echo $files[0]->post_excerpt; ?>"><?php echo $files[0]->post_title; ?></a></p>
				</div>
			</aside>
		</div>
	</div>
</div>

<div role="main">
	<div class="grid-group clearfix">

		<article class="grid-item grid-2 blurb">
			<blockquote>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor.</p>
			</blockquote>
			<?php the_content(); // Get the content from the WYSIWYG editor ?>
		</article>

		<?php dynamic_sidebar('home-br'); ?>

	</div>
</div>

<?php
	get_footer();
?>
