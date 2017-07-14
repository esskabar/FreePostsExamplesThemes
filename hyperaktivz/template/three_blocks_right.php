<?php
global $post_not_in;
$post_not_in = !empty( $post_not_in ) ? $post_not_in : array();
$three_posts_block_id = get_option('block_wide_post');
if ( !empty($three_posts_block_id['right']) ){
    $post_in = explode(',', $three_posts_block_id['right']);
} else {
    $post_in = '';
}

?>

<h2 class="title_block">Most Popular</h2>
<div class="three_blocks_item three_blocks_item_right hiden-xs">
    <?php

    // WP_Query arguments
    $args = array (
        'post__in' => $post_in,
        'posts_per_page' => 2,
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
        $thumb_ = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'hyperactivz-theme-main-aside-thumbnail' );
    } else {
        $thumb_ = array();
    }?>
    <?php

    $post_not_in[] = $post->ID;

    $category_detail=get_the_category($post->ID);

    ?>
    <div class="tbcb_item">
        <a href="<?php the_permalink(); ?>">
            <div class="tb_img_wrap">
                <div class="tb_img" style="background-image: url('<?php echo $thumb_[0] ;?>')"></div>
            </div>
            <p class="tbcb_item_meta">
                <span class="tbcb_item_category"><?php echo $category_detail[0]->cat_name; ?></span>
            </p>
            <h2 class="tbcb_item_head"><?php the_title();?></h2>
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