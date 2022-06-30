<section class="tv">
    <div class="container">
        <div class="tv-head">
            <div class="tv-title">
                <h2>وبسافت TV</h2>
                <h5>تلویزیون وبسافت3</h5>
            </div>

            <div class="tv-link">
                <a href="<?php echo get_post_type_archive_link('tv'); ?>">ویدئوهای بیشتر</a>
            </div>
        </div>

        <div class="box-tv">
            <div class="tv-right">
                <?php 
                    $f_tv = new WP_Query(array(
                        'post_type' => 'tv',
                        'posts_per_page' => 1,
                    ));
                    if($f_tv->have_posts()):
                        while($f_tv->have_posts()): $f_tv->the_post();
                ?>
                    <div class="first-post">
                        <a href="<?php the_permalink() ?>">
                            <figure class="relative">
                                <img src="<?php the_post_thumbnail_url() ?>">
                                <i class="fas fa-play-circle"></i>
                                <span class="time-video"><?= get_post_meta(get_the_ID(),'time_video',true)?></span>
                            </figure>
                        </a>
                    </div>
                <?php endwhile; endif; wp_reset_postdata(); ?>
            </div>
            <div class="tv-left">
            <?php 
                    $two_tv = new WP_Query(array(
                        'post_type' => 'tv',
                        'posts_per_page' => 4,
                        'offset'=>1
                    ));
                    if($two_tv->have_posts()):
                        while($two_tv->have_posts()): $two_tv->the_post();
                ?>
            <div class="other-post">
                <a href="<?php the_permalink() ?>">
                    <figure class="relative">
                        <img src="<?php the_post_thumbnail_url() ?>">
                        <i class="fas fa-play"></i>
                        <h2><?php the_title() ?></h2>
                        <span class="time-video"><?= get_post_meta(get_the_ID(),'time_video',true)?></span>
                    </figure>
                </a>
            </div>
                <?php endwhile; endif; wp_reset_postdata(); ?>
                <div class="more-tv">
                    <a href="#">ویدئوهای بیشتر</a>
                </div>
            </div>
        </div>

    </div>
</section>
<div class="line"></div>
