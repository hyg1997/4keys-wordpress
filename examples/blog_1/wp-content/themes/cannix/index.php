<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Cannix
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<?php 

	$post_layout = get_theme_mod( 'homepage_post_layout', 'masonry' );

?>

	<main id="main" class="site-main">
		<?php

		if ( is_home( ) && have_posts( ) ) {
			
			echo '<h2 class="page-title">' . esc_html__( 'Latest Posts', 'cannix' ) . '</h2>';

		} ?>

		<div id="primary" class="content-area <?php echo esc_attr( $post_layout ); ?>">

			<?php if ( $post_layout === 'masonry' ) { 
				echo '<div class="masonry-container">';
			} ?>

			<?php
			if ( have_posts() ) :

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

			else :

				get_template_part( 'template-parts/post/content', 'none' );

			endif;
			?>

		</div><!-- #primary -->
	</main><!-- #main -->

	<?php 

	if ( get_theme_mod( 'homepage_show_sidebar', true ) ) :
		get_sidebar();
	endif; 

	?>

<?php get_footer();
