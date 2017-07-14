<?php
global $post_not_in;
$post_not_in = !empty( $post_not_in ) ? $post_not_in : array();
$three_posts_block_id = get_option('block_footer_posts_bottom');
if ( !empty($three_posts_block_id['down']) ){
    $post_in = explode(',', $three_posts_block_id['down']);
} else {
    $post_in = '';
}

?>


<div class="col-xs-12 col-sm-12 col-md-12 footer_follow">
    <?php
    if ( is_active_sidebar( 'footer-right-widget' ) ) : ?>
        <?php dynamic_sidebar( 'footer-right-widget' ); ?>
    <?php endif; ?>
    <div class="aside-popular small_block">
        <h2 class="popular_post_head widget-title">POPULAR POSTS</h2>
        <div class="widget">
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
                $thumb_ = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'president-theme-main_small-thumbnail' );
            } else {
                $thumb_ = array();
            }?>
            <?php

            $post_not_in[] = $post->ID;

            $category_detail=get_the_category($post->ID);

            ?>

            <div class="wb_right">
                <a href="<?php the_permalink(); ?>">
                    <div class="wb_right_img_wrap">
                        <div class="wb_right_img"
                             style="background-image: url('<?php echo $thumb_[0] ;?>')"></div>
                    </div>
                    <div class="wb_right_text_wrap">
                        <h2 class="wb_right_text"><?php the_title();?></h2>
                        <p class="small-post-date"><?php the_time( 'n M, Y' ) ; ?></p>
                    </div>
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
        </div>

    </div>
</div>