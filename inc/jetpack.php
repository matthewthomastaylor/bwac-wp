<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package bwac_wp_theme
 */

/**
 * Add theme support for Infinite Scroll.
 * See: http://jetpack.me/support/infinite-scroll/
 */
function bwac_wp_theme_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'footer'    => 'page',
	) );
}
add_action( 'after_setup_theme', 'bwac_wp_theme_jetpack_setup' );
