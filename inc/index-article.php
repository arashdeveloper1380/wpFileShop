<?php 
    $option = array(
      'post-type'=>'post',
      'post-per-page'=>'8'
    );
    $article = new WP_Query($option);
    if($article):
?>
<section class="article">
    <div class="container">
        <div class="article-head">
            <div class="article-title">
                <h2>مقالات</h2>
                <h5>بلاگ</h5>
            </div>

            <div class="article-link">
                <a href="<?php get_post_type_archive_link( 'post' ) ?>">مقالات بیشتر</a>
            </div>
        </div>

        <div class="article-slider">
            <div id="multi_slider" class="owl-carousel owl-theme">
                <?php while($article->have_posts()): $article->the_post(); ?>
                    <div class="item box-article">
                        <img src="<?php the_post_thumbnail_url('article') ?>">
                        <h2><a href="<?php the_permalink() ?>"><?php the_title() ?></a> </h2>
                        <p><?php the_excerpt() ?></p>
                        <div class="btn-more"><a href="<?php the_permalink() ?>">بیشتر بخوانید</a> </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>

    </div>
</section>
<?php endif; wp_reset_postdata(); ?>


<div class="line"></div>