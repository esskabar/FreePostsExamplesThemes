<div id="banner_widget" class="hidden-xs hidden-sm">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<div class="wrap_ads_center">
					<?php
					if ( is_active_sidebar( 'ad-728x90' ) ) : ?>
						<?php dynamic_sidebar( 'ad-728x90' ); ?>
					<?php else: ?>
						<div class="banner-widget-center">
							<div class="ads">
								<img src="<?php echo get_stylesheet_directory_uri() . '/images/img/banner-eithout-buttons.png';?>" class="img-responsive" alt="">
							</div>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</div>