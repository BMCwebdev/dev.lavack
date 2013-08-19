<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains both current comments
 * and the comment form. The actual display of comments is
 * handled by a callback to omega_comment() which is
 * located in the inc/template-tags.php file.
 *
 * @package Omega
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */

/* If a post password is required or no comments are given and comments/pings are closed, return. */
if ( post_password_required() || ( !have_comments() && !comments_open() && !pings_open() ) )
	return;

if ( is_singular( 'post' ) && ( !hybrid_get_setting( 'trackbacks_posts' ) && !hybrid_get_setting( 'comments_posts' ) ) )
	return;
elseif ( is_singular( 'page' ) && ( !hybrid_get_setting( 'trackbacks_pages' ) && !hybrid_get_setting( 'comments_pages' ) ) )
	return;

?>

	<div id="comments" class="entry-comments">

	<?php // You can start editing here -- including this comment! ?>

	<?php if ( have_comments() ) : ?>
		<h3><?php comments_number( '', __( 'One Comment', 'omega' ), __( '% Comments', 'omega' ) ); ?></h3>

		<?php if ( get_option( 'page_comments' ) && 1 < get_comment_pages_count() ) : // are there comments to navigate through ?>

			<div class="comments-nav">
				<?php previous_comments_link( __( '&larr; Previous', 'omega' ) ); ?>
				<span class="page-numbers"><?php printf( __( 'Page %1$s of %2$s', 'omega' ), ( get_query_var( 'cpage' ) ? absint( get_query_var( 'cpage' ) ) : 1 ), get_comment_pages_count() ); ?></span>
				<?php next_comments_link( __( 'Next &rarr;', 'omega' ) ); ?>
			</div><!-- .comments-nav -->

		<?php endif; // check for comment navigation ?>

		<ol class="comment-list">
			<?php
				/* Loop through and list the comments. Tell wp_list_comments()
				 * to use omega_comment() to format the comments.
				 * If you want to overload this in a child theme then you can
				 * define omega_comment() and that will be used instead.
				 * See omega_comment() in lib/inc/template-tags.php for more.
				 */
				$args = array(
					'walker'            => null,
					'max_depth'         => '',
					'style'             => 'ul',
					'callback'          => 'omega_comment',
					'end-callback'      => null,
					'type'              => 'all',
					'reply_text'        => 'Reply',
					'page'              => '',
					'per_page'          => '',
					'avatar_size'       => 48,
					'reverse_top_level' => null,
					'reverse_children'  => '',
					'format'            => 'xhtml', //or html5 @since 3.6
					'short_ping'        => false // @since 3.6
				);
				wp_list_comments( $args );
			?>
		</ol><!-- .comment-list -->

	<?php endif; // have_comments() ?>

	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments"><?php _e( 'Comments are closed.', 'omega' ); ?></p>
	<?php endif; ?>

</div><!-- #comments -->

<?php comment_form(); ?>
