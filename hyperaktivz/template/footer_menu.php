
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
        <div class="copyright">
          <h1 class="copyright_head">&copy; 2016 hyperactivz. All rights reserved.</h1>
        </div>
      </div>
    </div>
  </div>
</div>
