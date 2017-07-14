<div class="col-xs-12 col-sm-4 col-sm-push-4 footer_follow equal_footer">
	<div class="footer_social widget">
		<h2 class="footer_social_head hidden-xs widget-title">FOLLOW US</h2>
		<a href="//www.facebook.com" class="icon icon-fb_ft_sc"></a>
		<a href="//twitter.com" class="icon icon-tw_ft_sc"></a>
		<a href="//pinterest.com" class="icon icon-pt_ft_sc"></a>
	</div>

	<?php
	if ( is_active_sidebar( 'footer-right-widget' ) ) : ?>
		<?php dynamic_sidebar( 'footer-right-widget' ); ?>
	<?php endif; ?>
</div>