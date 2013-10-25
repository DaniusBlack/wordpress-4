<?php
/*
	Line 5, line 8, line 18 must be spelled exactly the same
*/
class SampleWidget extends WP_Widget {

	// This function sets up our widget in WP Admin
	public function SampleWidget () {
		parent::WP_Widget(false, 'Sample Widget'); // The name of your widget in WP Admin, what our users see
	}

	// This function renders the widget on our page
	public function widget () {
		include 'sample-widget.html';
	}
}

register_widget('SampleWidget'); // Pass the widget's class name, from line 5
