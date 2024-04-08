<?php
/**
 * The template for displaying single posts and pages.
 * @package Carpenter Shop
 * @since 1.0.0
 */
get_header();

    $carpenter_shop_default = carpenter_shop_get_default_theme_options();
    $carpenter_shop_global_sidebar_layout = esc_html( get_theme_mod( 'global_sidebar_layout',$carpenter_shop_default['global_sidebar_layout'] ) );
    $carpenter_shop_post_sidebar = esc_html( get_post_meta( $post->ID, 'carpenter_shop_post_sidebar_option', true ) );
    $carpenter_shop_sidebar_column_class = 'column-order-1';

    if (!empty($carpenter_shop_post_sidebar)) {
        $carpenter_shop_global_sidebar_layout = $carpenter_shop_post_sidebar;
    }

    if ($carpenter_shop_global_sidebar_layout == 'left-sidebar') {
        $carpenter_shop_sidebar_column_class = 'column-order-2';
    } ?>

    <div class="singular-main-block">
        <div class="wrapper">
            <div class="column-row">

                <div id="primary" class="content-area <?php echo $carpenter_shop_sidebar_column_class; ?>">
                    <main id="site-content" class="" role="main">

                        <?php
                            carpenter_shop_breadcrumb();

                        if( have_posts() ): ?>

                            <div class="article-wraper">

                                <?php while (have_posts()) :
                                    the_post();

                                    get_template_part('template-parts/content', 'single');

                                    if ( ( is_single() || is_page() ) && ( comments_open() || get_comments_number() ) && !post_password_required() ) { ?>

                                        <div class="comments-wrapper">
                                            <?php comments_template(); ?>
                                        </div>

                                    <?php
                                    }

                                endwhile; ?>

                            </div>

                        <?php
                        else :

                            get_template_part('template-parts/content', 'none');

                        endif;

                        /**
                         * Navigation
                         * 
                         * @hooked carpenter_shop_related_posts - 20  
                         * @hooked carpenter_shop_single_post_navigation - 30  
                        */

                        do_action('carpenter_shop_navigation_action'); ?>

                    </main>
                </div>
                <?php get_sidebar();?>
            </div>
        </div>
    </div>

<?php
get_footer();
