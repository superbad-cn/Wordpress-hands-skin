<div class="section-list">
    <?php if(have_rows('section')) { ?>
        <div class="row">
            <?php while(have_rows('section')) { the_row(); ?>
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="section-item">
                        <img src="<?php echo get_sub_field('img'); ?>" alt="">
                        <div class="section-item-info">
                            <h5><?php echo get_sub_field('title'); ?></h5>
                            <div class="section-item-desc"><?php echo get_sub_field('desc'); ?></div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    <?php } ?>
</div>