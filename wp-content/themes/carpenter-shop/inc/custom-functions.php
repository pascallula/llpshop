<?php
/**
 * Custom Functions.
 *
 * @package Carpenter Shop
 */

if( !function_exists( 'carpenter_shop_fonts_url' ) ) :

    //Google Fonts URL
    function carpenter_shop_fonts_url(){

        $carpenter_shop_font_families = array(
            'Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900',
        );

        $carpenter_shop_fonts_url = add_query_arg( array(
            'family' => implode( '&family=', $carpenter_shop_font_families ),
            'display' => 'swap',
        ), 'https://fonts.googleapis.com/css2' );

        return esc_url_raw($carpenter_shop_fonts_url);

    }

endif;

if ( ! function_exists( 'carpenter_shop_sub_menu_toggle_button' ) ) :

    function carpenter_shop_sub_menu_toggle_button( $args, $item, $depth ) {

        // Add sub menu toggles to the main menu with toggles
        if ( $args->theme_location == 'carpenter-shop-primary-menu' && isset( $args->show_toggles ) ) {
            
            // Wrap the menu item link contents in a div, used for positioning
            $args->before = '<div class="submenu-wrapper">';
            $args->after  = '';

            // Add a toggle to items with children
            if ( in_array( 'menu-item-has-children', $item->classes ) ) {

                $toggle_target_string = '.menu-item.menu-item-' . $item->ID . ' > .sub-menu';

                // Add the sub menu toggle
                $args->after .= '<button type="button" class="theme-aria-button submenu-toggle" data-toggle-target="' . $toggle_target_string . '" data-toggle-type="slidetoggle" data-toggle-duration="250" aria-expanded="false"><span class="btn__content" tabindex="-1"><span class="screen-reader-text">' . esc_html__( 'Show sub menu', 'carpenter-shop' ) . '</span>' . carpenter_shop_get_theme_svg( 'chevron-down' ) . '</span></button>';

            }

            // Close the wrapper
            $args->after .= '</div><!-- .submenu-wrapper -->';
            // Add sub menu icons to the main menu without toggles (the fallback menu)

        }elseif( $args->theme_location == 'carpenter-shop-primary-menu' ) {

            if ( in_array( 'menu-item-has-children', $item->classes ) ) {

                $args->before = '<div class="link-icon-wrapper">';
                $args->after  = carpenter_shop_get_theme_svg( 'chevron-down' ) . '</div>';

            } else {

                $args->before = '';
                $args->after  = '';

            }

        }

        return $args;

    }

endif;

add_filter( 'nav_menu_item_args', 'carpenter_shop_sub_menu_toggle_button', 10, 3 );

if ( ! function_exists( 'carpenter_shop_the_theme_svg' ) ):
    
    function carpenter_shop_the_theme_svg( $svg_name, $return = false ) {

        if( $return ){

            return carpenter_shop_get_theme_svg( $svg_name ); //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped in carpenter_shop_get_theme_svg();.

        }else{

            echo carpenter_shop_get_theme_svg( $svg_name ); //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped in carpenter_shop_get_theme_svg();.

        }
    }

endif;

if ( ! function_exists( 'carpenter_shop_get_theme_svg' ) ):

    function carpenter_shop_get_theme_svg( $svg_name ) {

        // Make sure that only our allowed tags and attributes are included.
        $svg = wp_kses(
            Carpenter_Shop_SVG_Icons::get_svg( $svg_name ),
            array(
                'svg'     => array(
                    'class'       => true,
                    'xmlns'       => true,
                    'width'       => true,
                    'height'      => true,
                    'viewbox'     => true,
                    'aria-hidden' => true,
                    'role'        => true,
                    'focusable'   => true,
                ),
                'path'    => array(
                    'fill'      => true,
                    'fill-rule' => true,
                    'd'         => true,
                    'transform' => true,
                ),
                'polygon' => array(
                    'fill'      => true,
                    'fill-rule' => true,
                    'points'    => true,
                    'transform' => true,
                    'focusable' => true,
                ),
                'polyline' => array(
                    'fill'      => true,
                    'points'    => true,
                ),
                'line' => array(
                    'fill'      => true,
                    'x1'      => true,
                    'x2' => true,
                    'y1'    => true,
                    'y2' => true,
                ),
            )
        );
        if ( ! $svg ) {
            return false;
        }
        return $svg;

    }

endif;

if( !function_exists( 'carpenter_shop_post_category_list' ) ) :

    // Post Category List.
    function carpenter_shop_post_category_list( $select_cat = true ){

        $post_cat_lists = get_categories(
            array(
                'hide_empty' => '0',
                'exclude' => '1',
            )
        );

        $post_cat_cat_array = array();
        if( $select_cat ){

            $post_cat_cat_array[''] = esc_html__( '-- Select Category --','carpenter-shop' );

        }

        foreach ( $post_cat_lists as $post_cat_list ) {

            $post_cat_cat_array[$post_cat_list->slug] = $post_cat_list->name;

        }

        return $post_cat_cat_array;
    }

endif;

if( !function_exists('carpenter_shop_single_post_navigation') ):

    function carpenter_shop_single_post_navigation(){

        $carpenter_shop_default = carpenter_shop_get_default_theme_options();
        $carpenter_shop_twp_navigation_type = esc_attr( get_post_meta( get_the_ID(), 'twp_disable_ajax_load_next_post', true ) );
        $current_id = '';
        $article_wrap_class = '';
        global $post;
        $current_id = $post->ID;
        if( $carpenter_shop_twp_navigation_type == '' || $carpenter_shop_twp_navigation_type == 'global-layout' ){
            $carpenter_shop_twp_navigation_type = get_theme_mod('twp_navigation_type', $carpenter_shop_default['twp_navigation_type']);
        }

        if( $carpenter_shop_twp_navigation_type != 'no-navigation' && 'post' === get_post_type() ){

            if( $carpenter_shop_twp_navigation_type == 'theme-normal-navigation' ){ ?>

                <div class="navigation-wrapper">
                    <?php
                    // Previous/next post navigation.
                    the_post_navigation(array(
                        'prev_text' => '<span class="arrow" aria-hidden="true">' . carpenter_shop_the_theme_svg('arrow-left',$return = true ) . '</span><span class="screen-reader-text">' . esc_html__('Previous post:', 'carpenter-shop') . '</span><span class="post-title">%title</span>',
                        'next_text' => '<span class="arrow" aria-hidden="true">' . carpenter_shop_the_theme_svg('arrow-right',$return = true ) . '</span><span class="screen-reader-text">' . esc_html__('Next post:', 'carpenter-shop') . '</span><span class="post-title">%title</span>',
                    )); ?>
                </div>
                <?php

            }else{

                $next_post = get_next_post();
                if( isset( $next_post->ID ) ){

                    $next_post_id = $next_post->ID;
                    echo '<div loop-count="1" next-post="' . absint( $next_post_id ) . '" class="twp-single-infinity"></div>';

                }
            }

        }

    }

endif;

add_action( 'carpenter_shop_navigation_action','carpenter_shop_single_post_navigation',30 );

if( !function_exists('carpenter_shop_content_offcanvas') ):

    // Offcanvas Contents
    function carpenter_shop_content_offcanvas(){ ?>

        <div id="offcanvas-menu">
            <div class="offcanvas-wraper">
                <div class="close-offcanvas-menu">
                    <div class="offcanvas-close">
                        <a href="javascript:void(0)" class="skip-link-menu-start"></a>
                        <button type="button" class="button-offcanvas-close">
                            <span class="offcanvas-close-label">
                                <?php echo esc_html__('Close', 'carpenter-shop'); ?>
                            </span>
                        </button>
                    </div>
                </div>
                <div id="primary-nav-offcanvas" class="offcanvas-item offcanvas-main-navigation">
                    <nav class="primary-menu-wrapper" aria-label="<?php esc_attr_e('Horizontal', 'carpenter-shop'); ?>" role="navigation">
                        <ul class="primary-menu theme-menu">
                            <?php
                            if (has_nav_menu('carpenter-shop-primary-menu')) {
                                wp_nav_menu(
                                    array(
                                        'container' => '',
                                        'items_wrap' => '%3$s',
                                        'theme_location' => 'carpenter-shop-primary-menu',
                                        'show_toggles' => true,
                                    )
                                );
                            }else{

                                wp_list_pages(
                                    array(
                                        'match_menu_classes' => true,
                                        'show_sub_menu_icons' => true,
                                        'title_li' => false,
                                        'show_toggles' => true,
                                        'walker' => new Carpenter_Shop_Walker_Page(),
                                    )
                                );
                            }
                            ?>
                        </ul>
                    </nav><!-- .primary-menu-wrapper -->
                </div>
                <a href="javascript:void(0)" class="skip-link-menu-end"></a>
            </div>
        </div>

    <?php
    }

endif;

add_action( 'carpenter_shop_before_footer_content_action','carpenter_shop_content_offcanvas',30 );

if( !function_exists('carpenter_shop_footer_content_widget') ):

    function carpenter_shop_footer_content_widget(){

        $carpenter_shop_default = carpenter_shop_get_default_theme_options();
            $carpenter_shop_footer_column_layout = absint(get_theme_mod('footer_column_layout', $carpenter_shop_default['footer_column_layout']));
            $carpenter_shop_footer_sidebar_class = 12;
            if($carpenter_shop_footer_column_layout == 2) {
                $carpenter_shop_footer_sidebar_class = 6;
            }
            if($carpenter_shop_footer_column_layout == 3) {
                $carpenter_shop_footer_sidebar_class = 4;
            }
            ?>
           
            <div class="footer-widgetarea">
                <div class="wrapper">
                    <div class="column-row">

                        <?php for ($i=0; $i < $carpenter_shop_footer_column_layout; $i++) {
                            ?>
                            <div class="column <?php echo 'column-' . absint($carpenter_shop_footer_sidebar_class); ?> column-sm-12">
                                <?php dynamic_sidebar('carpenter-shop-footer-widget-' . $i); ?>
                            </div>
                       <?php } ?>

                    </div>
                </div>
            </div>

        <?php

    }

endif;

add_action( 'carpenter_shop_footer_content_action','carpenter_shop_footer_content_widget',10 );

if( !function_exists('carpenter_shop_footer_content_info') ):

    /**
     * Footer Copyright Area
    **/
    function carpenter_shop_footer_content_info(){

        $carpenter_shop_default = carpenter_shop_get_default_theme_options(); ?>
        <div class="site-info">
            <div class="wrapper">
                <div class="column-row">

                    <div class="column column-9">
                        <div class="footer-credits">

                            <div class="footer-copyright">

                                <?php
                                $carpenter_shop_footer_copyright_text = wp_kses_post( get_theme_mod( 'footer_copyright_text', $carpenter_shop_default['footer_copyright_text'] ) );
                                    echo esc_html( $carpenter_shop_footer_copyright_text );
                                    echo '<br>';
                                    echo esc_html__('Theme: ', 'carpenter-shop') . '<a href="' . esc_url('https://omegathemes.com/wordpress/free-carpenter-wordpress-theme/') . '" title="' . esc_attr__('Carpenter Shop ', 'carpenter-shop') . '" target="_blank"><span>' . esc_html__('Carpenter Shop ', 'carpenter-shop') . '</span></a>' . esc_html__('By ', 'carpenter-shop') . '  <span>' . esc_html__('OMEGA ', 'carpenter-shop') . '</span>';
                                    echo esc_html__('Powered by ', 'carpenter-shop') . '<a href="' . esc_url('https://wordpress.org') . '" title="' . esc_attr__('WordPress', 'carpenter-shop') . '" target="_blank"><span>' . esc_html__('WordPress.', 'carpenter-shop') . '</span></a>';
                                 ?>

                            </div>
                        </div>
                    </div>


                    <div class="column column-3 align-text-right">
                        <a class="to-the-top" href="#site-header">
                            <span class="to-the-top-long">
                                <?php
                                printf( esc_html__( 'To the Top %s', 'carpenter-shop' ), '<span class="arrow" aria-hidden="true">&uarr;</span>' );
                                ?>
                            </span>
                            <span class="to-the-top-short">
                                <?php
                                printf( esc_html__( 'Up %s', 'carpenter-shop' ), '<span class="arrow" aria-hidden="true">&uarr;</span>' );
                                ?>
                            </span>
                        </a>

                    </div>
                </div>
            </div>
        </div>

    <?php
    }

endif;

add_action( 'carpenter_shop_footer_content_action','carpenter_shop_footer_content_info',20 );


if( !function_exists( 'carpenter_shop_main_slider' ) ) :

    function carpenter_shop_main_slider(){

        $carpenter_shop_defaults = carpenter_shop_get_default_theme_options();

        $carpenter_shop_homepage_section_shipping_title = esc_html( get_theme_mod( 'carpenter_shop_homepage_section_shipping_title',
        $carpenter_shop_defaults['carpenter_shop_homepage_section_shipping_title'] ) );

        $carpenter_shop_homepage_section_shipping_text = esc_html( get_theme_mod( 'carpenter_shop_homepage_section_shipping_text',
        $carpenter_shop_defaults['carpenter_shop_homepage_section_shipping_text'] ) );

        $carpenter_shop_homepage_section_exchange_title = esc_html( get_theme_mod( 'carpenter_shop_homepage_section_exchange_title',
        $carpenter_shop_defaults['carpenter_shop_homepage_section_exchange_title'] ) );

        $carpenter_shop_homepage_section_exchange_text = esc_html( get_theme_mod( 'carpenter_shop_homepage_section_exchange_text',
        $carpenter_shop_defaults['carpenter_shop_homepage_section_exchange_text'] ) );

        $carpenter_shop_homepage_section_support_title = esc_html( get_theme_mod( 'carpenter_shop_homepage_section_support_title',
        $carpenter_shop_defaults['carpenter_shop_homepage_section_support_title'] ) );

        $carpenter_shop_homepage_section_support_text = esc_html( get_theme_mod( 'carpenter_shop_homepage_section_support_text',
        $carpenter_shop_defaults['carpenter_shop_homepage_section_support_text'] ) );

        $carpenter_shop_homepage_section_shopping_title = esc_html( get_theme_mod( 'carpenter_shop_homepage_section_shopping_title',
        $carpenter_shop_defaults['carpenter_shop_homepage_section_shopping_title'] ) );

        $carpenter_shop_homepage_section_shopping_text = esc_html( get_theme_mod( 'carpenter_shop_homepage_section_shopping_text',
        $carpenter_shop_defaults['carpenter_shop_homepage_section_shopping_text'] ) );

        $carpenter_shop_defaults = carpenter_shop_get_default_theme_options();
        $carpenter_shop_header_banner = get_theme_mod( 'carpenter_shop_header_banner', $carpenter_shop_defaults['carpenter_shop_header_banner'] );
        $carpenter_shop_header_banner_cat = get_theme_mod( 'carpenter_shop_header_banner_cat' );

        if( $carpenter_shop_header_banner ){

            $carpenter_shop_rtl = '';
            if( is_rtl() ){
                $carpenter_shop_rtl = 'dir="rtl"';
            }

          $banner_query = new WP_Query( array('post_type' => 'post', 'posts_per_page' => 4,'post__not_in' => get_option("sticky_posts"), 'category_name' => esc_html( $carpenter_shop_header_banner_cat ) ) );

          if( $banner_query->have_posts() ): ?>

            <div class="theme-custom-block theme-banner-block">
                <div class="wrapper">
                    <div class="swiper-container theme-main-carousel swiper-container" <?php echo $carpenter_shop_rtl; ?>>
                        <div class="swiper-wrapper">
                            <?php
                            while( $banner_query->have_posts() ):
                                $banner_query->the_post();
                                $carpenter_shop_featured_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large');
                                $carpenter_shop_featured_image = isset( $carpenter_shop_featured_image[0] ) ? $carpenter_shop_featured_image[0] : ''; ?>

                                <div class="swiper-slide main-carousel-item">                                 
                                    <div class="theme-article-post">
                                        <div class="entry-thumbnail">
                                            <div class="data-bg data-bg-large" data-background="<?php echo esc_url($carpenter_shop_featured_image); ?>">
                                                <a href="<?php the_permalink(); ?>" class="theme-image-responsive" tabindex="0"></a>
                                            </div>
                                            <?php carpenter_shop_post_format_icon(); ?>
                                        </div>                                
                                        <div class="main-carousel-caption">
                                            <div class="post-content">
                                                <header class="entry-header">
                                                    <h2 class="entry-title entry-title-big">
                                                        <a href="<?php the_permalink(); ?>" rel="bookmark"><span><?php the_title(); ?></span></a>
                                                    </h2>
                                                </header>


                                                <div class="entry-content">
                                                    <?php
                                                    if (has_excerpt()) {

                                                      the_excerpt();

                                                    } else {

                                                      echo esc_html(wp_trim_words(get_the_content(), 25, '...'));

                                                    } ?>
                                                </div>

                                                <a href="<?php the_permalink(); ?>" class="btn-fancy btn-fancy-primary" tabindex="0">
                                                  <?php echo esc_html__('Know More', 'carpenter-shop'); ?>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>

                    <section id="info-header">
                        <div class="header-wrapper">
                            <div class="theme-header-areas header-areas-left">
                                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 384 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M172.268 501.67C26.97 291.031 0 269.413 0 192 0 85.961 85.961 0 192 0s192 85.961 192 192c0 77.413-26.97 99.031-172.268 309.67-9.535 13.774-29.93 13.773-39.464 0zM192 272c44.183 0 80-35.817 80-80s-35.817-80-80-80-80 35.817-80 80 35.817 80 80 80z"/></svg>
                                <div class="header-areas-box">
                                    <?php if( $carpenter_shop_homepage_section_shipping_title ){ ?>
                                        <h6><?php echo esc_html( $carpenter_shop_homepage_section_shipping_title ); ?></h6>
                                    <?php } ?>
                                    <?php if( $carpenter_shop_homepage_section_shipping_text ){ ?>
                                        <p><?php echo esc_html( $carpenter_shop_homepage_section_shipping_text ); ?></p>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="theme-header-areas header-areas-left">
                                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M502.3 190.8c3.9-3.1 9.7-.2 9.7 4.7V400c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V195.6c0-5 5.7-7.8 9.7-4.7 22.4 17.4 52.1 39.5 154.1 113.6 21.1 15.4 56.7 47.8 92.2 47.6 35.7.3 72-32.8 92.3-47.6 102-74.1 131.6-96.3 154-113.7zM256 320c23.2.4 56.6-29.2 73.4-41.4 132.7-96.3 142.8-104.7 173.4-128.7 5.8-4.5 9.2-11.5 9.2-18.9v-19c0-26.5-21.5-48-48-48H48C21.5 64 0 85.5 0 112v19c0 7.4 3.4 14.3 9.2 18.9 30.6 23.9 40.7 32.4 173.4 128.7 16.8 12.2 50.2 41.8 73.4 41.4z"/></svg>
                                <div class="header-areas-box">
                                    <?php if( $carpenter_shop_homepage_section_exchange_title ){ ?>
                                        <h6><?php echo esc_html( $carpenter_shop_homepage_section_exchange_title ); ?></h6>
                                    <?php } ?>
                                    <?php if( $carpenter_shop_homepage_section_exchange_text ){ ?>
                                        <p><?php echo esc_html( $carpenter_shop_homepage_section_exchange_text ); ?></p>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="theme-header-areas header-areas-right">
                                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm0 448c-110.5 0-200-89.5-200-200S145.5 56 256 56s200 89.5 200 200-89.5 200-200 200zm61.8-104.4l-84.9-61.7c-3.1-2.3-4.9-5.9-4.9-9.7V116c0-6.6 5.4-12 12-12h32c6.6 0 12 5.4 12 12v141.7l66.8 48.6c5.4 3.9 6.5 11.4 2.6 16.8L334.6 349c-3.9 5.3-11.4 6.5-16.8 2.6z"/></svg>
                                <div class="header-areas-box">
                                    <?php if( $carpenter_shop_homepage_section_support_title ){ ?>
                                        <h6><?php echo esc_html( $carpenter_shop_homepage_section_support_title ); ?></h6>
                                    <?php } ?>
                                    <?php if( $carpenter_shop_homepage_section_support_text ){ ?>
                                        <p><?php echo esc_html( $carpenter_shop_homepage_section_support_text ); ?></p>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="theme-header-areas header-areas-right">
                                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M493.4 24.6l-104-24c-11.3-2.6-22.9 3.3-27.5 13.9l-48 112c-4.2 9.8-1.4 21.3 6.9 28l60.6 49.6c-36 76.7-98.9 140.5-177.2 177.2l-49.6-60.6c-6.8-8.3-18.2-11.1-28-6.9l-112 48C3.9 366.5-2 378.1.6 389.4l24 104C27.1 504.2 36.7 512 48 512c256.1 0 464-207.5 464-464 0-11.2-7.7-20.9-18.6-23.4z"/></svg>
                                <div class="header-areas-box">
                                    <?php if( $carpenter_shop_homepage_section_shopping_title ){ ?>
                                        <h6><?php echo esc_html( $carpenter_shop_homepage_section_shopping_title ); ?></h6>
                                    <?php } ?>
                                    <?php if( $carpenter_shop_homepage_section_shopping_text ){ ?>
                                        <p><?php echo esc_html( $carpenter_shop_homepage_section_shopping_text ); ?></p>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>

          <?php
          wp_reset_postdata();
          endif;

        }

    }

endif;

if (!function_exists('carpenter_shop_post_format_icon')):

    // Post Format Icon.
    function carpenter_shop_post_format_icon() {

        $format = get_post_format(get_the_ID()) ?: 'standard';
        $icon = '';
        $title = '';
        if( $format == 'video' ){
            $icon = carpenter_shop_get_theme_svg( 'video' );
            $title = esc_html__('Video','carpenter-shop');
        }elseif( $format == 'audio' ){
            $icon = carpenter_shop_get_theme_svg( 'audio' );
            $title = esc_html__('Audio','carpenter-shop');
        }elseif( $format == 'gallery' ){
            $icon = carpenter_shop_get_theme_svg( 'gallery' );
            $title = esc_html__('Gallery','carpenter-shop');
        }elseif( $format == 'quote' ){
            $icon = carpenter_shop_get_theme_svg( 'quote' );
            $title = esc_html__('Quote','carpenter-shop');
        }elseif( $format == 'image' ){
            $icon = carpenter_shop_get_theme_svg( 'image' );
            $title = esc_html__('Image','carpenter-shop');
        }
        
        if (!empty($icon)) { ?>
            <div class="theme-post-format">
                <span class="post-format-icom"><?php echo carpenter_shop_svg_escape($icon); ?></span>
                <?php if( $title ){ echo '<span class="post-format-label">'.esc_html( $title ).'</span>'; } ?>
            </div>
        <?php }
    }

endif;

if ( ! function_exists( 'carpenter_shop_svg_escape' ) ):

    /**
     * Get information about the SVG icon.
     *
     * @param string $svg_name The name of the icon.
     * @param string $group The group the icon belongs to.
     * @param string $color Color code.
     */
    function carpenter_shop_svg_escape( $input ) {

        // Make sure that only our allowed tags and attributes are included.
        $svg = wp_kses(
            $input,
            array(
                'svg'     => array(
                    'class'       => true,
                    'xmlns'       => true,
                    'width'       => true,
                    'height'      => true,
                    'viewbox'     => true,
                    'aria-hidden' => true,
                    'role'        => true,
                    'focusable'   => true,
                ),
                'path'    => array(
                    'fill'      => true,
                    'fill-rule' => true,
                    'd'         => true,
                    'transform' => true,
                ),
                'polygon' => array(
                    'fill'      => true,
                    'fill-rule' => true,
                    'points'    => true,
                    'transform' => true,
                    'focusable' => true,
                ),
            )
        );

        if ( ! $svg ) {
            return false;
        }

        return $svg;

    }

endif;

if( !function_exists( 'carpenter_shop_sanitize_sidebar_option_meta' ) ) :

    // Sidebar Option Sanitize.
    function carpenter_shop_sanitize_sidebar_option_meta( $input ){

        $carpenter_shop_metabox_options = array( 'global-sidebar','left-sidebar','right-sidebar','no-sidebar' );
        if( in_array( $input,$carpenter_shop_metabox_options ) ){

            return $input;

        }else{

            return '';

        }
    }

endif;

if( !function_exists( 'carpenter_shop_product_section' ) ) :

    function carpenter_shop_product_section(){
        $carpenter_shop_defaults = carpenter_shop_get_default_theme_options();

        $carpenter_shop_product_section = get_theme_mod( 'carpenter_shop_product_section', $carpenter_shop_defaults['carpenter_shop_product_section'] );

        $carpenter_shop_product_heading = get_theme_mod( 'carpenter_shop_product_heading', $carpenter_shop_defaults['carpenter_shop_product_heading'] );

        $carpenter_shop_product_button_text = get_theme_mod( 'carpenter_shop_product_button_text', $carpenter_shop_defaults['carpenter_shop_product_button_text'] );

        $carpenter_shop_product_button_link = get_theme_mod( 'carpenter_shop_product_button_link', $carpenter_shop_defaults['carpenter_shop_product_button_link'] );

        if( $carpenter_shop_product_section ){ ?>

            
            <div class="wrapper">
                <div class="main-tab">
                    <div class="tab">
                        <button class="tablinks" onclick="carpenter_shop_product_tab_section(event, 'Rated')"><?php esc_html_e('TOP RATED ITEMS','carpenter-shop'); ?></button>
                        <button class="tablinks" onclick="carpenter_shop_product_tab_section(event, 'Selling')"><?php esc_html_e('MOST SELLING ITEMS','carpenter-shop'); ?></button>
                        <button class="tablinks" onclick="carpenter_shop_product_tab_section(event, 'Viewed')"><?php esc_html_e('MOST VIEWED ITEMS','carpenter-shop'); ?></button>
                        <button class="tablinks" onclick="carpenter_shop_product_tab_section(event, 'Search')"><?php esc_html_e('MOST SEARCH ITEMS','carpenter-shop'); ?></button>
                    </div>
                    <div class="tab-area">
                        <div id="Rated" class="tabcontent">
                            <?php $carpenter_shop_top_rated = get_theme_mod('carpenter_shop_featured_product_top_rated','');
                            if ( class_exists( 'WooCommerce' ) ) {
                            $carpenter_shop_args = array(
                                'post_type' => 'product',
                                'posts_per_page' => 100,
                                'product_cat' => $carpenter_shop_top_rated,
                                'order' => 'ASC'
                            ); ?>

                            <div class="theme-product-block">
                                <div class="header-wrapper">
                                    <div class="theme-header-areas header-areas-left">
                                        <?php if( $carpenter_shop_product_heading ){ ?>
                                            <h3><?php echo esc_html( $carpenter_shop_product_heading ); ?></h3>
                                        <?php } ?>
                                    </div>
                                    <div class="theme-header-areas header-areas-right">
                                        <?php if( $carpenter_shop_product_button_text ){ ?>
                                            <a class="product-button" href="<?php echo esc_url( $carpenter_shop_product_button_link ); ?>"><?php echo esc_html( $carpenter_shop_product_button_text ); ?></a>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="product-image">
                                    <?php $loop = new WP_Query( $carpenter_shop_args );
                                    while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>
                                        <div class="grid-items">
                                            <figure class="product-img-box">
                                                <?php if (has_post_thumbnail( $loop->post->ID )){ echo get_the_post_thumbnail($loop->post->ID, 'shop_catalog'); } else { echo '<img src="'.esc_url(woocommerce_placeholder_img_src()).'" />';
                                                } ?>
                                                <div class="product-cart">
                                                    <?php if( $product->is_type( 'simple' ) ) { woocommerce_template_loop_add_to_cart(  $loop->post, $product );
                                                    } ?>
                                                </div>
                                            </figure>
                                            <h5 class="product-text"><a href="<?php echo esc_url(get_permalink( $loop->post->ID )); ?>"><?php the_title(); ?></a></h5>
                                            <h6 class="<?php echo esc_attr( apply_filters( 'woocommerce_product_price_class', 'price' ) ); ?> "><?php echo $product->get_price_html(); ?></h6>
                                            <div class="product-rating"><?php if( $product->is_type( 'simple' ) ){ woocommerce_template_loop_rating( $loop->post, $product ); 
                                            } ?></div>
                                        </div>
                                    <?php endwhile; wp_reset_query(); ?>
                                </div>
                            </div>
                            <?php } ?>
                        </div>

                        <div id="Selling" class="tabcontent">
                            <?php $carpenter_shop_most_selling = get_theme_mod('carpenter_shop_featured_product_most_selling','');
                            if ( class_exists( 'WooCommerce' ) ) {
                            $carpenter_shop_args = array(
                                'post_type' => 'product',
                                'posts_per_page' => 100,
                                'product_cat' => $carpenter_shop_most_selling,
                                'order' => 'ASC'
                            ); ?>

                            <div class="theme-product-block">
                                <div class="header-wrapper">
                                    <div class="theme-header-areas header-areas-left">
                                        <?php if( $carpenter_shop_product_heading ){ ?>
                                            <h3><?php echo esc_html( $carpenter_shop_product_heading ); ?></h3>
                                        <?php } ?>
                                    </div>
                                    <div class="theme-header-areas header-areas-right">
                                        <?php if( $carpenter_shop_product_button_text ){ ?>
                                            <a class="product-button" href="<?php echo esc_url( $carpenter_shop_product_button_link ); ?>"><?php echo esc_html( $carpenter_shop_product_button_text ); ?></a>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="product-image">
                                    <?php $loop = new WP_Query( $carpenter_shop_args );
                                    while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>
                                        <div class="grid-items">
                                            <figure class="product-img-box">
                                                <?php if (has_post_thumbnail( $loop->post->ID )) echo get_the_post_thumbnail($loop->post->ID, 'shop_catalog'); else echo '<img src="'.esc_url(woocommerce_placeholder_img_src()).'" />'; ?>
                                                <div class="product-cart">
                                                    <?php if( $product->is_type( 'simple' ) ) { woocommerce_template_loop_add_to_cart(  $loop->post, $product );} ?>
                                                </div>
                                            </figure>
                                            <h5 class="product-text"><a href="<?php echo esc_url(get_permalink( $loop->post->ID )); ?>"><?php the_title(); ?></a></h5>
                                            <h6 class="<?php echo esc_attr( apply_filters( 'woocommerce_product_price_class', 'price' ) ); ?> "><?php echo $product->get_price_html(); ?></h6>
                                            <div class="product-rating"><?php if( $product->is_type( 'simple' ) ){ woocommerce_template_loop_rating( $loop->post, $product ); } ?></div>
                                        </div>
                                    <?php endwhile; wp_reset_query(); ?>
                                </div>
                            </div>
                            <?php } ?>
                        </div>

                        <div id="Viewed" class="tabcontent">
                            <?php $carpenter_shop_most_viewed = get_theme_mod('carpenter_shop_featured_product_most_viewed','');
                            if ( class_exists( 'WooCommerce' ) ) {
                            $carpenter_shop_args = array(
                                'post_type' => 'product',
                                'posts_per_page' => 100,
                                'product_cat' => $carpenter_shop_most_viewed,
                                'order' => 'ASC'
                            ); ?>

                            <div class="theme-product-block">
                                <div class="header-wrapper">
                                    <div class="theme-header-areas header-areas-left">
                                        <?php if( $carpenter_shop_product_heading ){ ?>
                                            <h3><?php echo esc_html( $carpenter_shop_product_heading ); ?></h3>
                                        <?php } ?>
                                    </div>
                                    <div class="theme-header-areas header-areas-right">
                                        <?php if( $carpenter_shop_product_button_text ){ ?>
                                            <a class="product-button" href="<?php echo esc_url( $carpenter_shop_product_button_link ); ?>"><?php echo esc_html( $carpenter_shop_product_button_text ); ?></a>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="product-image">
                                    <?php $loop = new WP_Query( $carpenter_shop_args );
                                    while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>
                                        <div class="grid-items">
                                            <figure class="product-img-box">
                                                <?php if (has_post_thumbnail( $loop->post->ID )) echo get_the_post_thumbnail($loop->post->ID, 'shop_catalog'); else echo '<img src="'.esc_url(woocommerce_placeholder_img_src()).'" />'; ?>
                                                <div class="product-cart">
                                                    <?php if( $product->is_type( 'simple' ) ) { woocommerce_template_loop_add_to_cart(  $loop->post, $product );} ?>
                                                </div>
                                            </figure>
                                            <h5 class="product-text"><a href="<?php echo esc_url(get_permalink( $loop->post->ID )); ?>"><?php the_title(); ?></a></h5>
                                            <h6 class="<?php echo esc_attr( apply_filters( 'woocommerce_product_price_class', 'price' ) ); ?> "><?php echo $product->get_price_html(); ?></h6>
                                            <div class="product-rating"><?php if( $product->is_type( 'simple' ) ){ woocommerce_template_loop_rating( $loop->post, $product ); } ?></div>
                                        </div>
                                    <?php endwhile; wp_reset_query(); ?>
                                </div>
                            </div>
                            <?php } ?>
                        </div>

                        <div id="Search" class="tabcontent">
                            <?php $carpenter_shop_most_search = get_theme_mod('carpenter_shop_featured_product_most_search','');
                            if ( class_exists( 'WooCommerce' ) ) {
                            $carpenter_shop_args = array(
                                'post_type' => 'product',
                                'posts_per_page' => 100,
                                'product_cat' => $carpenter_shop_most_search,
                                'order' => 'ASC'
                            ); ?>

                            <div class="theme-product-block">
                                <div class="header-wrapper">
                                    <div class="theme-header-areas header-areas-left">
                                        <?php if( $carpenter_shop_product_heading ){ ?>
                                            <h3><?php echo esc_html( $carpenter_shop_product_heading ); ?></h3>
                                        <?php } ?>
                                    </div>
                                    <div class="theme-header-areas header-areas-right">
                                        <?php if( $carpenter_shop_product_button_text ){ ?>
                                            <a class="product-button" href="<?php echo esc_url( $carpenter_shop_product_button_link ); ?>"><?php echo esc_html( $carpenter_shop_product_button_text ); ?></a>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="product-image">
                                    <?php $loop = new WP_Query( $carpenter_shop_args );
                                    while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>
                                        <div class="grid-items">
                                            <figure class="product-img-box">
                                                <?php if (has_post_thumbnail( $loop->post->ID )) echo get_the_post_thumbnail($loop->post->ID, 'shop_catalog'); else echo '<img src="'.esc_url(woocommerce_placeholder_img_src()).'" />'; ?>
                                                <div class="product-cart">
                                                    <?php if( $product->is_type( 'simple' ) ) { woocommerce_template_loop_add_to_cart(  $loop->post, $product );} ?>
                                                </div>
                                            </figure>
                                            <h5 class="product-text"><a href="<?php echo esc_url(get_permalink( $loop->post->ID )); ?>"><?php the_title(); ?></a></h5>
                                            <h6 class="<?php echo esc_attr( apply_filters( 'woocommerce_product_price_class', 'price' ) ); ?> "><?php echo $product->get_price_html(); ?></h6>
                                            <div class="product-rating"><?php if( $product->is_type( 'simple' ) ){ woocommerce_template_loop_rating( $loop->post, $product ); } ?></div>
                                        </div>
                                    <?php endwhile; wp_reset_query(); ?>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>

        <?php  }
    }

endif;