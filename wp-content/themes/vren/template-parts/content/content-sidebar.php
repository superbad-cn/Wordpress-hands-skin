<div class="page-sidebar-wrapper">
	<div class="row">
		<aside id="main-sidebar" class="col-xs-12 col-sm-3 col-sm-push-9">
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar-1') ) : ?>
			<?php endif; ?>
		</aside>
		<div class="col-xs-12 col-sm-9 col-sm-pull-3">
			<div class="content-detail">
				<?php the_content();?>
			</div>
		</div>
	</div>
</div>