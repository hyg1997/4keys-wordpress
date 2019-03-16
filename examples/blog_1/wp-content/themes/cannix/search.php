<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package WordPress
 * @subpackage Cannix
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<?php 

$post_layout = get_theme_mod( 'archive_post_layout', 'masonry' );

?>

	<main id="main" class="site-main">
		<div id="primary" class="content-area <?php echo esc_attr( $post_layout ); ?>">

			<?php
			if ( have_posts() ) :

				if ( $post_layout === 'masonry' ) { 
					echo '<div class="masonry-container">';
				}

				/* Start the Loop */
				while ( have_posts() ) : the_post();

					/*
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'template-parts/post/content', get_post_format() );

				endwhile;

				if ( $post_layout === 'masonry' ) { 

					echo '</div>';

				}


				the_posts_pagination( array(
				    'mid_size' => 2,
				    'prev_text' => esc_html__( 'Previous', 'cannix' ),
				    'next_text' => esc_html__( 'Next', 'cannix' ),
				) );

			else : ?>

				<p class="no-results"><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'cannix' ); ?></p>
				<?php

			endif;
			?>

		</div><!-- #primary -->
	</main><!-- #main -->
	<?php 

	if ( get_theme_mod( 'archive_show_sidebar', true ) ) :
		get_sidebar();
	endif; 

	?>

<?php get_footer();
