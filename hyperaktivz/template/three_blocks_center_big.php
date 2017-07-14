<?php
global $post_not_in;
$post_not_in = !empty( $post_not_in ) ? $post_not_in : array();
$three_posts_block_id = get_option('three_posts_block_center');
if ( !empty($three_posts_block_id['big_center']) ){
    $post_in =  $three_posts_block_id['big_center'];
} else {
    $post_in = '';
}

?>
<div class="tbcb_item_single_center_post">

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

    if ( has_post_thumbnail()){
        $thumb_ = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'hyperactivz-theme-main_wide-thumbnail' );
    } else {
        $thumb_ = array();
    }

    $post_not_in[] = $post->ID;

    $c = get_the_category();

    ?>

    <a href="<?php the_permalink(); ?>">
        <div class="row">
            <div class="col-md-4">
                <div class="wrap_meta_text">
                    <p class="tbcb_item_meta">
                        <span class="tbcb_item_category">Animals</span>
                    </p>
                    <h2 class="tbcb_item_head"><?php the_title();?></h2>
                    <p class="tbcb_item_excerpt">
                        <?php kama_excerpt( 'maxchar=150' ); ?>
                    </p>
                </div>

            </div>
            <div class="col-md-8">
                <div class="tb_img_wrap_single_center">
                    <div class="tb_img" style="background-image: url('<?php echo $thumb_[0] ;?>')"></div>
                </div>
            </div>
        </div>
    </a>

    <?php
    }

    } else {
        // no posts found
    }

    // Restore original Post Data
    wp_reset_postdata();
    ?>

</div>