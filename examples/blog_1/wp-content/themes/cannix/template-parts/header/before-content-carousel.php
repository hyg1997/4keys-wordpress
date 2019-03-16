<?php

/**
 * Template part for displaying post carousel
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

// Fetch the content from our plugin
if ( function_exists( 'cannix_post_carousel' ) ) : ?>

	<div class="container carousel-content pre-content">

		<div class="container">
			<?php if ('' !== get_theme_mod( 'before_content_carousel_title') ) : ?>
			<h2 class="page-title"><?php echo get_theme_mod( 'before_content_carousel_title', 'Recent Posts' ); ?></h2>
			<?php endif ?>
			<?php

			cannix_post_carousel( 'before_content' ); ?>

		</div>

	</div>

<?php endif;

?>