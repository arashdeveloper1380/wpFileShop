<!doctype html>
<html <?php language_attributes(); ?> >
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport"content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <?php wp_head(); ?>
</head>
<body>
<div class="top-menu">
    <div class="container">
        <div class="topbar-right">
            <ul>
                <li><i class="fas fa-phone"></i>  مشاوره و پشتیبانی واتساپ : 09355597139 </li>
                <li><i class="fa fa-envelope"></i>  ایمیل : websoft3.ir@gmail.com </li>
            </ul>
        </div>

        <div class="topbar-left">
            <ul>
                <li><i class="fas fa-shopping-bag"></i>  </li>
                <li class="search-icon"><i class="fas fa-search"></i> </li>
            </ul>
        </div>

    </div>
</div>
<header class="header">
    <div class="container">
        <div class="logo">
            <img src="<?php echo get_template_directory_uri().'/img/logo.png' ?>">
        </div>

        <nav class="main-menu">
            <?php wp_nav_menu(array('theme-location'=>'main', 'container'=>'')) ?>
        </nav>

        <div class="sign">
            <a href="#">   <i class="fas fa-user-lock"></i>  ورود / ثبت نام </a>
        </div>

        <div class="searchbox">
            <form method="get" action="<?php home_url('/'); ?>">
                <input type="text" name="s" value="<?php the_search_query(); ?>" placeholder="جستجو کنید...">
                <button class="fas fa-search"></button>
            </form>
        </div>

    </div>
</header>