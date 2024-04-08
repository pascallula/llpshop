<?php
/**
 * The template for displaying all single post
 *
 * @package My Online Shop Product
 * @subpackage my_online_shop_product
 */
get_header(); 

    $my_online_shop_product_template_sidebar_config = get_theme_mod('my_online_shop_product_template_sidebar_setting_id', 'none');
?>
    <main role="main">
        <div id="content" class="content-area">
            <div class="container">
                <section class="my_online_shop_product_section single_page">           
                    <?php if( $my_online_shop_product_template_sidebar_config == 'right' ): ?>
                        <div class="page_sidebar_right">
                            <div class="row g-5">
                                <div class="col-12 col-md-8 col-lg-9 content-box">
                                    <?php while( have_posts() ): the_post();?> 
                                        <?php get_template_part('template-parts/content', 'single'); ?>          
                                    <?php endwhile; ?>
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
                                    <?php while( have_posts() ): the_post();?>
                                        <?php get_template_part('template-parts/content', 'single'); ?>
                                    <?php endwhile; ?>                      
                                </div>
                            </div>
                        </div>
                    <?php else: ?>
                        <div class="page_sidebar_none">
                            <div class="row">  
                                <div class="col-12">           
                                    <?php while( have_posts() ): the_post();?> 
                                        <?php get_template_part('template-parts/content', 'single'); ?>
                                    <?php endwhile; ?>
                                </div>
                            </div>
                        </div>   
                    <?php endif; ?>
                </section>
            </div>
        </div>
    </main>  

<?php get_footer();