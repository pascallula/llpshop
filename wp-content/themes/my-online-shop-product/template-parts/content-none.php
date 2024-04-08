<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @package My Online Shop Product
 * @subpackage my_online_shop_product
 */
?>

<div class="no-results not-found">
    <div class="card w-md-50 mx-auto">
        <div class="card-body">
            <h2 class="entry-title"><?php esc_html_e( 'Nothing Found', "my-online-shop-product" ); ?></h2>
            <?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>
                <p>
                    <?php
                        /* translators: %s: Post editor URL. */
                        printf( esc_html__( 'Ready to publish your first post? <a href="%s">Get started here</a>.', "my-online-shop-product" ), esc_url( admin_url( 'post-new.php' ) ) );
                    ?>
                </p>
            <?php else : ?>
                <p>
                    <?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', "my-online-shop-product" ); ?>
                </p>
                <?php get_search_form(); ?>
            <?php endif; ?>
        </div>
    </div>
</div>
