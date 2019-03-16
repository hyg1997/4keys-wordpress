<?php
/**
 * The template for displaying all pages
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

	<main id="main" class="site-main" role="main">
		<div id="primary" class="content-area the-post">

			<?php

				/* Start the Loop */
				while ( have_posts() ) : the_post();

					get_template_part( 'template-parts/page/content', 'page' );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

				endwhile;

			?>

		</div><!-- #primary -->
	</main><!-- #main -->
	<?php 

	if ( get_theme_mod( 'page_show_sidebar', true ) ) :
		get_sidebar( );
	endif; 

	?>

<?php get_footer();
