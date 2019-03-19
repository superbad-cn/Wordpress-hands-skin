<div class="single-content">
	<?php the_content();?>
	<?php
		if ( comments_open() || get_comments_number() ) :
		comments_template();
		endif;
		the_post_navigation(
			array(
				'prev_text' => '<span class="screen-reader-text">' . 'Previous Post' . '</span><span aria-hidden="true" class="nav-subtitle">' . 'Previous' . '</span> <span class="nav-title"><span class="nav-title-icon-wrapper">' . '' . '</span>%title</span>',
				'next_text' => '<span class="screen-reader-text">' . 'Next Post' . '</span><span aria-hidden="true" class="nav-subtitle">' . 'Next' . '</span> <span class="nav-title">%title<span class="nav-title-icon-wrapper">' . '' . '</span></span>',
			)
		);
	?>
</div>
