# WordPress custom post types

By default WordPress has posts and pages that can be edited. With custom types you can add anything that makes sense for your website, e.g. a berry farm could add a berries type.

---

## Set up

We first have to set up the custom post type in our `functions.php` file:

```php
function theme_register_post_types () {
	register_post_type('dinosaurs', [
		'label' => 'Dinosaurs',
		'public' => true,
		'supports' => ['title', 'thumbnail', 'author']
	]);	
}
add_action( 'init', 'theme_register_post_types' );
```

This will create a new entry on the left menu where users can go and add different “Dinosaurs”.

### Extra fields

If you want to add more fields than the standard `title`, `editor`, and `excerpt` a plugin like [Advanced Custom Fields](http://www.advancedcustomfields.com/) is the best option.

**Links**

- <http://codex.wordpress.org/Function_Reference/register_post_type>

---

## Display

On a page, you can use `WP_Query` to select the new posts types and spit out their information.

```php
$dinos = new WP_Query([
	'post_type'=>'dinosaurs', 
	'posts_per_page' => -1,
	'orderby' => 'title',
	'order' => 'ASC'
]);
```

We can then loop over the returned results and spit them out onto our page.

```html+php
<?php while ($dinos->have_posts()) : $dinos->the_post(); ?>
	<article>
		<h2><?php the_title(); ?></h2>
	</article>
<?php endwhile; ?>
```

At the end we can then reset the post information.

```php
wp_reset_postdata();
```

**Links**

- <http://codex.wordpress.org/Class_Reference/WP_Query>

---

## Resources & Tutorials

- <http://wp.smashingmagazine.com/2012/11/08/complete-guide-custom-post-types/>
- <http://line25.com/articles/wordpress-custom-post-type-guides-resources>
