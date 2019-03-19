<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package WordPress
 * @subpackage WP2018
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<div class="content-area error-404">
	<div class="container">
		<section class="not-found">
			<div class="img-404"><img src="<?php echo get_template_directory_uri().'/assets/images/404.png'; ?>" alt=""></div>
			<a class="content-404" href="<?php echo get_site_url();?>"><?php echo __('Back'); ?><?php echo __('Home'); ?></a>
		</section><!-- .error-404 -->
	</div>
</div>

<?php get_footer();
