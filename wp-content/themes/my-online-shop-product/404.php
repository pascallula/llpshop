<?php
/**
 * The template for displaying 404 pages (Not Found)
*
* @package My Online Shop Product
* @subpackage my_online_shop_product
*/

?>

<?php get_header(); ?>
    <div id="primary" class="content-area">
        <div class="container">
            <section class="my_online_shop_product_section page_404">      
                <div class="card mb-3 mx-auto">
                    <div class="card-body">
                        <h1 class="entry-title"><?php esc_html_e( 'Not Found', "my-online-shop-product" ); ?></h1>
                        <p class="card-text">
                            <?php esc_html_e( 'This is somewhat embarrassing, isn’t it?', "my-online-shop-product" ); ?>
                        </p>
                        <p class="card-text">
                        <?php esc_html_e( 'It looks like nothing was found at this location. Maybe try a search?', "my-online-shop-product" ); ?>
                        </p>
                        <?php get_search_form(); ?>
                    </div>
                </div> 
                
            </section>
        </div>
    </div>
  
<?php get_footer(); ?>