<?php
/**
 * Added Omega Page. */

/**
 * Add a new page under Appearance
 */
function carpenter_shop_menu()
{
	add_theme_page(__('Omega Options', 'carpenter-shop'), __('Omega Options', 'carpenter-shop'), 'edit_theme_options', 'carpenter-shop-theme', 'carpenter_shop_page');
}
add_action('admin_menu', 'carpenter_shop_menu');

function carpenter_shop_notice() {
    global $pagenow;
    if (is_admin() && ('themes.php' == $pagenow) && isset($_GET['activated'])) {
        ?>
        <div class="notice notice-success is-dismissible">
            <div class="notice-content">
                <h2><?php esc_html_e('Thank You for installing Carpenter Shop Theme!', 'carpenter-shop') ?> </h2>
                <div class="info-link">
                    <a href="<?php echo esc_url( admin_url( 'themes.php?page=carpenter-shop-theme' ) ); ?>"><?php esc_html_e('Omega Options', 'carpenter-shop'); ?></a>
                </div>
                <div class="info-link">
                    <a href="<?php echo esc_url(CARPENTER_SHOP_LITE_DOCS_PRO); ?>" target="_blank"> <?php esc_html_e('Documentation', 'carpenter-shop'); ?></a>
                </div>
                <div class="info-link">
                    <a href="<?php echo esc_url(CARPENTER_SHOP_BUY_NOW); ?>" target="_blank"> <?php esc_html_e('Upgrade to Pro', 'carpenter-shop'); ?></a>
                </div>
                <div class="info-link">
                    <a href="<?php echo esc_url(CARPENTER_SHOP_DEMO_PRO); ?>" target="_blank"> <?php esc_html_e('Premium Demo', 'carpenter-shop'); ?></a>
                </div>
            </div>
        </div>
    <?php }
}
add_action('admin_notices', 'carpenter_shop_notice');

/**
 * Enqueue styles for the help page.
 */
function carpenter_shop_admin_scripts($hook)
{
	wp_enqueue_style('carpenter-shop-admin-style', get_template_directory_uri() . '/inc/get-started/get-started.css', array(), '');
}
add_action('admin_enqueue_scripts', 'carpenter_shop_admin_scripts');

/**
 * Add the theme page
 */
function carpenter_shop_page(){
$carpenter_shop_user = wp_get_current_user();
$carpenter_shop_theme = wp_get_theme();
?>
<div class="das-wrap">
  <div class="carpenter-shop-panel header">
    <div class="carpenter-shop-logo">
      <span></span>
      <h2><?php echo esc_html( $carpenter_shop_theme ); ?></h2>
    </div>
    <p>
      <?php
        $carpenter_shop_theme = wp_get_theme();
        echo wp_kses_post( apply_filters( 'omega_theme_description', esc_html( $carpenter_shop_theme->get( 'Description' ) ) ) );
      ?>
    </p>
    <a class="btn btn-primary" href="<?php echo esc_url(admin_url('/customize.php?'));
?>"><?php esc_html_e('Edit With Customizer - Click Here', 'carpenter-shop'); ?></a>
  </div>

  <div class="das-wrap-inner">
    <div class="das-col das-col-7">
      <div class="carpenter-shop-panel">
        <div class="carpenter-shop-panel-content">
          <div class="theme-title">
            <h3><?php esc_html_e('If you are facing any issue with our theme, submit a support ticket here.', 'carpenter-shop'); ?></h3>
          </div>
          <a href="<?php echo esc_url( CARPENTER_SHOP_SUPPORT_FREE ); ?>" target="_blank"
            class="btn btn-secondary"><?php esc_html_e('Lite Theme Support.', 'carpenter-shop'); ?></a>
        </div>
      </div>
      <div class="carpenter-shop-panel">
        <div class="carpenter-shop-panel-content">
          <div class="theme-title">
            <h3><?php esc_html_e('Please write a review if you appreciate the theme.', 'carpenter-shop'); ?></h3>
          </div>
          <a href="<?php echo esc_url( CARPENTER_SHOP_REVIEW_FREE ); ?>" target="_blank"
            class="btn btn-secondary"><?php esc_html_e('Rank this topic.', 'carpenter-shop'); ?></a>
        </div>
      </div>
       <div class="carpenter-shop-panel">
        <div class="carpenter-shop-panel-content">
          <div class="theme-title">
            <h3><?php esc_html_e('Follow our lite theme documentation to set up our lite theme as seen in the screenshot.', 'carpenter-shop'); ?></h3>
          </div>
          <a href="<?php echo esc_url( CARPENTER_SHOP_LITE_DOCS_PRO ); ?>" target="_blank"
            class="btn btn-secondary"><?php esc_html_e('Lite Documentation.', 'carpenter-shop'); ?></a>
        </div>
      </div>
    </div>
    <div class="das-col das-col-3">
      <div class="upgrade-div">
        <h4>
          <strong>
            <?php esc_html_e('Premium Features Include:', 'carpenter-shop'); ?>
          </strong>
        </h4>
        <ul>
          <li>
            <?php esc_html_e('One Click Demo Content Importer', 'carpenter-shop'); ?>
          </li>
          <li>
            <?php esc_html_e('Woocommerce Plugin Compatibility', 'carpenter-shop'); ?>
          </li>
          <li>
            <?php esc_html_e('Multiple Section for the templates', 'carpenter-shop'); ?>            
          </li>
          <li>
            <?php esc_html_e('For a better user experience, make the top of your menu sticky.', 'carpenter-shop'); ?>  
          </li>
        </ul>
        <div class="text-center">
          <a href="<?php echo esc_url( CARPENTER_SHOP_BUY_NOW ); ?>" target="_blank"
            class="btn btn-success"><?php esc_html_e('Upgrade Pro $40', 'carpenter-shop'); ?></a>
        </div>
      </div>
      <div class="carpenter-shop-panel">
        <div class="carpenter-shop-panel-content">
          <div class="theme-title">
            <h3><?php esc_html_e('Kindly view the premium themes live demo.', 'carpenter-shop'); ?></h3>
          </div>
          <a class="btn btn-primary demo" href="<?php echo esc_url( CARPENTER_SHOP_DEMO_PRO ); ?>" target="_blank"
            class="btn btn-secondary"><?php esc_html_e('Live Demo', 'carpenter-shop'); ?></a>
        </div>
        <div class="carpenter-shop-panel-content pro-doc">
          <div class="theme-title">
            <h3><?php esc_html_e('Follow our pro theme documentation to set up our premium theme as seen in the screenshot.', 'carpenter-shop'); ?></h3>
          </div>
          <a href="<?php echo esc_url( CARPENTER_SHOP_DOCS_PRO ); ?>" target="_blank"
            class="btn btn-secondary"><?php esc_html_e('Pro Documentation', 'carpenter-shop'); ?></a>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
}