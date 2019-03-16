<?php
/**
 * Template part for displaying prev/next post navigation
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Cannix
 * @since 1.0
 * @version 1.0
 */

?>

<?php

// Escape the post title output
$allowed_html = array(
	'strong' => array(
		'class' => array(),
	),
	'i' => array(
		'class' => array(),
	),
	'b' => array(
		'class' => array(),
	),
	'em' => array(
		'class' => array(),
	),
	'span' => array(
		'class' => array(),
	),
);

$prev_post = get_previous_post();
$next_post = get_next_post();

if (!empty($prev_post) || !empty($next_post)) : ?>

<nav class="navigation post-navigation" role="navigation">
	<h2 class="screen-reader-text">Post navigation</h2>

<?php if ( !empty( $prev_post ) ): ?>
	<article class="post previous-article">
		<div class="post-thumbnail">
	  			<?php 

	  			if ('' !== get_the_post_thumbnail( $prev_post->ID ) ) {

	  				echo '<a href="' . esc_url( get_permalink( $prev_post->ID ) ) . '">';

	  				echo cannix_query_post_thumbnail( $prev_post->ID, '', 'cannix-carousel-image' );

	  				echo '</a>';

	  			} else {

					echo '<img src="' . get_template_directory_uri() . '/media/cannix-carousel-image-placeholder.png" alt="placholder">';

				}

	  			?>
	  	</div>
  		<header class="entry-header">
  			<h3><a href="<?php echo esc_url( get_permalink( $prev_post->ID ) ); ?>"><?php echo esc_html__( 'Previous Post', 'cannix' ); ?></a></h3>
  			<p><?php echo wp_kses( $prev_post->post_title, $allowed_html ); ?></p>
  		</header>
  	</article>
<?php endif; ?>

<?php if ( !empty( $next_post ) ): ?>
	<article class="post next-article">
		<div class="post-thumbnail">
	  			<?php 

	  			if ('' !== get_the_post_thumbnail( $next_post->ID ) ) {

	  				echo '<a href="' . esc_url( get_permalink( $next_post->ID ) ) . '">';

	  				echo cannix_query_post_thumbnail( $next_post->ID, '', 'cannix-carousel-image' );

	  				echo '</a>';

	  			} else {

					echo '<img src="' . get_template_directory_uri() . '/media/cannix-carousel-image-placeholder.png" alt="placeholder">';

				}

	  			?>
	  	</div>
  		<header class="entry-header">
  			<h3><a href="<?php echo esc_url( get_permalink( $next_post->ID ) ); ?>"><?php echo esc_html__( 'Next Post', 'cannix' ); ?></a></h3>
  			<p><?php echo wp_kses( $next_post->post_title, $allowed_html ); ?></p>
  		</header>
  	</article>
<?php endif; ?>

</nav>

<?php endif; ?>