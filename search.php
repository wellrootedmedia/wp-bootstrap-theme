<?php get_header(); ?>

<div class="container marketing">

    <div class="navbar">
        <div class="navbar-inner">
            <form role="search" class="navbar-form pull-left" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
                <input type="text" class="span2" placeholder="Search..." value="" name="s" id="s" />
                <input type="submit" class="btn btn-default" id="searchsubmit" value="Search" />
            </form>
        </div>
    </div>

    <?php if (have_posts()) :?>

        <hr class="featurette-divider">
        <?php
        navbar_fixed_top_paging_nav();

        while ( have_posts() ) : the_post();
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
                        <a href="<?php _e(get_permalink($post->ID)); ?>">
                            <?php if ( '' != get_the_post_thumbnail() ) { ?>
                                <?php the_post_thumbnail( 'bootstrap-399x266', array('class' => 'featurette-image img-responsive')); ?>
                            <?php } else { ?>
                                <img class="featurette-image img-responsive" src="data:image/png;base64," data-src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/holder.js/399x266/auto/#777:#ffffff/text:<?php the_title(); ?>" alt="<?php the_title(); ?>">
                            <?php } ?>
                        </a>
                    </div>
                </div>
            <?php } else { ?>
                <div class="row featurette">
                    <div class="col-md-5">
                        <a href="<?php _e(get_permalink($post->ID)); ?>">
                            <?php if ( '' != get_the_post_thumbnail() ) { ?>
                                <?php the_post_thumbnail( 'bootstrap-399x266', array('class' => 'featurette-image img-responsive') ); ?>
                            <?php } else { ?>
                                <img class="featurette-image img-responsive" src="data:image/png;base64," data-src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/holder.js/399x266/auto/#777:#ffffff/text:<?php the_title(); ?>" alt="<?php the_title(); ?>">
                            <?php } ?>
                        </a>
                    </div>
                    <div class="col-md-7">
                        <h2 class="featurette-heading"><a href="<?php _e(get_permalink($post->ID)); ?>"><?php _e(the_title()); ?></a></h2>
                        <p class="lead"><?php _e(the_excerpt()); ?></p>
                    </div>
                </div>
            <?php
            }?>

            <hr class="featurette-divider">

        <?php
        endwhile;

        navbar_fixed_top_paging_nav();

        wp_reset_query(); ?>
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