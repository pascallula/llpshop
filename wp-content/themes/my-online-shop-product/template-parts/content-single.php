<?php
/**
 * Template part for displaying a post content on single.php
 *
 * @package My Online Shop Product
 * @subpackage my_online_shop_product
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class("my_online_shop_product_content single"); ?>>
    <div class="card border-0 shadow"> 
        <div class="entry-header">    
            <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>          
            <?php  get_template_part('template-parts/content', 'meta'); ?> 
            <?php if(!has_post_thumbnail()): ?>
            <hr>       
            <?php endif; ?>       
        </div>   
        <?php if(has_post_thumbnail()): ?>
            <div class="image-box">
                <img src="<?php echo esc_url( get_the_post_thumbnail_url(get_the_ID()) ) ?>" class="img-fluid" loading="lazy" alt="<?php echo esc_attr( the_title() ); ?>">
            </div>       
        <?php endif; ?>    
        <div class="entry-content card-body"> 
            <?php the_content(); ?>
            
            <?php if( has_tag() ): ?>
                <div class="post-tags">
                    <?php esc_html_e( 'Tags', 'my-online-shop-product' ) ?>: <span><?php the_tags( '', ', '); ?></span>
                </div>
            <?php endif; ?>
            
            <?php 
                wp_link_pages( array(
                    'before'      => '<div class="my_online_shop_product_page_links"><span class="page-links-title">' . esc_html__( 'Pages:', "my-online-shop-product" ) . '</span>',
                    'after'       => '</div>',
                    'link_before' => '',
                    'link_after'  => '',
                    'nextpagelink'     => esc_html__( 'Next page', 'my-online-shop-product' ),
                    'previouspagelink' => esc_html__( 'Previous page', 'my-online-shop-product' ),
                    'pagelink'         => '%',
                    'echo'             => 1,
                ) );
            ?>
           
            <?php
                if ( is_singular( 'attachment' ) ) {
                    // Parent post navigation.
                    the_post_navigation( array(
                        'prev_text' => _x( '<span class="meta-nav">Published in</span><span class="post-title">%title</span>', 'Parent post link', 'my-online-shop-product' ),
                    ) );
                } elseif ( is_singular( 'post' ) ) {
                    // Previous/next post navigation.
                    the_post_navigation( array(
                        'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next', 'my-online-shop-product' ) . '</span> ' .'<span class="post-title"> >> </span>',
                        'prev_text' => '<span class="post-title"> << </span>'.'<span class="meta-nav" aria-hidden="true">' . __( 'Previous', 'my-online-shop-product' ) . '</span> ',
                    ) );
                }
            ?>
        </div>
    </div>
    <?php  if ( comments_open() || get_comments_number() ): ?>
        <?php comments_template(); ?>
    <?php endif; ?>

</article>