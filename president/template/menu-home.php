<?php
global $custom_logo;
$theme_options = get_option('theme_options_id');
$custom_logo = $theme_options['custom_logo'];
$image_attributes = wp_get_attachment_image_src( $custom_logo, array(329,54) );
$src_custom_logo = $image_attributes[0];
?>

<nav class="navbar navbar-default" id="top_nav">
    <div class="container">
        <div class="navbar-header pull-left">
            <a class="navbar-brand" href="<?php echo home_url(); ?>">
                <?php if ( !empty($custom_logo) ) : ?>
                    <img src="<?php echo $src_custom_logo;?>" alt="<?php bloginfo( 'name' ); ?>" class="logo-image">
                <?php else: ?>
                    <img src="<?php echo TEMPLATE_DIRECTORY_URI;?>/images/logo.png" alt="<?php bloginfo( 'name' ); ?>" class="logo-image">
                <?php endif; ?>
            </a>
        </div>
        <div class="mobile_button pull-right">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div id="navbar-social" class="">
            <ul class="nav navbar-nav demo">
                <li><a href="https://www.facebook.com/"><span class="icon icon-social-facebook"></span></a></li>
                <li> <a href="https://ru.pinterest.com/"><span class="icon icon-social-pinterest"></span></a></li>
                <li> <a href="https://twitter.com/"><span class="icon icon-social-twitter"></span></a></li>
            </ul>
        </div>

        <?php
        wp_nav_menu( array(
                'theme_location'    => 'primary',
                'depth'             => 2,
                'container'         => 'div',
                'container_class'   => 'navbar-collapse collapse navbar-left',
                'container_id'      => 'navbar',
                'menu_class'        => 'nav navbar-nav right_position',
                'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                'walker'            => new wp_bootstrap_navwalker())
        );
        ?>

    </div>
</nav>