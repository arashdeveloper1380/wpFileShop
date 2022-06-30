<?php get_header() ?>
<div class="single-page">
    <div class="container">
        <div class="main-single full-width">
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
        </div>
    </div>
</div>
<?php get_footer(); ?>