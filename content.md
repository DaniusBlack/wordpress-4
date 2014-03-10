# WordPress Content

WordPress content is stored inside the database. Users can manipulate the content inside WP Admin through posts and pages.

Our theme files read the content from the database, generate an HTML file, and send the complete webpage to the browser.

If no other theme files are present, WordPress will use `index.php` for displaying *all* the content. Since WordPress originally started as a blogging engine, `index.php` will always be used to display blog posts. If you want a different view for static pages create a `page.php` file.

**Refer to the [Template Hierarchy](http://codex.wordpress.org/Template_Hierarchy) to better understand what theme files WordPress uses for every situation.**

## Pages

Creating a `page.php` file will allow you to have a different view for static pages.

An example `page.php`:

```html+php
<?php
	get_header();
	the_post();
?>

<h1><?php the_title(); ?></h1>
<?php the_content(); ?>

<?php get_footer(); ?>
```

In this most basic page example there are a few new functions to understand:

- `the_post()`—initializes the database and retrieves the content.
- `the_title()`—will write out the page’s title.
- `the_content()`—will write out the content of the page, including paragraphs, headings, images, etc.

### Page Templates

If we want even more specialized views for static pages we can create page templates. The templates can then be applied to specific pages inside WP Admin.

A common convention is to prepend template file names with the word `template`, e.g. `template-2-col.php`. **But it is not the name of the file that makes it a template—it’s the PHP comment at the top of the file.**

To mark a specific file as a template, add the following comment to the top:

```php
<?php
/*
Template Name: Three Columns (Or Whatever You Want to Call It)
*/
?>
```

If a page template is selected in WP Admin, it will be used instead of `page.php`. **Refer to the [Template Hierarchy](http://codex.wordpress.org/Template_Hierarchy) to better understand what theme files WordPress uses for every situation.**

### 404 Page

If you make a file named `404.php` in your theme folder, WordPress will automatically use it when a user requests a page or post that doesn’t exist.

### Static Front Page

There are some settings in WordPress that allow you to not display blog posts on the home page of your website.

Check out this tutorial on [Creating a Static Front Page](http://codex.wordpress.org/Creating_a_Static_Front_Page)

## Blog Posts

WordPress was originally targeted as a blog engine and this history is deeply ingrained in the code.

Your theme’s `index.php` file will always show the blog posts, even if blog posts are not set up to be shown on the homepage.

### Writing Out Blog Posts

The following code can be used on the `index.php` file to write out blog posts:

```html+php
<?php
if (have_posts()) :
	while (have_posts()) :
		the_post();
?>

	<article>
		<header>
			<h2><?php the_title(); ?></h2>
		</header>
		<?php the_excerpt(); ?>
		<a href="<?php the_permalink(); ?>">Read More</a>
	</article>

<?php
	endwhile;
endif;
?>
```

- `have_posts()`—a function we can use in if statements that returns a boolean: true if there are posts still to be displayed, false if there are no posts.
- `while (have_posts()) : … endwhile;`—[The Loop](http://codex.wordpress.org/The_Loop) is used to iterate over all the available posts and write out their information.
- `the_excerpt()`—writes out a small chuck of the content or the specialized excerpt from inside WP Admin.
- `the_permalink()`—write the full URL to the blog post, usually for display the rest of the content.

**Other useful functions:**

- `the_ID()`—the internal WordPress number for this specific post.
- `next_posts_link()`—writes out a link to the next page of posts.
- `previous_posts_link()`—writes out a link to the previous page of posts.

### Single Pages

Using `the_permalink()` will create a URL to another page for the post, the permalink page. This page is generally used to display the whole post content, where only excerpts are displayed on the list page.

To design a unique view for the permalink page create a file named `single.php`.

An example `single.php`:

```html+php
<?php get_header(); the_post(); ?>

<article>
	<header>
		<h1><?php the_title(); ?></h1>
	</header>
	<footer>
		<p>
			Published <?php echo get_the_date('Y-m-d h:s A'); ?>
			by <?php the_author(); ?>
			&middot; <?php comments_number(); ?>
		</p>
	</footer>
	<?php the_content(); ?>
</article>

<?php previous_post_link(); ?> &middot; <?php next_post_link(); ?>

<?php comments_template(); ?>
<?php get_footer(); ?>
```

- `get_the_date()`—uses the same syntax as PHP’s built-in `date()` function to write out the post’s published date.
- `the_author()`—writes out the display name of the author of this post.
- `comments_number()`—writes out how many comments this post has.
- `next_postlink()`—creates a link to the next post in the database.
- `previous_postlink()`—creates a link to the previous post in the database.
- `comments_template()`—calls our `comments.php` file to display the comments. [More on comments](#comments).

## Blog Posts on Pages

Blog posts can also be displayed on static pages by using more WordPress built-in functions. Using WordPress’ `get_posts()` function we can pull out any posts (and filter them) and display them on a page.

```html+php
<ol>
	<?php

	$posts = get_posts([
		'numberposts' => 5
	]);

	foreach ($posts as $post) :
		setup_postdata($post);
	?>

	<li><?php the_title(); ?></li>

	<?php endforeach; ?>
</ol>
```

- `get_posts([])`—the array is a collection of options for filtering the posts, like the number of posts, a specific category, etc. [Codex: get_posts](http://codex.wordpress.org/Template_Tags/get_posts).

## Comments

Blog posts, and even pages, can have comments associated with them. Since WordPress was built as a blogging engine, comments are easy to setup.

`comments_template()`, as used above, will include our `comments.php` file to display comments on a page.

A sample `comments.php` file:

```html+php
<aside>
	<h2><?php comments_number(); ?></h2>

	<ol class="comments">
		<?php wp_list_comments(); ?>
	</ol>

	<?php comment_form(); ?>
</aside>
```

- `wp_list_comments()`—will write out a bunch of `<li>` elements, one for each comment. You can then inspect the HTML and style using the hooks provided by WordPress.
- `comment_form()`—will write out WordPress’ built-in HTML for a comment form. Style as necessary.

All of the built-in WordPress comment templates can be overwritten and customized.

## Resources & Tutorials

- <http://codex.wordpress.org/Theme_Development>
- <http://codex.wordpress.org/Stepping_Into_Templates>
- <http://codex.wordpress.org/File_Header>
- <http://codex.wordpress.org/The_Loop>
- <http://codex.wordpress.org/Template_Tags/get_posts>
- <http://codex.wordpress.org/Template_Tags#Comment_tags>
