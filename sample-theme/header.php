<!DOCTYPE html>
<html lang="en-ca">
<head>
	<meta charset="utf-8">
	<title><?php wp_title(); ?></title>
	<link href="<?php bloginfo('stylesheet_url'); ?>" rel="stylesheet">
	<script src="<?php sd(); ?>/js/modernizr.dev.js"></script>
	<?php wp_head(); ?>
</head>
<body>

	<header role="banner">
		<h1 id="logo"><a href="<?php bloginfo('url'); ?>"><img src="<?php sd(); ?>/images/tater-tots-daycare.png" alt="<?php _e('Tater Tots Daycare'); ?>"></a></h1>
		<nav role="navigation">
			<?php
				wp_nav_menu(array(
					'theme_location' => 'primary' // The ID from functions.php
					, 'container' => '' // Delete the extra <div>
					, 'menu_class' => '' // Delete the extra class on the <ul>
				));
			?>
		</nav>
	</header>

	<div class="content">











