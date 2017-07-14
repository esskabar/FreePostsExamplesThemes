<?php
global $post_not_in, $block_wide_post;//get in themes/hyperactivz/template/top_wide_wide.php
$post_not_in = !empty( $post_not_in ) ? $post_not_in : array();
if ( !empty($block_wide_post['four']) ){
	$post_in = explode(',', $block_wide_post['four']);
} else {
	$post_in = '';
}
?>
<div class="col-xs-12 col-sm-4">
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
$query_top_wide_four = new WP_Query( $args );

// The Loop
if ( $query_top_wide_four->have_posts() ) {
	while ( $query_top_wide_four->have_posts() ) {
		$query_top_wide_four->the_post();
		?>
		<?php
		if ( has_post_thumbnail()){
			$thumb_ = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'hyperactivz-theme-main_small-thumbnail' );
		} else {
			$thumb_ = array();
		}?>
		<?php
		$post_not_in[] = $post->ID;
		?>
		<div class="wb_right">
			<a href="<?php the_permalink(); ?>">
				<div class="wb_right_img_wrap">
					<div class="wb_right_img" style="background-image: url('<?php echo $thumb_[0]; ?>')"></div>
				</div>
				<h2 class="wb_right_text"><?php the_title(); ?></h2></a>
		</div>
		<?php
	}
} else {
	// no posts found
}

// Restore original Post Data
wp_reset_postdata();
?>
</div>