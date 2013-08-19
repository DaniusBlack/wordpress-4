# WordPress Menus

WordPress has a feature in WP-Admin that allows users to customize the navigation on their website. They can add, remove, and reorder the pages in the navigation.

## Two Components, One Menu

WordPress uses two distinct components to make up a single navigation item.

1. A placeholder, registered in our `functions.php` and displayed in any of our theme files, usually `header.php`.
2. A menu, made inside WP-Admin, created by our client. The menu holds the list and order of the pages. *Menus are assigned to a placeholder.*

## Registering a Menu Placeholder

The first step to setting up menus for your theme is registering a placeholder. Open up your `functions.php` file.

```php
register_nav_menus(
	array(
		// ID => WP Admin String
		'primary' => 'Primary Navigation'
	)
);
```

*If you want more than one menu on your side, add another entry into the `register_nav_menus()` function call separated by a comma.

Each registered menu will have two pieces of information, an **ID** and a **String for WP-Admin**. The ID is for developers and the WP-Admin string is what our clients will see inside WP-Admin.

## Create the Menu in WP-Admin

After you’ve registered your menu in the `functions.php` file you can go to WP-Admin and create the menu. `Appearance > Menus` will allow your clients to create a new menu, add pages and links to it, and assign the menu to a placeholder.

## Displaying a Menu in a Template

Add the code wherever you want the menu to show up. WordPress writes out a `<ul>` and bunch of `<li>` elements for you. You should likely still wrap it in a `<nav>` element.

```html+php
<nav>
<?php
	wp_nav_menu(
		array(
			'theme_location' => 'primary'
		)
	);
?>
</nav>
```

The only option you have to specify is the `ID` of placeholder you want to display. WordPress likes to make a mess of the HTML, so there are a few other options we should specify to clean it up.

```php
wp_nav_menu(
	array(
		'theme_location' => 'primary'
		, 'container' => false
		, 'menu_class' => ''
	)
);
```

- `container`—will get rid of the extra, useless `<div>`
- `menu_class`—will get rid of the extra class on the `<ul>`

### Highlighting the Current Page

We always need to highlight the current page in our navigation. WordPress looks after adding some extra classes to the proper `<li>` element, you’ll really have to just look at the HTML WordPress generates to figure out what class to use. Often, WordPress will add a `current-menu-item` class that you can use.

```css
.current-menu-item a,
.current-menu-item a:link,
.current-menu-item a:visited {
	background-color: #666;
	color: #fff;
}
```

## Resources & Tutorials

- <http://codex.wordpress.org/Navigation_Menus>
