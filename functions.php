<?php


function add_theme_scripts(){
    // اضافه کردن فایل های css
    wp_enqueue_style('all' , get_template_directory_uri() . '/css/all.css' , array() , false , 'all');
    wp_enqueue_style('owl.carousel' , get_template_directory_uri() . '/css/owl.carousel.min.css' , array() , false , 'all');
    wp_enqueue_style('owl.theme' , get_template_directory_uri() . '/css/owl.theme.default.min.css' , array() , false , 'all');
    wp_enqueue_style('style' , get_stylesheet_uri() , array() , false , 'all');

    //اضافه کردن فایل جاوااسکریپت
    wp_enqueue_script('jq' , get_template_directory_uri() . '/js/jquery-3.5.1.min.js' , array() , false , true);
    wp_enqueue_script('owl.carousel.js' , get_template_directory_uri() . '/js/owl.carousel.min.js' , array('jquery') , false , true);
    wp_enqueue_script('main' , get_template_directory_uri() . '/js/main.js' , array('jquery') , false , true);
}
add_action( 'wp_enqueue_scripts', 'add_theme_scripts' );



function arash_setup_theme(){
    add_theme_support('title-tag');
    add_theme_support('automatic-feed-links');
    add_theme_support('post-thumbnail');
    

    add_theme_support('woocommerce');


    add_image_size('article','313', '181', true);

    register_nav_menus( array(
        'main'=>'منوی اصلی'
    ));
}
add_action('init','arash_setup_theme');




function woocommercearash(){
    add_theme_support('woocommerce');
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');
}
add_action('after_setup_theme', 'woocommercearash');




// Post Type TV
function post_type_arash_tv() {
    $labels = array(
        'name'               => __( 'آرشTV' ),
        'singular_name'      => __( 'آرشTV' ),
        'menu_name'          => __( 'آرشTV' ),
        'name_admin_bar'     => __( 'آرشTV' ),
        'add_new'            => __( ' افزودن جدید' ),
        'add_new_item'       => __( 'پست مخصوص ویدیوهای آموزشی' ),
        'new_item'           => __( 'پست جدید' ),
        'edit_item'          => __( 'ویرایش پست' ),
        'view_item'          => __( 'مشاهده پست' ),
        'all_items'          => __( 'همه ویدیوها' ),
        'search_items'       => __( 'جستجو در بین ویدیوها' ),
        'parent_item_colon'  => __( 'مادر' ),
        'not_found'          => __( 'مطلب یافت نشد' ),
        'not_found_in_trash' => __( 'مطلب در زباله دان یافت نشد' )
    );
    $args = array(
        'labels'             => $labels,
        'description'        => __( 'Description.', 'your-plugin-textdomain' ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,

        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        //'taxonomies' => array('post_tag'),
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
    );
    register_post_type( 'tv', $args );
}
add_action( 'init', 'post_type_arash_tv' );





// Register TV Taxonomy
function tv_taxonomy() {

	$labels = array(
		'name'                       => _x( 'دسته بندی', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'دسته بندی', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'دسته بندی', 'text_domain' ),
		'all_items'                  => __( 'All Items', 'text_domain' ),
		'parent_item'                => __( 'Parent Item', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Item:', 'text_domain' ),
		'new_item_name'              => __( 'New Item Name', 'text_domain' ),
		'add_new_item'               => __( 'Add New Item', 'text_domain' ),
		'edit_item'                  => __( 'Edit Item', 'text_domain' ),
		'update_item'                => __( 'Update Item', 'text_domain' ),
		'view_item'                  => __( 'View Item', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
		'popular_items'              => __( 'Popular Items', 'text_domain' ),
		'search_items'               => __( 'Search Items', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
		'no_terms'                   => __( 'No items', 'text_domain' ),
		'items_list'                 => __( 'Items list', 'text_domain' ),
		'items_list_navigation'      => __( 'Items list navigation', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
        'query_var'                  =>true
	);
	register_taxonomy( 'tv_cat', array( 'tv' ), $args );

}
add_action( 'init', 'tv_taxonomy', 0 );


function arash_widget() {
    register_sidebar( array(
        'name'          => __( 'ناحیه کناری بلاگ' ),
        'id'            => 'arash_blog',
        'before_widget' => '<div class="single-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4>',
        'after_title'   => '</h4>',
    ) );
}
add_action( 'init', 'arash_widget' );


// Remove Related Product beetwen Product
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );


// add Tab Tearcher In SingleProduct
add_filter( 'woocommerce_product_tabs', 'woocommerce_product_teacher' );
function woocommerce_product_teacher( $tabs ) {
    $tabs['course_teacher'] = array(
        'title' 	=> __( 'مدرس', 'woocommerce' ),
        'priority' 	=> 20,
        'callback' 	=> 'woocommerce_product_teacher_content'
    );
    return $tabs;
}
function woocommerce_product_teacher_content() {
    $teacher_name = get_post_meta(get_the_ID() , 'teacher_name' , true);
    if (!empty($teacher_name)) {
    ?>
        <div class="course-teacher">
            <?php
            $teacher_pic = get_post_meta(get_the_ID() , 'teacher_pic' , true);
        if (!empty($teacher_pic)) {
            ?>
            <div class="teacher-pic">
                <img src="<?php echo $teacher_pic; ?>">
            </div>
            <?php
        }
            ?>

            <div class="teacher-aboute">
                <h5><?php echo $teacher_name; ?></h5>
                <?php
                $teacher_aboute = get_post_meta(get_the_ID() , 'teacher_about' , true);
                if (!empty($teacher_aboute)) {
                    echo $teacher_aboute;
                }
                ?>
            </div>
        </div>
    <?php
    }
}



// add Tab List Course
add_filter( 'woocommerce_product_tabs', 'woocommerce_product_course_list' );
function woocommerce_product_course_list( $tabs ) {
    $tabs['lesson_list'] = array(
        'title' 	=> __( 'فهرست جلسات', 'woocommerce' ),
        'priority' 	=> 10,
        'callback' 	=> 'woocommerce_product_lesson_list_content'
    );
    return $tabs;
}

function woocommerce_product_lesson_list_content(){
    include_once 'inc/lesson-couser.php';
}


// Remove Tab Additional Information Woocommerce

add_filter( 'woocommerce_product_tabs', 'my_remove_product_tabs', 98 );
 
function my_remove_product_tabs( $tabs ) {
  unset( $tabs['additional_information'] ); // To remove the additional information tab
  return $tabs;
}


/* WooCommerce: Free Products */
add_filter( 'woocommerce_get_price_html', 'novinadmin_price_zero', 100, 2 );
function novinadmin_price_zero( $price, $product ){
    if ( '0' === $product->get_price()  ) {
        $price = 'رایگان';
    }
    return $price;
}


// Remove WooCommerce Checkout Fields
add_filter( 'woocommerce_checkout_fields' , 'quadlayers_remove_checkout_fields' ); 

function quadlayers_remove_checkout_fields( $fields ) { 
    unset($fields['billing']['billing_company']);
    unset($fields['billing']['billing_address_1']);
    unset($fields['billing']['billing_address_2']);
    unset($fields['billing']['billing_city']);
    unset($fields['billing']['billing_postcode']);
    unset($fields['billing']['billing_country']);
    unset($fields['billing']['billing_state']);
    unset($fields['order']['order_comments']);
    unset($fields['account']['account_username']);
    unset($fields['account']['account_password']);
    unset($fields['account']['account_password-2']);
    return $fields; 
}

require_once dirname( __FILE__ ) . '/cmb2/init.php';
require_once dirname( __FILE__ ) . '/functions/cmb2-metabox.php';
