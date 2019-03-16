<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Cannix
 * @since 1.0
 * @version 1.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if ( '' !== get_the_post_thumbnail() ) : ?>

		<div class="post-thumbnail">

			<?php the_post_thumbnail( 'cannix-single-image' ); ?>

		</div>

	<?php endif; ?>

	<header class="entry-header">

		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php

		the_content();

		wp_link_pages( array(
			'before'      => '<div class="nav-links">' . esc_html__( 'Pages:', 'cannix' ),
			'after'       => '</div>',
			'link_before' => '<span class="page-number">',
			'link_after'  => '</span>',
		) );
		?>
	</div><!-- .entry-content -->

</article><!-- #post-## -->