<div class="col-xs-12 col-mo-6 col-sm-4">
	<article>
		<?php
			$thumb_id = get_post_thumbnail_id($post -> ID);
			$image_url = wp_get_attachment_url($thumb_id);
			$image_vals = aq_resize( $image_url, 200, 200, true );
			if(!$image_vals){
				$image_vals = aq_resize( PLACEHOLDER, 200, 200, true );
			}
		?>
		<div class="img-wrapper">
			<a href="<?php the_permalink(); ?>">
				<img src="<?php echo $image_vals;?>" />
			</a>
		</div>
		<div class="type-info">
			<h6><a href="<?php the_permalink(); ?>" class="black-3"><?php the_title(); ?></a></h6>
		</div>
	</article>
</div>