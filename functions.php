<?php
/*
 * WP core code
 */
add_theme_support('post-thumbnails');



if ( function_exists( 'add_image_size' ) ) {
    add_image_size( 'bootstrap-1147x814', 1147, 814 );
    add_image_size( 'bootstrap-1000x667', 1000, 667 );
    add_image_size( 'bootstrap-395x395', 395, 395 );
    add_image_size( 'bootstrap-595x1200', 595, 1200 );
    add_image_size( 'bootstrap-600x1200', 600, 1200 );
    add_image_size( 'bootstrap-399x266', 399, 266 );
    add_image_size( 'bootstrap-300x300', 300, 300 );
    add_image_size( 'single-featured-image', 1000, 200, true );
}

function register_my_menu() {
    register_nav_menu('header-menu',__( 'Header Menu' ));
}
add_action( 'init', 'register_my_menu' );

//remove_filter( 'the_content', 'wpautop' );
remove_filter( 'the_excerpt', 'wpautop' );


add_theme_support( 'woocommerce' );

add_filter( 'use_default_gallery_style', '__return_false' );




/*
 * Bootstrap theme custom code
 */


function subTitle( $postTitle ) {
    $data = "";
    $sub_title = get_post_meta( $postTitle->ID, 'subtitle', true );
    if( $sub_title != '' ) {
        $data .= '<h1 class="featurette-heading">'. $postTitle->post_title . ' <span class="text-muted">'. $sub_title .'</span></h1>';
    } else {
        $data .= '<h1 class="featurette-heading">'. $postTitle->post_title . '</h1>';
    }

    return $data;
}

function pageExcerpt( $pageContent ) {
    return substr($pageContent, 0, 100) . "...";
}
//include( get_stylesheet_directory() . '/inc/Models/carouselModel.php');
//include( get_stylesheet_directory() . '/inc/Models/indexModel.php');







if ( is_admin() ) : // Load only if we are viewing an admin page
    $bootstrap_options = array(
        'page_selected' => ''
    );


    // Default options values


    function bootstrap_register_settings() {
        // Register settings and call sanitation functions
        register_setting( 'bootstrap_theme_options', 'bootstrap_options', 'bootstrap_validate_options' );
    }
    add_action( 'admin_init', 'bootstrap_register_settings' );

    function bootstrap_theme_options() {
        // Add theme options page to the addmin menu
        add_theme_page( 'Theme Options', 'Theme Options', 'edit_theme_options', 'theme_options', 'bootstrap_theme_options_page' );
    }
    add_action( 'admin_menu', 'bootstrap_theme_options' );


    // Function to generate options page
    function bootstrap_theme_options_page() {
        global $bootstrap_options;
        if ( ! isset( $_REQUEST['updated'] ) )
            $_REQUEST['updated'] = false; // This checks whether the form has just been submitted. ?>

        <div class="wrap">

            <?php screen_icon(); echo "<h2>" . wp_get_theme() . __( ' Theme Options' ) . "</h2>";
            // This shows the page's name and an icon if one has been provided ?>

            <?php if ( false !== $_REQUEST['updated'] ) : ?>
                <div class="updated fade"><p><strong><?php _e( 'Options saved' ); ?></strong></p></div>
            <?php endif; // If the form has just been submitted, this shows the notification ?>

            <form method="post" action="options.php" id="form1">

                <?php $settings = get_option( 'bootstrap_options', $bootstrap_options ); ?>

                <?php settings_fields( 'bootstrap_theme_options' );
                /* This function outputs some hidden fields required by the form,
                including a nonce, a unique number used to ensure the form has been submitted from the admin page
                and not somewhere else, very important for security */ ?>

                <h1>Select pages for homepage.</h1>

                <table class="form-table">
                    <?php
                    $pages = get_pages('publish_stats=published');
                    $i = 0;
                    foreach ( $pages as $page ) {
                    ?>
                    <tr valign="top">
                        <th scope="row"><?php echo $page->post_title; ?></th>
                        <td>
                            <?php $checked = checked( true, $settings['page_selected'] );
                            echo '<input id="page_selected" name="bootstrap_options[page_selected]" type="checkbox" value="' . $page->ID . '" />';
                            ?>
                        </td>
                    </tr>
                    <?php $i++; } ?>
                </table>

                <p class="submit"><input type="submit" class="button-primary" value="Save Options" /></p>

            </form>

        </div>

    <?php
    }

    function bootstrap_validate_options( $input ) {
        global $bootstrap_options, $bootstrap_categories, $bootstrap_layouts;

        $settings = get_option( 'bootstrap_options', $bootstrap_options );

        // If the checkbox has not been checked, we void it
        if ( ! isset( $input['page_selected'] ) )
            $input['page_selected'] = null;
        // We verify if the input is a boolean value
        $input['page_selected'] = ( $input['page_selected'] == 1 ? 1 : 0 );

        return $input;
    }

    function page_selected($value, $match) {
        if($value == $match) {
            return "selected='selected'";
        }

        return "";
    }
endif;








if ( ! function_exists( 'navbar_fixed_top_paging_nav' ) ) :
    function navbar_fixed_top_paging_nav() {
        // Don't print empty markup if there's only one page.
        if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
            return;
        }

        $paged        = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
        $pagenum_link = html_entity_decode( get_pagenum_link() );
        $query_args   = array();
        $url_parts    = explode( '?', $pagenum_link );

        if ( isset( $url_parts[1] ) ) {
            wp_parse_str( $url_parts[1], $query_args );
        }

        $pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
        $pagenum_link = trailingslashit( $pagenum_link ) . '%_%';

        $format  = $GLOBALS['wp_rewrite']->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
        $format .= $GLOBALS['wp_rewrite']->using_permalinks() ? user_trailingslashit( 'page/%#%', 'paged' ) : '?paged=%#%';

        // Set up paginated links.
        $links = paginate_links( array(
            'base'     => $pagenum_link,
            'format'   => $format,
            'total'    => $GLOBALS['wp_query']->max_num_pages,
            'current'  => $paged,
            'mid_size' => 1,
            'add_args' => array_map( 'urlencode', $query_args ),
            'prev_text' => __( '&laquo;', 'bootstrap-theme' ),
            'next_text' => __( '&raquo;', 'bootstrap-theme' ),
            'type'  => 'array'
        ) );

        if( is_array( $links ) ) {
            echo '<div class="pagination-wrap"><ul class="pagination">';
            foreach ( $links as $page ) {
                echo '<li>'.$page.'</li>';
            }
            echo '</ul></div>';
        } else {
            echo '<div class="pagination-wrap"></div>';
        }
    }
endif;