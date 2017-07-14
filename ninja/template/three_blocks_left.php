<?php
global $post_not_in;
$post_not_in = !empty( $post_not_in ) ? $post_not_in : array();
$three_post_id = get_option('three_post_id');
$three_post_id_left = $three_post_id['left'];
if ( !empty($three_post_id_left) ){
	$post_in = explode(',', $three_post_id_left);
} else {
	$post_in = '';
}
?>

<div class="col-xs-12 col-sm-4 col-sm-pull-4">

	<?php

	// WP_Query arguments
	$args = array (
		'post__in' => $post_in,
		'posts_per_page' => 1,
		'category__not_in' => 1,
		'post_type'              => array( 'post' ),
		'post_status'            => array( 'publish' ),
		'order'                  => 'DESC',
		'post__not_in' => $post_not_in,
		'orderby'                => 'date'
	);

	// The Query
	$query_strip_three_block_left = new WP_Query( $args );

	// The Loop
	if ( $query_strip_three_block_left->have_posts() ) {
		while ( $query_strip_three_block_left->have_posts() ) {
			$query_strip_three_block_left->the_post();
			?>
			<?php
			if ( has_post_thumbnail()){
				$thumb_ = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'hyperactivz-theme-main-thumbnail' );
			} else {
				$thumb_ = array();
			}?>
			<?php
			$post_not_in[] = $post->ID;
			$slogan_home_page = get_post_meta( $post->ID, 'slogan_home_page', TRUE );
			?>
			<div class="three_blocks_item three_blocks_item_post">
				<a href="<?php the_permalink(); ?>">
					<p class="tb_top_meta"><?php the_title(); ?></p>
					<div class="tb_img_wrap">
						<div class="tb_img" style="background-image: url('<?php echo $thumb_[0]; ?>')"></div>
					</div>
					<p class="tb_text"><?php kama_excerpt( 'maxchar=150' ); ?></p>
					<p class="tb_slogan"><?php echo $slogan_home_page; ?></p>
				</a>
			</div><!--three_blocks_item_post-->
			<?php
		}
	} else {
		// no posts found
	}

	// Restore original Post Data
	wp_reset_postdata();
	?>

</div>