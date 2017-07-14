<div id="second_top_nav" class="hidden-xs">
	<div class="container">
		<div class="row">
			<?php
			wp_nav_menu( array(
					'theme_location'    => 'second',
					'depth'             => 1,
					'container'         => 'div',
					'container_class'   => 'col-xs-12',
					'container_id'      => 'second_navbar',
					'menu_class'        => 'list-inline second_nav',
					'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
					'walker'            => new wp_bootstrap_navwalker())
			);
			?>
		</div>
	</div>
</div>