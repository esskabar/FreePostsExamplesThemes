<div id="banner_widget" class="hidden-xs hidden-sm">
    <div class="container">
        <div class="row">
            <div class="col-xs-8">
                <div class="wrap_ads_center">

                    <?php
                    if ( is_active_sidebar( 'ad-728x90' ) ) : ?>
                        <?php dynamic_sidebar( 'ad-728x90' ); ?>
                    <?php else: ?>
                    <div class="banner-widget-center">

                        <img src="<?php echo TEMPLATE_DIRECTORY_URI ?>/images/img/banner728.jpg" class="img-responsive" alt="">

                    </div>

                    <?php endif; ?>

                </div>
            </div>
            <div class="col-xs-4">
                <div class="social_links_block">
                    <a href="http://facebook.com"><img src="<?php echo TEMPLATE_DIRECTORY_URI ?>/images/img/facebook.png" class="img-responsive" alt=""></a>
                    <a href="http://twitter.com"><img src="<?php echo TEMPLATE_DIRECTORY_URI ?>/images/img/twwe.png" class="img-responsive" alt=""></a>
                    <a href="http://youtube.com"> <img src="<?php echo TEMPLATE_DIRECTORY_URI ?>/images/img/youtube.png" class="img-responsive" alt=""></a>
                </div>
            </div>
        </div>
    </div>
</div>