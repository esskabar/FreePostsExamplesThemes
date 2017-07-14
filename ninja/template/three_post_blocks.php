<?php
global $post_not_in;
$post_not_in = !empty( $post_not_in ) ? $post_not_in : array();
$three_posts_block_id = get_option('three_posts_block_id');
if ( !empty($three_posts_block_id) ){
	$post_in = explode(',', $three_posts_block_id);
} else {
	$post_in = '';
}
?>

<div id="three_post_blocks">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<div class="tpb_items_wrap">
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
					$query_strip_three_posts_block = new WP_Query( $args );

					// The Loop
					if ( $query_strip_three_posts_block->have_posts() ) {
						while ( $query_strip_three_posts_block->have_posts() ) {
							$query_strip_three_posts_block->the_post();
							?>
							<?php
							if ( has_post_thumbnail()){
								$thumb_ = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'hyperactivz-theme-main-thumbnail' );
							} else {
								$thumb_ = array();
							}?>
							<?php
							$post_not_in[] = $post->ID;
							$category_detail=get_the_category($post->ID);
							?>
							<div class="tpb_item">
								<a href="<?php the_permalink(); ?>" class="tpb_item_inner">
									<div class="tpb_img" style="background-image: url('<?php echo $thumb_[0] ;?>')"></div>
									<div class="tpb_text">
										<div class="tpb_btn"><?php echo $category_detail[0]->cat_name; ?></div>
										<h2 class="tpb_head"><?php the_title(); ?></h2>
										<p class="tpb_meta_item"><span class="tpb_author_name"> <?php the_author(); ?> - </span> <span class="tpb_date_item"><?php echo get_the_date( 'M j, Y' );?></span>
										</p>
									</div>
								</a>
							</div><!--tpb_item-->
							<?php
						}
					} else {
						// no posts found
					}

					// Restore original Post Data
					wp_reset_postdata();
					?>

				</div><!--tpb_item_wrap-->
			</div>
		</div>
	</div>
</div>