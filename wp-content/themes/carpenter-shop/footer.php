<?php
/**
 * The template for displaying the footer
 * @package Carpenter Shop
 * @since 1.0.0
 */

/**
 * Toogle Contents
 * @hooked carpenter_shop_content_offcanvas - 30
*/

do_action('carpenter_shop_before_footer_content_action'); ?>

</div>

<footer id="site-footer" role="contentinfo">

    <?php
    /**
     * Footer Content
     * @hooked carpenter_shop_footer_content_widget - 10
     * @hooked carpenter_shop_footer_content_info - 20
    */

    do_action('carpenter_shop_footer_content_action'); ?>

</footer>
</div>
<?php wp_footer(); ?>
</body>
</html>
