<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Cannix
 * @since 1.0
 * @version 1.1
 */

?>

</div><!-- .container .site-wrapper  -->

<?php

if ( ( is_home( ) && get_theme_mod( 'after_content_carousel', true ) ) || ( is_single( ) && get_theme_mod( 'single_display_related_posts', true ) ) ) :

	get_template_part( 'template-parts/footer/footer', 'carousel' );

endif;

?>

		<footer id="colophon" class="site-footer">

			<?php 

					if ( is_active_sidebar( 'instagram-footer' ) ) {
						dynamic_sidebar( 'instagram-footer' );
					}
					
	 			?>
	 			
			<div class="container">

					<?php 

					 // Check if we have anything to display here
					 if ( get_theme_mod( 'footer_show_social_icons', true ) ) : ?>

					 	<div class="footer-social">

						 	<?php // True to show text string
						 	cannix_show_social_icons( false ); ?>

						 </div>

					 <?php endif; ?>

				<div class="footer-copyright">
					<?php

					// Footer text
					echo esc_attr( get_theme_mod( 'footer_text', get_bloginfo('description') ) );

					?>

					<?php if ( get_theme_mod( 'footer_show_backtotop', true ) ) : ?>

					<a href="" class="backtotop"><?php esc_html_e( 'back to top', 'cannix' ); ?> <i class="fa fa-chevron-up"></i></a>

					<?php endif; ?>

				</div>
		
				<div class="footer-links">

					<?php 

					// The footer menu
					if ( has_nav_menu( 'footer' ) ) :

					     wp_nav_menu( array( 'theme_location' => 'footer',
					     					 'container' => 'ul',
					     					 'depth' => 1,
					     					 'menu_class' => 'footer-nav',
					     					 'menu_id' => 'footer-nav'));

					endif;

		 			?>
				</div>
		</div><!-- .container -->
		</footer><!-- #colophon -->
<?php wp_footer(); ?>

</body>
</html>
