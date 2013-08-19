# WordPress Settings

WordPress has a few important settings that should be changed for most small business WordPress sites.

---

## Permalinks

Permalinks are an important part of WordPress. Permalinks are the way WordPress represents URLs for all your posts and pages.

By default, WordPress URLs are’t user or search engine friendly.

	http://tatertotsdaycare.ca/?p=2

In the above example, `?p=2` is called a query string. This is how WordPress knows which page to display—it’s not helpful for users or search engines. What is page 2?

By changing a setting in WordPress we can make the URLs, permalinks, more user friendly.

	http://tatertotsdaycare.ca/about/
	http://tatertotsdaycare.ca/2012/02/ground-hog-day-fun/

The above URLs are much more user friendly and search engine friendly.

You’ll notice WordPress creates a new file in the root directory, `.htaccess`. This file is very important to how WordPress handles permalinks. `.htaccess` is an Apache configuration files that instructs all requests to be funnelled through WordPress’ `index.php` file.

### How to Set Up

1. Go to `Settings > Permalinks`
2. Pick one of the possible options, `Month and name` is the most popular. Another very popular option is `Post name`, which removes the year and month from the URL.

### Resources & Tutorials

- <http://codex.wordpress.org/Settings_Permalinks_Screen>
- <http://codex.wordpress.org/Using_Permalinks>

---

## Static Homepages

WordPress’ default set-up is to show the blog on the homepage. Often, when making small business websites, we want a static homepage. This doesn’t mean you can’t also have recent blog posts on the homepage, just that WordPress moves the primary list of recent blog posts to another page.

### How to Set Up

1. Go to `Pages` and create a new page for ‘Home’
2. Create a second page for the blog. Or news, or whatever you want to use the posts for.
3. Go to `Settings > Reading`.
4. At the top, select the second radio button, `A static frontpage`
5. Choose your new home page under the `Front page` drop-down
6. Choose your new blog page under the `Posts page` drop-down

### Important Template Hierarchy Changes

After changing to a static frontage, we have to look at our theme files and update them appropriately.

- The homepage will now use `front-page.php` as it’s theme file.
- The blog will still use `index.php` as it’s theme file. `index.php` will always be used for the blog.

### Show Posts on a Static Homepage

If you want to show posts on a static homepage, you’ll have to do it a little more manually—the basic WordPress loop won’t work. Refer to *Blog Posts on Pages* in the *WordPress Content* article.


### Resources & Tutorials

- <http://codex.wordpress.org/Creating_a_Static_Front_Page>