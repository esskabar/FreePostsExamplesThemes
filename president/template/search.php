<?php ?>
<div class="col-xs-12 col-md-8 main">
    <h2><?php printf( __( 'Search Results for: %s', 'president' ), '<span>' . esc_html( get_search_query() ) . '</span>' ); ?></h2>
    <div class="main_block_item_wrap clearfix">
        <?php

        // The Loop
        if ( $wp_query->have_posts() ) {
            while ( $wp_query->have_posts() ) {
                $wp_query->the_post();
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

                <div class="main_block_item">
                    <a href="<?php the_permalink(); ?>">
                        <div class="mb_img_wrap">
                            <div class="mb_img" style="background-image: url('<?php echo $thumb_[0]; ?>')"></div>
                        </div>

                        <h2 class="mb_head"><?php the_title(); ?></h2>
                        <p class="mb_text"><?php kama_excerpt( 'maxchar=150' ); ?></p>
                        <p class="mb_read_more">Read more</p>
                    </a>
                </div>
            <?php
            }
        } else {
            ?><p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'hyperactivz' ); ?></p><?php
        }
        if ( $wp_query->max_num_pages > 1 ) : ?>
            <script id="true_loadmore">
                var ajaxurl = '<?php echo site_url() ?>/wp-admin/admin-ajax.php';
                var true_posts = `<?php echo serialize($wp_query->query_vars); ?>`;
                var current_page = <?php echo (get_query_var('paged')) ? get_query_var('paged') : 1; ?>;
            </script>
        <?php endif;

        // Restore original Post Data
        wp_reset_postdata();
        ?>

    </div>
</div>
