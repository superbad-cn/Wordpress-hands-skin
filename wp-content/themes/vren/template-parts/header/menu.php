<?php
/**
 * Menu
 *
 * @package WordPress
 * @subpackage WP2018
 * @since 1.0
 * @version 1.0
 */

?>
<nav class="navbar navbar-expand-lg fixed-top">
	<div class="container">
		<a class="navbar-brand logo" title="<?php bloginfo('name'); ?>" href="<?php echo get_site_url();?>">
			<img src="<?php echo esc_attr(get_bloginfo('template_url')."/assets/images/logo.png"); ?>" alt="<?php bloginfo('name'); ?>" />
		</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<i class="fa fa-bars"></i>
		</button>

		<?php
			// Echo Main Menu
			$main_menu = array(
				'theme_location'  => 'primary',
				'menu'            => 'Main Menu',
				'echo'            => true,
				'container'       => 'nav',
				'container_class' => 'collapse navbar-collapse',
				'container_id'    => 'navbarSupportedContent',
				'menu_class'      => 'navbar-nav ml-auto',
				'menu_id'         => 'main-menu',
				'depth'           => 3,
				'fallback_cb'     => 'wp_bootstrap_navwalker::fallback',
				'walker'          => new wp_bootstrap_navwalker()
			);
			wp_nav_menu( $main_menu );
		?>
		<!-- <form class="form-inline my-2 my-md-0">
			<input class="form-control" type="text" placeholder="Search">
		</form> -->
	</div>
</nav>
