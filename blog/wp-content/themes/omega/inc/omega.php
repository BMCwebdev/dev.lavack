<?php

function omega_theme_inc() {

	// Set template directory
    $omega_inc = get_template_directory();

	/* Custom template tags for this theme. */
	require $omega_inc . '/inc/functions/template-tags.php';

	/* Custom functions that act independently of the theme templates. */
	require $omega_inc . '/inc/functions/extras.php';

	/* Customizer additions. */
	require $omega_inc . '/inc/functions/customizer.php';

	/* override hybrid code. */
	require $omega_inc . '/inc/functions/override.php';

	/* image function */
	require $omega_inc . '/inc/functions/image.php';

	if ( is_admin() ) {
		require  $omega_inc  . '/inc/admin/meta-box-theme-options.php';				
	}

	/* Load  child themes page if supported. */
	require_if_theme_supports( 'omega-child-themes-page', $omega_inc . '/inc/extensions/child-themes-page.php' );

	/* Load custom css extension if supported. */
	require_if_theme_supports( 'omega-custom-css', $omega_inc . '/inc/extensions/custom-css.php' );

	/* Load  footer widgets extension if supported. */
	require_if_theme_supports( 'omega-footer-widgets', $omega_inc . '/inc/extensions/footer-widgets.php' );

	remove_action( 'wp_head', 'hybrid_meta_template', 4 );

}

add_action( 'after_setup_theme', 'omega_theme_inc', 20 );