<?php if(!is_front_page() || !is_home()){ ?>
	<?php
		if(is_category()) {
			$image_url = get_field('banner', 'category'.'_'.get_queried_object()->term_id);
			if ($image_url) {
				$image_vals = aq_resize( $image_url, 1920, 450, true );
				$image_vals_mobile = aq_resize( $image_url, 900, 450, true );
			} else  {
				$image_vals = aq_resize( PLACEHOLDER, 1920, 450, true );
				$image_vals_mobile = aq_resize( PLACEHOLDER, 900, 450, true );
			}
			$page_title =  single_cat_title( "", false );
		} else if(is_tag()) {
			$page_title =  single_tag_title( "", false );
		} else if(is_tax()) {
			$tax_id = $wp_query->queried_object->term_id;
			$type_taxonomy = $wp_query->query_vars['taxonomy'];
			$image_url = get_field('banner', $type_taxonomy.'_'.$tax_id);
			if ($image_url) {
				$image_vals = aq_resize( $image_url, 1920, 450, true );
				$image_vals_mobile = aq_resize( $image_url, 900, 450, true );
			} else  {
				$image_vals = aq_resize( PLACEHOLDER, 1920, 450, true );
				$image_vals_mobile = aq_resize( PLACEHOLDER, 900, 450, true );
			}
			$page_title =  single_term_title( "", false );
		} else if(is_post_type_archive()) {
			$page_title = post_type_archive_title( '', false );
		} else if(is_single()){
			$category = get_the_category();
			if ( !is_wp_error($category) && $category[0]->taxonomy == 'category' ){
				$image_url = get_field('banner', 'category_'.$category[0]->term_id);
				if ($image_url) {
					$image_vals = aq_resize( $image_url, 1920, 450, true );
					$image_vals_mobile = aq_resize( $image_url, 900, 450, true );
				} else  {
					$image_vals = aq_resize( PLACEHOLDER, 1920, 450, true );
					$image_vals_mobile = aq_resize( PLACEHOLDER, 900, 450, true );
				}

			}
			$page_title = get_the_title();
		} else if ( is_day() ) {
			$thumb_id = get_post_thumbnail_id('1288');
			$image_url = wp_get_attachment_url($thumb_id);
			if ($image_url) {
				$image_vals = aq_resize( $image_url, 1920, 450, true );
				$image_vals_mobile = aq_resize( $image_url, 900, 450, true );
			} else  {
				$image_vals = aq_resize( PLACEHOLDER, 1920, 450, true );
				$image_vals_mobile = aq_resize( PLACEHOLDER, 900, 450, true );
			}
			$page_title = get_the_date();
		} else if ( is_month() ) {
			$thumb_id = get_post_thumbnail_id('1288');
			$image_url = wp_get_attachment_url($thumb_id);
			if ($image_url) {
				$image_vals = aq_resize( $image_url, 1920, 450, true );
				$image_vals_mobile = aq_resize( $image_url, 900, 450, true );
			} else  {
				$image_vals = aq_resize( PLACEHOLDER, 1920, 450, true );
				$image_vals_mobile = aq_resize( PLACEHOLDER, 900, 450, true );
			}
			$page_title = get_the_date( 'F Y' );
		} else if ( is_year() ) {
			$thumb_id = get_post_thumbnail_id('1288');
			$image_url = wp_get_attachment_url($thumb_id);
			if ($image_url) {
				$image_vals = aq_resize( $image_url, 1920, 450, true );
				$image_vals_mobile = aq_resize( $image_url, 900, 450, true );
			} else  {
				$image_vals = aq_resize( PLACEHOLDER, 1920, 450, true );
				$image_vals_mobile = aq_resize( PLACEHOLDER, 900, 450, true );
			}
			$page_title = get_the_date( 'Y' );
		} else if(is_search()) {
			$page_title = 'Search: '.get_search_query();
		} else {
			$thumb_id = get_post_thumbnail_id($post -> ID);
			if($thumb_id){
				$image_url = wp_get_attachment_url($thumb_id);
				$image_vals = aq_resize( $image_url, 1920, 450, true );
				$image_vals_mobile = aq_resize( $image_url, 900, 450, true );
				if(empty($image_vals)){
					$image_vals = aq_resize( PLACEHOLDER, 1920, 450, true );
					$image_vals_mobile = aq_resize( PLACEHOLDER, 900, 450, true );
				}
			} else {
				$parent = $post->post_parent;
				if($parent != '0'){
					$thumb_id = get_post_thumbnail_id($parent);
				} else {
					$ancestors = array_reverse(get_ancestors($post->ID, 'page'));
					if(!empty($ancestors)){
						$ancestor_id = $ancestors[0];
						if($ancestor_id != '0'){
							$thumb_id = get_post_thumbnail_id($ancestor_id);
						}
					}
				}
				if($thumb_id){
					$image_url = wp_get_attachment_url($thumb_id);
					$image_vals = aq_resize( $image_url, 1920, 450, true );
					$image_vals_mobile = aq_resize( $image_url, 900, 450, true );
				} else {
					$image_vals = aq_resize( PLACEHOLDER, 1920, 450, true );
					$image_vals_mobile = aq_resize( PLACEHOLDER, 900, 450, true );
				}
				if(empty($image_vals)){
					$image_vals = aq_resize( PLACEHOLDER, 1920, 450, true );
					$image_vals_mobile = aq_resize( PLACEHOLDER, 900, 450, true );
				}
			}
			$page_title = get_the_title();
		}
	?>
	<div class="banner">
		<div class="banner-img pc-banner"><img src="<?php echo $image_vals; ?>" alt="" /></div>
		<div class="banner-img mobile-banner"><img src="<?php echo $image_vals_mobile; ?>" alt="" /></div>
		<div class="container">
			<div class="main-title">
	            <h3>
	                <?php echo $page_title; ?>
	            </h3>
	            <div class="breadcrumbs <?php echo $breadcrumbs_color; ?>" typeof="BreadcrumbList" vocab="http://schema.org/">
	                <?php if(function_exists('bcn_display'))
	                {
	                    bcn_display();
	                }?>
	            </div>
            </div>
       </div>
	</div>
<?php }?>