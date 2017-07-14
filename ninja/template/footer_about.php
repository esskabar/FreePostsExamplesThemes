<?php
global $custom_logo;// get in wp-content/themes/hyperactivz/template/menu-home.php
$image_attributes = wp_get_attachment_image_src( $custom_logo, array(329,54) );
$src_custom_logo = $image_attributes[0];
?>

<div class="col-xs-12 col-sm-4 footer_about equal_footer">
  <a class="footer_logo_link" href="<?php echo home_url(); ?>">
    <?php if ( !empty($custom_logo) ) : ?>
      <img src="<?php echo $src_custom_logo;?>" alt="<?php bloginfo( 'name' ); ?>" class="footer_logo_image img-responsive">
    <?php else: ?>
      <img src="<?php echo TEMPLATE_DIRECTORY_URI;?>/images/logo.png" alt="<?php bloginfo( 'name' ); ?>" class="footer_logo_image img-responsive">
    <?php endif; ?>
  </a>

  <div class="about_us widget">
    <h2 class="about_us_head widget-title"></h2>
    <p class="about_us_text">hyperactivz is a premium Wordpress review magazine theme, aliquam neque nunc,
      vestibulum et aliquet nisidapibus non velit sit amet, enean pretium sodalesorci placerat ultrices.</p>
  </div>

  <div id="search-2" class="widget_search hidden-xs widget">
    <h2 class="widget-title">search</h2>
    <form role="search" method="get" class="search-form" action="/">
      <label>
        <span class="screen-reader-text">Search for:</span>
        <input type="search" class="search-field" placeholder="Search …" value="" name="s">
      </label>
      <input type="submit" class="search-submit" value="Search">
    </form>
  </div>

</div>