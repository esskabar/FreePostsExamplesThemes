<div class="col-xs-12 col-sm-4 col-sm-push-8">
	<div class="three_blocks_item three_blocks_item_social">
		<div class="td_block_social_counter td-pb-border-top">
			<div class="td_social_type td_social_facebook">
				<div class="td-sp td-sp-facebook"></div>
				<span class="td_social_info">6,238</span>
				<span class="td_social_info td_social_info_name">Fans</span>
				<span class="td_social_button"><a href="//www.facebook.com/">Like</a></span>
			</div>
			<div class="td_social_type td_social_twitter">
				<div class="td-sp td-sp-twitter"></div>
				<span class="td_social_info">34,736</span>
				<span class="td_social_info td_social_info_name">Followers</span>
				<span class="td_social_button"><a href="//twitter.com/">Follow</a></span>
			</div>
			<div class="td_social_type td_social_youtube">
				<div class="td-sp td-sp-youtube"></div>
				<span class="td_social_info">4,675</span>
				<span class="td_social_info td_social_info_name">Subscribers</span><span class="td_social_button"><a href="//www.youtube.com/">Subscribe</a></span>
			</div>
		</div>
		<?php
		if ( is_active_sidebar( 'ad-300x250' ) ) : ?>
			<?php dynamic_sidebar( 'ad-300x250' ); ?>
		<?php else: ?>
			<div class="tbis_ads hidden-xs">
				<img src="<?php echo get_stylesheet_directory_uri() . '/images/img/Layer-50.png';?>" alt="" class="img-responsive">
			</div>
		<?php endif; ?>

	</div><!--three_blocks_item_social-->
</div>