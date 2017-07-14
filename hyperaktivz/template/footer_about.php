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
    <h2 class="about_us_head widget-title">about us</h2>
    <p class="about_us_text">hyperactivz is a premium Wordpress review magazine theme, aliquam neque nunc,
      vestibulum et aliquet nisidapibus non velit sit amet, enean pretium sodalesorci placerat ultrices.</p>
  </div>

    <div class="footer_social_links">
        <a href="http://facebook.com"><span class="icon icon-fb"></span></a>
        <a href="http://twitter.com"><span class="icon icon-tw"></span></a>
        <a href="http://pinterest.com"><span class="icon icon-pt"></span></a>
    </div>

</div>