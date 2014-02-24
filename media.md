# WordPress Media & Attachments

WordPress allows users and clients to upload images, PDFs, documents, videos, and more. When any media is uploaded WordPress stores it in a specific location: the `uploads` folder.

```
wordpress/
	wp-content/
		uploads/
```

WordPress will automatically organize the uploads folder and generate different sizes for the image: a thumbnail, a medium size, and the original size.

Media can be embedded into pages and posts using the WP-Admin editor. Or you can attach a media file to a page or post and display it using your theme files.

---

## Attachments

Attachments are a great way to make images editable on pages yet still have control over the placement. When your client embeds an image using the WP-Admin editor you, as the developer, don’t have any control over the placement. Attachments solve this problem.

#### Attachments for File Downloads

Attachments are also a fantastic way to have downloadable files for pages. Your client can attach many PDFs and documents to a single page, then we can display those attachments as downloads in our templates.

### How to Attach a File

1. On the `Media` screen locate the file you’re interested in
2. In one of the columns to the right there should be a link labeled `Attach`
3. A screen will display. Using the radio buttons, select whether you are looking for pages or posts
4. Type in a keyword for the page or post your want to attach to and press `Search`
5. Choose the page or post and press the `Select`

### Detaching a File

WordPress doesn’t natively provide a way to detach a media element from a page or post. The best way to detach media elements is using a plugin: [Unattach](http://wordpress.org/extend/plugins/unattach/). It adds another link to each media element allowing you to detach it.

### Using Attachments in Your Theme

WordPress considers everything a ‘post’: whether it’s a post, a page, a link, even an attachment. So, we can use the built-in `get_posts()` function for also displaying attachments.

```php
the_post();

$files = get_posts(array(
	'post_type' => 'attachment'
	, 'numberposts' => -1
	, 'post_parent' => $post->ID
));
```

The `$files` variable is an array containing all the information about each file attached to the current post. You can loop over all them or display just one.

### Display a Single Media Element

```html+php
<figure>
	<img src="<?php echo wp_get_attachment_url($files[0]->ID); ?>" alt="">
	<figcaption><?php echo $files[0]->post_title; ?></figcaption>
</figure>
```

Every single file object has a few properties mapped to fields in WP-Admin. Every media element can have a title, description, and caption.

- `$files[0]->post_title`—title
- `$files[0]->post_content`—description
- `$files[0]->post_excerpt`—caption

### Display Multiple Media Elements

You can also loop over the media elements to display them. As an example, a file download list:

```html+php
<ul class="files">
	<?php foreach ($files as $file) : ?>
	<li>
		<a href="<?php echo wp_get_attachment_url($file->ID); ?>" rel="enclosure">
			<?php echo $file->post_title; ?>
		</a>
	</li>
	<?php endforeach; ?>
</ul>
```

---

## Post thumbnails & featured images

Every WordPress page and post can have a featured image (or post thumbnail). But first, the feature must be enabled in the theme’s `functions.php` file:

```php
add_theme_support('post-thumbnails');

// Optionally the image size and be specified
set_post_thumbnail_size(380, 253, true);
add_image_size('feature-image', 380, 253, true);
```

After the feature is enabled in the theme a new option will appear on the edit screens in WP-Admin.

To access and display the image on your theme use this code:

```php
the_post_thumbnail();

// Optionally choose what size you want
the_post_thumbnail('large');
the_post_thumbnail('full');
the_post_thumbnail('feature-image');
```

The above function will output a complete image tag and possibly a link. If you’d like more control you can try this way:

```html+php
<img src="<?= wp_get_attachment_url(get_post_thumbnail_id($post->ID)) ?>" class="" alt="">
<!--
`wp_get_attachment_image_src()` is useful if you want a specific image size
-->
```

If you want more details about the image, just treat it like a post:

```php
	$img = get_post(get_post_thumbnail_id($post->ID));
	$img->post_title; // Could be used for the alt attribute
```

---

## Resources & Tutorials

- <http://codex.wordpress.org/Function_Reference#Post.2C_Custom_Post_Type.2C_Page.2C_Attachment_and_Bookmarks_Functions>
- <https://codex.wordpress.org/Post_Thumbnails>
