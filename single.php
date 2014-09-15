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
            <div class="col-md-7">
                <?php _e( subTitle( $post ) ); ?>
                <p class="lead"><?php the_content(); ?></p>
            </div>
            <div class="col-md-5">
                <?php get_sidebar(); ?>
            </div>
        </div>

        <div class="comments">

            <?php comments_template( '', true ); ?>

        </div>

    <?php endwhile; // end of the loop. ?>

    <div class="clear"></div>

    <?php get_footer(); ?>
