<?php
/**
 * Template part for displaying posts in the Cannix sidebar widget
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Cannix
 * @since 1.0
 * @version 1.0
 */

?>

<li>

<article <?php post_class(); ?>>

	<?php if ( has_post_format( 'gallery' ) && '' === get_the_post_thumbnail( ) ) : ?>

		<?php echo cannix_post_gallery( true ); ?>

	<?php else: ?>

		<div class="post-thumbnail">

			<a href="<?php the_permalink(); ?>">

		<?php if ( '' !== get_the_post_thumbnail() ) : ?>

					<?php the_post_thumbnail( 'thumbnail' ); ?>

		<?php else : ?>

			<img src="<?php echo get_template_directory_uri() ?>/media/post-thumbnail-placeholder.png" alt="placeholder">

		<?php endif; ?>

			</a>
		</div><!-- .post-thumbnail -->

	<?php endif; // End if gallery ?>

	<header class="entry-header">

		<?php

		the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );


		?>

		<div class="entry-meta">

		<ul>

			<li class="entry-author-meta">

				<span class="screen-reader-text">Posted by</span><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ) ?>"><?php echo get_the_author() ?></a>

			</li>

			<li class="entry-date">

				<time datetime="<?php echo get_the_date( 'Y-m-d' ) ?>"><?php echo get_the_date( ) ?></time>

			</li>

		</ul>
	
	</div>

	</header><!-- .entry-header -->

</article><!-- #post-## -->

</li>
