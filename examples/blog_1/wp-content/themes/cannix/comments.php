<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Cannix
 * @since 1.0
 * @version 1.0
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) : ?>
		<h2 class="page-title">
			<?php
				printf( _nx( 'One comment', '%1$s comments', get_comments_number(), 'comments title', 'cannix' ),
					number_format_i18n( get_comments_number() ), get_the_title() );
			?>
		</h2>

		<ul class="comment-list">
			<?php
				wp_list_comments( array(
					'avatar_size' => 60,
					'style'       => 'ul',
					'short_ping'  => true,
					'format' => 'xhtml',
					'reply_text'  =>  esc_html__( 'Reply', 'cannix' ),
				) );
			?>
		</ul>

		<?php the_comments_pagination( array(
			'prev_text' => esc_html__( 'Previous', 'cannix' ),
			'next_text' => esc_html__( 'Next', 'cannix' ),
		) );

	endif; // Check for have_comments().

	// If comments are closed and there are comments, let's leave a little note, shall we?
	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>

		<p class="no-comments"><?php esc_html__( 'Comments are closed.', 'cannix' ); ?></p>
	<?php
	endif;

	comment_form();
	?>

</div><!-- #comments -->
