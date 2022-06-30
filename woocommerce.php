<?php 
if(is_singular('product')){
?>
<?php
get_header();
?>
<div class="single-page">
    <div class="container">
        <div class="main-single main-pro">
            <?php wc_print_notices()?>
            <div class="product-title">
                <header>
                    <h1><?php the_title() ?></h1>
                </header>
            </div>
            <div class="product-thumbnail">
                <figure>
                    <?php
                    $video_pro = get_post_meta(get_the_ID() , 'video_product' , true);
                    $poster = get_post_meta(get_the_ID() , 'poster_product' , true);
                    if (!empty($video_pro)) {
                        $attr = array(
                            'src'   =>  $video_pro,
                            'width' => '1200',
                            'height'    => '750',
                            'poster' => $poster,
                        );
                        echo wp_video_shortcode($attr);
                    }
                    else {?>
                        <img src="<?php the_post_thumbnail_url() ?>" width="100%">
                    <?php } ?>
                </figure>
            </div>
            <article class="product-single woocommerce">
                <div class="content-single">
                    <?php woocommerce_content() ?>
                </div>
            </article>

            <div class="related-product woocommerce">
                <?= do_shortcode('[related_products per_page=3 columns=3]')?>
            </div>
        </div>
        <div class="sidebar side-pro">
            <div class="single-widget">
                <div class="pro-price">
                    <span class="price-name">قیمت : </span>
                    <?= $product->get_price_html() ?>
                </div>


                <?php 
                    $id = $product->id;
                    if(is_user_logged_in()){
                        $current_user = wp_get_current_user();
                        $downloads = wc_get_customer_available_downloads($current_user->ID);
                    }
                    if(wc_customer_bought_product($current_user->user_email,$current_user->ID, $id)){?>
                        <div class="price-button">
                            <a>
                                <i class="fas fa-credit-card"></i>
                                دانشجوی دوره هستتید!
                            </a>
                        </div>
                    <?php }else{ ?>
                        <div class="price-button">
                            <a href="<?= do_shortcode("[add_to_cart_url id=$id]") ?>">
                                <i class="fas fa-credit-card"></i>
                                ثبت نام دوره
                            </a>
                        </div>
                <?php } ?>


                <div class="product-rate">
                    <div class="show-rate">
                        <?php woocommerce_template_loop_rating() ?>
                    </div>
                    <div class="woocommerce show-rate">
                        <?php woocommerce_template_loop_rating() ?>
                    </div>
                </div>

            </div>

            <?php if (wc_customer_bought_product(  $current_user->user_email ,  $current_user->ID , $id )) { ?>
                <div class="single-widget">
                    <div class="access-title" id="access_title">
                        <h4>دانلود فایل های دوره</h4>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="list-access-dl">
                        <?php foreach ( $downloads as $download ) :
                            echo '<a href="' . esc_url( $download['download_url'] ) . '" class="woocommerce-MyAccount-downloads-file button alt"> <i class="fas fa-download"></i> ' . esc_html( $download['download_name'] ) . '</a>';
                         endforeach; ?>
                    </div>
                </div>
            <?php } ?>


            <div class="single-widget">
                <div class="total-buyers">
                    <i class="fas fa-user"></i>
                    تعداد دانشجو : 
                    <span><?= get_post_meta($id, 'total_sales',true) ?></span>
                </div>
                <?php do_action("woocommerce_product_additional_information", $product) ?>
            </div>

            <div class="single-widget">
                <div class="std-box-view">
                    <span class="product-view">
                        <i class="fas fa-eye"></i>
                        <?php the_views() ?>
                    </span>
                    <span class="product-review-count">
                        <i class="fas fa-comments"></i>
                        <?= get_comments_number($id) ?> دیدگاه 
                    </span>
                </div>
            </div>
            
            <div class="single-widget">
                <div class="catname-pro">
                    <i class="fas fa-list"></i>
                    <?php echo wc_get_product_category_list($id, ', ', '<span class="posted_in">' . _n('Category:', 'Categories:', count($product->get_category_ids()), 'woocommerce') . ' ', '</span>'); ?>
                </div>
                <div class="shortlink-pro">
                    لینک کوتاه
                    <input type="text" value="<?= get_home_url() . "/?p=" . $id; ?>">
                </div>
            </div>

        </div>
    </div>
</div>
<?php get_footer(); ?>
<?php }else{
    woocommerce_get_template('archive-product.php');
} ?>