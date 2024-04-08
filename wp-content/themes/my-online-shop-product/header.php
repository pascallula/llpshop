<?php
/**
 * Header for My Online Shop Product Theme
 *
 * @package My Online Shop Product
 * @subpackage my_online_shop_product
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset=<?php bloginfo( "charset" ); ?> />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <?php wp_head(); ?>
</head>

<body <?php body_class();?> >

    <?php wp_body_open(); ?>

    <a class="screen-reader-text skip-link" href="#content">
        <?php
            esc_html_e( 'Skip to content', "my-online-shop-product" );
        ?>
    </a>
    
    <?php 
        get_template_part('template-parts/header/content', 'navbar');
    ?>    

     