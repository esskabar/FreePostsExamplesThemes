
    <div class="col-xs-12 col-sm-4 col-sm-4 footer_widget equal_footer">
        <?php
        if ( is_active_sidebar( 'center-footer-widget' ) ) : ?>
            <?php dynamic_sidebar( 'center-footer-widget' ); ?>

        <?php endif; ?>
        <div class="widget">
            <h2 class="popular_post_head widget-title">Last news</h2>

            <ul>
                <?php

                // WP_Query arguments
                $args = array (
                    'posts_per_page' => 3,
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

                $post_not_in[] = $post->ID;

                ?>
                <li>
                    <div class="popular_post_item">
                        <a href="<?php the_permalink(); ?>" class="popular_post_item_link">
                            <p class="popular_post_item_head"><?php the_title();?></p>
                            <p class="popular_post_item_meta widget_meta">
                                <?php the_time( 'n M, Y' ) ; ?>
                            </p>
                        </a>
                    </div>
                </li>
                <?php
                }

                } else {
                    // no posts found
                }

                // Restore original Post Data
                wp_reset_postdata();

                ?>
            </ul>
        </div>
    </div>

