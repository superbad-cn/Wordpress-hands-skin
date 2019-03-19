<?php
	if(is_tax()){
		$current_term = $wp_query->queried_object;
		$current_term_info = get_term( $current_term->term_id, $type_taxonomy );
	}
?>
<div class="custom-page-sidebar sidebar-box">
	<div class="sidebar-list">
		<ul class="list-unstyled">
			<!-- Begin custom tax loop -->
			<?php
				$sidebar_cats_level01 = [];
				$args = array(
					'hide_empty'        => false,
					'fields'            => 'all',
					'parent'            => 0,
					'hierarchical'      => true
				);
				$sidebar_cats_level01 = get_terms('project-category',$args);
				foreach ( $sidebar_cats_level01 as $sidebar_cat_level01 ) {
			?>
			<?php if($current_term_info->slug == $sidebar_cat_level01->slug){ ?>
				<li class="current-cat">
			<?php } else { ?>
				<li>
			<?php } ?>
					<a href="<?php echo get_term_link( $sidebar_cat_level01 );?>"><?php echo $sidebar_cat_level01->name; ?></a> <!-- first level categpry-->
					<?php
						$sidebar_cats_level02 = [];
						$args_2 = array(
							'hide_empty'        => false,
							'fields'            => 'all',
							'parent'            => $sidebar_cat_level01 -> term_id,
							'hierarchical'      => true,
						);
						$sidebar_cats_level02 = get_terms('project-category',$args_2);

						if($sidebar_cats_level02){
						echo "<ul class='children'>";
						foreach ( $sidebar_cats_level02 as $sidebar_cat_level02 ) {
					?>
						<?php if($current_term_info->slug == $sidebar_cat_level02->slug){ ?>
							<li class="current-cat">
						<?php } else { ?>
							<li>
						<?php } ?>
						<a href="<?php echo get_term_link( $sidebar_cat_level02 );?>"><?php echo $sidebar_cat_level02->name; ?></a> <!-- first level categpry-->
					<?php } ?>
					<?php echo '</ul>'; } ?>
				</li>
			<?php } ?>
		</ul>
	</div>
</div>