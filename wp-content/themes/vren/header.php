<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
<link rel="shortcut icon" href="<?php echo esc_url(get_site_url()); ?>/favicon.ico" type="image/x-icon" />
<meta name="format-detection" content="telephone=no">

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
  <script src="<?php bloginfo('template_url');?>/assets/js/html5shiv.min.js"></script>
  <script src="<?php bloginfo('template_url');?>/assets/js/respond.min.js"></script>
<![endif]-->

<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<header id="masthead">
		<?php get_template_part( 'template-parts/header/menu'); ?>
	</header><!-- #content -->
	<main id="main" role="main" class="content">