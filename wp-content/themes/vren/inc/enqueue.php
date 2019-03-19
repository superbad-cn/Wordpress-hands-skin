<?php
/**
 * Registers website css and js.
 *
 * @since WP2018 1.0
 */

function wpbootstrap_scripts_with_jquery()
{
	// load js
	wp_enqueue_script("jquery");
	// Register the script like this for a theme:
	wp_register_script( 'bootstrap-script', get_template_directory_uri() . '/assets/js/bootstrap.bundle.min.js', array( 'jquery' ) );
	// For either a plugin or a theme, you can then enqueue the script:
	wp_enqueue_script( 'bootstrap-script' );
	wp_enqueue_script('custom', get_template_directory_uri() . '/assets/js/custom.js','','',false);


	// load css
	wp_enqueue_style('enqueue-bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.css', array(), false);
	wp_enqueue_style('font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.css', array(), false);
	wp_enqueue_style('flaticon', get_template_directory_uri() . '/assets/css/flaticon.css', array(), false);
	wp_enqueue_style('menu', get_template_directory_uri() . '/assets/css/menu.css?v='.time(), array(), null);  				//Theme style
	wp_enqueue_style('enqueue-style', get_template_directory_uri() . '/style.css?v='.time(), array(), false);  				//Theme style

}
add_action( 'wp_enqueue_scripts', 'wpbootstrap_scripts_with_jquery' );