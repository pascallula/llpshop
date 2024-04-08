<?php
/**
 * Header Layout
 * @package Carpenter Shop
 */

$carpenter_shop_defaults = carpenter_shop_get_default_theme_options();

$carpenter_shop_header_layout_topbar_text = esc_html( get_theme_mod( 'carpenter_shop_header_layout_topbar_text',
$carpenter_shop_defaults['carpenter_shop_header_layout_topbar_text'] ) );

$carpenter_shop_header_layout_wishlist_link = esc_html( get_theme_mod( 'carpenter_shop_header_layout_wishlist_link',
$carpenter_shop_defaults['carpenter_shop_header_layout_wishlist_link'] ) );

$carpenter_shop_header_layout_wishlist_text = esc_html( get_theme_mod( 'carpenter_shop_header_layout_wishlist_text',
$carpenter_shop_defaults['carpenter_shop_header_layout_wishlist_text'] ) );

$carpenter_shop_header_layout_compare_link = esc_html( get_theme_mod( 'carpenter_shop_header_layout_compare_link',
$carpenter_shop_defaults['carpenter_shop_header_layout_compare_link'] ) );

$carpenter_shop_header_layout_compare_text = esc_html( get_theme_mod( 'carpenter_shop_header_layout_compare_text',
$carpenter_shop_defaults['carpenter_shop_header_layout_compare_text'] ) );

$carpenter_shop_header_layout_phone_number = esc_html( get_theme_mod( 'carpenter_shop_header_layout_phone_number',
$carpenter_shop_defaults['carpenter_shop_header_layout_phone_number'] ) );

$carpenter_shop_sticky = get_theme_mod('carpenter_shop_sticky');
$carpenter_shop_data_sticky = "false";
if ($carpenter_shop_sticky) {
$carpenter_shop_data_sticky = "true";
}
global $wp_customize;

?>

<section id="top-header">
    <div class="wrapper header-wrapper">
        <div class="theme-header-areas header-areas-left">
            <?php if( $carpenter_shop_header_layout_topbar_text ){ ?>
                <p><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 640 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M624 352h-16V243.9c0-12.7-5.1-24.9-14.1-33.9L494 110.1c-9-9-21.2-14.1-33.9-14.1H416V48c0-26.5-21.5-48-48-48H112C85.5 0 64 21.5 64 48v48H8c-4.4 0-8 3.6-8 8v16c0 4.4 3.6 8 8 8h272c4.4 0 8 3.6 8 8v16c0 4.4-3.6 8-8 8H40c-4.4 0-8 3.6-8 8v16c0 4.4 3.6 8 8 8h208c4.4 0 8 3.6 8 8v16c0 4.4-3.6 8-8 8H8c-4.4 0-8 3.6-8 8v16c0 4.4 3.6 8 8 8h208c4.4 0 8 3.6 8 8v16c0 4.4-3.6 8-8 8H64v128c0 53 43 96 96 96s96-43 96-96h128c0 53 43 96 96 96s96-43 96-96h48c8.8 0 16-7.2 16-16v-32c0-8.8-7.2-16-16-16zM160 464c-26.5 0-48-21.5-48-48s21.5-48 48-48 48 21.5 48 48-21.5 48-48 48zm320 0c-26.5 0-48-21.5-48-48s21.5-48 48-48 48 21.5 48 48-21.5 48-48 48zm80-208H416V144h44.1l99.9 99.9V256z"/></svg><?php echo esc_html( $carpenter_shop_header_layout_topbar_text ); ?></p>
            <?php } ?>
        </div>
        <div class="theme-header-areas header-areas-right menu-area-header">
            <?php if( $carpenter_shop_header_layout_wishlist_link || $carpenter_shop_header_layout_wishlist_text ){ ?>
                <a href="<?php echo esc_url( $carpenter_shop_header_layout_wishlist_link ); ?>"><?php echo esc_html( $carpenter_shop_header_layout_wishlist_text ); ?></a>
            <?php } ?>
            <?php if( $carpenter_shop_header_layout_compare_link || $carpenter_shop_header_layout_compare_text ){ ?>
                <a href="<?php echo esc_url( $carpenter_shop_header_layout_compare_link ); ?>"><?php echo esc_html( $carpenter_shop_header_layout_compare_text ); ?></a>
            <?php } ?>
        </div>
    </div>
</section>

<header id="site-header" class="site-header-layout header-layout" role="banner">
    <div class="header-navbar center-header">
        <div class="wrapper header-wrapper">
            <div class="theme-header-areas header-areas-left">
                <div class="header-titles">
                    <?php
                    carpenter_shop_site_logo();
                    carpenter_shop_site_description();
                    ?>
                </div>
            </div>
            <div class="theme-header-areas header-areas-right">
                <?php if(class_exists('woocommerce')){ ?>
                    <div class="serach_inner">
                        <?php get_product_search_form(); ?>
                    </div>
                <?php } ?>
            </div>
            <div class="theme-header-areas header-areas-right">
                <?php if( $carpenter_shop_header_layout_phone_number ){ ?>
                    <span class="phone-area"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M493.4 24.6l-104-24c-11.3-2.6-22.9 3.3-27.5 13.9l-48 112c-4.2 9.8-1.4 21.3 6.9 28l60.6 49.6c-36 76.7-98.9 140.5-177.2 177.2l-49.6-60.6c-6.8-8.3-18.2-11.1-28-6.9l-112 48C3.9 366.5-2 378.1.6 389.4l24 104C27.1 504.2 36.7 512 48 512c256.1 0 464-207.5 464-464 0-11.2-7.7-20.9-18.6-23.4z"/></svg><a href="tel:<?php echo esc_attr( $carpenter_shop_header_layout_phone_number ); ?>"><?php echo esc_html( $carpenter_shop_header_layout_phone_number ); ?></a></span>
                <?php } ?>
                <?php if(class_exists('woocommerce')){ ?>
                    <?php if ( is_user_logged_in() ) { ?>
                        <a class="account-area" href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>" title="<?php esc_attr_e('My Account','carpenter-shop'); ?>"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M497 273L329 441c-15 15-41 4.5-41-17v-96H152c-13.3 0-24-10.7-24-24v-96c0-13.3 10.7-24 24-24h136V88c0-21.4 25.9-32 41-17l168 168c9.3 9.4 9.3 24.6 0 34zM192 436v-40c0-6.6-5.4-12-12-12H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h84c6.6 0 12-5.4 12-12V76c0-6.6-5.4-12-12-12H96c-53 0-96 43-96 96v192c0 53 43 96 96 96h84c6.6 0 12-5.4 12-12z"/></svg></a>
                    <?php }
                    else { ?>
                        <a class="account-area" href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>" title="<?php esc_attr_e('Login / Register','carpenter-shop'); ?>"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm89.6 32h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-41.6c0-74.2-60.2-134.4-134.4-134.4z"/></a>
                    <?php } ?>
                    <span class="cart_no">
                        <a href="<?php if(function_exists('wc_get_cart_url')){ echo esc_url(wc_get_cart_url()); } ?>" title="<?php esc_attr_e( 'shopping cart','carpenter-shop' ); ?>"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M528.12 301.319l47.273-208C578.806 78.301 567.391 64 551.99 64H159.208l-9.166-44.81C147.758 8.021 137.93 0 126.529 0H24C10.745 0 0 10.745 0 24v16c0 13.255 10.745 24 24 24h69.883l70.248 343.435C147.325 417.1 136 435.222 136 456c0 30.928 25.072 56 56 56s56-25.072 56-56c0-15.674-6.447-29.835-16.824-40h209.647C430.447 426.165 424 440.326 424 456c0 30.928 25.072 56 56 56s56-25.072 56-56c0-22.172-12.888-41.332-31.579-50.405l5.517-24.276c3.413-15.018-8.002-29.319-23.403-29.319H218.117l-6.545-32h293.145c11.206 0 20.92-7.754 23.403-18.681z"/></svg></a>
                    </span>
                <?php }?>
            </div>
        </div>
    </div>
    <div class="header-navbar lower-header <?php if( is_user_logged_in() && !isset( $wp_customize ) ){ echo "login-user";} ?>" data-sticky="<?php echo esc_attr($carpenter_shop_data_sticky); ?>">
        <div class="wrapper header-wrapper">
            <div class="theme-header-areas header-areas-left">
                <?php if(class_exists('woocommerce')){ ?>
                    <div class="product-category-area">
                        <button class="product-btn"><?php esc_html_e('Shop By Department','carpenter-shop'); ?><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M16 132h416c8.837 0 16-7.163 16-16V76c0-8.837-7.163-16-16-16H16C7.163 60 0 67.163 0 76v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16z"/></svg></button>
                        <div class="product-cat">
                            <?php
                                $args = array(
                                    'orderby'    => 'title',
                                    'order'      => 'ASC',
                                    'hide_empty' => 0,
                                    'parent'  => 0
                                );
                                $product_categories = get_terms( 'product_cat', $args );
                                $count = count($product_categories);
                                if ( $count > 0 ){
                                    foreach ( $product_categories as $product_category ) {
                                    $product_cat_id   = $product_category->term_id;
                                    $cat_link = get_category_link( $product_cat_id );
                                    if ($product_category->category_parent == 0) { ?>
                                    <li class="drp_dwn_menu"><a href="<?php echo esc_url(get_term_link( $product_category ) ); ?>">
                                <?php
                            }
                            echo esc_html( $product_category->name ); ?></a><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 192 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M0 384.662V127.338c0-17.818 21.543-26.741 34.142-14.142l128.662 128.662c7.81 7.81 7.81 20.474 0 28.284L34.142 398.804C21.543 411.404 0 402.48 0 384.662z"/></svg></li>
                            <?php } } ?>
                        </div>
                    </div>
                <?php }?>
            </div>
            <div class="theme-header-areas header-areas-right">
                <div class="site-navigation">
                   <nav class="primary-menu-wrapper" aria-label="<?php esc_attr_e('Horizontal', 'carpenter-shop'); ?>" role="navigation">
                        <ul class="primary-menu theme-menu">
                            <?php
                            if (has_nav_menu('carpenter-shop-primary-menu')) {
                                wp_nav_menu(
                                    array(
                                        'container' => '',
                                        'items_wrap' => '%3$s',
                                        'theme_location' => 'carpenter-shop-primary-menu',
                                    )
                                );
                            } else {
                                wp_list_pages(
                                    array(
                                        'match_menu_classes' => true,
                                        'show_sub_menu_icons' => true,
                                        'title_li' => false,
                                        'walker' => new Carpenter_Shop_Walker_Page(),
                                    )
                                );
                            } ?>
                        </ul>
                    </nav>
                </div>
                <div class="navbar-controls twp-hide-js">
                    <button type="button" class="navbar-control navbar-control-offcanvas">
                        <span class="navbar-control-trigger" tabindex="-1">
                            <?php carpenter_shop_the_theme_svg('menu'); ?>
                        </span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</header>