<?php
/**
 * Citigonews Theme functions and definitions
 *
 */

// ============================================================================
// ACF

// 1. customize ACF path
add_filter('acf/settings/path', 'acf_settings_path');
 
function acf_settings_path( $path ) {
  $path = get_stylesheet_directory() . '/includes/acf/';
  return $path;
}
// 2. customize ACF dir
add_filter('acf/settings/dir', 'my_acf_settings_dir');
function my_acf_settings_dir( $dir ) {
  $dir = get_stylesheet_directory_uri() . '/includes/acf/';
  return $dir; 
}
// 3. Hide ACF field group menu item
// add_filter('acf/settings/show_admin', '__return_false');
// 4. Include ACF
include_once( get_stylesheet_directory() . '/includes/acf/acf.php' );


// ============================================================================
// Theme Setup

if(!function_exists('citigonews_theme_setup')){
	function citigonews_theme_setup(){
		add_theme_support('automatic-feed-links');
		add_theme_support('title-tag');
		add_theme_support('post-thumbnails');

		add_theme_support('html5', array('search-form', 'gallery', 'caption'));

		register_nav_menus(array(
			'home' => 'Home',
			'page' => 'Page'
		));
	}
}
add_action('after_setup_theme', 'citigonews_theme_setup');



// ============================================================================
// Theme


// Nav
add_filter('nav_menu_item_args', function ($args, $item, $depth) {
  $title             = apply_filters('the_title', $item->title, $item->ID);
  $args->link_before = '<i class="item-icon fas"></i><span class="item-label">';
  $args->link_after  = '</span>';
  return $args;
}, 10, 3);

// Enqueue scripts and styles.

function citigonews_theme_scripts() {
	// css 
	wp_enqueue_style('css-vendor', get_template_directory_uri() . '/assets/css/vendor.css');
	wp_enqueue_style('css-theme', get_template_directory_uri() . '/assets/css/main.css');
	wp_enqueue_style('css-style', get_stylesheet_uri());
	// js
	wp_enqueue_script( 'js-requirejs', get_template_directory_uri() . '/assets/js/require.js', array(), '2.3.6', false);
}
add_action( 'wp_enqueue_scripts', 'citigonews_theme_scripts' );


// Post excerpt

function citigonews_excerpt_more( $more ) {
	return '...';
}
add_filter('excerpt_more', 'citigonews_excerpt_more');

function citigonews_excerpt_length( $length ) {
	return 35;
}
add_filter( 'excerpt_length', 'citigonews_excerpt_length', 9999);


function getya_numeric_posts_nav() {
  if( is_singular() )	
  	return;
  global $wp_query;
	 /** Stop execution if there's only 1 page */
  if( $wp_query->max_num_pages <= 1 )	return;
  $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
  $max   = intval( $wp_query->max_num_pages );
  /** Add current page to the array */
  if ( $paged >= 1 )
      $links[] = $paged;
  /** Add the pages around the current page to the array */
    if ( $paged >= 3 ) {
      $links[] = $paged - 1;
      $links[] = $paged - 2;
  }
  if ( ( $paged + 2 ) <= $max ) {
    $links[] = $paged + 2;
		$links[] = $paged + 1;
	}
	echo '<div class="getya-navigation"><ul>' . "\n";
  /** Previous Post Link */
  if ( get_previous_posts_link() )
    printf( '<li class="go-back">%s</li>' . "\n", get_previous_posts_link('<i class="fa fa-angle-left"></i>') );
  /** Link to first page, plus ellipses if necessary */
  if ( ! in_array( 1, $links ) ) {
   	$class = 1 == $paged ? ' class="active"' : '';
    printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );
    if ( ! in_array( 2, $links ) )
      echo '<li class="dotdotdot"> ... </li>';
  }
  /** Link to current page, plus 2 pages in either direction if necessary */
  sort( $links );
  foreach ( (array) $links as $link ) {
    $class = $paged == $link ? ' class="active"' : '';
    printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
  }
  /** Link to last page, plus ellipses if necessary */
  if ( ! in_array( $max, $links ) ) {
    if ( ! in_array( $max - 1, $links ) )
			echo '<li class="dotdotdot"> ... </li>' . "\n";
      $class = $paged == $max ? ' class="active"' : '';
      printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
  }
  /** Next Post Link */
  if ( get_next_posts_link() )
    printf( '<li class="go-next">%s</li>' . "\n", get_next_posts_link('<i class="fa fa-angle-right"></i>') );
  echo '</ul></div><div class="clearfix"></div>' . "\n";
}

flush_rewrite_rules( false );


?>









