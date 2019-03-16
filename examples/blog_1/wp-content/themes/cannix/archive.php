<?php
/**
 * The template for displaying archive pages
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

$post_layout = get_theme_mod( 'archive_post_layout', 'masonry' );

?>

	<main id="main" class="site-main">
		<?php if ( is_archive( ) || is_search( ) ) : ?>

		<header class="page-header">
				<?php if ( is_search( ) ) : ?>
					<?php if ( have_posts() ) : ?>
						<h1 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'cannix' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
					<?php else : ?>
						<h1 class="page-title"><?php _e( 'Nothing Found', 'cannix' ); ?></h1>
					<?php endif; ?>
				<?php else : // End if search ?>
					<?php
						// Category & Archive
					if ( is_category() ) {
						echo '<h1 class="page-title">' . esc_html__( 'Category: ', 'cannix' ) . '<span>';
						echo single_cat_title();
						echo '</span></h1>';
					} else {
						the_archive_title( '<h1 class="page-title">', '</h1>' );
					}
					?>
				<?php endif; ?>
		</header><!-- .page-header -->

	<?php endif; ?>
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

	if ( get_theme_mod( 'archive_show_sidebar', true ) ) :
		get_sidebar();
	endif; 

	?>

<?php get_footer();
