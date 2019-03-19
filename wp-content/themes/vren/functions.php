<?php
/**
 * WP2018 functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage WP2018
 * @since 1.0
 */

$includes = array(
	'inc/enqueue.php', 		         // Load scripts and styles;
	'inc/support.php', 		         // Load Theme support functions;
    'inc/widgets.php', 		         // Load Widgets;
	'inc/optimize.php',				 // Website Optimize
	'inc/class-post-type.php',		 // Website Post Type
	'inc/wp_bootstrap_navwalker.php',// Bootstrap Menu
	'inc/class-taxonomy.php',		 // Website Post Type Tax
	'inc/class-tag.php',		 // Website Post Type Tag
	'inc/aq_resizer.php',			 // * USAGE:    $aq_image = aq_resize( $img_url, $image_size['width'], $image_size['height'], true );
	'inc/options.php'                // Theme options
);
foreach ($includes as $i) {
    locate_template($i, true);
}