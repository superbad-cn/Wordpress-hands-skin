<?php get_header(); ?>
	<div class="content-area">
		<?php get_template_part("template-parts/title/page-title");?>
		<div class="container">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<div class="page-content">
					<?php get_template_part('template-parts/content/content', 'page'); ?>
				</div>
			<?php endwhile; endif; ?>
		</div>
	</div>
<?php get_footer();?>