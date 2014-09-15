<?php get_header(); ?>

<div class="container marketing">

    <?php while ( have_posts() ) : the_post(); ?>
<!--        <div class="col-lg-4">-->
<!--            <img class="img-circle" src="data:image/png;base64," data-src="holder.js/140x140" alt="Generic placeholder image">-->
<!--            <h2>Heading</h2>-->
<!--            <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh.</p>-->
<!--            <p><a class="btn btn-default" href="#">View details &raquo;</a></p>-->
<!--        </div>-->

        <div class="row featurette">
            <div class="col-md-8">
                <?php
                if ( has_post_thumbnail() ) {
                    the_post_thumbnail( 'single-featured-image', array('class' => 'img-responsive') );
                }
                ?>
                <?php _e( subTitle( $post ) ); ?>
                <p class="lead"><?php the_content(); ?></p>
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

        <div class="clear"></div>

        <div class="row featurette">
            <div class="col-md-12">
                <div class="comments">
                    <?php comments_template( '', true ); ?>
                </div>
            </div>
        </div>

    <?php endwhile; // end of the loop. ?>

    <div class="clear"></div>

    <?php get_footer(); ?>
