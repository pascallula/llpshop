<?php
/**
 * Template part for displaying page content in page.php
 *
 * @package My Online Shop Product
 * @subpackage my_online_shop_product
 */
?>
<article id="page-<?php the_ID(); ?>" <?php post_class("my_online_shop_product_content page"); ?>> 
    <div class="card border-0 shadow"> 
        <div class="entry-header">
            <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?> 
            <?php if( !has_post_thumbnail() ): ?>
            <hr>       
            <?php endif; ?> 
        </div>
        <?php if( has_post_thumbnail() ): ?>
            <div class="image-box">
                <img src="<?php echo esc_url( get_the_post_thumbnail_url(get_the_ID()) ) ?>" class="img-fluid" loading="lazy" alt="<?php echo esc_attr( the_title() ); ?>">
            </div>       
        <?php endif; ?>
        <div class="entry-content card-body"> 
            <?php the_content(); ?>
            <?php 
                wp_link_pages( array(
                    'before'      => '<div class="my_online_shop_product_page_links"><span class="page-links-title">' . esc_html__( 'Pages:', "my-online-shop-product" ) . '</span>',
                    'after'       => '</div>',
                    'link_before' => '',
                    'link_after'  => '',
                    'nextpagelink'     => esc_html__( 'Next page', "my-online-shop-product" ),
                    'previouspagelink' => esc_html__( 'Previous page', "my-online-shop-product" ),
                    'pagelink'         => '%',
                    'echo'             => 1,
                ) );
            ?> 
        </div>
    </div> 
    <?php  if ( comments_open() || '0' != get_comments_number() ): ?>
        <?php comments_template(); ?>
    <?php endif; ?>  
</article>