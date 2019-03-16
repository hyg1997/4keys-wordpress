<?php
/**
 * Template part for displaying gallery posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Cannix
 * @since 1.0
 * @version 1.2
 */

?>

<?php

	$homepage_post_layout = get_theme_mod( 'homepage_post_layout', 'masonry' );
	$archive_post_layout = get_theme_mod( 'archive_post_layout', 'masonry' );
	$meta_category_class = ( ! is_single() && get_theme_mod( 'archive_display_meta_category', true ) ? ' has-meta-category' : '' );

	// show_comments vars

	$show_comments = true;
	if ( is_home() && ( $homepage_post_layout === 'grid' || $homepage_post_layout === 'list' ) || ! is_home() && ( $archive_post_layout === 'grid' || $archive_post_layout === 'list' ) )  {
		$show_comments = false;
	}

	$post_class = ( get_theme_mod( 'show_post_excerpt', true ) ? ' has-excerpt' : '' );

?>


<article id="post-<?php the_ID(); ?>" <?php post_class( $post_class ); ?><?php echo cannix_inline_article_style( true, true ); ?>>

	<?php if ( ! is_single( )): ?>

	<div class="post-thumbnail">

	<?php get_template_part( 'template-parts/post/content', 'share' ); ?>

	<?php endif; ?>

	<?php 

		// Only fetch the thumbnail if not single post
		if ( '' !== get_the_post_thumbnail() && ! is_single( )) : ?>

				<a href="<?php the_permalink(); ?>">
				<?php 

					if (  ( ! is_home() && $archive_post_layout === 'masonry' ) || ( is_home() && $homepage_post_layout === 'masonry' ) ) {

							// Masonry
							the_post_thumbnail( 'medium_large' );

						} elseif ( ( ! is_home() && $archive_post_layout === 'classic' ) || ( is_home() && $homepage_post_layout === 'classic' ) ) {

							// Classic full size image
							the_post_thumbnail( );

						} else {

							// List and grid
							echo cannix_query_post_thumbnail( '', '', 'cannix-archive-image' );

						}

					 ?>
				</a>

	<?php else: ?>
		<?php

		if ( is_single( ) || is_home() && $homepage_post_layout === 'classic' || ! is_home() && $archive_post_layout === 'classic' ) {

			if ( function_exists( 'the_gutenberg_project' ) && has_blocks( ) ) {

				// No slider

			} else {

				echo '<div class="slick-gallery slick">';

				// Only create the gallery slider if is single post
				echo cannix_post_gallery( );

				echo '</div>';

			}

		} else {

			// Just show the first image from the gallery in the foreach
			// (pass param true) if not a single post (is_archive)
			echo cannix_post_gallery( true );

		} ?>
	<?php endif; ?>

	<?php if ( ! is_single( )): ?>

	</div><!-- post -thumbnail -->

	<?php endif; ?>

	<header class="entry-header<?php echo esc_attr( $meta_category_class ); ?>">

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

	<?php

		if ( ! is_single(  ) ) {

			if ( get_theme_mod( 'show_post_excerpt', true ) ) {

					echo '<div class="entry-content">';

					the_excerpt( );

					echo '</div>';

				}

				get_template_part( 'template-parts/post/content', 'meta' ); 

				if ( $show_comments === true ) {

					if ( get_theme_mod( 'show_post_loop_comments', true ) ) {

						// Show most recent comments
						cannix_comments_loop();

					}

				}

		} else {

			echo '<div class="entry-content">';

			echo cannix_content_gallery( );

			wp_link_pages( array(
				'before'      => '<div class="nav-links">' . esc_html__( 'Pages:', 'cannix' ),
				'after'       => '</div>',
				'link_before' => '<span class="page-number">',
				'link_after'  => '</span>',
			) );

			echo '</div><!-- .entry-content -->';

		}

		?>

</article><!-- #post-## -->

<?php 
        

?>
