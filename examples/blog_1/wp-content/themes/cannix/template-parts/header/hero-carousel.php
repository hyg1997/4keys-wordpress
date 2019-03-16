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

	<div class="container carousel-content hero-content">

		<div class="container">

			<?php if ( is_category() && '' !== get_theme_mod( 'before_category_carousel_title') ) : ?>
			<h2 class="page-title"><?php echo get_theme_mod( 'before_category_carousel_title', 'Popular Posts' ) ?></h2>

			<?php

			$category = get_queried_object();

			cannix_post_carousel( 'before_category' ); ?>

			<?php endif ?>

		</div>

	</div>

<?php endif;

?>