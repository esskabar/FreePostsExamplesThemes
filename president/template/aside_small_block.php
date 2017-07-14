<div class="aside-popular small_block hidden-xs">

    <h2 class="title_block">intertainment</h2>

    <div class="widget">
        <?php
        if ( is_active_sidebar( 'aside-popular' ) ) : ?>
            <?php dynamic_sidebar( 'aside-popular' ); ?>

        <?php else: ?>

        <?php
        // WP_Query arguments
        $args = array (
            'post_type'              => array( 'post' ),
            'post_status'            => array( 'publish' ),
            'category__not_in'        => array('1'),
            'posts_per_page'         => '4',
            'order'                  => 'DESC',
            'orderby'                => 'date',
        );

        // The Query
        $query_aside_home = new WP_Query( $args );

        // The Loop
        if ( $query_aside_home->have_posts() ) {
        while ( $query_aside_home->have_posts() ) {
        $query_aside_home->the_post();

        if ( has_post_thumbnail()){
            $thumb_ = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'president-theme-main-aside-thumbnail' );
        } else {
            $thumb_ = array();
        }
        ?>
        <?php
        $post_not_in[] = $post->ID;

        $c = get_the_category();

        ?>
        <div class="wb_right">
            <a href="<?php the_permalink(); ?>">
                <div class="wb_right_img_wrap">
                    <div class="wb_right_img"
                         style="background-image: url('<?php echo $thumb_[0] ;?>')"></div>
                </div>
                <h2 class="wb_right_text"><?php the_title(); ?></h2></a>
        </div>
        <?php
        }
        } else {
            // no posts found
        }

            // Restore original Post Data
            wp_reset_postdata();
        endif;
        ?>
    </div>

</div>