<div class="col-xs-12 col-mo-6 col-sm-4">
	<?php
		$thumb_id = get_post_thumbnail_id($post -> ID);
		$image_url = wp_get_attachment_url($thumb_id);
	?>
	<article>
		<?php
			if($image_url){
				$image_resize = aq_resize( $image_url, 150, 150, true );
				$image_vals = $image_resize ? $image_resize : $image_url;
				echo '<div class="img-wrapper"><a href="'.get_permalink().'"><img src="'.$image_vals.'" /></a></div>';
			} 
		?>
		<div class="post-info">
			<div class="date"><?php the_time( get_option( 'date_format' ) ); ?></div>
			<h6><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h6>
		</div>
	</article>
</div>
				
