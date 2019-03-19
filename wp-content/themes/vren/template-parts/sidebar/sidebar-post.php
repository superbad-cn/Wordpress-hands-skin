<div class="news-sidebar-wrap">
    <h3 class="news-sidebar-main-title"><?php echo get_the_title('1'); ?></h3>
    <div class="news-sidebar-list">
        <?php
            $query_args = array(
                'post_type' => 'post',
                'category__in' => 1,
                'posts_per_page' => 4,
                'order' => 'DESC'
            );
            $sidebar_query = new WP_Query( $query_args );
        ?>
        <?php if ( $sidebar_query->have_posts() ){ ?>
            <?php while ( $sidebar_query->have_posts() ) { $sidebar_query->the_post(); ?>
                <div class="news-sidebar-item">
                    <div class="row">
                        <?php
                            $thumb_id = get_post_thumbnail_id($post -> ID);
                            $image_url = wp_get_attachment_url($thumb_id);
                            if($image_url){
                                $image_vals = aq_resize( $image_url, 260, 160, true );
                                if(empty($image_vals)){
                                    $image_vals = aq_resize( PLACEHOLDER, 260, 160, true );
                                }
                            }
                        ?>
                        <div class="col-5">
                            <div class="news-sidebar-img zoom-in">
                                <img src="<?php echo $image_vals; ?>" alt="">
                            </div>
                        </div>
                        <div class="col-7">
                            <h6>
                                <a href="<?php echo get_permalink(); ?>"><?php echo get_the_title(); ?></a>
                            </h6>
                            <div class="news-meta">
                                <span><img src="<?php echo get_template_directory_uri().'/assets/images/meta-icon01.png'; ?>" alt=""><?php the_time("Y-m-d");?></span>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        <?php } wp_reset_query(); ?>
    </div>
</div>