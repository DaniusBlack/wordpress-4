<?php

/*
	The functions file is a special file
	  that WordPress will automatically execute.
	It holds things like our menus, our widgets, etc.
	Even our own functions we want to share throughout our theme.
*/

// Small utility function to shorten bloginfo('stylesheet_directory')
function sd () {
	bloginfo('stylesheet_directory');
}

// http://codex.wordpress.org/Navigation_Menus
// Turns on menus in WP-Admin so we can use them in our templates
register_nav_menus(array(
	// 'ID' => 'WP-Admin string'
	'primary' => 'Primary Navigation'
	, 'tabs' => 'Home Tabs'
));

// Sidebars are placeholders where our clients and put modules of content
// The modules, or widgets, are resuable content that can be placed
//  and arranged in any sidebar
// Sidbars do not have to be on the side, they can be anywhere

register_sidebars(1, array(
	'name' => 'Home page bottom right'
	, 'id' => 'home-br'
	, 'before_widget' => ''
	, 'after_widget' => ''
));

register_sidebars(1, array(
	'name' => 'Default sidebar'
	, 'id' => 'default-bar'
	, 'before_widget' => ''
	, 'after_widget' => ''
));

include 'widgets/sample-widget.php';
include 'widgets/news-widget.php';















