<?php
global $post_not_in, $main_top_post_id;
$post_not_in = !empty( $post_not_in ) ? $post_not_in : array();
$main_top_post_id = get_option('main_top_post_id');
$post_in = $main_top_post_id ? $main_top_post_id['big'] : '';
?>
<div class="top_block_big">
	<?php

	// WP_Query arguments
	$args = array (
		'p' => $post_in,
		'posts_per_page' => 1,
		'category__not_in' => 1,
		'post_type'              => array( 'post' ),
		'post_status'            => array( 'publish' ),
		'order'                  => 'DESC',
		'post__not_in' => $post_not_in,
		'orderby'                => 'date'
	);

	// The Query
	$query_main_top_big = new WP_Query( $args );

	// The Loop
	if ( $query_main_top_big->have_posts() ) {
		while ( $query_main_top_big->have_posts() ) {
			$query_main_top_big->the_post();
			?>
			<?php
			if ( has_post_thumbnail()){
				$thumb_ = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'hyperactivz-theme-main-top_big-thumbnail' );
			} else {
				$thumb_ = array();
			}?>
			<?php
			$post_not_in[] = $post->ID;
			?>
			<article>
				<a href="<?php the_permalink(); ?>" class="wrapp_item">
					<div class="img_article" style="background-image: url('<?php echo $thumb_[0] ;?>')"></div>
					<div class="item_text">
						<h2 class="header_item"><?php the_title();?></h2>
						<hr class="post-yellow-divider">
						<p class="meta_item"><span class="author_name"> <?php the_author(); ?> - </span> <span
								class="date_item"><?php echo get_the_date( 'M j, Y' );?></span></p>
					</div>
				</a>
			</article>
			<?php
		}
	} else {
		// no posts found
	}

	// Restore original Post Data
	wp_reset_postdata();
	?>
</div><!--top_block_big-->