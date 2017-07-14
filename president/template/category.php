
<div class="col-xs-12 main">
    <div class="main_content">
    <h2 class="title_block"><?php echo $category_name;?></h2>

    <?php
    include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
    $arr_meta = array();
    if ( is_plugin_active( 'wp-hide-post/wp-hide-post.php' ) ) {
        $arr_meta = array(
            'key'     => '_wplp_post_front',
            'compare' => 'NOT EXISTS'
        );
    }

    // WP_Query arguments
    $args = array(
        'post_type'   => array( 'post' ),
        'post_status' => array( 'publish' ),
        'cat'         => $cat,
        'order'       => 'DESC',
        'orderby'     => 'date',
        'meta_query'  => array(
            $arr_meta
        )
    );

    // The Query
    $query_main_home = new WP_Query( $args );

    // The Loop
    if ( $query_main_home->have_posts() ) {
        while ( $query_main_home->have_posts() ) {
            $query_main_home->the_post();
            ?>
            <?php
            if ( has_post_thumbnail() ) {
                $thumb_ = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'president-theme-main-thumbnail' );
            } else {
                $thumb_ = array();
            } ?>
            <?php
            $post_not_in[]   = $post->ID;
//				$category_detail = get_the_category( $post->ID );
            ?>

            <article>
                <a href="<?php the_permalink(); ?>" class="wrapp_item">
                    <div class="row">
                        <div class="col-xs-4">
                            <div class="wrap_img_article">
                                <div class="img_article"
                                     style="background-image: url('<?php echo $thumb_[0]; ?>')"></div>
                            </div>
                        </div>
                        <div class="col-xs-8">
                            <div class="item_text">
                                <h2 class="header_item"><?php the_title(); ?></h2>

                                <p class="excerpt_item"><?php kama_excerpt( 'maxchar=150' ); ?></p>

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
</div>
