<?php

/**
 * Template part for displaying footer carousel in home() and single()
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

// Fetch the content from our plugin if it's activated
if ( function_exists( 'cannix_post_carousel' ) ) : ?>

	<div class="container carousel-content footer-content">

		<div class="container">
			<?php if ( is_home ( ) && '' !== get_theme_mod( 'after_content_carousel_title') ) : ?>
			<h2 class="page-title"><?php echo get_theme_mod( 'after_content_carousel_title', 'Recent Posts' ); ?></h2>
			<?php

			/**
			 * Number of posts
			 * Posts per row
			 * Post type
			 * Category
			 * Thumbnail (enabled/disabled on a per theme basis)
			 */

			cannix_post_carousel( 'after_content' );

			endif ?>

			<?php if ( is_single( ) &&  '' !== get_theme_mod( 'single_related_title') ) : ?>
			<h2 class="page-title"><?php echo get_theme_mod( 'single_related_title', 'Related Posts' ); ?></h2>
			<?php
			// Single related posts
			cannix_post_carousel( 'related_posts' );

			endif; ?>

		</div>

	</div>

<?php 

endif;

?>