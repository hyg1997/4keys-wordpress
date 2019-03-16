<?php
/**
 * The template for displaying tags and share links in the single post footer
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

<div class="hentry-footer">
	<div class="post-tags">
	<?php

	$post_tags = get_the_tags();

	if ( $post_tags ) :

		foreach( $post_tags as $tag ) { ?>
	    	<a href="<?php echo get_tag_link($tag->term_id); ?>" aria-label="<?php echo esc_attr( $tag->name ); ?>"><?php echo esc_attr( $tag->name ); ?></a>
	    <?php }

	    endif; ?>

	    <?php 

	     // If we have no tags and share plugin is not registered we fallback on the post categories

	    if ( ! $post_tags && ! function_exists( 'cannix_share_post' ) ) :

	    	the_category(' ', 'multiple');

	    endif;


	    ?>
	</div>
	<?php

	if ( get_theme_mod( 'single_display_sharepost', true ) && get_theme_mod( 'single_sharepost_position' ) !=='top' ) {
		get_template_part( 'template-parts/post/content', 'share');
	}  ?>
</div>