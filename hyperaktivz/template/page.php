<?php ?>
<div class="col-xs-12 col-md-8 main">
    <?php if(have_posts()) : ?>
        <?php while(have_posts()) : the_post();
            global $numpages;

            $paged = (get_query_var('page')) ? get_query_var('page') : 1;
            ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                <header class="entry-header">
                    <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                    <?php if (function_exists('vw_post_meta')) vw_post_meta();?>
                </header><!-- .entry-header -->

                <div class="entry-content">
                    <?php the_content(); ?>
                </div><!-- .entry-content -->


            </article><!-- #post-## -->

        <?php endwhile; ?>
    <?php endif; ?>

</div>