<?php
/**
 * Template part to displaying Slider content on Slider Section
 *
 * @package My Online Shop Product
 * @subpackage my_online_shop_product
 */
    $my_online_shop_product_turn_on_slider_information = get_theme_mod ( 'my_online_shop_product_slider_information_display_setting_id', false );
?> 
    <div class="my-online-shop-product-slider-container swiper">
        <div class="swiper-wrapper"> 
            <?php
                //Get Slider Customizer information
                for ($i = 1; $i < 4 ; $i++) { 
                    $my_online_shop_product_slider_page[$i]         = get_theme_mod( 'my_online_shop_product_slider_'.$i.'_setting_id' );
                    $my_online_shop_product_slider_sub_title[$i]    = get_theme_mod( 'my_online_shop_product_slider_item_sub_title_'.$i.'_setting_id', '' );
                    $my_online_shop_product_slider_button_text[$i]  = get_theme_mod( 'my_online_shop_product_slider_information_button_text_'.$i.'_setting_id', '' );
                    $my_online_shop_product_slider_button_url[$i]   = get_theme_mod( 'my_online_shop_product_slider_information_button_link_'.$i.'_setting_id', '' );
                }
                $my_online_shop_product_slider_args = array(
					'post_type' 		=> 'page',
					'posts_per_page' 	=> 3,
					'post__in' 			=> $my_online_shop_product_slider_page,
					'orderby' 			=> 'post__in'
				);
				$my_online_shop_product_slider_loop = new WP_Query( $my_online_shop_product_slider_args );
            $j = 1;
            if( $my_online_shop_product_slider_loop->have_posts() ): 
                while( $my_online_shop_product_slider_loop->have_posts() ): $my_online_shop_product_slider_loop->the_post();
            ?>  
                <div class="my-online-shop-product-slider-screen swiper-slide">
                    <?php if( $my_online_shop_product_turn_on_slider_information ): ?>
                        <div class="wrapper">
                            <div class="container">
                                <div class="slider-information">    
                                    <div class="slider-information-box">
                                        <h1 class="title">
                                            <?php 
                                                the_title();
                                            ?>
                                        </h1>
                                        <?php if(!empty( $my_online_shop_product_slider_sub_title[$j] )): ?>
                                            <h4 class="sub_title">
                                                <?php 
                                                    printf( esc_html__( '%s', 'my-online-shop-product' ), $my_online_shop_product_slider_sub_title[$j] );
                                                ?>
                                            </h4>
                                        <?php endif; ?>
                                        <?php if(!empty( get_the_content() ) ): ?>
                                            <?php 
                                                the_content()
                                            ?> 
                                        <?php endif; ?>
                                        <?php if( !empty( $my_online_shop_product_slider_button_text[$j] ) ): ?>                                                  
                                                <?php                                
                                                    printf( esc_html__( '%s', 'my-online-shop-product' ), "<a class='my_online_shop_product_button' href=".esc_url( $my_online_shop_product_slider_button_url[$j] )." > ". $my_online_shop_product_slider_button_text[$j] ." </a> ")
                                                ?>                             
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if( has_post_thumbnail() ): ?>                      
                        <?php the_post_thumbnail( 'my-online-shop-product-slider-image' ); ?>
                    <?php else: ?>
                        <div class="my-online-shop-product_header_slider_no_image">
                            <h4 class='text-white'>
                                <?php echo esc_html_e('There are no Slider Image', "my-online-shop-product"); ?>
                            </h4>
                        </div>
                    <?php endif; ?>
                </div>
            <?php 
                $j++;
                endwhile; 
                wp_reset_postdata();
            ?>
            <?php endif; ?> 
        </div>
        <div class="my_online_shop_product_slider swiper-button-next"></div>
        <div class="my_online_shop_product_slider swiper-button-prev"></div>
        <div class="my_online_shop_product_slider swiper-pagination"></div>  
    </div>
   
   