<?php ?>
<div class="col-xs-12 col-md-8 main">
	<h2><?php echo $category_name;?></h2>
	<div class="main_block_item_wrap clearfix">
		<?php
		include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
		$arr_meta = array();
		if ( is_plugin_active( 'wp-hide-post/wp-hide-post.php' ) ) {
			$arr_meta = array(
				'key'     => '_wplp_post_front',
				'compare' => 'NOT EXISTS'
			);
		}

		// WP_Query arguments
		$args = array(
			'post_type'   => array( 'post' ),
			'post_status' => array( 'publish' ),
			'cat'         => $cat,
			'order'       => 'DESC',
			'orderby'     => 'date',
			'meta_query'  => array(
				$arr_meta
			)
		);

		// The Query
		$query_main_home = new WP_Query( $args );

		// The Loop
		if ( $query_main_home->have_posts() ) {
			while ( $query_main_home->have_posts() ) {
				$query_main_home->the_post();
				?>
				<?php
				if ( has_post_thumbnail() ) {
					$thumb_ = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'hyperactivz-theme-main-thumbnail' );
				} else {
					$thumb_ = array();
				} ?>
				<?php
				$post_not_in[]   = $post->ID;
//				$category_detail = get_the_category( $post->ID );
				?>

				<div class="main_block_item">
					<a href="<?php the_permalink(); ?>">
						<div class="mb_img_wrap">
							<div class="mb_img" style="background-image: url('<?php echo $thumb_[0]; ?>')"></div>
						</div>

						<h2 class="mb_head"><?php the_title(); ?></h2>
						<p class="mb_text"><?php kama_excerpt( 'maxchar=150' ); ?></p>
						<p class="mb_read_more">Read more</p>
					</a>
				</div>
				<?php
			}
		} else {
			// no posts found
		}
		if ( $query_main_home->max_num_pages > 1 ) : ?>
			<script id="true_loadmore">
				var ajaxurl = '<?php echo site_url() ?>/wp-admin/admin-ajax.php';
				var true_posts = '<?php echo serialize($query_main_home->query_vars); ?>';
				var current_page = <?php echo (get_query_var('paged')) ? get_query_var('paged') : 1; ?>;
			</script>
		<?php endif;

		// Restore original Post Data
		wp_reset_postdata();
		?>

	</div>
</div>
