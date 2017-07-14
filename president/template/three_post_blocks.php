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

<div id="three_post_blocks">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="tpb_items_wrap">

                    <div class="tpb_item">
                        <div class="three_blocks_item three_blocks_item_social">
                            <div class="td_block_social_counter td-pb-border-top">
                                <div class="td_social_type td_social_facebook">
                                    <div class="td-sp td-sp-facebook"></div>
                                    <span class="td_social_info">6,238</span>
                                    <span class="td_social_info td_social_info_name">Fans</span>
                                    <span class="td_social_button"><a href="//www.facebook.com/">Like</a></span>
                                </div>
                                <div class="td_social_type td_social_twitter">
                                    <div class="td-sp td-sp-twitter"></div>
                                    <span class="td_social_info">34,736</span>
                                    <span class="td_social_info td_social_info_name">Followers</span>
                                    <span class="td_social_button"><a href="//twitter.com/">Follow</a></span>
                                </div>
                                <div class="td_social_type td_social_youtube">
                                    <div class="td-sp td-sp-youtube"></div>
                                    <span class="td_social_info">4,675</span>
                                    <span class="td_social_info td_social_info_name">Subscribers</span><span class="td_social_button"><a href="//www.youtube.com/">Subscribe</a></span>
                                </div>
                            </div>
                        </div><!--three_blocks_item_social-->
                    </div><!--tpb_item-->
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
                        $thumb_ = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'president-theme-main-aside-thumbnail' );
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
                                <h2 class="tpb_head"><?php the_title();?></h2>
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