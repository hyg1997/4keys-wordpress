<?php
/**
 * Template part for displaying featured slider
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
if ( function_exists( 'cannix_featured_slider' ) ) :

	cannix_featured_slider( );

endif;

?>