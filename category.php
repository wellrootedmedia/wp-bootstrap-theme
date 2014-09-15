<?php
get_header();
global $post;
$category = get_the_category();
?>

<div class="container marketing">

    <h1><?php _e("Category: " . $category[0]->cat_name); ?></h1>

    <hr class="featurette-divider">

<?php
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
query_posts( array
    (
        'cat' => $category[0]->cat_ID,
        'posts_per_page' => '10',
        'orderby' => 'menu_oder',
        'order' => 'DESC',
        'paged' => $paged
    )
);

if (have_posts()) :
    $c = 0;

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

    wp_reset_query();

endif; ?>

<?php get_footer(); ?>