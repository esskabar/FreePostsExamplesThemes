<div id="second_top_nav" class="hidden-xs">
	<div class="container">
		<div class="row">
			<?php
			wp_nav_menu( array(
					'theme_location'    => 'second',
					'depth'             => 1,
					'container'         => 'div',
					'container_class'   => 'col-xs-9',
					'container_id'      => 'second_navbar',
					'menu_class'        => 'list-inline second_nav',
					'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
					'walker'            => new wp_bootstrap_navwalker())
			);
			?>
			<div class="col-xs-3">
				<ul class="list-inline second_nav top-social-links">
					<li><a href="//www.facebook.com/"><span class="icon icon-fb2"></span></a></li>
					<li><a href="//twitter.com/"><span class="icon icon-tw2"></span></a></li>
					<li><a href="//pinterest.com"><span class="icon icon-pt2"></span></a></li>
				</ul>
			</div>
		</div>
	</div>
</div>