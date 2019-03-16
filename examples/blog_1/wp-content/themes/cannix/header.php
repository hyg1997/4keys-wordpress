<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Cannix
 * @since 1.0
 * @version 1.1
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<!-- fade the body when slide menu is active -->
	<div class="body-fade"></div>

	<header id="masthead" class="site-header">
	
			<div class="logo">
				<?php the_custom_logo( ); ?>	
			</div>
			
		<?php

		// The primary nav
		if ( has_nav_menu( 'primary' ) ) {

			echo '<nav class="primary-nav-wrapper">';

		    wp_nav_menu( array( 'theme_location' => 'primary',
		     					'container' => 'ul',
		     					'menu_class' => 'primary-nav',
		     					'menu_id' => 'primary-nav'));

		    echo '</nav>';
		}

		?>

	</header><!-- .site-header -->

	<!-- site search -->
	<div class="site-search">
		<i class="fa fa-close fa-lg toggle-search"></i>
		<?php 

			// Diplay the search form
			get_search_form( );

			?>
	</div>

	<!-- Slide menu -->
	<aside class="mobile-navigation slide-menu">
		<span class="close"><i class="fa fa-close fa-lg"></i></span>
		<?php 

		// Check if we have anything to display here
		if ( get_theme_mod( 'slidebar_show_logo', true ) ) : ?>

			<div class="logo"><?php the_custom_logo(); ?></div>

		<?php endif;

		if ( get_theme_mod( 'slidebar_show_social_icons', true ) ) : ?>

			<div class="widget widget_social">

			<?php cannix_show_social_icons( ); ?>

			</div>

		<?php endif; ?>

		<?php 

		// The primary nav
		if ( has_nav_menu( 'primary' ) ) {

			$desktop_menu = ( get_theme_mod( 'slidebar_show_primary_nav', false ) ? '' : ' mobile-only' );

			echo '<nav class="primary-nav-sidebar-wrapper' . esc_attr( $desktop_menu ) . '">';

		    wp_nav_menu( array( 'theme_location' => 'primary',
		     					 'container' => 'ul',
		     					 'menu_class' => 'primary-nav-sidebar',
		     					 'menu_id' => 'primary-nav-sidebar'));

			echo '</nav>';

		}
		// Widgets
		if (is_active_sidebar( 'sidebar-2' )) {
			dynamic_sidebar( 'sidebar-2');
		}

		?>
	</aside>

	<?php if ( is_home( ) && ! is_paged( ) ) {

		if ( get_theme_mod( 'display_featured_area', true ) ) {

			get_template_part( 'template-parts/header/featured', 'slider' );

		}

		if ( get_theme_mod( 'before_content_carousel', true ) ) {

			get_template_part( 'template-parts/header/before-content', 'carousel' );

		}

	} ?>

	<?php if ( is_category( ) ) {

		if ( get_theme_mod( 'before_category_carousel', true ) ) {

			get_template_part( 'template-parts/header/hero', 'carousel' );

		}

	}

	 ?>

	<?php

	 // Single using hero template

	 if ( is_single( ) && is_page_template( ) ) {

	 	get_template_part( 'template-parts/post/content', 'hero' );

	 }

	 if ( ! is_page_template( ) ) {

		echo '<div class="container site-wrapper">';

	} ?>

