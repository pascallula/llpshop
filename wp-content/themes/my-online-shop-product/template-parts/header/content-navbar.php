<?php
/**
 * Template part for Nav Bar On Header
 *
 * @package My Online Shop Product
 * @subpackage my_online_shop_product
 */

    $turn_topbar_on     = get_theme_mod("my_online_shop_product_top_bar_display_setting_id", false);
    $phone_number       = get_theme_mod("my_online_shop_product_top_bar_phone_number_setting_id", "");
    $email_address      = get_theme_mod("my_online_shop_product_top_bar_email_address_setting_id", "");
    $youtube_link       = get_theme_mod("my_online_shop_product_top_bar_youtube_link_setting_id", "");
    $facebook_link      = get_theme_mod("my_online_shop_product_top_bar_facebook_link_setting_id", "");
    $linked_link        = get_theme_mod("my_online_shop_product_top_bar_linkedin_link_setting_id", "");
    $twitter_link       = get_theme_mod("my_online_shop_product_top_bar_twitter_link_setting_id", "");
    $instagram_link     = get_theme_mod("my_online_shop_product_top_bar_instagram_link_setting_id", "");
    $custom_logo_id     = get_theme_mod( 'custom_logo' );
    $logo               = wp_get_attachment_image_src( $custom_logo_id , 'full' );
    
?>
    <header class='my-online-shop-product-header'> 
        <?php if($turn_topbar_on): ?>
            <div class="my-online-shop-product-top-bar">
                <div class="top-bar-container">
                    <ul class="top-bar-menu-contact">   
                        <?php if(!empty($phone_number)): ?>
                            <li class="top-bar-item phone">
                                <a class="nav-link" href="tel:<?php echo esc_url( $phone_number ); ?>">
                                    <span class="telephone me-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-telephone" viewBox="0 0 16 16"><path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/></svg>
                                    </span>
                                    <?php printf( esc_html__( '%s', 'my-online-shop-product' ), $phone_number ); ?>
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if(!empty($email_address)): ?>
                            <li class="top-bar-item email">
                                <a class="nav-link" href="mailto:<?php echo esc_url( $email_address ); ?>">
                                    <span class="envelope me-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-envelope-arrow-down" viewBox="0 0 16 16"><path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v4.5a.5.5 0 0 1-1 0V5.383l-7 4.2-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h5.5a.5.5 0 0 1 0 1H2a2 2 0 0 1-2-1.99zm1 7.105 4.708-2.897L1 5.383zM1 4v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1"/><path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.354-1.646a.5.5 0 0 1-.722-.016l-1.149-1.25a.5.5 0 1 1 .737-.676l.28.305V11a.5.5 0 0 1 1 0v1.793l.396-.397a.5.5 0 0 1 .708.708l-1.25 1.25Z"/></svg>
                                    </span>
                                    <?php printf( esc_html__( '%s', 'my-online-shop-product' ), $email_address ); ?>
                                </a>
                            </li>
                        <?php endif; ?>
                        <li>
                            <?php  get_template_part('template-parts/content', 'social-icon'); ?> 
                        </li> 
                    </ul>              
                    <ul class="top-bar-menu-additional">
                        <li class="top-bar-item woocommerce">
                            <?php if( class_exists( "WooCommerce" ) ): ?>  
                                <ul>
                                    <?php if ( is_user_logged_in() ) : ?>
                                        <li class="top-bar-item">
                                            <a class="nav-link" href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>">
                                                <?php esc_html_e( 'My Account', 'my-online-shop-product' ) ?>
                                            </a>
                                        </li>
                                        <li class="top-bar-item">
                                            <a class="nav-link" href="<?php echo esc_url( wp_logout_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ) );?>">
                                                <?php esc_html_e( 'Logout', 'my-online-shop-product'); ?>
                                            </a>
                                        </li>
                                    <?php else: ?>
                                        <li class="top-bar-item">
                                            <a class="nav-link" href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>">
                                                <?php esc_html_e( 'Login / Register', 'my-online-shop-product' ) ?>
                                            </a>
                                        </li>
                                    <?php endif; ?> 
                                    <li class="top-bar-item">
                                        <a class="nav-link cart" href="<?php echo esc_url( wc_get_cart_url() ); ?>"> 
                                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-cart3" viewBox="0 0 16 16">
                                            <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                            </svg>
                                            <span class="items">(<?php echo esc_html( WC()->cart->get_cart_contents_count() ); ?>)</span>
                                        </a>
                                    </li>
                                </ul>
                            <?php endif; ?> 
                        </li> 
                        <li class="top-bar-item search">
                            <button type="button" class="search-button" aria-label="<?php esc_attr_e( 'Search', "my-online-shop-product" ); ?>">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </button> 
                            <div class="search-form">  
                                <?php
                                    get_search_form();
                                ?>  
                            </div>  
                        </li>
                    </ul>  
                </div>                 
            </div>
        <?php endif; ?>
        <nav class="my-online-shop-product-nav-bar" id="my-online-shop-product-nav-bar" role="navigation" aria-label="<?php esc_attr_e( 'nav-bar navigation', 'my-online-shop-product' ); ?>">
            <div class="container">                    
                <a class="site-title" href="<?php echo esc_url(home_url('/')) ?>">
                    <?php if(has_custom_logo()): ?>     
                        <img src="<?php echo esc_url($logo[0]); ?>" alt="<?php bloginfo( 'name' ) ?>"> 
                    <?php else: ?>
                        <?php bloginfo('name') ?>
                    <?php endif; ?> 
                </a>  
                <button class="nav-menu-toggler" type="button" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle Navigation', 'my-online-shop-product' ) ?>">
                    <div class="nav-menu-toggler-bar start"></div>
                    <div class="nav-menu-toggler-bar middle"></div>
                    <div class="nav-menu-toggler-bar end"></div>
                </button>  
                <div class="nav-menu">       
                    <?php
                        if(has_nav_menu( 'main_nav_menu' ))
                        {
                            wp_nav_menu(array(
                                'theme_location' => 'main_nav_menu',
                                'container'      => '',
                                'menu'           => 'ul',
                                'menu_class'     => 'main_menu',
                                'fallback_cb'    => 'wp_page_menu',
                            ));
                        }
                    ?>    
                    <ul class="nav-menu-contact-md">
                        <?php if(!empty($phone_number)): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="tel:<?php echo esc_url($phone_number); ?>">
                                    <span class="telephone">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-telephone" viewBox="0 0 16 16"><path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/></svg>
                                    </span>
                                    <?php esc_html_e( 'Call Us:',"my-online-shop-product"); ?> <span><?php printf( esc_html__( '%s', 'my-online-shop-product' ), $phone_number ); ?></span>
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if(!empty($email_address)): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="tel:<?php echo esc_url($email_address); ?>">
                                    <span class="envelope">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-envelope-arrow-down" viewBox="0 0 16 16"><path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v4.5a.5.5 0 0 1-1 0V5.383l-7 4.2-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h5.5a.5.5 0 0 1 0 1H2a2 2 0 0 1-2-1.99zm1 7.105 4.708-2.897L1 5.383zM1 4v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1"/><path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.354-1.646a.5.5 0 0 1-.722-.016l-1.149-1.25a.5.5 0 1 1 .737-.676l.28.305V11a.5.5 0 0 1 1 0v1.793l.396-.397a.5.5 0 0 1 .708.708l-1.25 1.25Z"/></svg>
                                    </span>
                                    <?php esc_html_e( 'Email Us:',"my-online-shop-product"); ?> <span><?php printf( esc_html__( '%s', 'my-online-shop-product' ), $email_address ); ?></span>
                                </a>
                            </li>
                        <?php endif; ?>
                        <li class="nav-item">
                            <?php  get_template_part('template-parts/content', 'social-icon'); ?>   
                        </li>
                    </ul> 
                </div>
            </div>
        </nav>
    </header> 
    