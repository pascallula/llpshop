<?php
/**
 * The template for displaying search results pages
 *
 * @package My Online Shop Product
 * @subpackage my_online_shop_product
 */

get_header(); ?>

    <main role="main">
        <div id="content" class="content-area">
            <div class="container">
                <section class="my_online_shop_product_section search"> 
                    <?php if( have_posts() ): ?>
                        <div class="page-header">
                            <h1 class="entry-title">
                                <?php
                                    printf(
                                        esc_html__( 'Search Results for: %s', 'my-online-shop-product' ),
                                        '<span class="page-description search-term">' . esc_html(get_search_query()) .'</span>'
                                    );
                                ?>
                            </h1>
                            <div class="search-result-count">
                                <?php
                                    printf(
                                        esc_html(
                                            /* translators: %d: The number of search results. */
                                            _n(
                                                'We found %d result for your search.',
                                                'We found %d results for your search.',
                                                (int) $wp_query->found_posts,
                                                'my-online-shop-product'
                                            )
                                        ),
                                        (int) $wp_query->found_posts
                                    );
                                ?>
                            </div> 
                            <hr> 
                        </div>           
                        
                        <?php       
                            get_template_part('template-parts/content', 'search');
                            get_template_part('template-parts/pagination');
                        ?>       
                    <?php else: ?>
                        <?php  get_template_part('template-parts/content', 'none'); ?>
                    <?php endif; ?>     
                </section>
            </div>
        </div>
    </main>   
        
<?php get_footer();