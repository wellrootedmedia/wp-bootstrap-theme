<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php bloginfo("description"); ?>">
    <meta name="author" content="<?php bloginfo("name"); ?>">
<!--    <link rel="shortcut icon" href="../../assets/ico/favicon.png">-->

    <title><?php
        $title = get_the_title();
        $category = get_the_category();
        $tagName = single_tag_title("", false);
        $siteName = get_option( 'blogname' );
        $siteDesc = get_bloginfo("description");
        if(is_single()) {
            _e($title . " | Category " . $category[0]->cat_name . " | " . $siteName);
        }
        else if(is_category()) {
            _e("Category " . $category[0]->cat_name . " | " . $siteName);
        }
        else if(is_page()) {
            _e($title . " | " . $siteName);
        }
        else if(is_front_page()) {
            _e($siteName . " | " . $siteDesc);
        }
        else if(is_tag()) {
            _e("Tag " . $tagName . " for " . $siteName);
        }
        else {
            _e($siteName);
        }
        ?></title>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/html5shiv.js"></script>
    <script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/respond.min.js"></script>
    <![endif]-->

    <!-- Custom styles for this template -->
    <link href="<?php echo get_stylesheet_directory_uri(); ?>/style.css" rel="stylesheet">
    <link href="<?php echo get_stylesheet_directory_uri(); ?>/carousel.css" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link href="<?php echo get_stylesheet_directory_uri(); ?>/dist/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/bootstrap-responsive.css" rel="stylesheet">
<!--    <link href="--><?php //echo get_stylesheet_directory_uri(); ?><!--/assets/css/docs.css" rel="stylesheet">-->

    <?php wp_enqueue_script('jquery'); ?>

    <?php wp_head(); ?>
</head>

<body>

<div id="wrap">
    <div class="navbar-wrapper">
        <div class="container">

            <div class="navbar navbar-inverse navbar-static-top">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand<?php echo is_front_page() ? " current-menu-item" : ""; ?>" href="<?php _e(get_bloginfo("url")); ?>"><?php _e( get_bloginfo("name") ); ?></a>
                    </div>
                    <?php
                    $defaults = array(
                        'theme_location' => '',
                        'menu' => 'main menu',
                        'container' => 'div',
                        'container_class' => 'navbar-collapse collapse',
                        'container_id' => '',
                        'menu_class' => 'nav navbar-nav',
                        'menu_id' => '',
                        'echo' => true,
                        'fallback_cb' => 'wp_page_menu',
                        'before' => '',
                        'after' => '',
                        'link_before' => '',
                        'link_after' => '',
                        'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                        'depth' => 0,
                        'walker' => ''
                    );
                    wp_nav_menu($defaults);
                    ?>
                </div>
            </div>

        </div>
    </div>

    <?php
    if(is_home()) :
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        query_posts( array('category_name' => 'carousel','posts_per_page' => '10','order' => 'DESC','paged' => $paged));
        ?>
        <?php if (have_posts()) : ?>

            <div id="myCarousel" class="carousel slide">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <?php
                    $i = 0;
                    while(have_posts()) :
                        the_post();
                        $i++;
                        ?>
                        <li data-target="#myCarousel" data-slide-to="<?php _e($i - 1); ?>"></li>
                    <?php endwhile; ?>
                </ol>

                <div class="carousel-inner">
                    <?php
                    while(have_posts()) :
                        the_post();
                        ?>
                        <div class="item">
                            <?php if ( '' != get_the_post_thumbnail() ) { ?>
                                <div class="featured-thumbnail">
                                    <?php the_post_thumbnail( 'bootstrap-1000x667' ); ?>
                                </div><!-- .featured-thumbnail -->
                            <?php } else { ?>
                                <img src="data:image/png;base64," data-src="holder.js/100%x500/auto/#666:#7a7a7a/text:<?php the_title(); ?>" alt="<?php the_title(); ?>">
                            <?php } ?>
                            <div class="container">
                                <div class="carousel-caption">
                                    <h1><?php the_title(); ?></h1>
                                    <p><?php the_excerpt(); ?></p>
                                    <p><a class="btn btn-large btn-primary" href="<?php _e(get_permalink($post->ID)); ?>">Read More &gt;&gt;</a></p>
                                </div>
                            </div>
                        </div>

                    <?php endwhile; ?>
                    <?php wp_reset_query(); ?>
                </div>

                <a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
            </div>

        <?php else: ?>

            <div class="carousel-inner">

                <div class="item">
                    <div class="container">
                        <div class="carousel-caption">
                            <p>There are no posts...</p>
                        </div>
                    </div>
                </div>

            </div>

        <?php endif; ?>

    <?php endif; ?>

