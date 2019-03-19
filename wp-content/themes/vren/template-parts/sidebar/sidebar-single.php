<?php
	global $post;
	$type_children_pages = [];
	$args = array(
		'post_type' => 'type',
		'orderby' => 'menu_order',
		'posts_per_page' => -1,
        'order'   => 'ASC',
	);
	$query = new WP_Query();
	$pages_query = $query -> query($args);
	$type_children_pages = get_page_children( $post->post_parent, $pages_query );
?>
<?php if($type_children_pages){?>
	<ul class="sub_page_list">
		<?php foreach($type_children_pages as $type_children_page){?>
			<?php
				$sub_post_title = $type_children_page -> post_title;
				$sub_post_id = $type_children_page -> ID;
            ?>
            <?php if($post->ID == $sub_post_id){ ?>
                <li class="current">
                    <a href="<?php echo post_permalink($sub_post_id);?>"><?php echo $sub_post_title;?></a>
                </li>
            <?php } else { ?>
                <li>
                    <a href="<?php echo post_permalink($sub_post_id);?>"><?php echo $sub_post_title;?></a>
                </li>
            <?php } ?>
		<?php }?>
	</ul>
<?php }?>