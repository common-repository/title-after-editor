<?php
/*
Plugin Name: Title After Editor
Version: 1.0
Description: Move the title field after the editor when writing a new blog post.
Author: Sarah Lewis
Author URI: http://wpmoxie.com
Plugin URI: http://wpmoxie.com/plugins/title-after-editor/
*/

function wpm_move_that_title() {
	global $pagenow;
	
	// Let's start with just the post editor; we can expand it to other kinds of post types later, if we want
	if ( 'post-new.php' == $pagenow && empty( $_GET['post_type'] ) ) {
		wp_enqueue_style(
			'title-mover',
			plugins_url('/css/title-after-editor.css', __FILE__)
		);
		
		wp_enqueue_script(
			'title-mover',
			plugins_url('/js/title-after-editor.js', __FILE__),
			array('jquery'),
			'1.0'
		);
	}
}

add_action( 'admin_print_scripts', 'wpm_move_that_title' );