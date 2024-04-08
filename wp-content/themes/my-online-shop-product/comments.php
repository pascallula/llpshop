<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains comments and the comment form.
 *
 * @package My Online Shop Product
 * @subpackage my_online_shop_product
 */

 /*
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if ( post_password_required() )
    return;
?>

    <div id="my_online_shop_product_comments" class="my_online_shop_product_content comments_area">
        <?php if ( have_comments() ) : ?>
            <h2 class="comments-title">
                <?php
                    printf(
                        esc_html( _nx(
                            'One Comment on "%2$s"',
                            '* %1$s * Comments on "%2$s"',
                            get_comments_number(),
                            'Comments title',
                            "my-online-shop-product"
                        ) ),
                        esc_html(number_format_i18n( get_comments_number() )),
                        '<span>' . esc_html(get_the_title()) . '</span>'
                    );
                ?>
            </h2>
            <ol class="comment-list">
                <?php
                wp_list_comments( array(
                    'style'       => 'ol',
                    'short_ping'  => true,
                    'avatar_size' => 42,
                ) );
                ?>
            </ol><!-- .comment-list -->
            <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
                <div class="pagination_comments">
                    <?php
                        paginate_comments_links(array(
                            'screen_reader_text'=> esc_html__('Pagination',"my-online-shop-product"),
                            'prev_text'=> esc_html__('Previous Comment',"my-online-shop-product"),
                            'next_text'=> esc_html__('Next Comment',"my-online-shop-product"),
                        ));
                    ?>
                </div>
            <?php endif; // Check for comment navigation ?>
            <?php if ( ! comments_open() && get_comments_number() ) : ?>
                <p class="no-comments"><?php esc_html_e( 'Comments are closed.', "my-online-shop-product" ); ?></p>
            <?php endif; ?>
        <?php endif; ?>
        <?php comment_form(
            array(
                'title_reply' => esc_html__( 'Leave a comment', "my-online-shop-product" ),
            )
        ); ?>      

    </div>