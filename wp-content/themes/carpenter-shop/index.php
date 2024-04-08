<?php
/**
 * The main template file
 * @package Carpenter Shop
 * @since 1.0.0
 */

get_header();
$carpenter_shop_default = carpenter_shop_get_default_theme_options();
$carpenter_shop_global_sidebar_layout = esc_html( get_theme_mod( 'global_sidebar_layout',$carpenter_shop_default['global_sidebar_layout'] ) );
$carpenter_shop_sidebar_column_class = 'column-order-2';
if ($carpenter_shop_global_sidebar_layout == 'right-sidebar') {
    $carpenter_shop_sidebar_column_class = 'column-order-1';
}

global $carpenter_shop_archive_first_class; ?>
    <div class="archive-main-block">
        <div class="wrapper">
            <div class="column-row">

                <div id="primary" class="content-area <?php echo $carpenter_shop_sidebar_column_class; ?>">
                    <main id="site-content" role="main">

                        <?php

                        if( !is_front_page() ) {
                            carpenter_shop_breadcrumb();
                        }

                        if( have_posts() ): ?>

                            <div class="article-wraper article-wraper-archive">
                                <?php
                                while( have_posts() ):
                                    the_post();

                                    get_template_part( 'template-parts/content', get_post_format() );

                                endwhile; ?>
                            </div>

                            <?php
                            if( is_search() ){
                                the_posts_pagination();
                            }else{
                                do_action('carpenter_shop_archive_pagination');
                            }

                        else :

                            get_template_part('template-parts/content', 'none');

                        endif; ?>
                    </main>
                </div>
                <?php get_sidebar();?>
            </div>
        </div>
    </div>
<?php
get_footer();
