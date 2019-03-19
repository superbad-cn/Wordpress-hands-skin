<?php
	/*
		Template Name: 跳转模板
	*/
	//Page Redirect to first sub page
?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<?php
		$post = get_post();
			$args = array(
			'sort_order' => 'asc',
			'sort_column' => 'menu_order',
			'hierarchical' => 1,
			'parent' => $post->ID,
			'post_status' => 'publish'
		);
		$pagekids = get_pages($args);
		if ($pagekids) {?>
		<?php
			$firstchild = $pagekids[0];
			$redirect_url = get_permalink($firstchild->ID);
			header('Location: '.$redirect_url);
			// echo '<meta http-equiv="refresh" content="0;URL='.$redirect_url.'" />';
			exit;
		?>
	<?php } else { ?>
		<?php get_header(); ?>
			<div class="content-area">
				<div class="container">
					<h3><span class="warning">Warning:</span> Not found child page!</h3>
				</div>
			</div>
		<?php get_footer();?>
	<?php } ?>
<?php endwhile;endif; ?>