<?php
/**
 * Optimize Website.
 *
 * @since WP2018 1.0
 */

/*---------------------------------------------------
Remove Google Font
----------------------------------------------------*/
if (!function_exists('remove_wp_open_sans')) :
	function remove_wp_open_sans() {
		wp_deregister_style( 'open-sans' );
		wp_register_style( 'open-sans', false );
	}
	add_action('wp_enqueue_scripts', 'remove_wp_open_sans');
	add_action('init', 'remove_wp_open_sans');
	add_action('admin_enqueue_scripts', 'remove_wp_open_sans');
endif;

/**
* remove s.w.org
*/
function remove_dns_prefetch( $hints, $relation_type ) {
if ( 'dns-prefetch' === $relation_type ) {
return array_diff( wp_dependencies_unique_hosts(), $hints );
}
return $hints;
}
add_filter( 'wp_resource_hints', 'remove_dns_prefetch', 10, 2 );


/**
* Disable the emoji's
*/
function disable_emojis() {
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' );
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
}
add_action( 'init', 'disable_emojis' );

/**
 * Filter function used to remove the tinymce emoji plugin.
 */
function disable_emojis_tinymce( $plugins ) {
	if ( is_array( $plugins ) ) {
		return array_diff( $plugins, array( 'wpemoji' ) );
	} else {
		return array();
	}
}

/**
 * Remove shortlink.
 */
remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0 );

/*Remove wp welcome panel*/
remove_action('welcome_panel', 'wp_welcome_panel');

/**
 * Remove wp dashboard wp logo.
 */
function wp_dashboard_admin_bar_remove_logo() {
        global $wp_admin_bar;
        /* Remove their stuff */
        $wp_admin_bar->remove_menu('wp-logo');
}
add_action('wp_before_admin_bar_render', 'wp_dashboard_admin_bar_remove_logo', 0);

/**
 * Remove wp dashboard help.
 */
add_filter( 'contextual_help', 'wp_dashboard_remove_help', 999, 3 );
function wp_dashboard_remove_help($old_help, $screen_id, $screen){
    $screen->remove_help_tabs();
    return $old_help;
}

/**
 * Custom Admin footer.
 */
function change_wp_dashboard_developer () {
	echo '<span id="footer-thankyou"><a target="_blank" href="http://www.superbad.cn/">作者</a>： <a target="_blank" href="http://www.superbad.cn/">Aren</a></span>';
}
add_filter( 'admin_footer_text', 'change_wp_dashboard_developer' );

/**
 * Hide Footer right revision.
 */
function wp_dashboard_hide_revision(){
	remove_filter( 'update_footer', 'core_update_footer' );
}
add_action('admin_menu','wp_dashboard_hide_revision');


/**
 * Rename images' name.
 */
function git_upload_filter($file) {
	$time = date("YmdHis");
	$file_name = $file['name'];
	$file_type = $file['type'];
	if( $file_type == 'image/png' || $file_type == 'image/jpeg'){ // just change images' name
		if(preg_match('/^[\x{4e00}-\x{9fa5}]+$/u', $file_name) > 0 || preg_match('/[\x{4e00}-\x{9fa5}]/u', $file_name) > 0){
			//Include Chinese words
			$file['name'] = $time . "" . mt_rand(10, 99) . "." . pathinfo($file_name, PATHINFO_EXTENSION);
		}
	}
	return $file;
}
add_filter('wp_handle_upload_prefilter', 'git_upload_filter');

/**
 * Remove wp-json.
 */
remove_action( 'template_redirect', 'rest_output_link_header', 11, 0 );
remove_action( 'wp_head','rest_output_link_wp_head' );
remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );

/**
 * Remove version.
 */
function remove_wp_version() {
  return '';
}
add_filter('the_generator', 'remove_wp_version');

function remove_cssjs_ver( $src ) {
	if( strpos( $src, 'ver=' ) )
		$src = remove_query_arg( 'ver', $src );
	return $src;
}
add_filter( 'style_loader_src', 'remove_cssjs_ver', 999 );
add_filter( 'script_loader_src', 'remove_cssjs_ver', 999 );

