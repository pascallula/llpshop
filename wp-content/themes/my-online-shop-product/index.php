<?php
/**
 * The main template file
 *
 * @package My Online Shop Product
 * @subpackage my_online_shop_product
 */
get_header(); 

    $custom_header_on_index_template = get_theme_mod ( 'my_online_shop_product_custom_header_display_setting_id', false );
    $my_online_shop_product_template_sidebar_config = get_theme_mod('my_online_shop_product_template_sidebar_setting_id', 'none');
?>

    <main role="main">
        <div id="content" class="content-area">
            <?php if(  $custom_header_on_index_template  ): ?>
                <?php if( get_header_image() ): ?>
                    <section class="my_online_shop_product_section header_image">                 
                        <?php 
                            get_template_part('template-parts/header/content', 'customHeader');
                        ?>
                    </section> 
                <?php endif; ?>    
            <?php endif; ?>
            <div class="container">
                <section class="my_online_shop_product_section index_page"> 
                    <?php if( $my_online_shop_product_template_sidebar_config == 'right' ): ?>
                        <div class="page_sidebar_right">     
                            <div class="row g-5">
                                <div class="col-12 col-md-8 col-lg-9 content-box">
                                    <?php if( have_posts() ): ?>
                                        <?php 
                                            get_template_part('template-parts/content');
                                            get_template_part('template-parts/pagination');
                                        ?>
                                    <?php else: ?>
                                        <?php  get_template_part('template-parts/content', 'none'); ?>
                                    <?php endif; ?>
                                </div>
                                <div class="col-12 col-md-4 col-lg-3 sidebar-1">
                                    <?php get_sidebar(); ?>    
                                </div>
                            </div> 
                        </div> 
                    <?php elseif( $my_online_shop_product_template_sidebar_config == 'left' ): ?>
                        <div class="page_sidebar_left">
                            <div class="row g-5">
                                <div class="col-12 col-md-4 col-lg-3 order-2 order-md-1 sidebar-1">
                                    <?php get_sidebar(); ?>    
                                </div>
                                <div class="col-12 col-md-8 col-lg-9 order-1 order-md-2 content-box">
                                    <?php if( have_posts() ): ?>  
                                        <?php 
                                            get_template_part('template-parts/content');
                                            get_template_part('template-parts/pagination');
                                        ?>
                                    <?php else: ?>
                                        <?php  get_template_part('template-parts/content', 'none'); ?>
                                    <?php endif; ?>
                                </div>
                            </div> 
                        </div> 
                    <?php else: ?>
                        <div class="page_sidebar_none">
                            <div class="row">
                                <div class="col-12">
                                    <?php if( have_posts() ): ?>
                                        <?php 
                                            get_template_part('template-parts/content');
                                            get_template_part('template-parts/pagination');
                                        ?>
                                    <?php else: ?>
                                        <?php  get_template_part('template-parts/content', 'none'); ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div> 
                    <?php endif; ?> 
                </section>
            </div>
        </div>
    </main>   
    
<?php get_footer();
