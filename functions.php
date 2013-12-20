<?php
/*
Global Visions 2013
Author: Sally Poulsen
URL: htp://sallypoulsen.com
*/


function gvf_excerpt_length($length){
	if (is_front_page()){
	   return 10;
	} else {
		return 40;
	}
}
remove_all_filters( 'excerpt_length' );
add_filter( 'excerpt_length', 'gvf_excerpt_length', 999 );


// Replaces the excerpt "more" text by a link
function new_excerpt_more($more) {
   	global $post;
	return '<br/><a class="bold" href="'. get_permalink($post->ID) . '"> Read the full article...</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');


require_once('wp_bootstrap_navwalker.php');


/* Add Styles */

function gvf_theme_styles(){
	
	wp_register_style( 'bootstrap-styles', get_stylesheet_directory_uri() . '/bootstrap/css/bootstrap.min.css' );
	wp_register_style( 'bootstrap-theme', get_stylesheet_directory_uri() . '/bootstrap/css/bootstrap-theme.min.css' );
	wp_register_style( 'theme-styles', get_stylesheet_directory_uri() . '/style.css' );
	wp_enqueue_style( 'font-awesome', get_stylesheet_directory_uri(). '/css/font-awesome-4.0.3/css/font-awesome.min.css' );
	wp_enqueue_style( 'bootstrap-styles' );
	wp_enqueue_style( 'bootstrap-theme' );
	wp_enqueue_style( 'theme-styles' );
}

add_action( 'wp_head', 'gvf_theme_styles' );


/* filter stickies from blog page */

function twentythirteenchild_filter_pre_get_posts( $query ) {
    if ( is_page( get_option( 'page_for_posts' ) ) ) {
        $query->set( 'ignore_sticky_posts', true );
    }
    return $query;
}
add_filter( 'pre_get_posts', 'twentythirteenchild_filter_pre_get_posts' );


/* Add Scripts */

function wpbootstrap_scripts_wih_jquery(){
	wp_register_script( 'bootstrap-script', get_stylesheet_directory_uri() . '/bootstrap/js/bootstrap.min.js', array( 'jquery' ) );
	wp_enqueue_script( 'bootstrap-script' );
}

add_action( 'wp_enqueue_scripts', 'wpbootstrap_scripts_wih_jquery' );

/* THUMBNAILS */
add_theme_support( 'post-thumbnails' );
add_theme_support( 'post-thumbnails', array( 'post', 'sponsordetails', 'page' ) );          // Posts only



function gvf_featured_header_image() {
	the_post_thumbnail('full');            // Original image resolution (unmodified)
}


register_nav_menus( array(
    'primary' => __( 'Primary Menu', 'GVF' ),
) );


/* widgets*/

/**
 * Register our sidebars and widgetized areas.
 *
 */
function gvf_widgets_init() {

	register_sidebar( array(
		'name' => 'Sidebar',
		'id' => 'sidebar',
		'before_widget' => '<div>',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="rounded">',
		'after_title' => '</h2>',
	) );
}
add_action( 'widgets_init', 'gvf_widgets_init' );


/*sponsor details*/ 


function sponsor_taxonomy() {
   register_taxonomy(
    'sponsor_type', 'sponsordetails',
	    array(
	        'hierarchical' => true,
	        'label' => 'Sponsor Types',
	        'query_var' => true,
	        'rewrite' => array('slug' => 'sponsor-type')
	    )
	);
}

add_action( 'init', 'sponsor_taxonomy' );

add_action('init', 'gvf_sponsordetails_register');
 
function gvf_sponsordetails_register() {
 
	$labels = array(
		'name' => _x('Sponsor Details', 'Sponsor Details'),
		'singular_name' => _x('Sponsor Details', 'Sponsor Details'),
		'add_new' => _x('Add New', 'Sponsor Details'),
		'add_new_item' => __('Add New Sponsor Details'),
		'edit_item' => __('Edit Sponsor Details'),
		'new_item' => __('New Sponsor Details'),
		'view_item' => __('View Sponsor Details'),
		'search_items' => __('Search Sponsor Details'),
		'not_found' =>  __('Nothing found'),
		'not_found_in_trash' => __('Nothing found in Trash'),
		'parent_item_colon' => ''
	);
 
	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'query_var' => true,
		'menu_icon' => get_stylesheet_directory_uri() . '/article30.png',
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array('title', 'thumbnail')
	  ); 
 
	register_post_type( 'sponsordetails' , $args );
}

function gvf_screening_type_taxonomy() {
   register_taxonomy(
    'screening_type', 'screeningdetails',
	    array(
	        'hierarchical' => true,
	        'label' => 'Screening Types',
	        'query_var' => true,
	        'rewrite' => array('slug' => 'screening-type')
	    )
	);
}

add_action( 'init', 'gvf_screening_type_taxonomy' );


function gvf_screening_date_taxonomy() {
   register_taxonomy(
    'screening_dates', 'screeningdetails',
	    array(
	        'hierarchical' => true,
	        'label' => 'Screening Dates',
	        'query_var' => true,
	        'rewrite' => array('slug' => 'screening-dates')
	    )
	);
}

add_action( 'init', 'gvf_screening_date_taxonomy' );

/*sponsor details*/ 

add_action('init', 'gvf_screeningdetails_register');
 
function gvf_screeningdetails_register() {
 
	$labels = array(
		'name' => _x('Screening Details', 'Screening Details'),
		'singular_name' => _x('Screening Details', 'Screening Details'),
		'add_new' => _x('Add New', 'Screening Details'),
		'add_new_item' => __('Add New Screening Details'),
		'edit_item' => __('Edit Screening Details'),
		'new_item' => __('New Screening Details'),
		'view_item' => __('View Screening Details'),
		'search_items' => __('Search Screening Details'),
		'not_found' =>  __('Nothing found'),
		'not_found_in_trash' => __('Nothing found in Trash'),
		'parent_item_colon' => ''
	);
 
	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'query_var' => true,
		'menu_icon' => get_stylesheet_directory_uri() . '/article30.png',
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array('title', 'editor', 'thumbnail')
	  ); 
 
	register_post_type( 'screeningdetails' , $args );
}








?>