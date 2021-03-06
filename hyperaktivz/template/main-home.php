<?php
global $post_not_in;
$post_not_in = !empty( $post_not_in ) ? $post_not_in : array();
$three_posts_block_id = get_option('block_main_six_posts');
if ( !empty($three_posts_block_id['left']) ){
    $post_in = explode(',', $three_posts_block_id['left']);
} else {
    $post_in = '';
}

?>

<div class="main_content">
    <h2 class="title_block">Hot</h2>
    <?php

    // WP_Query arguments
    $args = array (
        'post__in' => $post_in,
        'posts_per_page' => 6,
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
        $thumb_ = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'hyperactivz-theme-main_wide-thumbnail' );
    } else {
        $thumb_ = array();
    }?>
    <?php

    $post_not_in[] = $post->ID;

    $category_detail=get_the_category($post->ID);

    ?>
    <article>
        <a href="<?php the_permalink(); ?>" class="wrapp_item">
            <div class="row">
                <div class="col-xs-4">
                    <div class="wrap_img_article">
                        <div class="img_article" style="background-image: url('<?php echo $thumb_[0] ;?>')"></div>
                    </div>
                </div>
                <div class="col-xs-8">
                    <div class="item_text">
                        <h2 class="header_item"><?php the_title();?></h2>

                        <p class="excerpt_item"><?php kama_excerpt('maxchar=150');?></p>

                        <p class="read_more_post">Read more</p>
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

</div>