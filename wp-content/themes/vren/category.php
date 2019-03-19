<?php get_header(); ?>
	<?php
		$category_id = get_query_var('cat');
		$cat_name = get_category(get_query_var('cat'))->name;
		$category_slug = get_category(get_query_var('cat'))->slug;
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		$wp_query = new WP_Query(
			array('cat' => $category_id, 'posts_per_page' => get_option( 'posts_per_page' ), 'paged' => $paged)
		);
	?>
	<div class="content-area">
		<?php get_template_part("template-parts/title/page-title");?>
		<div class="container">
			<?php
				$description = term_description();
				if ( $description )
				printf( '<div class="archive-meta">%s</div>', $description );
			?>
			<?php if ( $wp_query->have_posts() ) { ?>
				<div class="page-content">
					<div class="articles-wrapper">
						<div class="row">
							<?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
								<?php get_template_part( 'template-parts/category/category', $category_slug); ?>
							<?php endwhile; ?>
						</div>
					</div>
					<?php if ( $wp_query->max_num_pages > 1 ) :
						require( 'pagination.php');
					endif; ?>
				</div>
			<?php } wp_reset_query(); ?>
		</div>
	</div>
<?php get_footer(); ?>