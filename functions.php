<?php
add_theme_support( 'post-thumbnails' );

function index_scripts() {
    wp_enqueue_style( 'bootstrap-css', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css');
    wp_enqueue_style( 'fontawesome-css', '//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css');
    wp_enqueue_style( 'style-css', get_template_directory_uri() . '/style.css');
    wp_enqueue_script( 'addthis', '//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-54a30fad74bc49c8', '1', true);
    wp_enqueue_script( 'bootstrap-js', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js');
    wp_enqueue_script( 'modernizr-latest.js', get_template_directory_uri() . '/js/modernizr-latest.js', array( 'jquery') );
    wp_enqueue_script( 'history.js', get_template_directory_uri() . '/js/jquery.history.js', array( 'jquery') );
    wp_enqueue_script( 'index.js', get_template_directory_uri() . '/js/index.js', array( 'jquery', 'history.js' ) );

    wp_localize_script( 'index.js', 'localize', array(
        'home' => home_url(),
        'userLoggedIn' => current_user_can('edit_theme_options'),
        'ga' => get_option('fancylinks_ga')
    ) );
}
add_action('wp_enqueue_scripts', 'index_scripts', 12); // priority 12


// need an ajax script for any additional data serve
function index_ajax () {
    $nonce = $_POST['hashNonce'];
    if ( ! wp_verify_nonce( $nonce, 'hash-nonce' ) ) {
        die ( 'not authorized');
    }
}
add_action( 'wp_ajax_nopriv_index_ajax', 'index_ajax' );
add_action( 'wp_ajax_index_ajax', 'index_ajax' );

function register_my_menus() {
  register_nav_menus(
    array(
      'header-menu' => __( 'Header Menu' ),
      'footer-menu' => __( 'Footer Menu' )
    )
  );
}
add_action( 'init', 'register_my_menus' );

function partial_rewrite() {
    global $wp_rewrite;
    //set up our query variable %partial% which equates to index.php?partial=
    add_rewrite_tag( '%partial%', '([^&]+)');
    //add rewrite rule that matches /blog/page/2, /blog/page/3, /blog/page/4, etc..
    // add_rewrite_rule('^partials/page/?([0-9])?','index.php?p=blog&paged=$matches[1]','top');
    //add rewrite rule that matches /blog
    add_rewrite_rule('^partials/?$', 'index.php?partial=index', 'top');
    add_rewrite_rule('^partials/[0-9]{4}/[0-9]{1,2}/([^/]+)/?$',
    'index.php?year=$matches[1]&monthnum=$matches[2]&partial=single', 'top');
    add_rewrite_rule('^partials/([^/]+)/?$',
    'index.php?year=$matches[1]&monthnum=$matches[2]&partial=page', 'top');

    //add endpoint, in this case 'blog' to satisfy our rewrite rule /blog, /blog/page/ etc..
    // add_rewrite_endpoint( 'partial', EP_PERMALINK | EP_PAGES );
    //flush rules to get this to work properly
    $wp_rewrite->flush_rules();
    // var_dump($wp_rewrite);
}
add_action('init', 'partial_rewrite');


function k ($l) {
    // var_dump($l);
    return $l;
}
add_filter('post_rewrite_rules', 'k');
