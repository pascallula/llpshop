<?php
/**
 * The sidebar containing the main widget area
 * @package Carpenter Shop
 */

global $post;

$carpenter_shop_default = carpenter_shop_get_default_theme_options();

if(!empty($post)) {
$carpenter_shop_post_sidebar = esc_html( get_post_meta( $post->ID, 'carpenter_shop_post_sidebar_option', true ) );
}

$carpenter_shop_sidebar_column_class = 'column-order-2';

if (empty($carpenter_shop_post_sidebar)) {
    $carpenter_shop_global_sidebar_layout = esc_html( get_theme_mod( 'global_sidebar_layout',$carpenter_shop_default['global_sidebar_layout'] ) );
} else {
    $carpenter_shop_global_sidebar_layout = $carpenter_shop_post_sidebar;
}
if ( ! is_active_sidebar( 'sidebar-1' ) || $carpenter_shop_global_sidebar_layout == 'no-sidebar' ) {
    return;
}

if ($carpenter_shop_global_sidebar_layout == 'left-sidebar') {
    $carpenter_shop_sidebar_column_class = 'column-order-1';
}
 ?>

<aside id="secondary" class="widget-area <?php echo $carpenter_shop_sidebar_column_class; ?>">
    <div class="widget-area-wrapper">
        <?php dynamic_sidebar( 'sidebar-1' ); ?>
    </div>
</aside>
