<div class="visible-md-block visible-lg-block visible-sm-block hidden-xs-block aside">


    <h2 class="title_block">intertainment</h2>

    <div class="aside-popular">
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
            'posts_per_page'         => '3',
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

            <div class="three_blocks_item three_blocks_item_post">
                <a href="<?php the_permalink(); ?>">
                    <div class="tb_img_wrap">
                        <div class="tb_img" style="background-image: url('<?php echo $thumb_[0] ;?>')"></div>
                    </div>
                    <p class="tb_text"><?php echo $c[0]->cat_name; ?></p>

                    <p class="tb_top_meta"><?php the_title(); ?></p>
                </a>
            </div>
            <!--three_blocks_item_post-->
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

    <?php get_template_part( 'template/aside_small_block' ); ?>


</div>