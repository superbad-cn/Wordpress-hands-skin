<?php get_header(); ?>
	<div class="content-area">
		<?php get_template_part("template-parts/title/page-title");?>
		<div class="container">
			<?php if ( have_posts() ) :  while ( have_posts() ) : the_post(); $single_type = $post->post_type;?>
				<div class="single-content-wrap page-content">
					<?php get_template_part( 'template-parts/content/content-single', $single_type); ?>
				</div>
			<?php endwhile; endif; ?>
		</div>
	</div>
<?php get_footer(); ?>