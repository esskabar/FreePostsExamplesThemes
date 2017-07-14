<?php
global $custom_logo;
$theme_options = get_option('theme_options_id');
$custom_logo = $theme_options['custom_logo'];
$image_attributes = wp_get_attachment_image_src( $custom_logo, array(329,54) );
$src_custom_logo = $image_attributes[0];
?>
<nav class="navbar navbar-default" id="top_nav">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
			        aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="<?php echo home_url(); ?>">
				<?php if ( !empty($custom_logo) ) : ?>
					<img src="<?php echo $src_custom_logo;?>" alt="<?php bloginfo( 'name' ); ?>" class="logo-image img-responsive">
				<?php else: ?>
					<img src="<?php echo TEMPLATE_DIRECTORY_URI;?>/images/logo.png" alt="<?php bloginfo( 'name' ); ?>" class="logo-image img-responsive">
				<?php endif; ?>
			</a>
		</div>
		<?php
		wp_nav_menu( array(
				'theme_location'    => 'primary',
				'depth'             => 2,
				'container'         => 'div',
				'container_class'   => 'navbar-collapse collapse navbar-right',
				'container_id'      => 'navbar',
				'menu_class'        => 'nav navbar-nav',
				'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
				'walker'            => new wp_bootstrap_navwalker())
		);
		?>
		<!--/.navbar-collapse -->
	</div>
</nav>