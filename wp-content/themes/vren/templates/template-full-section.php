<?php
	/*
	Template Name: 满宽模板
	*/
?>
<?php get_header(); ?>
	<div class="content-area">
		<?php get_template_part("template-parts/title/page-title");?>
		<div class="page-full-section">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'template-parts/content/content', 'page' ); ?>
			<?php endwhile; endif; ?>
		</div>
	</div>
<?php get_footer();?>