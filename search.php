<?php get_header(); ?>

<div class="container marketing">

    <?php if (have_posts()) :?>

        <div class="navbar">
            <div class="navbar-inner">
                <form role="search" class="navbar-form pull-left" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
                    <input type="text" class="span2" placeholder="Search..." value="" name="s" id="s" />
                    <input type="submit" class="btn btn-default" id="searchsubmit" value="Search" />
                </form>
            </div>
        </div>

        <hr class="featurette-divider">
        <?php
        $c = 0;
        while ( have_posts() ) :
            the_post();
            $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' );
            $c++;

            if( $c % 2 != 0) {
                ?>
                <div class="row featurette">
                    <div class="col-md-7">
                        <h2 class="featurette-heading"><a href="<?php _e(get_permalink($post->ID)); ?>"><?php _e(the_title()); ?></a></h2>
                        <p class="lead"><?php _e(the_excerpt()); ?></p>
                    </div>
                    <div class="col-md-5">
                        <?php if ( '' != get_the_post_thumbnail() ) { ?>
                            <?php the_post_thumbnail( 'bootstrap-399x266' ); ?>
                        <?php } else { ?>
                            <img src="data:image/png;base64," data-src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/holder.js/399x266/auto/#777:#7a7a7a/text:<?php the_title(); ?>" alt="<?php the_title(); ?>">
                        <?php } ?>
                    </div>
                </div>
            <?php } else { ?>
                <div class="row featurette">
                    <div class="col-md-5">
                        <?php if ( '' != get_the_post_thumbnail() ) { ?>
                            <?php the_post_thumbnail( 'bootstrap-399x266' ); ?>
                        <?php } else { ?>
                            <img src="data:image/png;base64," data-src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/holder.js/399x266/auto/#777:#7a7a7a/text:<?php the_title(); ?>" alt="<?php the_title(); ?>">
                        <?php } ?>
                    </div>
                    <div class="col-md-7">
                        <h2 class="featurette-heading"><a href="<?php _e(get_permalink($post->ID)); ?>"><?php _e(the_title()); ?></a></h2>
                        <p class="lead"><?php _e(the_excerpt()); ?></p>
                    </div>
                </div>
            <?php
            }?>

            <hr class="featurette-divider">

        <?php endwhile; ?>
    <?php else: ?>
        <h1>Sorry, we couldn't find what you're looking for, try searching again...</h1>

        <div class="navbar">
            <div class="navbar-inner">
                <form role="search" class="navbar-form pull-left" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
                    <input type="text" class="span2" placeholder="Search..." value="" name="s" id="s" />
                    <input type="submit" class="btn btn-default" id="searchsubmit" value="Search" />
                </form>
            </div>
        </div>

        <hr/>
    <?php endif; ?>
    <?php wp_reset_query(); ?>

    <!-- /END THE FEATURETTES -->

<?php get_footer(); ?>