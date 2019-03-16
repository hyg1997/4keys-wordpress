<?php
/**
 * The template for displaying the author bio in single post
 *
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Cannix
 * @since 1.0
 * @version 1.0
 */

?>

<div class="author">
	<h2 class="page-title"><?php the_author(); ?></h2>
	<?php echo get_avatar(get_the_author_meta('ID'),80); ?>
	<p><?php echo the_author_meta('description'); ?></p>
	<?php

	// Fetch the content from our plugin
	if ( function_exists( 'cannix_author_social_meta' ) ) :

		cannix_author_social_meta();

	endif;

	?>
</div><!-- .entry-meta -->