<?php 

/**
 * Customizer Colour Options
 *
 *
 * @package WordPress
 * @subpackage Cannix
 * @since 1.0
 * @version 1.3
 */

/**
 * Generate and output inline (in header) CSS for Colour Customizer
 * Because of the complex nature of the colour scheme if we have a 
 * change of any customizer colour field we output the entire CSS.
 * We only change the colour core scheme.
 */

function cannix_theme_colours() {

    $primary_colour_one = get_theme_mod( 'primary_colour_one', '#e9c67b' );
    $primary_colour_two = get_theme_mod( 'primary_colour_two', '#5dd39e' );
    $primary_colour_three = get_theme_mod( 'primary_colour_three', '#348aa7' );
    $primary_colour_four = get_theme_mod( 'primary_colour_four', '#525174' );
    $primary_colour_five = get_theme_mod( 'primary_colour_five', '#513b56' );
    $entry_font_colour = get_theme_mod( 'entry_font_colour', '#ffffff' );
    // Body font colour removed version 1.2
    $meta_category_background = get_theme_mod( 'meta_category_background', '#ffffff' );
    $meta_category_background_alpha_transparency = get_theme_mod( 'meta_category_background_alpha_transparency', '8' );
	$meta_category_font_color = get_theme_mod( 'meta_category_font_color', '#ffffff' );
	$comment_count_background = get_theme_mod( 'comment_count_background', '#333333' );
	$comment_count_font_color = get_theme_mod( 'comment_count_font_color', '#ffffff' );
	$cannix_body_font = get_theme_mod( 'cannix_body_font', 'open_sans' );
	$cannix_title_font = get_theme_mod( 'cannix_title_font', 'roboto_slab' );

    // If we have any colour change at all we output the custom CSS

    $color_css = false;
    $font_css = false;

    if ( '#e9c67b' !== $primary_colour_one ||
    	 '#5dd39e' !== $primary_colour_two || 
    	 '#348aa7' !== $primary_colour_three || 
    	 '#525174' !== $primary_colour_four || 
    	 '#513b56' !== $primary_colour_five || 
    	 '#ffffff' !== $entry_font_colour ||
    	 '#ffffff' !== $meta_category_background ||
    	 8 !== $meta_category_background_alpha_transparency ||
    	 '#ffffff' !== $meta_category_font_color ||
    	 '#333333' !== $comment_count_background ||
    	 '#ffffff' !== $comment_count_font_color ) {

    	$color_css = true;

    }

    if ( '' !== $cannix_body_font && 'open_sans' !== $cannix_body_font ||
    	 '' !== $cannix_title_font && 'roboto_slab' !== $cannix_title_font ) {

    	$font_css = true;
    }


      ?>

      <?php if ( $font_css || $color_css ) { ?>

  <style>

  <?php if ( $font_css ) { ?>

  	<?php if ( '' !== $cannix_body_font && 'roboto' === $cannix_body_font ) { ?>

  	body,button,input,select,textarea,cite,.widget_rss .rssSummary,.widget.widget_tag_cloud li,.prev span,.next span,.nav-next span,.nav-previous span {
  		font-family: "<?php echo ucfirst( esc_attr( $cannix_body_font ) ); ?>";
  	}
  <?php } ?>
  <?php if ( '' !== $cannix_title_font && 'poppins' === $cannix_title_font ) { ?>
	h1,h2,h3,h4,h5,h6,.page-title,blockquote,.wpcf7-form label,.hero .entry-content,.the-post .hentry .custom-excerpt,.widget .widget-title,.widget.widget_recent_comments span,.widget.widget_rss li a.rsswidget,footer .widget[class*="instagram"] p.clear {
		font-family: "<?php echo ucfirst( esc_attr( $cannix_title_font ) ); ?>";
	}
  <?php } ?>
  <?php } //Endif font_css ?>

  <?php if ( $color_css ) { ?>
	
	a {
		color: <?php echo sanitize_hex_color( $primary_colour_three ); ?>;
	}
	a:hover,
	a:focus {
		color: <?php echo sanitize_hex_color( $primary_colour_four ); ?>;
	}
	.page-title:after {
		background: <?php echo sanitize_hex_color( $primary_colour_two ); ?>;
	}

	blockquote {
		color: <?php echo sanitize_hex_color( $primary_colour_two ); ?>;
	}
	.no-results {
		color: <?php echo sanitize_hex_color( $primary_colour_four ); ?>;
	}
	input[type="submit"],
	input[type="button"],
	button {
		background: <?php echo sanitize_hex_color( $primary_colour_three ); ?>;
		color: <?php echo sanitize_hex_color( $entry_font_colour ); ?>;
	}
	.primary-nav li.menu-item:after {
		background: <?php echo sanitize_hex_color( $primary_colour_three ); ?>;
	}
	.hero .slide-wrapper {
		background: <?php echo sanitize_hex_color( $primary_colour_five ); ?>;
	}
	.hero:not(.cover) .entry-header,
	.hero:not(.cover) .entry-content,
	.hero:not(.cover) .entry-meta li,
	.hero:not(.cover) .entry-meta li a,
	.hero:not(.cover) .entry-title a,
	.hero:not(.cover) .entry-title {
		color: <?php echo sanitize_hex_color( $entry_font_colour ); ?>;
	}
	.hero:not(.cover) .post-category > span.category-link-bg {
		background: rgba(<?php echo cannix_hex2rgba( $meta_category_background, $meta_category_background_alpha_transparency ); ?>);
	}
	.hero:not(.cover) .post-category a {
		color: <?php echo sanitize_hex_color( $meta_category_font_color); ?>;
	}
	/* Alt colour version support up to 4 slide colours */
	.hero[data-slides="2"] .slide-wrapper.slide-2 {
		background: <?php echo sanitize_hex_color( $primary_colour_two ); ?>
	}
	.hero[data-slides="2"] .slide-wrapper.slide-3 {
		background: <?php echo sanitize_hex_color( $primary_colour_three ); ?>;
	}
	.hero[data-slides="2"] .slide-wrapper.slide-4 {
		background: <?php echo sanitize_hex_color( $primary_colour_one); ?>
	}
	.carousel-content .page-title:after {
		background: <?php echo sanitize_hex_color( $primary_colour_one); ?>;
	}
	.content-area:not(.the-post) article[class*="post"],
	.content-area.the-post .post-navigation article {
		background: <?php echo sanitize_hex_color( $primary_colour_one); ?>;
		color: <?php echo sanitize_hex_color( $entry_font_colour ); ?>;
	}
	.content-area.grid article[class*="post"] .entry-title a,
	.content-area.classic article[class*="post"]:not(.post_format-post-format-image) .entry-title a,
	.content-area.list article[class*="post"]:not(.post_format-post-format-image) .entry-title a,
	.content-area.masonry article[class*="post"]:not(.post_format-post-format-image) .entry-title a {
		color: <?php echo sanitize_hex_color( $entry_font_colour ); ?>;
	}
	.entry-comments-title span {
		color: <?php echo sanitize_hex_color( $entry_font_colour ); ?>;
	}
	.content-area.grid article[class*="post"] .entry-meta li,
	.content-area.classic article[class*="post"]:not(.post_format-post-format-image) .entry-meta li,
	.content-area.list article[class*="post"]:not(.post_format-post-format-image) .entry-meta li,
	.content-area.masonry article[class*="post"]:not(.post_format-post-format-image) .entry-meta li {
		color: <?php echo sanitize_hex_color( $entry_font_colour ); ?>;
	}
	.content-area.grid article[class*="post"] .entry-meta a,
	.content-area.classic article[class*="post"]:not(.post_format-post-format-image) .entry-meta a,
	.content-area.list article[class*="post"]:not(.post_format-post-format-image) .entry-meta a,
	.content-area.masonry article[class*="post"]:not(.post_format-post-format-image) .entry-meta a {
		color: <?php echo sanitize_hex_color( $entry_font_colour ); ?>;
	}
	.content-area .entry-meta li.entry-comment-count,
	ol.popular-posts.list-style-list-first-grid > li:first-child:before,
	ol.popular-posts.list-style-grid > li:before  {
		background: <?php echo sanitize_hex_color( $comment_count_background); ?>;
		color: <?php echo sanitize_hex_color( $comment_count_font_color ); ?> !important;
	}
	.entry-meta li.entry-comment-count a {
		color: <?php echo sanitize_hex_color( $comment_count_font_color ); ?>;
	}
	.loop-comments.has-comment-count li:first-child:before {
		border-top-color: <?php echo sanitize_hex_color( $comment_count_background); ?>;
	}
	.the-post .hentry .entry-meta li.entry-comment-count:after {
		border-top-color: <?php echo sanitize_hex_color( $comment_count_background); ?>;
	}
	.content-area.grid article .post-category > span.category-link-bg,
	.content-area.classic article:not(.post_format-post-format-image) .post-category > span.category-link-bg,
	.content-area.list article:not(.post_format-post-format-image) .post-category > span.category-link-bg,
	.content-area.masonry article:not(.post_format-post-format-image) .post-category > span.category-link-bg {
		background: rgba(<?php echo cannix_hex2rgba( $meta_category_background, $meta_category_background_alpha_transparency ); ?>);
	}
	.content-area.grid article .post-category a,
	.content-area.classic article:not(.post_format-post-format-image) .post-category a,
	.content-area.list article:not(.post_format-post-format-image) .post-category a,
	.content-area.masonry article:not(.post_format-post-format-image) .post-category a {
		color: <?php echo sanitize_hex_color( $meta_category_font_color); ?> !important;
	}
	.sticky-sash {
		background: <?php echo sanitize_hex_color( $primary_colour_five ); ?>;
	}
	.content-area:not(.the-post) article[class*="post"]:nth-child(4n+2),
	.content-area.the-post .post-navigation article.next-article {
		background: <?php echo sanitize_hex_color( $primary_colour_two ); ?>;
	}
	.content-area:not(.the-post) article[class*="post"]:nth-child(4n+3) {
		background: <?php echo sanitize_hex_color( $primary_colour_three ); ?>;
	}
	.content-area:not(.the-post) article[class*="post"]:nth-child(4n) {
		background: <?php echo sanitize_hex_color( $primary_colour_four ); ?>;
	}
	.the-post .entry-content p.dropcaps::first-letter {
		background: <?php echo sanitize_hex_color( $primary_colour_one); ?>;
	}
	.the-post .entry-meta a {
		color: <?php echo sanitize_hex_color( $primary_colour_three ); ?>;
	}
	.comment.bypostauthor > .comment-body cite:after {
		color: <?php echo sanitize_hex_color( $primary_colour_three ); ?>;
	}
	.widget .widget-title:after {
		background: <?php echo sanitize_hex_color( $primary_colour_two ); ?>;
	}
	.widget.widget_categories span {
		background: <?php echo sanitize_hex_color( $primary_colour_three ); ?>;
		color: <?php echo sanitize_hex_color( $entry_font_colour ); ?>;
	}
	.widget.widget_categories .children li a {
		color: <?php echo sanitize_hex_color( $primary_colour_four ); ?>;
	}
	.widget.widget_categories .children li .children li a {
		color:<?php echo sanitize_hex_color( $primary_colour_three ); ?>;
	}
	.widget.widget_recent_comments span {
		color: <?php echo sanitize_hex_color( $primary_colour_two ); ?>;
	}
	.widget.widget_recent_comments a.url {
		color: <?php echo sanitize_hex_color( $primary_colour_three ); ?>;
	}
	.widget_rss cite {
		color: <?php echo sanitize_hex_color( $primary_colour_two ); ?>;
	}
	.widget_calendar th {
		background: <?php echo sanitize_hex_color( $primary_colour_three ); ?>;
		color: <?php echo sanitize_hex_color( $entry_font_colour ); ?>;
	}
	.widget.widget_tag_cloud li a {
		background: <?php echo sanitize_hex_color( $primary_colour_one); ?>;
	}
	.widget.widget_tag_cloud li:nth-child(5n+2) a {
		background: <?php echo sanitize_hex_color( $primary_colour_two ); ?>;
	}
	.widget.widget_tag_cloud li:nth-child(5n+3) a {
		background: <?php echo sanitize_hex_color( $primary_colour_three ); ?>;
	}
	.widget.widget_tag_cloud li:nth-child(5n+4) a {
		background: <?php echo sanitize_hex_color( $primary_colour_four ); ?>;
	}
	.widget.widget_tag_cloud li:nth-child(5n+5) a {
		background: <?php echo sanitize_hex_color( $primary_colour_five ); ?>;
	}
	.widget_tag_cloud ul li span {
		color: <?php echo sanitize_hex_color( $entry_font_colour ); ?>;
	}
	.widget_about {
		background: <?php echo sanitize_hex_color( $primary_colour_three ); ?>;
	}
	.nav-links .current {
		color: <?php echo sanitize_hex_color( $primary_colour_three ); ?>;
	}
	.nav-links .page-numbers.next,
	.nav-links .page-numbers.prev,
	.nav-links .nav-previous a,
	.nav-links .nav-next a {
		background: <?php echo sanitize_hex_color( $primary_colour_two ); ?>;
		border-color: <?php echo sanitize_hex_color( $primary_colour_two ); ?>;
		color: <?php echo sanitize_hex_color( $entry_font_colour ); ?>;
	}
	.prev span,
	.next span,
	.nav-next span,
	.nav-previous span  {
		color: <?php echo sanitize_hex_color( $primary_colour_three ); ?>;
	}
	.post-navigation h3 a {
		color: <?php echo sanitize_hex_color( $entry_font_colour ); ?>;
	}
	.nav-links.page-pagination > span:not(.pages) {
		color: <?php echo sanitize_hex_color( $primary_colour_three ); ?>;
	}
	/* Gutenberg */
	.wp-block-pullquote.alignleft,
	.wp-block-pullquote.alignright {
	    color: <?php echo sanitize_hex_color( $entry_font_colour ); ?>;
		background: <?php echo sanitize_hex_color( $primary_colour_two ); ?>;
	}

<?php } // End color css ?>

	</style>

      <?php
    } // Endif custom style

  }

add_action( 'wp_head', 'cannix_theme_colours' ); // Enqueue the CSS Inline Style after the main stylesheet


function cannix_hex2rgba( $hex, $alpha = 8 ) {

	$hex = str_replace("#", "", $hex);
	$alpha = ( 0 !== $alpha ? '0.' . ( 10 - $alpha ) : 1 );

    list($r, $g, $b) = array($hex[0].$hex[1],
                             $hex[2].$hex[3],
                             $hex[4].$hex[5]);
    $r = hexdec($r);
    $g = hexdec($g);
    $b = hexdec($b);

    $rgba = array( $r, $g, $b, $alpha );

    return implode(",", $rgba);

}

 ?>