<?php
/**
 * Template part for displaying post share icons
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
if ( function_exists( 'cannix_share_post' ) && ( ( is_single() && get_theme_mod( 'single_display_sharepost', true ) ) || ( ! is_single( ) && get_theme_mod( 'archive_display_sharepost', true ) ) ) ) :

	cannix_share_post();

endif;

?>

