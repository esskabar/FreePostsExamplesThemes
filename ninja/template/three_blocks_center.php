<?php
global $post_not_in;
$post_not_in = !empty( $post_not_in ) ? $post_not_in : array();
$three_post_id = get_option('three_post_id');
$three_post_id_center = $three_post_id['center'];
if ( !empty($three_post_id_center) ){
	$post_in = explode(',', $three_post_id_center);
} else {
	$post_in = '';
}
?>

<div class="col-xs-12 col-sm-4 col-sm-pull-4">
	<div class="three_blocks_item three_blocks_item_center">
		<hr class="tbcb_border visible-xs-block">
	<?php

	// WP_Query arguments
	$args = array (
		'post__in' => $post_in,
		'posts_per_page' => 3,
		'category__not_in' => 1,
		'post_type'              => array( 'post' ),
		'post_status'            => array( 'publish' ),
		'order'                  => 'DESC',
		'post__not_in' => $post_not_in,
		'orderby'                => 'date'
	);

	// The Query
	$query_strip_three_block_center = new WP_Query( $args );

	// The Loop
	if ( $query_strip_three_block_center->have_posts() ) {
		while ( $query_strip_three_block_center->have_posts() ) {
			$query_strip_three_block_center->the_post();
			?>
			<?php
			$post_not_in[] = $post->ID;
			?>
			<div class="tbcb_item">
				<a href="<?php the_permalink(); ?>">
					<h2 class="tbcb_item_head"><?php the_title(); ?></h2>
					<p class="tbcb_item_meta">
						<span class="tbcb_item_author"><?php the_author(); ?></span> - <span class="tbcb_item_date"><?php echo get_the_date( 'M j, Y' );?></span>
					</p>
				</a>
			</div>
			<?php
		}
	} else {
		// no posts found
	}

	// Restore original Post Data
	wp_reset_postdata();
	?>

		<hr class="tbcb_border visible-xs-block">
	</div><!--three_blocks_item_center-->
</div>