<?php get_header(); ?>
	<div class="content-area">
		<?php get_template_part("template-parts/titlepage-title");?>
		<div class="container">
			<div class="page-sidebar-wrapper">
				<?php if ( $wp_query->have_posts() ) { ?>
					<div class="page-content">
						<div class="articles-wrapper">
							<?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
								<?php get_template_part( 'template-parts/category/category'); ?>
							<?php endwhile; ?>
						</div>
						<?php if ( $wp_query->max_num_pages > 1 ) :
							require( 'pagination.php');
						endif; ?>
					</div>
				<?php } wp_reset_query(); ?>
			</div>
		</div>
	</div>
<?php get_footer(); ?>