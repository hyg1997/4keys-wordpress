<?php
/**
 * Cannix functions and definitions
 *
 *
 * @package WordPress
 * @subpackage Cannix
 * @since 1.0
 * @version 1.3.1
 */

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function cannix_setup() {

	// Make theme available for translation.
	load_theme_textdomain( 'cannix' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// Let WordPress manage the document title.
	add_theme_support( 'title-tag' );

	// Enable support for Post Thumbnails on posts and pages.
	add_theme_support( 'post-thumbnails' );

	// Custom Image sizes for this theme

	// Hero
	add_image_size( 'cannix-hero-image', 960, 685, true );

	// Hero
	add_image_size( 'cannix-hero-cover-image', 1280, 720, true );

	// Hero alternative image (showing 2 slides)
	add_image_size( 'cannix-hero-alt-image', 768, 768, true );

	// Single Uncropped (the default single image)
	add_image_size( 'cannix-single-image', 1370, 9999, false );

	// Single landscape (we use for gallery in single.php)
	add_image_size( 'cannix-default-image', 1370, 913, true );

	// Carousel landscape (a smaller version of the default archive)
	add_image_size( 'cannix-carousel-image', 500, 333, true );

	// Archive landscape (a larger version of default landscape we use for list and grid)
	add_image_size( 'cannix-archive-image', 768, 512, true );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary'    => esc_html__( 'Primary Menu', 'cannix' ),
		'footer'     => esc_html__( 'Footer Menu', 'cannix'),
	) );

	// Switch default core markup for search form, comment form, and comments to output valid HTML5.
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Enable support for Post Formats.
	add_theme_support( 'post-formats', array(
		'video',
		'gallery',
		'audio',
		'image',
	) );

	// Add theme support for Custom Logo.
	add_theme_support('custom-logo');

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	// Add theme support for custom background
	add_theme_support('custom-background');

	// GUTENBERG

	add_theme_support( 'align-wide' );
}

add_action( 'after_setup_theme', 'cannix_setup' );

// ========================================================
// Set content width
// ========================================================

if ( ! isset( $content_width ) ) {
	$content_width = 1370;
	if ( is_active_sidebar( 'sidebar-1' ) ) {
		$content_width = 940;
	}
}
// ========================================================
// Register Widget areas
// ========================================================

function cannix_widgets_init() {
	// Standard Right Sidebar
	register_sidebar( array(
		'name'          => esc_html__( 'Right Sidebar', 'cannix' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here to appear in your right sidebar on all pages', 'cannix' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	// Slide Out Left Sidebar
	register_sidebar( array(
		'name'          => esc_html__( 'Slide Out Sidebar', 'cannix' ),
		'id'            => 'sidebar-2',
		'description'   => esc_html__( 'Add widgets here to appear in your slide out sidebar on all pages', 'cannix' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	// Instagram Footer
	register_sidebar( array(
		'name'          => esc_html__( 'Instagram Footer', 'cannix' ),
		'id'            => 'instagram-footer',
		'description'   => esc_html__( 'Add your Instagram Widget here', 'cannix' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'cannix_widgets_init' );

// ========================================================
// Enqueue Google Fonts
// ========================================================

if ( ! function_exists( 'cannix_fonts_url' ) ) {

function cannix_fonts_url( $font ) {

	$fonts_url = '';
	 
	 /*
    Translators: If there are characters in your language that are not supported
    by chosen font(s), translate this to 'off'. Do not translate into your own language.
     */
    if ( 'off' !== _x( 'on', 'Google font: on or off', 'cannix' ) ) {
    	if ($font === 'open_sans') {
	        $fonts_url = add_query_arg( 'family', 'Open+Sans:300,400,700,800', "https://fonts.googleapis.com/css" );
	    }
	    if ($font === 'roboto_slab') {
	    	$fonts_url = add_query_arg( 'family', 'Roboto+Slab:400,700', "https://fonts.googleapis.com/css" );
	    }
	    if ($font === 'poppins') {
	    	$fonts_url = add_query_arg( 'family', 'Poppins:400,700', "https://fonts.googleapis.com/css" );
	    }
	    if ($font === 'roboto') {
	        $fonts_url = add_query_arg( 'family', 'Roboto:300,400,700,900', "https://fonts.googleapis.com/css" );
	    }
    }
	 
	return esc_url_raw( $fonts_url );

}

} // Endif function_exists()

// ========================================================
// Enqueue scripts and styles
// ========================================================

if ( ! function_exists( 'cannix_scripts' ) ) {

function cannix_scripts() {
	
	// CSS
	wp_enqueue_style('fontawesome', get_template_directory_uri() . '/css/font-awesome/css/font-awesome.min.css', array(), '4.7.0', 'all');
	if ( '' === get_theme_mod( 'cannix_body_font') || get_theme_mod( 'cannix_body_font' ) ==='open_sans') {
		wp_enqueue_style( 'cannix-google-font-opensans', cannix_fonts_url('open_sans'), array(), null );
	}
	if ( '' === get_theme_mod( 'cannix_title_font') || get_theme_mod( 'cannix_title_font' ) ==='roboto_slab') {
		wp_enqueue_style( 'cannix-google-font-robotoslab', cannix_fonts_url('roboto_slab'), array(), null );
	}
	if ( '' !== get_theme_mod( 'cannix_body_font') && get_theme_mod( 'cannix_body_font' ) ==='roboto') {
		wp_enqueue_style( 'cannix-google-font-roboto', cannix_fonts_url('roboto'), array(), null );
	}
	if ( '' !== get_theme_mod( 'cannix_title_font') && get_theme_mod( 'cannix_title_font' ) ==='poppins') {
		wp_enqueue_style( 'cannix-google-font-poppins', cannix_fonts_url('poppins'), array(), null );
	}
	wp_enqueue_style('cannix-reset', get_template_directory_uri() . '/css/reset.css', array(), '1.0.0', 'all');
	wp_enqueue_style('cannix-style', get_template_directory_uri() . '/style.css', array(), '1.0.0', 'all');

	// Gutenberg
	wp_enqueue_style('cannix-gutenberg', get_template_directory_uri() . '/css/gutenberg.css', array(), '1.0.0', 'all');


	// Slick CSS For gallery format, sliders and carousels
	wp_enqueue_style('cannix-slick', get_template_directory_uri() . '/slick/slick.css', array(), '1.0.0', 'all');

	// Javascript
	wp_enqueue_script( 'cannix-main', get_template_directory_uri() . '/js/main.js', array( 'jquery' ), '1.0.0', false);

	// Slick JS gallery format, sliders and carousels
	wp_enqueue_script( 'cannix-slick', get_template_directory_uri() . '/slick/slick.min.js', array( 'jquery' ), '1.0.0', true);
	wp_enqueue_script( 'cannix-slick-inline', get_template_directory_uri() . '/js/slick-inline.js', array( 'jquery' ), '1.0.0', true);

	// Comments
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// Load WP Masonry
	$homepage_post_layout = get_theme_mod( 'homepage_post_layout', 'masonry' );
	$archive_post_layout = get_theme_mod( 'archive_post_layout', 'masonry' );
	if ( is_home() && $homepage_post_layout === 'masonry' || ! is_search() && ! is_home() && ! is_single( ) && ! is_page() && ! is_404() && $archive_post_layout === 'masonry' || is_search() && have_posts() && $archive_post_layout === 'masonry' )  {
		wp_enqueue_script( 'masonry');
		wp_enqueue_script( 'masonry-init', get_template_directory_uri() . '/js/masonry-init.js', array(), null, true);
	}

}

} // Endif function_exists()

add_action( 'wp_enqueue_scripts', 'cannix_scripts' );

// ========================================================
// Enqueue Gutenberg scripts and styles
// ========================================================
function cannix_gutenberg_styles() {
	// Load the theme styles within Gutenberg.
	 wp_enqueue_style( 'cannix-backend-gutenberg', get_template_directory_uri() . '/css/gutenberg-admin.css', false, '1.0.0', 'all' );
	 wp_enqueue_style( 'cannix-google-font-opensans', cannix_fonts_url('opensans'), array(), null );
	 wp_enqueue_style( 'cannix-google-font-robotoslab', cannix_fonts_url('roboto_slab'), array(), null );
}
add_action( 'enqueue_block_editor_assets', 'cannix_gutenberg_styles' );


// ========================================================
// Custom classes added to body class array
// ========================================================

if ( ! function_exists( 'cannix_body_classes' ) ) {

function cannix_body_classes( $classes ) {

	// Add class to the body if the sidebar is active
	if ( is_home( ) && get_theme_mod( 'homepage_show_sidebar', true )  ||
		is_archive( ) && get_theme_mod( 'archive_show_sidebar', true )  ||
		is_search( ) && get_theme_mod( 'archive_show_sidebar', true ) ||
		is_page( ) && get_theme_mod( 'page_show_sidebar', true ) ||
		is_single( ) && get_theme_mod( 'single_show_sidebar', true ) ) {
		$classes[] = 'has-sidebar';
	}
	// Add layout class to body tag
	if ( ! is_single( ) ) {
		if ( is_home() ) {
			$classes[] = get_theme_mod( 'homepage_post_layout', 'masonry' ) . '-layout';
		} else {
			$classes[] = get_theme_mod( 'archive_post_layout', 'masonry' ) . '-layout';
		}
	}
	// Add class to the body if single post has featured image
	if ( ( is_single() || is_page() ) && has_post_thumbnail( )) {
		$classes[] = 'has-featured-image';
	}
	// Add class to the body if the footer carousel is active
	if ( is_single(  ) && get_theme_mod( 'single_display_related_posts', false ) ||
		 is_home ( ) && get_theme_mod( 'homepage_display_footer_carousel', true ) ) {
		$classes[] = 'has-footer-carousel';
	}
	// Add class to the body if the instagram footer widget area is active
	if ( is_active_sidebar( 'instagram-footer' ) ) {
		$classes[] = 'has-instagram-footer';
	}
	// Check of this is a Gutenberg post
	if ( function_exists( 'the_gutenberg_project' ) && has_blocks( get_the_ID() ) ) {
		 $classes[] = 'gutenberg-post';
	}
	return $classes;
}

} // Endif function_exists()

add_filter( 'body_class', 'cannix_body_classes' );

// ========================================================
// Modify tag cloud argument
// ========================================================

if ( ! function_exists( 'cannix_widget_tag_cloud_args' ) ) {

function cannix_widget_tag_cloud_args( $args ) {

	$args['largest']  = 1;
	$args['smallest'] = 1;
	$args['unit']     = 'em';
	$args['format']   = 'list';

	return $args;
}

} //Endif function_exists()

add_filter( 'widget_tag_cloud_args', 'cannix_widget_tag_cloud_args' );

// ========================================================
// Modify excerpt length
// ========================================================

if ( ! function_exists( 'cannix_excerpt_length' ) ) {

function cannix_excerpt_length( $length ) {

		return 30;

}

} // Endif function-exists()

add_filter( 'excerpt_length', 'cannix_excerpt_length' );

// ========================================================
// Modify Excerpt more
// ========================================================

if ( ! function_exists( 'cannix_excerpt_more' ) ) {

function cannix_excerpt_more( $more ) {

return '...';

}

} // Endif function_exists()

add_filter( 'excerpt_more', 'cannix_excerpt_more' );

// ========================================================
// A gobal post query function, simply return the results
// ========================================================
/* This saves having to duplicate the same query for 
 * widgets, sliders and carousels inside template files
 */

/**
 * Post type
 * Category
 * Post Ids
 * Number of posts
 * Featured
 */

if ( ! function_exists( 'cannix_post_query' ) ) {

function cannix_post_query( $order_by = '', $post_cat = '', $post_in = '', $post_num = 4, $meta_key = '' ) {

	if ( '' !== $post_in ) {

		// Specific posts create an array
		$post_in = explode(',', $post_in );

		$query_args = array(
		    'posts_per_page' => $post_num,
		    'post__in' => $post_in,
		    'ignore_sticky_posts' => 1,
		    'orderby' => 'post__in',
		    'meta_query' => array(array('key' => '_thumbnail_id')), // With thumbnail
		);

	} else {

		$query_args = array(
		    'posts_per_page' => $post_num,
		    'cat' => $post_cat,
		    'meta_key' => $meta_key, // Featured Posts
			'meta_value' => 1,
		    'ignore_sticky_posts' => 1,
		    'orderby' => $order_by, // Popular
		    'meta_query' => array(array('key' => '_thumbnail_id')), // With thumbnail
		);

	}

return $query_args;

}

} // Endif function_exists()

// ========================================================
// Remove width/height attributes from post images
// ========================================================

if ( ! function_exists( 'cannix_img_attr' ) ) {

function cannix_img_attr ($html) {

    return preg_replace('/(width|height)="\d+"\s/', "", $html);

}

} // Endif function_exists()
 
add_filter( 'post_thumbnail_html', 'cannix_img_attr' );

// ========================================================
// Modify the categories wp_list_categories output 
// ========================================================

if ( ! function_exists( 'cannix_filter_category_post_count' ) ) {

function cannix_filter_category_post_count( $cat ) {

   $cat = str_replace('(', '<span>', $cat);
   $cat = str_replace(')', '</span>', $cat);

   return $cat;
}

} // Endif function_exists()

add_filter('wp_list_categories','cannix_filter_category_post_count'); 

// ========================================================
// Generate the custom logo or title of none exists
// Additionally Filter the logo output for improved validation
// ========================================================

if ( ! function_exists( 'cannix_logo' ) ) {

function cannix_logo() {

    $custom_logo_id = get_theme_mod( 'custom_logo' );

    if ( get_theme_mod( 'custom_logo' ) ) { 

    	// We have a custom logo geneate our own output to strip the size attributes
    	$logo = '<img src="' . esc_url( wp_get_attachment_url( $custom_logo_id ) ) . '" alt="' . get_bloginfo( 'name' ) . '" class="custom-logo" />';

    } else {

    	// No logo lets output the blog name
    	$logo = get_bloginfo( 'name' );

    }

    // The filtered output (strip itemprop="url")
    $html = '';
    if ( get_theme_mod( 'custom_logo' ) ) {
    	$html = '<div class="logo-wrapper">';
    }
    $html .= sprintf( '<a href="%1$s" class="custom-logo-link" rel="home">%2$s</a>',
            esc_url( home_url( '/' ) ),
            $logo
        );

    if ( get_theme_mod( 'custom_logo' ) ) {
    	$html .= '</div>';
    }

    return $html;   
}

} // Endif function_exists()

add_filter( 'get_custom_logo', 'cannix_logo' );

// ========================================================
// Add dropcap class to first paragraph
// Only if we have a minimum word count
// ========================================================

if ( ! function_exists( 'cannix_dropcaps' ) ) {

function cannix_dropcaps( $content ) {

	global $post;

	// We don't want to run this for every loop just single

	if ( is_single( ) && get_theme_mod( 'single_display_dropcaps', true ) ) {

		$min_words = 42;

		// Fetch the first paragrah and count the number of words
		$str = wpautop( get_the_content( ) );
		$str = substr( $str, 0, strpos( $str, '</p>' ) + 4 );
		$str = strip_tags($str, '<a><strong><em>');
		$word_count = str_word_count( $str );

		if ( $word_count >= $min_words )  {

			// Filter the first paragraph
	    	return preg_replace('/<p([^>]+)?>/', '<p$1 class="dropcaps">', $content, 1);

		} else {

			// Too few words just output the content with no filters
			return $content;

		}

	} else {

		// Not single
		return $content;

	}

}

} // Endif function_exists()

add_filter('the_content', 'cannix_dropcaps');

// ========================================================
// Create slider for gallery post format
// ========================================================

if ( ! function_exists( 'cannix_post_gallery' ) ) {

function cannix_post_gallery( $archive = false ) {

	global $post;

	$post_attachment_ids = '';
	$gallery_ids['ids'] = '';

	// Fetch all the galleries for this post
	preg_match_all( '#\[gallery\s*.*?\]#s', get_the_content(), $galleries );

		foreach ($galleries as $gallery_array) {

			foreach ($gallery_array as $gallery) {

				if (strpos($gallery,'ids=') === false) {

					// This gallery has no ID's, fetch the images attached to the post instead
					$attachments = get_posts( array(
			            'post_type' => 'attachment',
			            'posts_per_page' => -1,
			            'post_parent' => $post->ID,             
			        ) );

			        if ( $attachments ) {
			            foreach ( $attachments as $attachment ) {

			                $post_attachment_ids .= ',' . $attachment->ID;

			            }
		        	}

				} else {

					// We do have IDs
					$gallery_ids = get_post_gallery( get_the_ID(), false );

				}
			}
		}

	// Create an array and filter only unique values
	$ids = explode( ",", $gallery_ids['ids'] . ',' . $post_attachment_ids );

	$unique_ids = array_unique($ids);

	$gallery_img = '';

	foreach( $unique_ids as $id ) {

		// Only numeric IDs
		if ( absint($id) ) {

			if ( is_single( ) ) {

				$img  = wp_get_attachment_image( $id, 'cannix-default-image' );
				// Related posts image
				$img_url = wp_get_attachment_image_url( $id, 'cannix-carousel-image' );

			} else {

				if ( is_home() && get_theme_mod( 'homepage_post_layout' ) === 'classic' || ! is_home() && get_theme_mod( 'archive_post_layout' ) === 'classic' ) {
					$img = wp_get_attachment_image( $id, 'cannix-default-image' );
					$img_url = wp_get_attachment_image_url( $id, 'cannix-default-image' );
				} else {
					$img = wp_get_attachment_image( $id, 'cannix-archive-image' );
					$img_url = wp_get_attachment_image_url( $id, 'cannix-archive-image' );
				}

				
			}

	    	// For Single.php

	    	if ( is_single( ) && false === $archive || is_home() && get_theme_mod( 'homepage_post_layout' ) === 'classic' || ! is_home() && get_theme_mod( 'archive_post_layout' ) === 'classic' ) {

	    		$gallery_img .= '<div class="post-thumbnail">' . $img . '</div>';

	    	} else {

	    		// We output the gallery image as a background for archive lists just in case we don't have the corrrect size image

	    		if ( is_single( ) ) {
	    			// Related carousel
	    			$gallery_img .= '<a href="' . get_the_permalink() . '">' . cannix_query_post_thumbnail( '', $img_url, 'cannix-carousel-image') . '</a>';
	    		} else {
	    			// Archive
	    			if ( is_home() && get_theme_mod( 'homepage_post_layout' ) === 'classic' || ! is_home() && get_theme_mod( 'archive_post_layout' ) === 'classic' ) {
	    				$gallery_img .= '<a href="' . get_the_permalink() . '">' . cannix_query_post_thumbnail( '', $img_url, 'cannix-default-image') . '</a>';
	    			} else {
		    			$gallery_img .= '<a href="' . get_the_permalink() . '">' . cannix_query_post_thumbnail( '', $img_url, 'cannix-archive-image') . '</a>';
		    		}
	    		}

	    	}

		    // Break after the first foreach if we're not running the gallery (we don't run gallery on archive pages)

			if ( true === $archive ) {

		    	break;

		    }

		}

	} 

	return $gallery_img;

}

} // Endif function_exists()

// ========================================================
// Remove gallery shortcode for gallery post format
// We've already output the gallery in the slider
// ========================================================
/**
 * If you don't want to strip out the galleries simply use
 * standard post format which will not use this function
 * embeded galleries and Jetpack will then function as normal
 */

if ( ! function_exists( 'cannix_content_gallery' ) ) {

function cannix_content_gallery( ) {

	$content = get_the_content();
	// strip all gallery shortcodes
	$content = preg_replace('#\[gallery\s*.*?\]#s', '',  $content );
	$content = apply_filters('the_content', $content );
	
	return $content;

}

} // Endif function_exists()

// ========================================================
// Video post format
// ========================================================

if ( ! function_exists( 'cannix_video_embed' ) ) {

function cannix_video_embed() {

	$content = apply_filters( 'the_content', get_the_content() );
	$video = false;

	// Only get video from the content if a playlist isn't present.
	if ( false === strpos( $content, 'wp-playlist-script' ) ) {
		$video = get_media_embedded_in_content( $content, array( 'video', 'object', 'embed', 'iframe' ) );
	}

	foreach ( $video as $video_html ) {
		return $video_html;
		break; // In case we have more than one video lets break after the first iteration
	}

}


} // Endif function_exists()

// ========================================================
// audio post format
// ========================================================

if ( ! function_exists( 'cannix_audio_embed' ) ) {

function cannix_audio_embed() {

	$content = apply_filters( 'the_content', get_the_content() );
	$audio = false;

	// Only get audio from the content if a playlist isn't present.
	if ( false === strpos( $content, 'wp-playlist-script' ) ) {
		$audio = get_media_embedded_in_content( $content, array( 'audio', 'object', 'embed', 'iframe' ) );
	}

	foreach ( $audio as $audio_html ) {
		return $audio_html;
		break; // In case we have more than one video lets break after the first iteration
	}

}

} // Endif function_exists()

// ========================================================
// Wrap video embeds with a generic class
// ========================================================

if ( ! function_exists( 'cannix_wrap_embed_video' ) ) {

function cannix_wrap_embed_video( $html ) {

    	// If gutenberg do nothing Gutenberg outputs it's own wrapper
    	if ( function_exists( 'the_gutenberg_project' ) && has_blocks( get_the_ID() ) ) {

    		return $html;

    	} else {
	
		    return '<div class="embed-wrap">' . $html . '</div>';

		}

}

} // Endif function_exists()

add_filter( 'embed_oembed_html', 'cannix_wrap_embed_video' );

// ========================================================
// Display social media icons
// See cannix_get_social_sites in customizer.php
// ========================================================

if ( ! function_exists( 'cannix_show_social_icons' ) ) {

function cannix_show_social_icons( $show_text = false ) {

	  $social_sites = cannix_get_social_sites( );

     // Any inputs that aren't empty are stored in $active_sites array
     foreach( $social_sites as $social_site ) {
         if ( strlen( get_theme_mod( $social_site ) ) > 0 )  {

             $active_sites[] = $social_site;
         }
     }
     // For each active social site create the link and icon
     if ( ! empty( $active_sites ) ) {

         foreach ( $active_sites as $active_site ) {

         	$text = ( true === $show_text ? $active_site : '' );
            $show_text_class = ( true === $show_text ? ' show-text' : '' );
         	$link_class = $active_site;
         	$icon_class = $active_site;
         	// Some overrides
         	if ( $link_class === '500px') {
         		$link_class = 'px500';
         	}
         	if ( $icon_class === 'github') {
         		$icon_class = 'git';
         	}
         	if ( $icon_class === 'reddit' ) {
         		$icon_class = 'reddit-alien';
         	}
         	if ( $icon_class === 'email' ) {
         		$icon_class = 'envelope';
         	}
         	// End overrides
         	if ( $active_site === 'email' ) {
         		echo '<a href="mailto:' . esc_attr( get_theme_mod( $active_site ) ) . '" class="' . strtolower( esc_attr( $link_class ) ) . $show_text_class . '">';
         	} else {
	            echo '<a href="' . esc_url( get_theme_mod( $active_site ) ) . '" class="' . strtolower( esc_attr( $link_class ) ) . $show_text_class . '">';
	         } 
             // if ( $active_site === 'email' ) {
             //     echo '<i class="fa fa-envelope"></i>';
             // } else { 
             	echo '<span><i class="fa fa-' . esc_attr( $icon_class ) . '"></i></span>' . esc_attr( $text ) . '';
             //}
             echo '</a>';
             }

     }

}

} // Endif function_exists()

// ========================================================
// Check that we have the specified media size for posts
// ========================================================
/**
 * Because this theme uses a grid layout WITHOUT Masonry
 * The images must be the same size to prevent alignment issues
 * If this is a pre-existing install the images may not be the
 * correct size until thumbnails are regenerated
 * This function checks for the correct image size and outputs
 * an alternative post thumbnail display if required
 */

if ( ! function_exists( 'cannix_query_post_thumbnail' ) ) {

function cannix_query_post_thumbnail( $custom_post_id = '', $img_url = '', $image_size ) {

	global $post;

	global $_wp_additional_image_sizes; 

	// The size required by theme
	$required_width = $_wp_additional_image_sizes['' . esc_attr( $image_size ) . '']['width'];
	$required_height = $_wp_additional_image_sizes['' . esc_attr( $image_size ) . '']['height'];

	// Query string to check
	$size_string = $required_width . 'x' . $required_height;

	if ( '' !== $custom_post_id ) {
		$thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $custom_post_id ), esc_attr( $image_size ) );
	} else {
		$thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), esc_attr( $image_size ) );
	}

	$thumbnail_url = $thumbnail_src[0];

	// Do we have a match
	if ( strpos( $thumbnail_url, $size_string ) ) {

		if ( get_post( get_post_thumbnail_id() )->post_excerpt && $image_size === 'cannix-hero-image' ) {

			$output = '<figure>';
			$output .= the_post_thumbnail( $image_size );
			$output .= '<figcaption>' . wp_kses_post( get_post( get_post_thumbnail_id() )->post_excerpt ) . '</figcaption>'; // displays the image caption
			$output .= '</figure>';

			return $output;

		    } else {

		    	if ( '' !== $custom_post_id ) {

		    	return get_the_post_thumbnail( $custom_post_id, $image_size );

		    } else {

		    	return the_post_thumbnail( $image_size );

		    }

		    }

	} else {

		$thumbnail_background = ( '' !== $custom_post_id ? get_the_post_thumbnail_url( $custom_post_id ) : get_the_post_thumbnail_url() );

		$background_image = ('' !== $img_url ? esc_url( $img_url ) : $thumbnail_background );

		$output = '<img src="' . get_template_directory_uri() . '/media/' . esc_attr( $image_size ) . '-placeholder.png" alt="placeholder">';
		$output .= '<div class="thumbnail-background" style="background: url(' . esc_url( $background_image ) . ')"></div>';

		if ( '' !== $img_url ) {
			// We passed an image url from the cannix_post_gallery() function, return the results
			return $output;
		} else {
			return $output;
		}

	}

}

} // Endif function_exists()

// ========================================================
// Output the related category links in post meta
// ========================================================
/**
 * This function only exists to handle Many category EDGE case
 * We use it for archive loops
 */

if ( ! function_exists( 'cannix_get_category' ) ) {

function cannix_get_category() {

	global $post;

	$category = get_the_category($post->id);
	$limit = 2;
	$count = 0;

	foreach($category as $the_category) {

		$count++;

			echo '<span class="category-link-bg"><a href="' . get_category_link( $the_category->cat_ID ) . '">' . $the_category->cat_name . '</a></span>';

			// Break if we have more then 2 categories
			if ( count( $category ) > $limit && $count == $limit ) {
				echo ' . . .';
				break;
			}
		}

}

} // Endif function_exists()

// ========================================================
// Fetch latest comments for post in loop
// ========================================================

if ( ! function_exists( 'cannix_comments_loop' ) ) {

function cannix_comments_loop() {

	global $post;

	$show_comment_count = ( get_theme_mod( 'archive_display_meta_comment_count', true ) ? ' has-comment-count' : '' );

  	//Fetch the comments for this post
  	$comments = get_comments(array(
    	'post_id' => $post->ID,
    	'status' => 'approve',
    	'number' => '2'
    ));

	if ( ! post_password_required( ) ) :

		if ( ! empty( $comments ) ) {

		echo '<ul class="loop-comments' . esc_attr( $show_comment_count ) . '">';

		foreach( $comments as $comment ) {

		echo '<li>' . get_avatar( $comment->comment_author_email, 24 ) . '<a href="' . esc_url( get_permalink( $comment->comment_post_ID ) . '#comment-' . $comment->comment_ID ) . '"><cite>' . $comment->comment_author . '</cite></a><p>'  . substr($comment->comment_content, 0, 95) . '...</p>' . '<time datetime="' . $comment->comment_date . '">' . date( get_option( 'date_format' ), strtotime($comment->comment_date)) . '</time></li>';

		}

		echo '</ul>';

		}

	endif;

}

} // Endif function_exists()

// ========================================================
// Prepend/Append primary nav with toggle icons
// ========================================================

if ( ! function_exists( 'cannix_primary_nav_icons' ) ) {

function cannix_primary_nav_icons($items, $args) {
 
	if( $args->menu_id == 'primary-nav' ) {

    		// The mobile only slide menu toggle icon
            $menu_toggle = '<li class="toggle-menu"><i class="fa fa-bars"></i></li>';
            $nav_logo = '<li class="nav-logo">' . cannix_logo() . '</li>';
            $search_toggle = '<li class="toggle-search"><i class="fa fa-search"></i></li>';

            $newmenu = $menu_toggle . $nav_logo . $items . $search_toggle;

       		return $newmenu;
 
    } else {
 
        // for all other menus
        return $items;

    }
 
}

} // Endif function_exists()
 
add_filter('wp_nav_menu_items', 'cannix_primary_nav_icons', 10, 2);

// ========================================================
// Calculate reading time for each post
// ========================================================

if ( ! function_exists( 'cannix_read_time' ) ) {

function cannix_read_time() {
    $post_content = get_post_field( 'post_content' );
    $word_count = str_word_count( strip_tags( $post_content ) );
    $readingtime = ceil( $word_count / 300);

    $readtime = $readingtime . esc_html__( ' minute read', 'cannix' );

    return $readtime;
}

} // Endif function_exists()

// ========================================================
// Article Colour Picker output the inline style
// ========================================================

function cannix_inline_article_style( $bg = '', $color = '' ) {

	global $post;

	$custom = get_post_custom( $post->ID );
	$article_background = ( isset( $custom['article_bgcolour'][0] ) ) ? $custom['article_bgcolour'][0] : '';
	$article_entrycolor = ( isset( $custom['article_entrycolour'][0] ) ) ? $custom['article_entrycolour'][0] : '';

	$output = ' style="';

	if ( ! is_single() ) {

		$color = '';
		if ( $article_entrycolor && false !== $color ) {
			$color = 'color:' . esc_attr( $article_entrycolor ) . '';
		}

		$background = '';
		if ( $article_background && false !== $bg ) {
			$background =  'background:' . esc_attr( $article_background ) . ';';
		}


		$output .= $background . $color . '"';

		return $output;

	}

}

// ========================================================
// Customizer additions
// ========================================================
require get_parent_theme_file_path( '/inc/customizer.php' );
require get_parent_theme_file_path( '/inc/theme_colours.php' );

// ========================================================
// TGM Plugin Activation
// ========================================================
require_once get_template_directory() . '/inc/class-tgm-plugin-activation.php';

function cannix_register_required_plugins() {

	$plugins = array(

		array(
			'name'               => 'Cannix Theme Plugins', // The plugin name.
			'slug'               => 'cannix-theme-plugins', // The plugin slug (typically the folder name).
			'source'             => 'http://3forty.media/plugins/cannix-theme-plugins.zip', // The plugin source.
			'required'           => true, // If false, the plugin is only 'recommended' instead of required.
			'version'            => '1.3', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
			'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			'force_deactivation' => true, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
			'external_url'       => '', // If set, overrides default API URL and points to an external URL.
			'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
		),
		array(
			'name'               => 'WP Instagram Widget', // The plugin name.
			'slug'               => 'wp-instagram-widget-master', // The plugin slug (typically the folder name).
			'source'             => 'https://github.com/scottsweb/wp-instagram-widget/archive/master.zip', // The plugin source.
			'required'           => false, // If false, the plugin is only 'recommended' instead of required.
			'version'            => '2.0.3', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
			'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
			'external_url'       => '', // If set, overrides default API URL and points to an external URL.
			'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
		),
		array(
			'name'      => 'Regenerate Thumbnails',
			'slug'      => 'regenerate-thumbnails',
			'required'  => true,
		),
		array(
			'name'      => 'Contact Form 7',
			'slug'      => 'contact-form-7',
			'required'  => false,
		),
		array(
			'name'      => 'MailChimp for WordPress',
			'slug'      => 'mailchimp-for-wp',
			'required'  => false,
		),

	);

	$config = array(
		'id'           => 'cannix',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.

	);

	tgmpa( $plugins, $config );
}

add_action( 'tgmpa_register', 'cannix_register_required_plugins' );


