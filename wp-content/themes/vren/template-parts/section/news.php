
<?php if ( $posts->have_posts() ) { while ($posts->have_posts()) { $posts->the_post(); ?>
    <div class="col-12 col-md-6">
        <div class="news-item">
            <?php
                $thumb_id = get_post_thumbnail_id($post -> ID);
                $image_url = wp_get_attachment_url($thumb_id);
                $image_vals = aq_resize( $image_url, 480, 300, true );
                if(!$image_vals){
                    $image_vals = aq_resize( PLACEHOLDER, 480, 300, true );
                }
                $get_tax = get_the_terms( $post -> ID, 'category');
                $tax_name = $get_tax[0]->name;
                $tax_id = $get_tax[0]->term_id;
            ?>
            <div class="news-cat">
                <div class="news-cat-title"><?php echo $tax_name;?></div>
                <a class="read-more" href="<?php echo get_term_link( $tax_id );?>">查看全部 <span class="flaticon-keyboard-right-arrow-button"></span></a>
            </div>
            <div class="news-thumbnail zoom-in">
                <a href="<?php echo get_permalink(); ?>"><img src="<?php echo $image_vals; ?>" alt=""></a>
            </div>
            <h5 class="news-title">
                <a href="<?php echo get_permalink(); ?>"><?php echo get_the_title(); ?></a>
            </h5>
            <div class="news-meta">
                <span><img src="<?php echo get_template_directory_uri().'/assets/images/meta-icon01.png'; ?>" alt=""><?php the_time("Y-m-d");?></span>
            </div>
            <div class="news-excerpt"><?php echo wp_trim_words(get_the_excerpt(), 55);?></div>
            <div class="news-btn"><a class="btn btn-outline-primary btn-sm" href="<?php echo get_permalink(); ?>">查看详情</a></div>
        </div>
    </div>
<?php } } else { ?>
    <h4>暂无文章</h4>
<?php } ?>