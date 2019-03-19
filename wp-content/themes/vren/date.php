<?php get_header(); ?>
	<div class="content-area">
		<?php get_template_part("template-parts/title/page-title"); ?>
		<div class="container">
			<div class="page-content">
				<?php if ( $wp_query->have_posts() ) { ?>
					<div class="page-content">
						<div class="articles-wrapper">
							<div class="row">
								<?php while ( $wp_query->have_posts() ) : $wp_query->the_post();?>
									<?php get_template_part( 'template-parts/type/type', 'post');?>
								<?php endwhile;?>
							</div>
						</div>
						<?php if ( $wp_query->max_num_pages > 1 ) :
							require( 'pagination.php');
						endif;?>
					</div>
				<?php } wp_reset_query(); ?>
			</div>
		</div>
	</div>
<?php get_footer();?>