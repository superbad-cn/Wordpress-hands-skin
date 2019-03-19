<form class="search-form clearfix" method="get" action="<?php echo home_url(); ?>/">
	<input type="text" placeholder="Search..." id="s" name="s" value="<?php the_search_query(); ?>" />
	<button type="submit" value="Search"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
</form>