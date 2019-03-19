	</main><!-- #main -->
	<footer id="colophon">
		<div class="container">
			<div class="footer-top">
				<?php dynamic_sidebar( 'footer' ); ?>
			</div>
			<div class="footer-copyright">
				Copyright &copy;<?php the_date('Y');?> <?php echo '<a href="' . home_url() . '">' . get_bloginfo( 'name' ) .'</a>  All Rights Reserved. '; ?>
			</div>
		</div>
	</footer><!-- #colophon -->
<?php wp_footer(); ?>
</body>
</html>
