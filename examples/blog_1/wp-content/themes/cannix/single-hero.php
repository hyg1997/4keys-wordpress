<?php
/**
 * The template for displaying single posts with Hero Header
 *
 * Template Name: Hero Featured Image
 * Template Post Type: post
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Cannix
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<?php 

$post_class = ( function_exists( 'cannix_share_post' ) ? ' has-share-post' : '' );

 ?>

	<main id="main" class="site-main">
		<div id="primary" class="content-area the-post<?php echo esc_attr( $post_class ); ?>">

			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/post/content', get_post_format() );


				// Get post tags and share template
				get_template_part( 'template-parts/post/single', 'tags');

				// Get the authour bio template if enabled

				if ( get_theme_mod( 'single_display_authorbio', true ) && '' !== get_the_author_meta( 'description' ) ) {
					get_template_part( 'template-parts/post/single', 'authorbio');
				}

				// Post pagination
				get_template_part( 'template-parts/post/single', 'post-navigation');


				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;


			endwhile; // End of the loop.
			?>

		</div><!-- #primary -->
	</main><!-- #main -->
	<?php 

	if ( get_theme_mod( 'single_show_sidebar', true ) ) :
		get_sidebar();
	endif; 

	?>

<?php get_footer();
