<?php get_header() ?>
<div class="single-page">
    <div class="container">
        <div class="main-single">
            <?php while(have_posts()): the_post() ?>
            <article class="post-single">
                <header><h1><?php the_title() ?></h1>
                    <div class="post-meta">
                        <i class="fas fa-clock"></i>
                        <span><?php the_time('j F') ?></span>
                    </div>
                    <div class="post-meta">
                        <i class="fas fa-user"></i>
                        <span><?php the_author() ?></span>
                    </div>
                    <div class="post-meta">
                        <i class="fas fa-folder-open"></i>
                        <span><a href="#" target="_blank"><?php the_category(' , ') ?></a> </span>
                    </div>
                    <div class="post-meta">
                        <i class="fas fa-eye"></i>
                        <span><?php the_views() ?></span>
                    </div>
                </header>

                <div class="post-thumbnail">
                    <figure>
                        <img src="<?php the_post_thumbnail_url() ?>">
                    </figure>
                </div>

                <div class="content-single">
                    <p><?php the_content() ?></p>
                </div>
            </article>
            <?php endwhile; ?>
            <section class="related-post">
                <div class="related-head">
                    <h4>مطالب مرتبط</h4>
                </div>

                <div class="article-slider">
                    <div id="related_slider" class="owl-carousel owl-theme">
                    <?php
                        $related = get_posts( array(
                            'category__in' => wp_get_post_categories($post->ID),
                            'numberposts' => 5,
                            'post__not_in' => array($post->ID) ) );
                        if( $related ) foreach( $related as $post ) {
                        setup_postdata($post); ?>
                        <div class="item box-article">
                        <?php the_post_thumbnail('article'); ?>
                            <h2><a href="<?php the_permalink(); ?>" target="_blank"><?php the_title(); ?></a> </h2>
                            <?php the_excerpt(); ?>
                            <div class="btn-more"><a href="<?php the_permalink(); ?>">بیشتر بخوانید</a> </div>
                        </div>
                    <?php }
                        wp_reset_postdata(); ?>
                    </div>
                </div>
            </section>
            <div class="comment-box">
                <div class="related-head">
                    <h4>نظرات : </h4>
                </div>
                <?php
                if ( comments_open() || get_comments_number() ) :
                    comments_template();
                endif;
                ?>
            </div>
        </div>
        <?php get_template_part('inc/index','sidebar') ?>
    </div>
</div>
<?php get_footer() ?>