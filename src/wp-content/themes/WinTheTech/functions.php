<?php
define('THEME_URI', get_template_directory_uri());
define('DF_IMAGE', THEME_URI. '/assets/images/default');
define('TP_PART', THEME_URI. '/template-part');
define('THEME_DIR', get_template_directory());
include TEMPLATEPATH .'/function/function.php';
include TEMPLATEPATH .'/function/action-hook.php';

// Local JSON acf
add_filter('acf/settings/save_json', 'my_acf_json_save_point');
function my_acf_json_save_point( $path ) {
    $path = get_stylesheet_directory() . '/acf-field';
    return $path;
}
add_filter('acf/settings/load_json', 'my_acf_json_load_point');
function my_acf_json_load_point( $paths ) {
    // remove original path (optional)
    unset($paths[0]);
    $paths[] = get_stylesheet_directory() . '/acf-field';
    return $paths;
}

// ADD CSS AND JS
function fundesign_style() {
	$date = date('l jS \of F Y h:i:s A');
    wp_enqueue_style( 'style', get_stylesheet_uri() );
    wp_enqueue_style('slick', THEME_URI. '/assets/css/slick.css');
    wp_enqueue_style('bootstrap', THEME_URI. '/assets/css/bootstrap.min.css');
    wp_enqueue_style('font-awesome5', THEME_URI. '/assets/fonts/fontawesome/css/all.css');
    
    // Add CSS Home page
    if(is_page_template('templates/home-page.php'))
        wp_enqueue_style('home-page', THEME_URI.'/assets/css/home-page.css?'.$date);
    // Add CSS our work page
    if(is_page_template('templates/our-work.php'))
        wp_enqueue_style('our-work', THEME_URI.'/assets/css/our-work.css?'.$date);
    // Add CSS our team page
    if(is_page_template('templates/our-team-page.php'))
        wp_enqueue_style('our-team', THEME_URI.'/assets/css/our-team.css?'.$date);
    // Add CSS font
    wp_enqueue_style('font', THEME_URI.'/assets/css/font.css?'.$date);
    // Add CSS Animation
    wp_enqueue_style('animate', THEME_URI.'/assets/css/animate.css?'.$date);
    // Add CSS Global
    wp_enqueue_style('global', THEME_URI.'/assets/css/global.css?'.$date);

    // Add JS
	wp_enqueue_script( 'jquery', 'https://code.jquery.com/jquery-3.4.1.js', '','' , true);
    wp_enqueue_script( 'jquery-migrate', 'https://code.jquery.com/jquery-migrate-3.1.0.js', '','' , true);
    wp_enqueue_script( 'bootstrap', THEME_URI. '/assets/js/bootstrap.min.js', '','' , true);
    wp_enqueue_script( 'slick', THEME_URI. '/assets/js/slick.min.js', '','' , true);
    wp_enqueue_script( 'animation', THEME_URI. '/assets/js/WOW.js', '','' , true);
    wp_enqueue_script( 'ajax', THEME_URI. '/assets/js/ajax.js?'.$date, '','' , true);
    wp_enqueue_script( 'main', THEME_URI. '/assets/js/main.js?'.$date, '','' , true);

    wp_localize_script('ajax', 'ajax_var', array('url' => admin_url('admin-ajax.php')));
}
add_action('wp_enqueue_scripts', 'fundesign_style' );

// Menu
register_nav_menus(
    array(
        'main_menu'  => __( 'Main Menu' ),
    )
);
//acf_add_options_page('Theme Options');
if( function_exists('acf_add_options_page') ) {
    $parent = acf_add_options_page(array(
        'page_title'    => 'Theme Options',
        'menu_title'    => 'Theme Options',
        'menu_slug'     => 'Theme Option',
        'parent_slug'   => '',
        'redirect'      => false,
        'position'      => false,
        'icon_url'      => false,
    ));
}



