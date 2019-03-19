<div class="paginate">
	<?php
		if(function_exists('wp_pagenavi'))
			wp_pagenavi(array( 'query' => $the_query ));
		else {
			theme_pagination();
		 }
	?>
</div>