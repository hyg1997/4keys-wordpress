<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Cannix
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

	<main id="main" class="site-main">
		<header class="page-header">
			<h1 class="page-title"><?php _e( 'Not Found', 'cannix' ); ?></h1>
		</header>

		<div id="primary" class="content-area">

			<h2><?php _e( 'Oh No, this page does not exist', 'cannix' ); ?></h2>
					<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'cannix' ); ?></p>

					<div class="widget widget_search">
						<?php get_search_form(); ?>
					</div>

		</div><!-- #primary -->
	</main><!-- #main -->

<?php get_footer();
