<?php
/**
 * Registers a widget area.
 *
 * @link https://developer.wordpress.org/reference/functions/register_sidebar/
 *
 * @since WP2018 1.0
 */

function custom_widgets_init() {
	register_sidebar( array(
		'name'          => '侧边栏',
		'id'            => 'sidebar',
		'description'   => '侧边栏内容区域',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'custom_widgets_init' );