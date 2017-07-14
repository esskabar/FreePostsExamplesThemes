<?php
global $custom_logo;// get in wp-content/themes/hyperactivz/template/menu-home.php
$image_attributes = wp_get_attachment_image_src( $custom_logo, array(329,54) );
$src_custom_logo = $image_attributes[0];
?>

<div class="col-xs-12 col-sm-12 footer_about">
    <div class="wrap_footer_block">
        <div class="row">
            <div class="col-md-2 col-xs-4">
                <!--<div class="wrap_footer_logo">-->
                <div class="footer_logo">
                    <a href="<?php echo home_url(); ?>" class="footer_logo_link">
                        <?php if ( !empty($custom_logo) ) : ?>
                            <img src="<?php echo $src_custom_logo;?>" alt="<?php bloginfo( 'name' ); ?>" class="footer_logo_image img-responsive">
                        <?php else: ?>
                            <img src="<?php echo TEMPLATE_DIRECTORY_URI;?>/images/logo.png" alt="<?php bloginfo( 'name' ); ?>" class="footer_logo_image img-responsive">
                        <?php endif; ?>
                    </a>
                </div>
            </div>
            <div class="col-md-6 col-xs-8">
                <div class="about_us widget">
                    <h2 class="about_us_head widget-title">about us</h2>

                    <p class="about_us_text">PresidentMommy is your news, entertainment, music fashion website.
                        We provide you with the latest breaking  news and videos straight from the
                        entertainment industry.</p>
                </div>
            </div>

            <div class="col-md-4 col-xs-12">
                <div class="footer_social">
                    <a href="https://www.facebook.com/"><span class="icon icon-fbfs"></span></a>
                    <a href="https://ru.pinterest.com/"><span class="icon icon-ptfs"></span></a>
                    <a href="https://twitter.com/"><span class="icon icon-twfs"></span></a>
                </div>
            </div>
        </div>
    </div>
</div>