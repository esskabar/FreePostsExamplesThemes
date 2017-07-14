<div id="footer_menu">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <?php
                wp_nav_menu( array(
                        'theme_location'    => 'footer',
                        'depth'             => 1,
                        'container'         => false,
                        'menu_class'        => 'footer_menu',
                        'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                        'walker'            => new wp_bootstrap_navwalker())
                );
                ?>
            </div>
        </div>
    </div>
</div>