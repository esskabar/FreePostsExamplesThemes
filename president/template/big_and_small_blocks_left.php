<?php
global $post_not_in;
$post_not_in = !empty( $post_not_in ) ? $post_not_in : array();

$main_top_post_id = get_option('four_post_id');
$post_in = $main_top_post_id ? $main_top_post_id['left_big'] : '';
?>

<div class="tpb_item">
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
    $query_strip_three_posts_block = new WP_Query( $args );

    // The Loop
    if ( $query_strip_three_posts_block->have_posts() ) {
    while ( $query_strip_three_posts_block->have_posts() ) {
    $query_strip_three_posts_block->the_post();
    ?>
    <?php
    if ( has_post_thumbnail()){
        $thumb_ = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'president-theme-main_wide-thumbnail' );
    } else {
        $thumb_ = array();
    }?>
    <?php
    $post_not_in[] = $post->ID;
    $category_detail=get_the_category($post->ID);
    ?>
    <a href="<?php the_permalink(); ?>" class="tpb_item_inner">
        <div class="tpb_img" style="background-image: url('<?php echo $thumb_[0] ;?>')"></div>
        <div class="tpb_text">
            <div class="tpb_btn"><?php echo $category_detail[0]->cat_name; ?></div>
            <h2 class="tpb_head"><?php the_title();?></h2>

            </p>
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


    <?php
    global $post_not_in;
    $post_not_in = !empty( $post_not_in ) ? $post_not_in : array();
    $three_posts_block_id = get_option('four_post_id');
    if ( !empty($three_posts_block_id['left_small']) ){
        $post_in = explode(',', $three_posts_block_id['left_small']);
    } else {
        $post_in = '';
    }

    ?>

    <?php

    // WP_Query arguments
    $args2 = array (
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
    $query_strip_three_posts_block_small = new WP_Query( $args2 );

    // The Loop
    if ( $query_strip_three_posts_block_small->have_posts() ) {
    while ( $query_strip_three_posts_block_small->have_posts() ) {
        $query_strip_three_posts_block_small->the_post();
    ?>
    <?php
    if ( has_post_thumbnail()){
        $thumb_ = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'president-theme-main_three-center-thumbnail' );
    } else {
        $thumb_ = array();
    }?>
    <?php

    $post_not_in[] = $post->ID;

    $category_detail=get_the_category($post->ID);

    ?>


    <!--<div class="col-xs-12 col-sm-6">-->
    <div class="wb_right">
        <a href="<?php the_permalink(); ?>">
            <div class="wb_right_img_wrap">
                <div class="wb_right_img" style="background-image: url('<?php echo $thumb_[0] ;?>')"></div>
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
</div><!--tpb_item-->