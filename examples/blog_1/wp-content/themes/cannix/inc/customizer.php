<?php
/**
 * Cannix: Customizer
 *
 * @package WordPress
 * @subpackage Cannix
 * @since 1.0
 * @version 1.2
 */


function cannix_customize_register( $wp_customize ) {

	// ========================================================
	// Layout Options
	// ========================================================
	$wp_customize->add_section( 'layout_options', array(
		'title'    => esc_html__( 'Cannix: Layout Settings', 'cannix' ),
		'priority' => 130, // Before Additional CSS.
	) );

	// Add Setting
	$wp_customize->add_setting( 'homepage_post_layout', array(
		'default'           => 'masonry',
		'sanitize_callback' => 'cannix_sanitize_post_layout',
	) );

	// Control Options
	$wp_customize->add_control( 'homepage_post_layout', array(
		'label'       => esc_html__( 'Homepage Post Layout', 'cannix' ),
		'section'     => 'layout_options',
		'type'        => 'select',
		'choices'     => array(
			'list' => esc_html__( 'List', 'cannix' ),
			'grid' => esc_html__( 'Grid', 'cannix' ),
			'masonry' => esc_html__( 'Masonry', 'cannix' ),
			'classic' => esc_html__( 'Classic', 'cannix' ),
		),
	) );

	// Add Setting
	$wp_customize->add_setting( 'homepage_show_sidebar', array(
		'default'           => true,
		'sanitize_callback' => 'cannix_sanitize_checkbox',
	) );

	// Control Options
	$wp_customize->add_control( 'homepage_show_sidebar', array(
		'label'       => esc_html__( 'Display Sidebar on Homepage', 'cannix' ),
		'section'     => 'layout_options',
		'type'        => 'checkbox',
	) );

	// Add Setting
	$wp_customize->add_setting( 'archive_post_layout', array(
		'default'           => 'masonry',
		'sanitize_callback' => 'cannix_sanitize_post_layout',
	) );

	// Control Options
	$wp_customize->add_control( 'archive_post_layout', array(
		'label'       => esc_html__( 'Archive Post Layout', 'cannix' ),
		'section'     => 'layout_options',
		'type'        => 'select',
		'choices'     => array(
			'list' => esc_html__( 'List', 'cannix' ),
			'grid' => esc_html__( 'Grid', 'cannix' ),
			'masonry' => esc_html__( 'Masonry', 'cannix' ),
			'classic' => esc_html__( 'Classic', 'cannix' ),
		),
	) );

	// Add Setting
	$wp_customize->add_setting( 'archive_show_sidebar', array(
		'default'           => true,
		'sanitize_callback' => 'cannix_sanitize_checkbox',
	) );

	// Control Options
	$wp_customize->add_control( 'archive_show_sidebar', array(
		'label'       => esc_html__( 'Display Sidebar on Archive', 'cannix' ),
		'section'     => 'layout_options',
		'type'        => 'checkbox',
	) );

	// Add Setting
	$wp_customize->add_setting( 'show_post_excerpt', array(
		'default'           => true,
		'sanitize_callback' => 'cannix_sanitize_checkbox',
	) );

	// Control Options
	$wp_customize->add_control( 'show_post_excerpt', array(
		'label'       => esc_html__( 'Show Post Excerpt', 'cannix' ),
		'section'     => 'layout_options',
		'type'        => 'checkbox',
	) );

	// Add Setting
	$wp_customize->add_setting( 'show_post_loop_comments', array(
		'default'           => true,
		'sanitize_callback' => 'cannix_sanitize_checkbox',
	) );

	// Control Options
	$wp_customize->add_control( 'show_post_loop_comments', array(
		'label'       => esc_html__( 'Show Recent Comments in Post Loop', 'cannix' ),
		'section'     => 'layout_options',
		'type'        => 'checkbox',
	) );

	// Add Setting
	$wp_customize->add_setting( 'archive_display_meta_comment_count', array(
		'default'           => true,
		'sanitize_callback' => 'cannix_sanitize_checkbox',
	) );

	// Control Options
	$wp_customize->add_control( 'archive_display_meta_comment_count', array(
		'label'       => esc_html__( 'Display Comment Count', 'cannix' ),
		'section'     => 'layout_options',
		'type'        => 'checkbox',
	) );

	// Add Setting
	$wp_customize->add_setting( 'archive_display_meta_author', array(
		'default'           => true,
		'sanitize_callback' => 'cannix_sanitize_checkbox',
	) );

	// Control Options
	$wp_customize->add_control( 'archive_display_meta_author', array(
		'label'       => esc_html__( 'Display Post Author Meta', 'cannix' ),
		'section'     => 'layout_options',
		'type'        => 'checkbox',
	) );

	// Add Setting
	$wp_customize->add_setting( 'archive_display_meta_date', array(
		'default'           => true,
		'sanitize_callback' => 'cannix_sanitize_checkbox',
	) );

	// Control Options
	$wp_customize->add_control( 'archive_display_meta_date', array(
		'label'       => esc_html__( 'Display Post Date Meta', 'cannix' ),
		'section'     => 'layout_options',
		'type'        => 'checkbox',
	) );

	// Add Setting
	$wp_customize->add_setting( 'archive_display_meta_category', array(
		'default'           => true,
		'sanitize_callback' => 'cannix_sanitize_checkbox',
	) );

	// Control Options
	$wp_customize->add_control( 'archive_display_meta_category', array(
		'label'       => esc_html__( 'Display Post Category Meta', 'cannix' ),
		'section'     => 'layout_options',
		'type'        => 'checkbox',
	) );

	// Add Setting
	$wp_customize->add_setting( 'archive_display_meta_read_time', array(
		'default'           => true,
		'sanitize_callback' => 'cannix_sanitize_checkbox',
	) );

	// Control Options
	$wp_customize->add_control( 'archive_display_meta_read_time', array(
		'label'       => esc_html__( 'Display Post Read Time Meta', 'cannix' ),
		'section'     => 'layout_options',
		'type'        => 'checkbox',
	) );

	// Only load the share options if our plugin is loaded
	if ( function_exists( 'cannix_customizer_settings' ) ) :

	// Add Setting
	$wp_customize->add_setting( 'archive_display_sharepost', array(
		'default'           => true,
		'sanitize_callback' => 'cannix_sanitize_checkbox',
	) );

	// Control Options
	$wp_customize->add_control( 'archive_display_sharepost', array(
		'label'       => esc_html__( 'Display Share Icons in Post Loop', 'cannix' ),
		'section'     => 'layout_options',
		'type'        => 'checkbox',
	) );

	endif;

	// Add Setting
	$wp_customize->add_setting( 'page_show_sidebar', array(
		'default'           => true,
		'sanitize_callback' => 'cannix_sanitize_checkbox',
	) );

	// Control Options
	$wp_customize->add_control( 'page_show_sidebar', array(
		'label'       => esc_html__( 'Display Sidebar on Pages', 'cannix' ),
		'section'     => 'layout_options',
		'type'        => 'checkbox',
	) );

	// ========================================================
	// Single Options Section
	// ========================================================
	$wp_customize->add_section( 'single_options', array(
		'title'    => esc_html__( 'Cannix: Single Post Settings', 'cannix' ),
		'priority' => 130, // Before Additional CSS.
	) );


	// Add Setting
	$wp_customize->add_setting( 'single_show_sidebar', array(
		'default'           => true,
		'sanitize_callback' => 'cannix_sanitize_checkbox',
	) );

	// Control Options
	$wp_customize->add_control( 'single_show_sidebar', array(
		'label'       => esc_html__( 'Display Sidebar', 'cannix' ),
		'section'     => 'single_options',
		'type'        => 'checkbox',
	) );

	// Add Setting
	$wp_customize->add_setting( 'single_display_dropcaps', array(
		'default'           => true,
		'sanitize_callback' => 'cannix_sanitize_checkbox',
	) );

	// Control Options
	$wp_customize->add_control( 'single_display_dropcaps', array(
		'label'       => esc_html__( 'Enable DropCaps', 'cannix' ),
		'section'     => 'single_options',
		'type'        => 'checkbox',
	) );

	// Add Setting
	$wp_customize->add_setting( 'single_display_authorbio', array(
		'default'           => true,
		'sanitize_callback' => 'cannix_sanitize_checkbox',
	) );

	// Control Options
	$wp_customize->add_control( 'single_display_authorbio', array(
		'label'       => esc_html__( 'Display Author Bio', 'cannix' ),
		'section'     => 'single_options',
		'type'        => 'checkbox',
	) );

	// Add Setting
	$wp_customize->add_setting( 'single_display_custom_excerpt', array(
		'default'           => true,
		'sanitize_callback' => 'cannix_sanitize_checkbox',
	) );

	// Control Options
	$wp_customize->add_control( 'single_display_custom_excerpt', array(
		'label'       => esc_html__( 'Display Custom Excerpt', 'cannix' ),
		'section'     => 'single_options',
		'type'        => 'checkbox',
	) );

	// Add Setting
	$wp_customize->add_setting( 'single_display_meta_comment_count', array(
		'default'           => true,
		'sanitize_callback' => 'cannix_sanitize_checkbox',
	) );

	// Control Options
	$wp_customize->add_control( 'single_display_meta_comment_count', array(
		'label'       => esc_html__( 'Display Comment Count', 'cannix' ),
		'section'     => 'single_options',
		'type'        => 'checkbox',
	) );

	// Add Setting
	$wp_customize->add_setting( 'single_display_meta_author', array(
		'default'           => true,
		'sanitize_callback' => 'cannix_sanitize_checkbox',
	) );

	// Control Options
	$wp_customize->add_control( 'single_display_meta_author', array(
		'label'       => esc_html__( 'Display Post Author Meta', 'cannix' ),
		'section'     => 'single_options',
		'type'        => 'checkbox',
	) );

	// Add Setting
	$wp_customize->add_setting( 'single_display_meta_date', array(
		'default'           => true,
		'sanitize_callback' => 'cannix_sanitize_checkbox',
	) );

	// Control Options
	$wp_customize->add_control( 'single_display_meta_date', array(
		'label'       => esc_html__( 'Display Post Date Meta', 'cannix' ),
		'section'     => 'single_options',
		'type'        => 'checkbox',
	) );

	// Add Setting
	$wp_customize->add_setting( 'single_display_meta_category', array(
		'default'           => true,
		'sanitize_callback' => 'cannix_sanitize_checkbox',
	) );

	// Control Options
	$wp_customize->add_control( 'single_display_meta_category', array(
		'label'       => esc_html__( 'Display Post Category Meta', 'cannix' ),
		'section'     => 'single_options',
		'type'        => 'checkbox',
	) );

	// Only load the related posts and share options if our plugin is loaded
	if ( function_exists( 'cannix_customizer_settings' ) ) :

	// Add Setting
	$wp_customize->add_setting( 'single_display_sharepost', array(
		'default'           => true,
		'sanitize_callback' => 'cannix_sanitize_checkbox',
	) );

	// Control Options
	$wp_customize->add_control( 'single_display_sharepost', array(
		'label'       => esc_html__( 'Display Post Share Icons', 'cannix' ),
		'section'     => 'single_options',
		'type'        => 'checkbox',
	) );

	$wp_customize->add_setting( 'single_sharepost_position', array(
			'default'           => 'top-bottom',
			'sanitize_callback' => 'cannix_sanitize_sharepost_position',
		) );

	$wp_customize->add_control( 'single_sharepost_position', array(
		'label'       => esc_html__( 'Share Icons Position', 'cannix' ),
		'section'     => 'single_options',
		'type'        => 'select',
		'choices'     => array(
			'top-bottom' => esc_html__( 'Top and Bottom', 'cannix' ),
			'top' => esc_html__( 'Top Only', 'cannix' ),
			'bottom' => esc_html__( 'Bottom Only', 'cannix' ),
		),
	) );

	// Add Setting
	$wp_customize->add_setting( 'single_display_related_posts', array(
		'default'           => true,
		'sanitize_callback' => 'cannix_sanitize_checkbox',
	) );

	// Control Options
	$wp_customize->add_control( 'single_display_related_posts', array(
		'label'       => esc_html__( 'Display Related Posts', 'cannix' ),
		'section'     => 'single_options',
		'type'        => 'checkbox',
	) );

	// Add Setting
	$wp_customize->add_setting( 'single_related_title', array(
		'default'           => esc_html__( 'Related Posts', 'cannix' ),
		'sanitize_callback' => 'cannix_sanitize_text',
	) );

	// Control Options
	$wp_customize->add_control( 'single_related_title', array(
		'label'       => esc_html__( 'Related Posts Title', 'cannix' ),
		'description'    => esc_html__( 'Leave empty if you do not want a title', 'cannix' ),
		'section'     => 'single_options',
		'type'        => 'text',
	) );
	// Add Setting
	$wp_customize->add_setting( 'related_posts_carousel_post_num', array(
		'default'           => '4',
		'sanitize_callback' => 'absint',
	) );

	// Control Options
	$wp_customize->add_control( 'related_posts_carousel_post_num', array(
		'label'       => esc_html__( 'How many posts do you want to display', 'cannix' ),
		'section'     => 'single_options',
		'description' => esc_html__( 'More than 4 will activate the carousel', 'cannix' ),
		'type'        => 'number',
	) );

	// Add Setting
	$wp_customize->add_setting( 'related_posts_carousel_rownum', array(
		'default'           => '4',
		'sanitize_callback' => 'absint',
	) );

	// Control Options
	$wp_customize->add_control( 'related_posts_carousel_rownum', array(
		'label'       => esc_html__( 'How many posts to show per row', 'cannix' ),
		'section'     => 'single_options',
		'type'        => 'select',
		'choices'     => array(
			'2' => esc_html__( '2', 'cannix' ),
			'3' => esc_html__( '3', 'cannix' ),
			'4' => esc_html__( '4', 'cannix' ),
		),
	) );

	$wp_customize->add_setting( 'related_posts_carousel_method', array(
			'default'           => 'category',
			'sanitize_callback' => 'cannix_sanitize_relate_method',
		) );

		$wp_customize->add_control( 'related_posts_carousel_method', array(
			'label'       => esc_html__( 'Relationship Method', 'cannix' ),
			'section'     => 'single_options',
			'type'        => 'select',
			'choices'     => array(
				'tags' => esc_html__( 'Tags', 'cannix' ),
				'category' => esc_html__( 'Category', 'cannix' ),
			),
		) );

	endif;

	// Check if our plugin is installed
	if ( function_exists( 'cannix_customizer_settings' ) ) :


	// ========================================================
	// Featured Slider
	// ========================================================
	$wp_customize->add_section( 'featured_area_options', array(
		'title'    => esc_html__( 'Cannix: Featured Area Settings', 'cannix' ),
		'priority' => 140, // Before Additional CSS.
	) );

	// Add Setting
	$wp_customize->add_setting( 'display_featured_area', array(
		'default'           => true,
		'sanitize_callback' => 'cannix_sanitize_checkbox',
	) );

	// Control Options
	$wp_customize->add_control( 'display_featured_area', array(
		'label'       => esc_html__( 'Check To Display Featured Area', 'cannix' ),
		'section'     => 'featured_area_options',
		'type'        => 'checkbox',
		// 'description' => esc_html__( 'You can enable or disable the featured area', 'cannix' ),
	) );

	// Add Setting
	$wp_customize->add_setting( 'featured_post_layout', array(
		'default'           => 'default',
		'sanitize_callback' => 'cannix_sanitize_featured_layout',
	) );

	// Control Options
	$wp_customize->add_control( 'featured_post_layout', array(
		'label'       => esc_html__( 'Style', 'cannix' ),
		'section'     => 'featured_area_options',
		'type'        => 'select',
		'choices'     => array(
			'default' => esc_html__( 'Default', 'cannix' ),
			'cover' => esc_html__( 'Cover', 'cannix' ),
		),
	) );

	// Add Setting
	$wp_customize->add_setting( 'featured_post_type', array(
		'default'           => 'recent',
		'sanitize_callback' => 'cannix_sanitize_post_type',
	) );

	// Control Options
	$wp_customize->add_control( 'featured_post_type', array(
		'label'       => esc_html__( 'Choose the type of posts you want to display', 'cannix' ),
		'section'     => 'featured_area_options',
		'type'        => 'radio',
		'description' => esc_html__( 'Make sure you upload a featured image to your posts for them to be included in the slider', 'cannix' ),
		'choices'     => array(
			'recent' => esc_html__( 'Recent Posts', 'cannix' ),
			'popular' => esc_html__( 'Popular Posts', 'cannix' ),
			'featured' => esc_html__( 'Featured Posts', 'cannix' ), // Featured meta box is bundled with our plugin
		),
	) );

	// Add Setting
	$wp_customize->add_setting( 'featured_post_cat', array(
		'default'           => '',
		'sanitize_callback' => 'absint',
	) );

	// Control Options
	$wp_customize->add_control( 'featured_post_cat', array(
		'label'       => esc_html__( 'Display posts from a category', 'cannix' ),
		'section'     => 'featured_area_options',
		'description' => esc_html__( 'Tip: You can use in combination with post type selection for category specific filters', 'cannix' ),
		'type'        => 'select',
		'choices'     => cannix_get_blog_categories(),
	) );

	/**
	 * Post ID's
	 */
	$wp_customize->add_setting( 'featured_post_ids', array(
		'default'           => '',
		'sanitize_callback' => 'cannix_sanitize_text',
	) );

	// Control Options
	$wp_customize->add_control( 'featured_post_ids', array(
		'label'       => esc_html__( 'Post IDs', 'cannix' ),
		'description' => esc_html__( 'Enter a comma separated List of post IDs. Post Type and Category will be ignored', 'cannix' ),
		'section'     => 'featured_area_options',
		'type'        => 'text',
	) );

	// Add Setting
	$wp_customize->add_setting( 'featured_post_num', array(
		'default'           => '3',
		'sanitize_callback' => 'absint',
	) );

	// Control Options
	$wp_customize->add_control( 'featured_post_num', array(
		'label'       => esc_html__( 'How many posts do you want to display', 'cannix' ),
		'section'     => 'featured_area_options',
		'type'        => 'number',
	) );

	// Add Setting
	$wp_customize->add_setting( 'featured_post_slidenum', array(
		'default'           => '1',
		'sanitize_callback' => 'absint',
	) );

	// Control Options
	$wp_customize->add_control( 'featured_post_slidenum', array(
		'label'       => esc_html__( 'How many slides do you want to to show', 'cannix' ),
		'section'     => 'featured_area_options',
		'type'        => 'select',
		'choices'     => array(
			'1' => esc_html__( '1', 'cannix' ),
			'2' => esc_html__( '2', 'cannix' ),
		),
	) );

	// Add Setting
	$wp_customize->add_setting( 'featured_display_excerpt', array(
		'default'           => false,
		'sanitize_callback' => 'cannix_sanitize_checkbox',
	) );

	// Control Options
	$wp_customize->add_control( 'featured_display_excerpt', array(
		'label'       => esc_html__( 'Display Excerpt', 'cannix' ),
		'section'     => 'featured_area_options',
		'type'        => 'checkbox',
	) );

	// Add Setting
	$wp_customize->add_setting( 'featured_display_author', array(
		'default'           => true,
		'sanitize_callback' => 'cannix_sanitize_checkbox',
	) );

	// Control Options
	$wp_customize->add_control( 'featured_display_author', array(
		'label'       => esc_html__( 'Display Author Meta', 'cannix' ),
		'section'     => 'featured_area_options',
		'type'        => 'checkbox',
	) );

	// Add Setting
	$wp_customize->add_setting( 'featured_display_date', array(
		'default'           => true,
		'sanitize_callback' => 'cannix_sanitize_checkbox',
	) );

	// Control Options
	$wp_customize->add_control( 'featured_display_date', array(
		'label'       => esc_html__( 'Display Date Meta', 'cannix' ),
		'section'     => 'featured_area_options',
		'type'        => 'checkbox',
	) );

	// Add Setting
	$wp_customize->add_setting( 'featured_display_category', array(
		'default'           => true,
		'sanitize_callback' => 'cannix_sanitize_checkbox',
	) );

	// Control Options
	$wp_customize->add_control( 'featured_display_category', array(
		'label'       => esc_html__( 'Display Category Meta', 'cannix' ),
		'section'     => 'featured_area_options',
		'type'        => 'checkbox',
	) );

	// Add Setting
	$wp_customize->add_setting( 'featured_display_comment_count', array(
		'default'           => true,
		'sanitize_callback' => 'cannix_sanitize_checkbox',
	) );

	// Control Options
	$wp_customize->add_control( 'featured_display_comment_count', array(
		'label'       => esc_html__( 'Display Comment Count', 'cannix' ),
		'section'     => 'featured_area_options',
		'type'        => 'checkbox',
	) );


	// ========================================================
	// Carousel Post Loop Settings
	// ========================================================
	/**
	 * We have a lot of carousels so we'll group them into
	 * one single Carousel settings panel for ease
	 * These can be static displays or carousels dependant
	 * on the customizer settings
	 */

	// Add PANEL
	$wp_customize->add_panel( 'carousel_settings', array(
	  'title' => esc_html__( 'Cannix: Custom Post Display Locations', 'cannix' ),
	  'description' => esc_html__( 'Edit the Post Carousels', 'cannix'),
	  'priority' => 140,
	  ) );

	// ========================================================
	// Before Content Carousel
	// ========================================================

	$wp_customize->add_section( 'before_content_post_carousel_options', array(
		'title'    => esc_html__( 'Cannix: Before Content Posts Display', 'cannix' ),
		'priority' => 130, // Before Additional CSS.
		'panel' => 'carousel_settings',
		'description' => esc_html__( 'The Before Content Post Display is displayed after the featured area (if active) and before the post loop and sidebar. More than 4 posts will activate a carousel', 'cannix' ),
	) );

	// Add Setting
	$wp_customize->add_setting( 'before_content_carousel', array(
		'default'           => true,
		'sanitize_callback' => 'cannix_sanitize_checkbox',
	) );

	// Control Options
	$wp_customize->add_control( 'before_content_carousel', array(
		'label'       => esc_html__( 'Check To Display Posts', 'cannix' ),
		'section'     => 'before_content_post_carousel_options',
		'type'        => 'checkbox',
	) );

	// Add Setting
	$wp_customize->add_setting( 'before_content_carousel_title', array(
		'default'           => esc_html__( 'Recent Posts', 'cannix' ),
		'sanitize_callback' => 'cannix_sanitize_text',
	) );

	// Control Options
	$wp_customize->add_control( 'before_content_carousel_title', array(
		'label'       => esc_html__( 'Title', 'cannix' ),
		'description'    => esc_html__( 'Leave empty if you do not want a title', 'cannix' ),
		'section'     => 'before_content_post_carousel_options',
		'type'        => 'text',
	) );

	// Add Setting
	$wp_customize->add_setting( 'before_content_carousel_post_type', array(
		'default'           => 'recent',
		'sanitize_callback' => 'cannix_sanitize_post_type',
	) );

	// Control Options
	$wp_customize->add_control( 'before_content_carousel_post_type', array(
		'label'       => esc_html__( 'Choose the type of posts you want to display', 'cannix' ),
		'section'     => 'before_content_post_carousel_options',
		'type'        => 'radio',
		'description' => esc_html__( 'If displaying featured posts, make sure to check the posts you want to feature in the edit post dashboard', 'cannix' ),
		'choices'     => array(
			'recent' => esc_html__( 'Recent Posts', 'cannix' ),
			'popular' => esc_html__( 'Popular Posts', 'cannix' ),
			'featured' => esc_html__( 'Featured Posts', 'cannix' ), // Featured meta box is bundled with our plugin
		),
	) );

	// Add Setting
	$wp_customize->add_setting( 'before_content_carousel_post_cat', array(
		'default'           => '',
		'sanitize_callback' => 'absint',
	) );

	// Control Options
	$wp_customize->add_control( 'before_content_carousel_post_cat', array(
		'label'       => esc_html__( 'Display posts from a category', 'cannix' ),
		'section'     => 'before_content_post_carousel_options',
		'description' => esc_html__( 'Tip: You can use in combination with post type selection for category specific filters', 'cannix' ),
		'type'        => 'select',
		'choices'     => cannix_get_blog_categories(),
	) );

	/**
	 * Post ID's
	 */
	$wp_customize->add_setting( 'before_content_carousel_post_ids', array(
		'default'           => '',
		'sanitize_callback' => 'cannix_sanitize_text',
	) );

	// Control Options
	$wp_customize->add_control( 'before_content_carousel_post_ids', array(
		'label'       => esc_html__( 'Post IDs', 'cannix' ),
		'description' => esc_html__( 'Enter a comma separated List of post IDs. Post Type and Category will be ignored', 'cannix' ),
		'section'     => 'before_content_post_carousel_options',
		'type'        => 'text',
	) );

	// Add Setting
	$wp_customize->add_setting( 'before_content_carousel_post_num', array(
		'default'           => '4',
		'sanitize_callback' => 'absint',
	) );

	// Control Options
	$wp_customize->add_control( 'before_content_carousel_post_num', array(
		'label'       => esc_html__( 'How many posts do you want to display', 'cannix' ),
		'section'     => 'before_content_post_carousel_options',
		'description' => esc_html__( 'More than 4 will activate the carousel', 'cannix' ),
		'type'        => 'number',
	) );

	// Add Setting
	$wp_customize->add_setting( 'before_content_carousel_rownum', array(
		'default'           => '4',
		'sanitize_callback' => 'absint',
	) );

	// Control Options
	$wp_customize->add_control( 'before_content_carousel_rownum', array(
		'label'       => esc_html__( 'How many posts to show per row', 'cannix' ),
		'section'     => 'before_content_post_carousel_options',
		'type'        => 'select',
		'choices'     => array(
			'2' => esc_html__( '2', 'cannix' ),
			'3' => esc_html__( '3', 'cannix' ),
			'4' => esc_html__( '4', 'cannix' ),
		),
	) );

	// Add Setting
	$wp_customize->add_setting( 'before_content_carousel_author_meta', array(
		'default'           => true,
		'sanitize_callback' => 'cannix_sanitize_checkbox',
	) );

	// Control Options
	$wp_customize->add_control( 'before_content_carousel_author_meta', array(
		'label'       => esc_html__( 'Display Author Meta', 'cannix' ),
		'section'     => 'before_content_post_carousel_options',
		'type'        => 'checkbox',
	) );

	// Add Setting
	$wp_customize->add_setting( 'before_content_carousel_entry_date', array(
		'default'           => true,
		'sanitize_callback' => 'cannix_sanitize_checkbox',
	) );

	// Control Options
	$wp_customize->add_control( 'before_content_carousel_entry_date', array(
		'label'       => esc_html__( 'Display Post Date', 'cannix' ),
		'section'     => 'before_content_post_carousel_options',
		'type'        => 'checkbox',
	) );

	// Add Setting
	$wp_customize->add_setting( 'before_content_carousel_comment_count', array(
		'default'           => true,
		'sanitize_callback' => 'cannix_sanitize_checkbox',
	) );

	// Control Options
	$wp_customize->add_control( 'before_content_carousel_comment_count', array(
		'label'       => esc_html__( 'Display Comment Count', 'cannix' ),
		'section'     => 'before_content_post_carousel_options',
		'type'        => 'checkbox',
	) );

	// ========================================================
	// After Content (Footer Carousel)
	// ========================================================
	$wp_customize->add_section( 'after_content_post_carousel_options', array(
		'title'    => esc_html__( 'Cannix: After Content Posts Display', 'cannix' ),
		'priority' => 130, // Before Additional CSS.
		'panel' => 'carousel_settings',
		'description' => esc_html__( 'The After Content post display is displayed after post loop and sidebar and before the footer. More than 4 posts will activate a carousel', 'cannix' ),
	) );

	// Add Setting
	$wp_customize->add_setting( 'after_content_carousel', array(
		'default'           => true,
		'sanitize_callback' => 'cannix_sanitize_checkbox',
	) );

	// Control Options
	$wp_customize->add_control( 'after_content_carousel', array(
		'label'       => esc_html__( 'Check To Display Posts', 'cannix' ),
		'section'     => 'after_content_post_carousel_options',
		'type'        => 'checkbox',
	) );

	// Add Setting
	$wp_customize->add_setting( 'after_content_carousel_title', array(
		'default'           => esc_html__( 'Recent Posts', 'cannix' ),
		'sanitize_callback' => 'cannix_sanitize_text',
	) );

	// Control Options
	$wp_customize->add_control( 'after_content_carousel_title', array(
		'label'       => esc_html__( 'Title', 'cannix' ),
		'description'    => esc_html__( 'Leave empty if you do not want a title', 'cannix' ),
		'section'     => 'after_content_post_carousel_options',
		'type'        => 'text',
	) );

	// Add Setting
	$wp_customize->add_setting( 'after_content_carousel_post_type', array(
		'default'           => 'recent',
		'sanitize_callback' => 'cannix_sanitize_post_type',
	) );

	// Control Options
	$wp_customize->add_control( 'after_content_carousel_post_type', array(
		'label'       => esc_html__( 'Choose the type of posts you want to display', 'cannix' ),
		'section'     => 'after_content_post_carousel_options',
		'type'        => 'radio',
		'description' => esc_html__( 'If displaying featured posts, make sure to check the posts you want to feature in the edit post dashboard', 'cannix' ),
		'choices'     => array(
			'recent' => esc_html__( 'Recent Posts', 'cannix' ),
			'popular' => esc_html__( 'Popular Posts', 'cannix' ),
			'featured' => esc_html__( 'Featured Posts', 'cannix' ), // Featured meta box is bundled with our plugin
		),
	) );

	// Add Setting
	$wp_customize->add_setting( 'after_content_carousel_post_cat', array(
		'default'           => '',
		'sanitize_callback' => 'absint',
	) );

	// Control Options
	$wp_customize->add_control( 'after_content_carousel_post_cat', array(
		'label'       => esc_html__( 'Display posts from a category', 'cannix' ),
		'section'     => 'after_content_post_carousel_options',
		'description' => esc_html__( 'Tip: You can use in combination with post type selection for category specific filters. Uncategorized disables this setting', 'cannix' ),
		'type'        => 'select',
		'choices'     => cannix_get_blog_categories(),
	) );

	/**
	 * Post ID's
	 */
	$wp_customize->add_setting( 'after_content_carousel_post_ids', array(
		'default'           => '',
		'sanitize_callback' => 'cannix_sanitize_text',
	) );

	// Control Options
	$wp_customize->add_control( 'after_content_carousel_post_ids', array(
		'label'       => esc_html__( 'Post IDs', 'cannix' ),
		'description' => esc_html__( 'Enter a comma separated List of post IDs. Post Type and Category will be ignored', 'cannix' ),
		'section'     => 'after_content_post_carousel_options',
		'type'        => 'text',
	) );

	// Add Setting
	$wp_customize->add_setting( 'after_content_carousel_post_num', array(
		'default'           => '4',
		'sanitize_callback' => 'absint',
	) );

	// Control Options
	$wp_customize->add_control( 'after_content_carousel_post_num', array(
		'label'       => esc_html__( 'How many posts do you want to display', 'cannix' ),
		'section'     => 'after_content_post_carousel_options',
		'description' => esc_html__( 'More than 4 will activate the carousel', 'cannix' ),
		'type'        => 'number',
	) );

	// Add Setting
	$wp_customize->add_setting( 'after_content_carousel_rownum', array(
		'default'           => '4',
		'sanitize_callback' => 'absint',
	) );

	// Control Options
	$wp_customize->add_control( 'after_content_carousel_rownum', array(
		'label'       => esc_html__( 'How many posts to show per row', 'cannix' ),
		'section'     => 'after_content_post_carousel_options',
		'type'        => 'select',
		'choices'     => array(
			'2' => esc_html__( '2', 'cannix' ),
			'3' => esc_html__( '3', 'cannix' ),
			'4' => esc_html__( '4', 'cannix' ),
		),
	) );

	// Add Setting
	$wp_customize->add_setting( 'after_content_carousel_author_meta', array(
		'default'           => true,
		'sanitize_callback' => 'cannix_sanitize_checkbox',
	) );

	// Control Options
	$wp_customize->add_control( 'after_content_carousel_author_meta', array(
		'label'       => esc_html__( 'Display Author Meta', 'cannix' ),
		'section'     => 'after_content_post_carousel_options',
		'type'        => 'checkbox',
	) );

	// Add Setting
	$wp_customize->add_setting( 'after_content_carousel_entry_date', array(
		'default'           => true,
		'sanitize_callback' => 'cannix_sanitize_checkbox',
	) );

	// Control Options
	$wp_customize->add_control( 'after_content_carousel_entry_date', array(
		'label'       => esc_html__( 'Display Post Date', 'cannix' ),
		'section'     => 'after_content_post_carousel_options',
		'type'        => 'checkbox',
	) );

	// Add Setting
	$wp_customize->add_setting( 'after_content_carousel_comment_count', array(
		'default'           => true,
		'sanitize_callback' => 'cannix_sanitize_checkbox',
	) );

	// Control Options
	$wp_customize->add_control( 'after_content_carousel_comment_count', array(
		'label'       => esc_html__( 'Display Comment Count', 'cannix' ),
		'section'     => 'after_content_post_carousel_options',
		'type'        => 'checkbox',
	) );

	// ========================================================
	// Best in Category Carousel
	// ========================================================

	$wp_customize->add_section( 'category_post_carousel_options', array(
		'title'    => esc_html__( 'Cannix: Best In Category Posts Display', 'cannix' ),
		'priority' => 130, // Before Additional CSS.
		'panel' => 'carousel_settings',
		'description' => esc_html__( 'Display a selection of category specific posts in category pages. More than 4 posts will activate a carousel', 'cannix' ),
	) );

	// Add Setting
	$wp_customize->add_setting( 'before_category_carousel', array(
		'default'           => true,
		'sanitize_callback' => 'cannix_sanitize_checkbox',
	) );

	// Control Options
	$wp_customize->add_control( 'before_category_carousel', array(
		'label'       => esc_html__( 'Check To Display Posts', 'cannix' ),
		'section'     => 'category_post_carousel_options',
		'type'        => 'checkbox',
	) );

	// Add Setting
	$wp_customize->add_setting( 'before_category_carousel_title', array(
		'default'           => esc_html__( 'Popular Posts in', 'cannix' ),
		'sanitize_callback' => 'cannix_sanitize_text',
	) );

	// Control Options
	$wp_customize->add_control( 'before_category_carousel_title', array(
		'label'       => esc_html__( 'Title', 'cannix' ),
		'description'    => esc_html__( 'Leave empty if you do not want a title. The category name always appends the title', 'cannix' ),
		'section'     => 'category_post_carousel_options',
		'type'        => 'text',
	) );

	// Add Setting
	$wp_customize->add_setting( 'before_category_carousel_post_type', array(
		'default'           => 'popular',
		'sanitize_callback' => 'cannix_sanitize_post_type',
	) );

	// Control Options
	$wp_customize->add_control( 'before_category_carousel_post_type', array(
		'label'       => esc_html__( 'Choose the type of posts you want to display', 'cannix' ),
		'section'     => 'category_post_carousel_options',
		'type'        => 'radio',
		'description' => esc_html__( 'If displaying featured posts, make sure to check the posts you want to feature in the edit post dashboard', 'cannix' ),
		'choices'     => array(
			'recent' => esc_html__( 'Recent Posts', 'cannix' ),
			'popular' => esc_html__( 'Popular Posts', 'cannix' ),
			'featured' => esc_html__( 'Featured Posts', 'cannix' ), // Featured meta box is bundled with our plugin
		),
	) );

	// Add Setting
	$wp_customize->add_setting( 'before_category_carousel_post_num', array(
		'default'           => '4',
		'sanitize_callback' => 'absint',
	) );

	// Control Options
	$wp_customize->add_control( 'before_category_carousel_post_num', array(
		'label'       => esc_html__( 'How many posts do you want to display', 'cannix' ),
		'section'     => 'category_post_carousel_options',
		'description' => esc_html__( 'More than 4 will activate the carousel', 'cannix' ),
		'type'        => 'number',
	) );

	// Add Setting
	$wp_customize->add_setting( 'before_category_carousel_rownum', array(
		'default'           => '4',
		'sanitize_callback' => 'absint',
	) );

	// Control Options
	$wp_customize->add_control( 'before_category_carousel_rownum', array(
		'label'       => esc_html__( 'How many posts to show per row', 'cannix' ),
		'section'     => 'category_post_carousel_options',
		'type'        => 'select',
		'choices'     => array(
			'2' => esc_html__( '2', 'cannix' ),
			'3' => esc_html__( '3', 'cannix' ),
			'4' => esc_html__( '4', 'cannix' ),
		),
	) );

	// Add Setting
	$wp_customize->add_setting( 'before_category_carousel_author_meta', array(
		'default'           => true,
		'sanitize_callback' => 'cannix_sanitize_checkbox',
	) );

	// Control Options
	$wp_customize->add_control( 'before_category_carousel_author_meta', array(
		'label'       => esc_html__( 'Display Author Meta', 'cannix' ),
		'section'     => 'category_post_carousel_options',
		'type'        => 'checkbox',
	) );

	// Add Setting
	$wp_customize->add_setting( 'before_category_carousel_entry_date', array(
		'default'           => true,
		'sanitize_callback' => 'cannix_sanitize_checkbox',
	) );

	// Control Options
	$wp_customize->add_control( 'before_category_carousel_entry_date', array(
		'label'       => esc_html__( 'Display Post Date', 'cannix' ),
		'section'     => 'category_post_carousel_options',
		'type'        => 'checkbox',
	) );

	// Add Setting
	$wp_customize->add_setting( 'before_category_carousel_comment_count', array(
		'default'           => true,
		'sanitize_callback' => 'cannix_sanitize_checkbox',
	) );

	// Control Options
	$wp_customize->add_control( 'before_category_carousel_comment_count', array(
		'label'       => esc_html__( 'Display Comment Count', 'cannix' ),
		'section'     => 'category_post_carousel_options',
		'type'        => 'checkbox',
	) );

	endif;

	// ========================================================
	// Social Media Options (Aaron Summers)
	// ========================================================

	$wp_customize->add_section( 'social_media', array(
		'title'    => esc_html__( 'Cannix: Social Media Settings', 'cannix' ),
		'description'    => esc_html__( 'Enter the full URLs of your social media channels, Leave blank to not use', 'cannix' ),
		'priority' => 130, // Before Additional CSS.
	) );

	 $social_sites = cannix_get_social_sites( );

	 foreach( $social_sites as $social_site ) {

	 	 // Add Setting
	 	if ( $social_site === 'email' ) {
	 		 $wp_customize->add_setting( $social_site, array(
		         'type' => 'theme_mod',
		         'capability' => 'edit_theme_options',
		         'sanitize_callback' => 'sanitize_email',
		     ));
	 	} else {
		     $wp_customize->add_setting( $social_site, array(
		         'type' => 'theme_mod',
		         'capability' => 'edit_theme_options',
		         'sanitize_callback' => 'esc_url_raw',
		     ));
		 }

	     // Control Options
	     $wp_customize->add_control( $social_site, array(
	         //'label' => ucwords( esc_html__( $social_site, 'social_icon' ) ),
	         'label' => ucwords( $social_site ),
	         'section' => 'social_media',
	         'type' => 'text',
	     ));
	 }

	// ========================================================
	// Footer Options
	// ========================================================
	$wp_customize->add_section( 'footer_settings', array(
		'title'    => esc_html__( 'Cannix: Footer Settings', 'cannix' ),
		'priority' => 130, // Before Additional CSS.
	) );

	// Add Setting
	$wp_customize->add_setting( 'footer_text', array(
		'default'           => get_bloginfo('description'),
		'sanitize_callback' => 'cannix_sanitize_text',
	) );

	// Control Options
	$wp_customize->add_control( 'footer_text', array(
		'label'       => esc_html__( 'Footer Text', 'cannix' ),
		'description'    => esc_html__( 'Enter text here to be displayed in the footer', 'cannix' ),
		'section'     => 'footer_settings',
		'type'        => 'text',
	) );

	// Add Setting
	$wp_customize->add_setting( 'footer_show_social_icons', array(
		'default'           => true,
		'sanitize_callback' => 'cannix_sanitize_checkbox',
	) );

	// Control Options
	$wp_customize->add_control( 'footer_show_social_icons', array(
		'label'       => esc_html__( 'Display Social Media Icons', 'cannix' ),
		'section'     => 'footer_settings',
		'type'        => 'checkbox',
	) );

	// Add Setting
	$wp_customize->add_setting( 'footer_show_backtotop', array(
		'default'           => true,
		'sanitize_callback' => 'cannix_sanitize_checkbox',
	) );

	// Control Options
	$wp_customize->add_control( 'footer_show_backtotop', array(
		'label'       => esc_html__( 'Display Back To Top Link', 'cannix' ),
		'section'     => 'footer_settings',
		'type'        => 'checkbox',
	) );

	// ========================================================
	// Slide Sidebar Options
	// ========================================================
	$wp_customize->add_section( 'slidebar_options', array(
		'title'    => esc_html__( 'Cannix: Slide Out Sidebar Settings', 'cannix' ),
		'priority' => 130, // Before Additional CSS.
	) );

	// Add Setting
	$wp_customize->add_setting( 'slidebar_show_logo', array(
		'default'           => true,
		'sanitize_callback' => 'cannix_sanitize_checkbox',
	) );

	// Control Options
	$wp_customize->add_control( 'slidebar_show_logo', array(
		'label'       => esc_html__( 'Display your logo in the Slidebar', 'cannix' ),
		'section'     => 'slidebar_options',
		'type'        => 'checkbox',
	) );

	// Add Setting
	$wp_customize->add_setting( 'slidebar_show_social_icons', array(
		'default'           => true,
		'sanitize_callback' => 'cannix_sanitize_checkbox',
	) );

	// Control Options
	$wp_customize->add_control( 'slidebar_show_social_icons', array(
		'label'       => esc_html__( 'Display Social Media Icons', 'cannix' ),
		'section'     => 'slidebar_options',
		'type'        => 'checkbox',
	) );

	// Add Setting
	$wp_customize->add_setting( 'slidebar_show_primary_nav', array(
		'default'           => false,
		'sanitize_callback' => 'cannix_sanitize_checkbox',
	) );

	// Control Options
	$wp_customize->add_control( 'slidebar_show_primary_nav', array(
		'label'       => esc_html__( 'Display Primary Navigation on Desktop', 'cannix' ),
		'description'    => esc_html__( 'Primary Navigation is displayed on mobile devices, check to display on Desktop AND Mobile', 'cannix' ),
		'section'     => 'slidebar_options',
		'type'        => 'checkbox',
	) );

	// ========================================================
	// Colour Settings
	// ========================================================
	$wp_customize->add_section( 'colour_options', array(
		'title'    => esc_html__( 'Cannix: Colour &amp; Font Settings', 'cannix' ),
		'description'    => esc_html__( 'Here you can change the default colour scheme by editing the primary theme colours.', 'cannix' ),
		'transport' => 'refresh',
		'priority' => 130, // Before Additional CSS.
	) );

	// Add Setting
	$wp_customize->add_setting( 'primary_colour_one', array(
		'default'           => '#e9c67b',
		'transport' => 'refresh',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	// Control Options
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'primary_colour_one', array(
      'section' => 'colour_options',
      'label'   => esc_html__( 'Primary Theme Colour One', 'cannix' ),
    ) ) );

    // Add Setting
	$wp_customize->add_setting( 'primary_colour_two', array(
		'default'           => '#5dd39e',
		'transport' => 'refresh',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	// Control Options
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'primary_colour_two', array(
      'section' => 'colour_options',
      'label'   => esc_html__( 'Primary Theme Colour Two', 'cannix' ),
    ) ) );

    // Add Setting
	$wp_customize->add_setting( 'primary_colour_three', array(
		'default'           => '#348aa7',
		'transport' => 'refresh',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	// Control Options
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'primary_colour_three', array(
      'section' => 'colour_options',
      'label'   => esc_html__( 'Primary Theme Colour Three', 'cannix' ),
    ) ) );

    // Add Setting
	$wp_customize->add_setting( 'primary_colour_four', array(
		'default'           => '#525174',
		'transport' => 'refresh',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	// Control Options
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'primary_colour_four', array(
      'section' => 'colour_options',
      'label'   => esc_html__( 'Primary Theme Colour Four', 'cannix' ),
    ) ) );

    // Add Setting
	$wp_customize->add_setting( 'primary_colour_five', array(
		'default'           => '#513b56',
		'transport' => 'refresh',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	// Control Options
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'primary_colour_five', array(
      'section' => 'colour_options',
      'label'   => esc_html__( 'Primary Theme Colour Five', 'cannix' ),
    ) ) );

    // Add Setting
	$wp_customize->add_setting( 'entry_font_colour', array(
		'default'           => '#ffffff',
		'transport' => 'refresh',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	// Control Options
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'entry_font_colour', array(
      'section' => 'colour_options',
      'label'   => esc_html__( 'Entry Content/Meta Font Colour', 'cannix' ),
    ) ) );

    // Add Setting
    // Body font colour removed version 1.2

    // Add Setting
	$wp_customize->add_setting( 'meta_category_background', array(
		'default'           => '#ffffff',
		'transport' => 'refresh',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	// Control Options
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'meta_category_background', array(
      'section' => 'colour_options',
      'label'   => esc_html__( 'Category Meta Background', 'cannix' ),
    ) ) );

    // Add Setting
	$wp_customize->add_setting( 'meta_category_background_alpha_transparency', array(
		'default'           => '8',
		'sanitize_callback' => 'absint',
	) );

	// Control Options
	$wp_customize->add_control( 'meta_category_background_alpha_transparency', array(
      'section' => 'colour_options',
      'label'   => esc_html__( 'Category Meta Background Transparency', 'cannix' ),
      'type'        => 'number',
			'input_attrs' => array(
		        'min'   => 0,
		        'max'   => 10,
		    ),
    ) );

    // Add Setting
	$wp_customize->add_setting( 'meta_category_font_color', array(
		'default'           => '#ffffff',
		'transport' => 'refresh',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	// Control Options
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'meta_category_font_color', array(
      'section' => 'colour_options',
      'label'   => esc_html__( 'Category Meta Font Colour', 'cannix' ),
    ) ) );

    // Add Setting
	$wp_customize->add_setting( 'comment_count_background', array(
		'default'           => '#333333',
		'transport' => 'refresh',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	// Control Options
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'comment_count_background', array(
      'section' => 'colour_options',
      'label'   => esc_html__( 'Comment Count Background', 'cannix' ),
    ) ) );

     // Add Setting
	$wp_customize->add_setting( 'comment_count_font_color', array(
		'default'           => '#ffffff',
		'transport' => 'refresh',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	// Control Options
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'comment_count_font_color', array(
      'section' => 'colour_options',
      'label'   => esc_html__( 'Comment Count Font Colour', 'cannix' ),
    ) ) );

    // Font additions version 1.2

    $wp_customize->add_setting( 'cannix_body_font', array(
			'default'           => 'open_sans',
			'sanitize_callback' => 'cannix_sanitize_fonts',
		) );

	$wp_customize->add_control( 'cannix_body_font', array(
		'label'       => esc_html__( 'Body Font', 'cannix' ),
		'section'     => 'colour_options',
		'type'        => 'select',
		'choices'     => array(
			'open_sans' => esc_html__( 'Open Sans', 'cannix' ),
			'roboto' => esc_html__( 'Roboto', 'cannix' ),
		),
	) );

	 $wp_customize->add_setting( 'cannix_title_font', array(
			'default'           => 'roboto_slab',
			'sanitize_callback' => 'cannix_sanitize_fonts',
		) );

	$wp_customize->add_control( 'cannix_title_font', array(
		'label'       => esc_html__( 'Title Font', 'cannix' ),
		'section'     => 'colour_options',
		'type'        => 'select',
		'choices'     => array(
			'roboto_slab' => esc_html__( 'Roboto Slab', 'cannix' ),
			'poppins' => esc_html__( 'Poppins', 'cannix' ),
		),
	) );



}

add_action( 'customize_register', 'cannix_customize_register' );

/**
 * Array of categories used in post display settings
 */
function cannix_get_blog_categories() {

	$categories = get_categories('type=post');

	$cats = array('' => '');

	foreach( $categories as $category ) {
	    $cats[$category->term_id] = $category->name;
	}

	return $cats;
}

/**
 * Array of social media sites used in Social Media Options
 */
function cannix_get_social_sites() {
     $social_sites = array(
     	 'twitter',
     	 'facebook',
         'pinterest',
         'youtube',
         'instagram',
         'google-plus',
         'flickr',
         'vimeo',
         'tumblr',
         'dribbble',
         'rss',
         'email',
         'linkedin',
         '500px',
         'soundcloud',
         'spotify',
         'mixcloud',
         'medium',
         'github',
         'behance',
         'reddit',
     );
 return $social_sites; // See functions.php for cannix_show_social_icons()
}

/**
* Sanitize Checkbox
*
* @param $input
* @return bool
*/
function cannix_sanitize_checkbox( $input ) {

		return ( $input === true ) ? true : false;

}

/**
 * Sanitize text field
 *
 * @param string $text
 */
function cannix_sanitize_text( $text ) {
    return sanitize_text_field( $text );
}

/**
 * Sanitize the post layout options.
 *
 * @param string $input Post layout.
 */
function cannix_sanitize_post_layout( $input ) {
	$valid = array(
		'list' => esc_html__( 'List', 'cannix' ),
		'grid' => esc_html__( 'Grid', 'cannix' ),
		'masonry' => esc_html__( 'Masonry', 'cannix' ),
		'classic' => esc_html__( 'Classic', 'cannix' ),
	);

	if ( array_key_exists( $input, $valid ) ) {
		return $input;
	}

	return '';
}

/**
 * Sanitize the post type options.
 *
 * @param string $input Post type.
 */
function cannix_sanitize_post_type( $input ) {
	$valid = array(
		'recent' => esc_html__( 'Recent Posts', 'cannix' ),
		'popular' => esc_html__( 'Popular Posts', 'cannix' ),
		'featured' => esc_html__( 'Featured Posts', 'cannix' ),
	);

	if ( array_key_exists( $input, $valid ) ) {
		return $input;
	}

	return '';
}

// ========================================================
// Sanitize relationship method
// ========================================================
function cannix_sanitize_relate_method( $input ) {
	$valid = array(
		'tags' => esc_html__( 'Tags', 'cannix' ),
		'category' => esc_html__( 'Category', 'cannix' ),
	);

	if ( array_key_exists( $input, $valid ) ) {
		return $input;
	}

	return '';
}

// ========================================================
// Sanitize share post position
// ========================================================
function cannix_sanitize_sharepost_position( $input ) {
	$valid = array(
		'top-bottom' => esc_html__( 'Top and Bottom', 'cannix' ),
		'top' => esc_html__( 'Top Only', 'cannix' ),
		'bottom' => esc_html__( 'Bottom Only', 'cannix' ),
	);

	if ( array_key_exists( $input, $valid ) ) {
		return $input;
	}

	return '';
}

// ========================================================
// Sanitize share post position
// ========================================================
function cannix_sanitize_featured_layout( $input ) {
	$valid = array(
		'default' => esc_html__( 'Default', 'cannix' ),
		'cover' => esc_html__( 'Cover', 'cannix' ),
	);

	if ( array_key_exists( $input, $valid ) ) {
		return $input;
	}

	return '';
}

// ========================================================
// Sanitize fonts
// ========================================================
function cannix_sanitize_fonts( $input ) {
	$valid = array(
		'roboto_slab' => esc_html__( 'Roboto Slab', 'cannix' ),
		'poppins' => esc_html__( 'Poppins', 'cannix' ),
		'open_sans' => esc_html__( 'Open Sans', 'cannix' ),
		'roboto' => esc_html__( 'Roboto', 'cannix' ),
	);

	if ( array_key_exists( $input, $valid ) ) {
		return $input;
	}

	return '';
}
