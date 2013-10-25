# WordPress Themes

WordPress uses an include system with files named very specificly to make up a theme. There are only two files required for a theme—`index.php` and `style.css`—but many more can be specified to customize the theme.

## Theme Set Up

A theme is just a folder in the `wp-content/themes` folder with the required files.

```
wp-content/
	themes/
		your-theme/
			index.php
			style.css
```

- `index.php`—the file used to display content for the website.
- `style.css`—the CSS, but also contains meta data about the theme.

## Theme Meta Data

At the top of `style.css` write a comment with specific pieces of information to be displayed in the WP Admin interface:

```css
/*
Theme Name: Client's Name
Theme URI: http://clienturl.ca/
Description: Custom theme for your client.
Author: Thomas J Bradley
Author URI: http://thomasjbradley.ca
Version: 1.0
Tags: colours, style, theme, etc.
*/
```

You can also create a `screenshot.png` for your theme that will be displayed in WP Admin. *Make the image 300 × 225 pixels.*

## Other Common Theme Files

- `header.php`

	An include for website elements common to the masthead.

	Important functions: `wp_title()`, `wp_head()`, `get_header()`, `bloginfo()`

- `footer.php`

	An include for website elements common to the footer.

	Important functions: `wp_footer()`, `get_footer()`

- `functions.php`

	A file that will automatically be included by WordPress for your whole theme. It’s used for putting common code and functions that you want to share within your theme files.

## File Paths

All file paths in WordPress theme PHP files must be referenced using the `bloginfo('')` function so they don’t depend on the installation directory of WordPress.

```html+php
<link href="<?php bloginfo('stylesheet_url'); ?>" rel="stylesheet">

<script src="<?php bloginfo('stylesheet_directory'); ?>/js/modernizr.js"></script>

<img src="<?php bloginfo('stylesheet_directory'); ?>/images/logo.png" alt="">
```

### The Less Typing the Better

Using the `functions.php` file we can shorten some of the `bloginfo()` code. As an example, you’ll be writing `bloginfo('stylesheet_directory')` over and over.

Instead, put something like this in `functions.php`:

```php
function sd () {
	bloginfo('stylesheet_directory');
}
```

Then, inside `header.php` you could write:

```html+php
<script src="<?php sd(); ?>/js/modernizr.js"></script>
```

## Resources & Tutorials

- [Codex: Theme Development](http://codex.wordpress.org/Theme_Development)
- [Codex: Template File List](http://codex.wordpress.org/Theme_Development#Template_Files_List)
- [Codex: Template Heirarchy](http://codex.wordpress.org/Template_Hierarchy)
