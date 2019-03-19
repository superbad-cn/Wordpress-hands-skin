<?php get_header(); ?>
	<div class="content-area">
		<?php
			if(is_post_type_archive()){
				$type = $wp_query->query['post_type']; // if is archive page, get type, use "$wp_query->query['post_type']" instead of "$post -> post_type"
			} else if(is_tax()){
				$type_taxonomy = $wp_query->query_vars['taxonomy'];
				$get_type_taxonomy = get_taxonomy( $type_taxonomy );
				$type_taxonomy_value = $wp_query->query_vars['term'];
				$type = $get_type_taxonomy->object_type[0];

				if($type_taxonomy_value){
					$tax_filter = array(
						'taxonomy' => $type_taxonomy,
						'field'    => 'slug',
						'terms' => $type_taxonomy_value,
					);
				}
			} else if(is_page()){
				$type = get_post_meta($post->ID, 'selected-type', true);
			} else {
				$type = 'post';
			}
			$posts_per_page = get_option( 'posts_per_page' );
			get_template_part("template-parts/title/page-title");
		?>
		<div class="container">
			<?php
				$description = term_description();
				if ( $description )
				printf( '<div class="archive-meta">%s</div>', $description );
			?>
			<div class="page-content">
				<?php
					$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
					$query_args = array(
						'post_type' => $type,
						'posts_per_page' => $posts_per_page,
						'orderby' => 'date',
						'order' => 'DESC',
						'post_status' => 'publish',
						'paged' => $paged,
						'tax_query' => array(
							$tax_filter
						)
					);
					// create a new instance of WP_Query
					$the_query = new WP_Query( $query_args );
					if( $the_query->have_posts() ) { ?>
						<div class="articles-wrapper">
							<div class="row">
								<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
									<?php get_template_part( 'template-parts/type/type', $type); ?>
								<?php endwhile; ?>
							</div>
						</div>
						<?php if ( $the_query->max_num_pages > 1 ) :
							require( 'pagination-query.php');
						endif; ?>
					<?php } else {
						echo "No results";
					} wp_reset_query();
				?>
			</div>
		</div>
	</div>
<?php get_footer();?>