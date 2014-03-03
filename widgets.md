# WordPress Sidebars & Widgets

With widgets we can create little modules that our clients to move and place in different places on pages. There are actually two pieces: sidebars and widgets.

1. Sidebars—placeholders for widgets. Just because they are called ‘sidebars’ doesn’t mean they must be on the side. You, as the developer, can put a sidebar anywhere you want.
2. Widgets—modules that can be arranged and moved to different sidebars.

---

## Sidebars

Sidebars are the placeholders where widgets can be placed.

### Registering Sidebars

For us to use and create widgets we must first register a sidebar. Open up your `functions.php` file and add some code.

```php
register_sidebars(1, array(
	'id' => 'basicbar'
	, 'name' => 'Basic Sidebar'
	, 'before_widget' => ''
	, 'after_widget' => ''
));
```

Even though the function above is called `register_sidebars()`, *plural*, due to limitations in WordPress we can only register one at a time if we want them to have unique names.

1. `1`—indicates we want to register a single sidebar
2. `id`—a reference for us, the developers
3. `name`—what will be displayed in WP-Admin to our clients
4. `before_widget` & `after_widget`—WordPress likes to write out extra HTML that often we don’t need, so we ditch it.

After registering a sidebar we can now place widgets into them. A widget is really just a chunk of HTML, you’ll likely have to use your mad CSS skills to style it.

Go to `Appearance > Widgets` to manipulate the sidebar widgets. You’ll notice that WordPress comes with multiple pre-built widgets. You can drag them onto your registered sidebars.

### Using Sidebars

To use a sidebar in your theme you just need to add a single line of code—wherever you want the sidebar to show up. *Just because its called a “sidebar” doesn’t mean it has to go on the side.

```php
dynamic_sidebar('basicbar');
```

- `basicbar`, above, is the ID we assigned our sidebar when we registered it.

---

## Widgets

Widgets are reusable modules, but require us to use PHP classes to hook into WordPress. Widgets can be as simple as a snippet of HTML or as complex as interactive presentations.

### Widget Organization

It’s often best to organize your widgets because they can take a few files. If your widgets get really complex consider creating your own plugin.

```
wordpress/
	wp-content/
		themes/
			your-theme/
				widgets/
```

Putting the widget files in a `widgets` directory is a great way to organize them.

### Basic Widgets

It’s often best to split basic widgets into two files:

- `basic-widget.php`—for the PHP class and primary setup code.
- `basic-widget.html`—for the display HTML of the widget.

A basic widget PHP class, `basic-widget.php`, may look like this:

```php
// The class name of the widget, repeated two more times
class BasicWidget extends WP_Widget {

	// This function sets up our widget in WP Admin, same name as above
	public function __construct () {
		// The name of your widget in WP Admin, what our users see
		parent::__construct(false, 'Basic Widget');
	}

	// This function renders the widget on our page
	public function widget () {
		include 'basic-widget.html';
	}
}

add_action('widgets_init', function () {
	register_widget('BasicWidget');
});
```

There are primarily three pieces of information in the above code:

1. `BasicWidget`—the PHP name of the widget, duplicated in 2 places. No spaces or special characters, except underscores.
2. `Basic Widget`—the name of the widget, as displayed in WP-Admin, anything you want.
3. `basic-widget.html`—the HTML file that will display the widget in your theme.

Put really anything you want in the `basic-widget.html` file to display your widget.

### Registering Widgets

Even though we have organized our widgets for ourselves, WordPress doesn’t magically know where to find our widget. We must point WordPress to our PHP class and register our widget with WordPress.

We register our widget inside our `functions.php` file.

```php
	include 'widgets/basic-widget.php';
```

All we have to do is include the PHP class file for our widget. If you look at the last line of the `basic-widget.php` file, you’ll notice the function call `register_widget()`. This is doing all the work but it’s best to keep it organized with your widget code.

---

## Resources & Tutorials

- <http://codex.wordpress.org/Widgets_API>
