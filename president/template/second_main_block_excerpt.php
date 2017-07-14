<?php
global $post_not_in;
$post_not_in = !empty( $post_not_in ) ? $post_not_in : array();
$three_posts_block_id = get_option('three_posts_block_center');

if ( !empty($three_posts_block_id['second_center_excerpt']) ){
    $post_in = explode(',', $three_posts_block_id['second_center_excerpt']);
} else {
    $post_in = '';
}

?>

<div class="wrap_article">
    <h2 class="title_block">Entertainment</h2>

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
    $query_main_top_big = new WP_Query( $args );

    // The Loop
    if ( $query_main_top_big->have_posts() ) {
    while ( $query_main_top_big->have_posts() ) {
    $query_main_top_big->the_post();

    if ( has_post_thumbnail()){
        $thumb_ = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'president-theme-main_wide-thumbnail' );
    } else {
        $thumb_ = array();
    }

    $post_not_in[] = $post->ID;

    $c = get_the_category();

    ?>

    <article>
        <a href="<?php the_permalink(); ?>" class="wrapp_item">
            <div class="row">
                <div class="col-xs-4">
                    <div class="wrap_img_article">
                        <div class="img_article"
                             style="background-image: url('<?php echo $thumb_[0] ;?>')"></div>
                    </div>
                </div>
                <div class="col-xs-8">
                    <div class="item_text">
                        <h2 class="header_item"><?php the_title();?></h2>

                        <p class="excerpt_item"><?php kama_excerpt( 'maxchar=150' ); ?></p>

                        <p class="read_more_post">Read more</span></p>
                    </div>
                </div>
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

    <article class="hidden-xs">
        <div class="wrap_ads_center">
            <?php
            if ( is_active_sidebar( 'ad-728x90' ) ) : ?>
                <?php dynamic_sidebar( 'ad-728x90' ); ?>
            <?php else: ?>
                <div class="banner-widget-center">
                    <div class="ads">
                        <img src="<?php echo get_stylesheet_directory_uri() . '/images/img/banner728.jpg';?>" class="img-responsive" alt="">
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </article>

</div>