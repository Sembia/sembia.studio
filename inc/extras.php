<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Sembia
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function sembia_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'sembia_body_classes' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function sembia_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'sembia_pingback_header' );

// Add in custom classes to nav menu based on page color
function add_color_nav_class($classes, $item){
    if( 'page' == $item->object ){
        $colorcode = get_post_meta($item->object_id, 'color', true);
        $classes[] = $colorcode;
    }
    return $classes;
}
add_filter('nav_menu_css_class' , 'add_color_nav_class' , 10 , 2);
