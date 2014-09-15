<?php get_header(); ?>

<!-- Marketing messaging and featurettes
================================================== -->
<!-- Wrap the rest of the page in another container to center all the content. -->

<div class="container marketing">

    <?php while ( have_posts() ) : the_post(); ?>
                <h3><?php _e( subTitle( $post ) ); ?></h3>
                <p class="lead"><?php the_content(); ?></p>
<!--            <div class="col-md-5">-->
<!--                --><?php //if ( '' != get_the_post_thumbnail() ) { ?>
<!--                    --><?php //the_post_thumbnail( 'bootstrap-395x395' ); ?>
<!--                --><?php //} else { ?>
<!--                    <img class="featured-image-placeholder" src="data:image/png;base64," data-src="holder.js/395x395/auto/#666:#7a7a7a/text:--><?php //_e(bloginfo('name')); ?><!--" alt="--><?php //_e(bloginfo('name')); ?><!--">-->
<!--                --><?php //} ?>
<!--            </div>-->
        </div>

        <?php //comments_template( '', true ); ?>

    <?php endwhile; ?>

    <?php get_footer(); ?>
