<?php
global $post_not_in, $main_top_post_id;
$post_not_in = !empty( $post_not_in ) ? $post_not_in : array();
$main_top_post_id = get_option('main_top_post_id');
$post_in = $main_top_post_id ? $main_top_post_id['right_first'] : '';
?>
<div class="top_block_right clearfix">
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
        $thumb_ = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'hyperactivz-theme-main-thumbnail' );
    } else {
        $thumb_ = array();
    }
    ?>
    <?php
    $post_not_in[] = $post->ID;

    $c = get_the_category();

    ?>
    <article>
        <a href="<?php the_permalink(); ?>" class="wrapp_item">
            <div class="wrap_img_article">
                <div class="img_article" style="background-image: url('<?php echo $thumb_[0] ;?>')"></div>
            </div>
            <div class="item_text">
                <h2 class="header_item"><?php the_title();?></h2>
                <p class="meta_categoty"><?php echo $c[0]->cat_name; ?></p>
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
    <?php
    global $post_not_in, $main_top_post_id;
    $post_not_in = !empty( $post_not_in ) ? $post_not_in : array();
    $main_top_post_id = get_option('main_top_post_id');
    $post_in = $main_top_post_id ? $main_top_post_id['right_second'] : '';
    ?>
    <?php

    // WP_Query arguments
    $args2 = array (
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
    $query_main_top_big2 = new WP_Query( $args2 );

    // The Loop
    if ( $query_main_top_big2->have_posts() ) {
    while ( $query_main_top_big2->have_posts() ) {
    $query_main_top_big2->the_post();

    if ( has_post_thumbnail()){
        $thumb_ = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'hyperactivz-theme-main-top_big-thumbnail' );
    } else {
        $thumb_ = array();
    }
    ?>
    <?php
    $post_not_in[] = $post->ID;

    ?>
    <article>
        <a href="<?php the_permalink(); ?>" class="wrapp_item">
            <div class="wrap_img_article">
                <div class="img_article" style="background-image: url('<?php echo $thumb_[0] ;?>')"></div>
            </div>
            <div class="item_text">
                <h2 class="header_item"><?php the_title();?></h2>
                <p class="meta_categoty"><?php echo $c[0]->cat_name; ?></p>
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
</div>