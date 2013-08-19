<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Omega
 */

get_header(); ?>

	<main class="<?php echo apply_atomic( 'omega_main_class', 'content' );?>" role="main" itemprop="mainContentOfPage" itemscope="itemscope" itemtype="http://schema.org/Blog">

		<?php do_atomic( 'before_content' ); // omega_before_content ?>

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', 'single' ); ?>

			<?php omega_content_nav( 'nav-below' ); ?>

			<?php comments_template(); // Loads the comments.php template. ?>

		<?php endwhile; // end of the loop. ?>

		<?php do_atomic( 'after_content' ); // omega_after_content ?>

	</main><!-- .content -->

<?php get_footer(); ?>