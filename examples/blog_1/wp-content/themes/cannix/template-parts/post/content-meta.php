<?php
/**
 * Template part for displaying post meta
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
$meta_class = ( '' === $post->post_title ? ' no-entry-title' : '' );
$meta_author_class = ( ! is_single() && get_theme_mod( 'archive_display_meta_author', true ) || is_single() && get_theme_mod( 'single_display_meta_author', true ) ? ' has-meta-author' : '' );
$meta_date_class = ( ! is_single() && get_theme_mod( 'archive_display_meta_date', true ) || is_single() && get_theme_mod( 'single_display_meta_date', true ) ? ' has-meta-date' : '' );
$meta_read_time_class = ( ! is_single() && get_theme_mod( 'archive_display_meta_read_time', true ) ? ' has-meta-read-time' : '' );
$meta_comment_count_class = ( ! is_single() && get_theme_mod( 'archive_display_meta_comment_count', true ) || is_single() && get_theme_mod( 'single_display_meta_comment_count', true )? ' has-meta-comment-count' : '' );
$meta_category_class = ( is_single() && get_theme_mod( 'single_display_meta_category', true ) ? ' has-meta-category' : '' );
$meta_class = $meta_class . $meta_author_class . $meta_date_class . $meta_read_time_class . $meta_comment_count_class . $meta_category_class;
?>

<div class="entry-meta<?php echo esc_attr( $meta_class ); ?>">

	<ul class="meta-data">

		<?php if ( is_single() && get_theme_mod( 'single_display_meta_author', true ) || ! is_single() && get_theme_mod( 'archive_display_meta_author', true )) : ?>

			<li class="entry-author-meta"<?php echo cannix_inline_article_style( false, true ) ?>>

				<span class="screen-reader-text">Posted by</span><span><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ) ?>"<?php echo cannix_inline_article_style( false, true ) ?>><?php echo get_the_author() ?></a></span>

			</li>

		<?php endif; ?>

		<?php if ( is_single() && get_theme_mod( 'single_display_meta_date', true ) || ! is_single() && get_theme_mod( 'archive_display_meta_date', true )) : ?>

			<li class="entry-date"<?php echo cannix_inline_article_style( false, true ) ?>>

				<?php 

				$title = get_the_title('','', false);

				if ( ! is_single( ) && strlen($title) == 0 ) {

				echo '<a href="' . get_the_permalink() . '">';

				} ?>

				<time datetime="<?php echo get_the_date( 'Y-m-d' ) ?>"><?php echo get_the_date( ) ?></time>

				<?php 

				if ( ! is_single( ) && strlen($title) == 0 ) {

				echo '</a>';

				} ?>

			</li>

		<?php endif; ?>

		<?php if ( ! is_single() && get_theme_mod( 'archive_display_meta_read_time', true ) ): ?>

			<li class="entry-read-time"<?php echo cannix_inline_article_style( false, true ) ?>>

				<?php echo cannix_read_time(); ?>

			</li>

		<?php endif; ?>

		<?php if ( is_single(  ) && get_theme_mod( 'single_display_meta_category', true ) ) : ?>

			<li class="entry-post-category">

				<?php echo esc_html__( 'in', 'cannix' ); ?> <span class="screen-reader-text">Posted in</span> <span> <?php the_category(' / ', 'multiple'); ?></span>

			</li>

		<?php endif; ?>

		<?php if ( is_single() && get_theme_mod( 'single_display_meta_comment_count', true ) || ! is_single() && get_theme_mod( 'archive_display_meta_comment_count', true ) ) : ?>

		<li class="entry-comment-count">

			<?php if ( is_single( ) ) : ?>

				<a href="#comments">

			<?php endif;  ?>

			<i class="fa fa-comment"></i> <?php comments_number( '0', '1', '%' ) ?>

			<?php if ( is_single( ) ) : ?>

				</a>

			<?php endif;  ?>

		</li>

	<?php endif; ?>
			
		<?php if ( is_single( ) && get_theme_mod( 'single_display_sharepost', true ) && get_theme_mod( 'single_sharepost_position' ) !== 'bottom' ) : ?>

			<li class="entry-share">

				<?php get_template_part( 'template-parts/post/content', 'share' ) ?>

			</li>

		<?php endif; ?>

	</ul>
	
</div>