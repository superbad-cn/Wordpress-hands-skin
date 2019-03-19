<aside id="main-sidebar" class="col-12 col-md-4 col-lg-3 order-md-first">
    <div class="sidebar-list">
        <?php if($post->post_parent == 0){ ?>
            <h4 class="parent-title"><?php echo get_the_title(); ?></h4>
            <ul class="list-unstyled">
                <li class="current"><a href="<?php echo get_permalink(); ?>"><?php echo get_the_title(); ?></a></li>
        <?php }else{ ?>
            <h4 class="parent-title"><?php echo get_the_title($post->post_parent); ?></h4>
            <ul class="list-unstyled">
            <?php
                $pagekids = [];
                $args = array(
                    'sort_order' => 'asc',
                    'sort_column' => 'menu_order',
                    'hierarchical' => -1,
                    'parent' => $post->post_parent,
                    'post_status' => 'publish'
                );
                $pagekids = get_pages($args);
                foreach ($pagekids as $pagekid) {
            ?>
            <?php if($post->ID == $pagekid->ID){ ?>
                <li class="current">
            <?php } else { ?>
                <li>
            <?php } ?>
                    <a href="<?php echo get_permalink($pagekid); ?>"><?php echo $pagekid -> post_title; ?></a>
                </li>
            <?php } ?>
        <?php } ?>
        </ul>
    </div>
</aside>