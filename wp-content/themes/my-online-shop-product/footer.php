<?php
/**
 * The template for displaying the Footer
 *
 * @package My Online Shop Product
 * @subpackage my_online_shop_product
 */
?>
    <footer class="my_online_shop_product_footer_wrapper">
        <div class="container">
            <div class="row g-5">
                <!--  Footer 1 -->
                    <div class="col-lg-3 col-md-6">
                        <?php
                            $logo_id = get_theme_mod('my_online_shop_product_footer_add_global_item_logo_setting_id', 0 );
                            if($logo_id){
                                $my_online_shop_product_logo_src = wp_get_attachment_image_url($logo_id, '') ? wp_get_attachment_image_url($logo_id , ''):"";
                            }
                            $my_online_shop_product_message = get_theme_mod('my_online_shop_product_footer_add_global_item_message_text_setting_id', "Welcome to My Online Shop Product!" );
                        ?>
                        <div class="my_online_shop_product_footer_company_logo">
                            <?php if( !empty( $my_online_shop_product_logo_src ) ): ?>     
                                <div class="company_logo">
                                    <a href="<?php home_url("/") ?>">
                                        <img src="<?php echo esc_url( $my_online_shop_product_logo_src ) ?>" alt="<?php echo esc_attr( 'footer-logo' )?>">
                                    </a>
                                </div>
                            <?php endif; ?>
                            <?php if(!empty( $my_online_shop_product_message )): ?>
                                <div class="footer_message">
                                    <p><?php printf( esc_html__( '%s', 'my-online-shop-product' ), $my_online_shop_product_message ); ?></p>
                                </div>
                            <?php endif; ?>
                        </div>
                        
                        <div class="my_online_shop_product_footer_contact_icon">   
                            <?php  get_template_part('template-parts/content', 'social-icon'); ?>                               
                        </div>   
                    </div>

                <!--  Footer 2 -->
                    <div class="col-lg-3 col-md-6">
                        <div class="my_online_shop_product_company_info_container">   
                            <?php if( !empty( get_theme_mod('my_online_shop_product_footer_add_company_info_title_setting_id', '' ) ) ): ?>                           
                                <div class="head-title">
                                    <h4 class="title"><?php printf( esc_html__( '%s', 'my-online-shop-product' ), get_theme_mod('my_online_shop_product_footer_add_company_info_title_setting_id', '' ) ); ?></h4>
                                </div>
                            <?php endif; ?>
                            <?php for ($i=1; $i < 4; $i++): ?>   
                                <?php if( !empty( get_theme_mod('my_online_shop_product_company_info_title_'.$i.'_setting_id', '' ) )): ?>                                
                                    <div class="my_online_shop_product_company_info_box">
                                        <h5 class="sub_title">
                                            <?php printf( esc_html__( '%s', 'my-online-shop-product' ), get_theme_mod('my_online_shop_product_company_info_title_'.$i.'_setting_id', '' ) ); ?>
                                        </h5>
                                        <ul>
                                            <li class="my_online_shop_product_company_info_item address">
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-geo-alt" viewBox="0 0 16 16"><path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10"/><path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4m0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/></svg>
                                                </span>
                                                <p>
                                                    <?php printf( esc_html__( '%s', 'my-online-shop-product' ), get_theme_mod('my_online_shop_product_company_info_location_'.$i.'_setting_id', '' ) ); ?>
                                                </p> 
                                            </li>
                                            <li class="my_online_shop_product_company_info_item phone">
                                                <span>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-telephone" viewBox="0 0 16 16"><path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/></svg>
                                                </span>
                                                <p>
                                                    <?php printf( esc_html__( '%s', 'my-online-shop-product' ), get_theme_mod('my_online_shop_product_company_info_phone_'.$i.'_setting_id', '' ) ); ?>
                                                </p>
                                            </li>
                                            <li class="my_online_shop_product_company_info_item email">
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16"><path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1zm13 2.383-4.708 2.825L15 11.105zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741M1 11.105l4.708-2.897L1 5.383z"/></svg>
                                                </span>
                                                <p>
                                                    <?php printf( esc_html__( '%s', 'my-online-shop-product' ), get_theme_mod('my_online_shop_product_company_info_email_'.$i.'_setting_id', '' ) ); ?>
                                                </p> 
                                            </li>
                                        </ul>
                                    </div> 
                                <?php endif; ?>                                 
                            <?php endfor; ?>
                           
                        </div>        
                    </div>    
                                            
                <!--  Footer 3 -->
                    <div class="col-lg-3 col-md-6 footer-widgets-3">     
                        <?php if ( is_active_sidebar( 'my_online_shop_product_footer_1' ) ) : ?>
                            <div id="my_online_shop_product_sidebar" class="my_online_shop_product_sidebar">      
                                <?php dynamic_sidebar('my_online_shop_product_footer_1'); ?>               
                            </div>
                        <?php endif;  ?>

                    </div>

                <!--  Footer 4 -->
                    <div class="col-lg-3 col-md-6 footer-widgets-4">  
                        <?php if ( is_active_sidebar( 'my_online_shop_product_footer_2' ) ) : ?>
                            <div id="my_online_shop_product_sidebar" class="my_online_shop_product_sidebar">
                                <?php dynamic_sidebar('my_online_shop_product_footer_2'); ?>     
                            </div>
                        <?php endif;  ?>
                    </div>
            </div>
            <div class="footer-copy-right-container">    
                <div class="row g-3">
                    <div class="col-12 col-md-6">
                        <p class="copyright">
                            <?php
                               printf( esc_html__( '%s', 'my-online-shop-product' ), get_theme_mod( 'my_online_shop_product_footer_copy_right_text_setting_id', get_bloginfo('title').' Copyright 2023 - All rights reserved' ) );         
                            ?>                 
                        </p>
                    </div>
                    <?php  if(has_nav_menu( 'main_nav_menu' )): ?>
                        <div class="col-12 col-md-6">
                            <div class="footer-nav-container">
                                <?php
                                    if(has_nav_menu( 'main_nav_menu' ))
                                    {
                                        wp_nav_menu(array(
                                            'theme_location' => 'footer_menu',
                                            'depth'          => 1
                                        ));
                                    }
                                ?>  
                            </div>             
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        
        </div>
        <button type="button" class="my_online_shop_product_scroll_to_top_button" aria-label="<?php esc_attr_e( 'Scroll to Top', "my-online-shop-product" ); ?>" >
            <span>
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-chevron-up" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M7.646 4.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1-.708.708L8 5.707l-5.646 5.647a.5.5 0 0 1-.708-.708l6-6z"/></svg>
            </span>
        </button>
    </footer>
<?php wp_footer();?>

</body>
</html>

