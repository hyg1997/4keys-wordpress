<?php
/**
 * Template part for displaying image posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Cannix
 * @since 1.0
 * @version 1.1
 */

?>

<?php

	$homepage_post_layout = get_theme_mod( 'homepage_post_layout', 'masonry' );
	$archive_post_layout = get_theme_mod( 'archive_post_layout', 'masonry' );

	// show_comments vars

	$show_comments = true;
	if ( is_home() && ( $homepage_post_layout === 'grid' || $homepage_post_layout === 'list' ) || ! is_home() && ( $archive_post_layout === 'grid' || $archive_post_layout === 'list' ) )  {
		$show_comments = false;
	}

	$comments_post_class = ( get_comments_number( ) > 0 ? 'has-comments' : '' );



?>


<article id="post-<?php the_ID(); ?>" <?php post_class( $comments_post_class ); ?><?php echo cannix_inline_article_style( true, true ); ?>>

	<?php if ( '' !== get_the_post_thumbnail() && ! is_page_template( )) : ?>

	<?php if ( ! is_single() ) : ?>

	<div class="post-wrapper">

	<?php endif; ?>

		<div class="post-thumbnail">

			<?php if ( ! is_single() ) : 

				get_template_part( 'template-parts/post/content', 'share' ); 

			endif; ?>

			<?php if ( ! is_single() ) : ?>
				<a href="<?php the_permalink(); ?>">
			<?php endif; ?>
				<?php 

				if ( ! is_single( ) ) :

					if (  ( ! is_home() && $archive_post_layout === 'masonry' ) || ( is_home() && $homepage_post_layout === 'masonry' ) ) {

					the_post_thumbnail( 'medium_large' );

				} elseif ( ( ! is_home() && $archive_post_layout === 'classic' ) || ( is_home() && $homepage_post_layout === 'classic' ) ) {

					the_post_thumbnail( );

				} else {

					echo cannix_query_post_thumbnail( '', '', 'cannix-archive-image' );
					
				}

				else:

					if ( get_post( get_post_thumbnail_id() )->post_excerpt ) {

						echo '<figure>';
						echo get_the_post_thumbnail( $post->ID, 'cannix-single-image' );
						echo '<figcaption>' . wp_kses_post( get_post( get_post_thumbnail_id() )->post_excerpt ) . '</figcaption>'; // displays the image caption
						echo '</figure>';

					} else {

						the_post_thumbnail( 'cannix-single-image' );
					}

				endif;

				?>
			<?php if ( ! is_single() ) : ?>
				</a>
			<?php endif; ?>

		</div><!-- .post-thumbnail -->

	<?php else : ?>

		<?php if ( ! is_single() ) : ?>

			<?php if (  ( ! is_home() && $archive_post_layout === 'grid' ) || ( is_home() && $homepage_post_layout === 'grid' ) ) : ?>

				<div class="post-thumbnail">

					<?php get_template_part( 'template-parts/post/content', 'share' );  ?>

					<a href="<?php the_permalink(); ?>">

					<img src="<?php echo get_template_directory_uri() ?>/media/cannix-archive-image-placeholder.png" alt="placeholder">

					</a>

				</div>

			<?php endif; ?>

		<?php endif; ?>

	<?php endif; ?>

	<header class="entry-header">

		<?php

		if ( 'post' === get_post_type() ) {

			if ( ! is_single( ) ) { ?>

				<div class="entry-meta post-category">
					<?php if ( get_theme_mod( 'archive_display_meta_category', true ) ) : ?>
						<span class="screen-reader-text">Posted in</span><?php cannix_get_category(); ?>
					<?php endif; ?>

					<?php if ( is_sticky() && is_home() ) {
						echo '<span class="sticky-sash">' . esc_html__( 'featured', 'cannix' ) . '</span>';
					} ?>
				</div>

			<?php }
		}

		if ( is_single() ) {
			if ( ! is_page_template( ) ) {
				the_title( '<h1 class="entry-title">', '</h1>' );
			}
		} elseif ( is_front_page() && is_home() ) {
			the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark" ' . cannix_inline_article_style( false, true ) . '>', '</a></h3>' );
		} else {
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		}

		if ( 'post' === get_post_type() && has_excerpt( ) && is_single( ) && ! is_page_template() && get_theme_mod( 'single_display_custom_excerpt', true ) ) {

			// Single show the custom post excerpt if it exists
			echo '<div class="custom-excerpt">';
			the_excerpt();
			echo '</div>';

		}

		if ( is_single() ) {

			// The post meta for single
			get_template_part( 'template-parts/post/content', 'meta' ); 

		}

		?>

	</header><!-- .entry-header -->

	<?php if ( ! is_single() && '' !== get_the_post_thumbnail() ) : ?>

	</div><!-- .post-wrapper -->

	<?php endif; ?>

	<?php

		if ( ! is_single(  ) ) {

				get_template_part( 'template-parts/post/content', 'meta' ); 

				if ( $show_comments === true ) {

					if ( get_theme_mod( 'show_post_loop_comments', true ) ) {

						// Show most recent comments
						cannix_comments_loop();

					}

				}


		} else {

			echo '<div class="entry-content">';

			the_content( );

			wp_link_pages( array(
				'before'      => '<div class="nav-links page-pagination"><span class="pages">' . esc_html__( 'Pages:', 'cannix' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span class="page-numbers">',
				'link_after'  => '</span>',
			) );

			echo '</div><!-- .entry-content -->';

		}

		?>

</article><!-- #post-## -->