<?php
/**
 * Omega functions and definitions
 *
 * @package Omega
 */

if ( ! function_exists( 'omega_child_theme_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function omega_child_theme_setup() {

	add_theme_support( 'omega-footer-widgets', 4 );

}
endif; // omega_child_theme_setup

add_action( 'after_setup_theme', 'omega_child_theme_setup', 11  );
