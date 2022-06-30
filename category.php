<?php get_header(); ?>
<div class="single-page">
    <div class="container">
        <div class="main-single">


            <section class="category-post">
                <div class="category-head">
                    <h4>آخرین مطالب از<span style="color: #5caf21;"><?= get_the_archive_title(); ?></span></h4>
                </div>
                <?php while(have_posts()): the_post(); ?>
                    <div class="item box-article">
                        <img src="<?php the_post_thumbnail_url('article') ?>">
                        <h2><a href="<?php the_permalink() ?>"><?php the_title() ?></a> </h2>
                        <p><?php the_excerpt() ?></p>
                        <div class="btn-more"><a href="<?php the_permalink() ?>">بیشتر بخوانید</a> </div>
                    </div>
                <?php endwhile; ?>
        </div>

        <?php get_template_part('inc/index','sidebar') ?>
        
    </div>
</div>

<?php get_footer(); ?>