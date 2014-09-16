<?php get_header(); ?>

<div class="container marketing">

    <?php while ( have_posts() ) : the_post(); ?>

        <div class="row featurette">

            <div class="col-md-8">
                <?php if ( has_post_thumbnail() ) { the_post_thumbnail( 'single-featured-image', array('class' => 'img-thumbnail') ); } ?>

                <?php _e( subTitle( $post ) ); ?>

                <?php if ( in_array( 'category', get_object_taxonomies( get_post_type() ) ) ) : ?>
                    <div class="entry-meta top">
                        <span class="cat-links">Categories: <?php echo get_the_category_list( _x( ', ', 'Used between list items, there is a space after the comma.', 'navbar-fixed' ) ); ?></span>
                    </div>
                <?php endif; ?>

                <div class="col-md-12">
                    <?php the_content(); ?>
                </div>

                <div class="entry-meta bottom">Tags: <?php the_tags( '<span class="tag-links">', ', ', '</span>' ); ?></div>
            </div>

            <div class="col-md-4">
                <form role="search" method="get" id="searchform" class="searchform navbar-form navbar-left" action="<?php bloginfo('url'); ?>/index.php">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Search" value="" name="s" id="s">
                    </div>
                    <button type="submit" class="btn btn-default">Submit</button>
                </form>
            </div>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette">
            <div class="col-md-12">
                <div class="comments">
                    <?php comments_template( '', true ); ?>
                </div>
            </div>
        </div>

    <?php endwhile; ?>

    <div class="clear"></div>

    <?php get_footer(); ?>
