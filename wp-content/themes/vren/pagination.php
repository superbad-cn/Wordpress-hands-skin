<div class="paginate">
	<?php
	if(function_exists('wp_pagenavi'))
		wp_pagenavi();
	else {
		theme_pagination();
	 } ?>
</div>