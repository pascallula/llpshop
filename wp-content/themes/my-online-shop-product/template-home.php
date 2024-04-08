<?php 

/* Template Name: Home Page */
/* @package My Online Shop Product */
/* @subpackage my_online_shop_product */

get_header(); 

    $my_online_shop_product_turn_on_slider 					        = get_theme_mod ( 'my_online_shop_product_slider_display_setting_id', false );
    $my_online_shop_product_category_section_title_text             = get_theme_mod( 'my_online_shop_product_category_section_title_text_setting_id', "All Category" );
    $my_online_shop_product_popular_product_section_title_text      = get_theme_mod( 'my_online_shop_product_popular_product_section_title_text_setting_id', "Popular Product" );
    $my_online_shop_product_newarrival_product_section_title_text   = get_theme_mod( 'my_online_shop_product_newarrival_product_section_title_text_setting_id', "New Arrival Product" );
    $my_online_shop_product_deal_product_turn_on                    = get_theme_mod( 'my_online_shop_product_deal_product_section_display_setting_id', false );
    $my_online_shop_product_news_section_title_text                 = get_theme_mod( 'my_online_shop_product_news_section_title_setting_id', "News" );
    $my_online_shop_product_more_link_text                          = get_theme_mod ( 'my_online_shop_product_global_read_more_btn_text_id', 'Read More' );
?>

    <main role="main">
        <div id="content" class="content-area">
            <?php if( $my_online_shop_product_turn_on_slider ): ?>
                <section class="my_online_shop_product_section header_slider"> 
                    <?php  get_template_part('template-parts/home/content', 'slider'); ?>
                </section>  
            <?php endif; ?>  
            <div class="container">
                <?php if( class_exists("WooCommerce") ): ?>
                    <section class="my_online_shop_product_section product category">
                        <?php if( !empty($my_online_shop_product_category_section_title_text) ): ?>
                            <div class="my_online_shop_product_section_title_box">
                                <h2 class="section_title">
                                    <?php printf( esc_html__( '%s', 'my-online-shop-product' ), $my_online_shop_product_category_section_title_text ); ?>
                                </h2>
                            </div>
                        <?php endif; ?>
                        <?php 
                            get_template_part('woocommerce/home-templates/content', 'section-category'); 
                        ?>   
                    </section>
                    <section class="my_online_shop_product_section product popular-product"> 
                        <?php if( !empty( $my_online_shop_product_popular_product_section_title_text ) ): ?>
                            <div class="my_online_shop_product_section_title_box">
                                <h2 class="section_title">
                                    <?php printf( esc_html__( '%s', 'my-online-shop-product' ), $my_online_shop_product_popular_product_section_title_text ); ?>
                                </h2>
                                <a class="my_online_shop_product_view_detail_btn" href="<?php echo esc_url(get_post_type_archive_link('product')) ?>">                                         
                                    <span><?php printf( esc_html__( '%s', 'my-online-shop-product' ), $my_online_shop_product_more_link_text ); ?></span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16"> 
                                        <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                                    </svg>                        
                                </a>
                            </div>       
                        <?php endif; ?>
                        <?php 
                            get_template_part('woocommerce/home-templates/content', 'section-popular'); 
                        ?>         
                    </section>  
                    <section class="my_online_shop_product_section product new-arrival-product"> 
                        <?php if( !empty( $my_online_shop_product_newarrival_product_section_title_text ) ): ?>
                            <div class="my_online_shop_product_section_title_box">
                                <h2 class="section_title">
                                    <?php printf( esc_html__( '%s', 'my-online-shop-product' ), $my_online_shop_product_newarrival_product_section_title_text ) ?>
                                </h2>
                                <a class="my_online_shop_product_view_detail_btn" href="<?php echo esc_url(get_post_type_archive_link('product')) ?>">                                         
                                    <span><?php printf( esc_html__( '%s', 'my-online-shop-product' ), $my_online_shop_product_more_link_text ); ?></span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16"> 
                                        <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                                    </svg>                        
                                </a>
                            </div>       
                        <?php endif; ?>
                        <?php 
                            wc_get_template_part('woocommerce/home-templates/content', 'section-newarrival'); 
                        ?>         
                    </section>         
                    <?php if( $my_online_shop_product_deal_product_turn_on ): ?>
                        <section class="my_online_shop_product_section hot-sales-product"> 
                            <?php 
                                get_template_part('woocommerce/home-templates/content', 'section-hotsales'); 
                            ?>         
                        </section>  
                    <?php endif; ?>
                <?php else: ?>
                    <section class="my_online_shop_product_section home"> 
                        <?php
                            the_content();
                        ?>
                    </section>
                <?php endif; ?>
                <section class="my_online_shop_product_section product news"> 
                    <?php if( !empty( $my_online_shop_product_news_section_title_text ) ): ?>
                        <div class="my_online_shop_product_section_title_box">
                            <h2 class="section_title">
                                <?php printf( esc_html__( '%s', 'my-online-shop-product' ), $my_online_shop_product_news_section_title_text ) ?>
                            </h2>
                            <a class="my_online_shop_product_view_detail_btn" href="<?php echo esc_url( get_post_type_archive_link('post')) ?>">                                         
                                <span><?php printf( esc_html__( '%s', 'my-online-shop-product' ), $my_online_shop_product_more_link_text ); ?></span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16"> 
                                    <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                                </svg>                        
                            </a>
                        </div>       
                    <?php endif; ?>
                    <?php 
                    get_template_part('template-parts/home/content', 'news');
                    ?>         
                </section> 
            </div>
        </div>
    </main>  

<?php get_footer();