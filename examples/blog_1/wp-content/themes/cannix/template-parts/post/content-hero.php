<?php
/**
 * Template part for displaying hero header image for HERO single template
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Cannix
 * @since 1.0
 * @version 1.0
 */

?>

	<div class="hero">

		<div class="slide-wrapper">

			<div class="post-thumbnail">

			<?php 

			echo cannix_query_post_thumbnail( '', '', 'cannix-hero-image' );

			?>

			</div><!-- .post-thumbnail -->

			<div class="entry-header">
				<div class="entry-wrapper">

					<?php the_title( '<h1 class="entry-title">', '</h1>' ) ?>

				</div><!-- .entry-wrapper -->
			</div><!-- .entry-header -->

			<div class="entry-content">

					<?php 

					// Custom excerpts only

					if ( has_excerpt( ) ) :

							the_excerpt();
			
					endif;

					?>

				</div>
		</div>

	</div>

<div class="container site-wrapper">