<?php
/**
 * Template part for displaying content
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package kariez
 */

$meta_list = kariez_option( 'rt_single_meta', '', true );
$meta      = kariez_option( 'rt_blog_above_meta_visibility' );
$meta      = kariez_option( 'rt_single_above_meta_style' );
if ( kariez_option( 'rt_single_above_meta_visibility' ) ) {
	$category_index = array_search( 'category', $meta_list );
	unset( $meta_list[ $category_index ] );
}
?>
<article data-post-id="<?php the_ID(); ?>" <?php post_class( kariez_post_class() ); ?>>
	<div class="single-inner-wrapper">
		<div class="entry-wrapper">
			<div class="entry-content">
				<?php kariez_entry_content() ?>
			</div>
			<?php kariez_post_single_video(); ?>
			<?php kariez_entry_footer(); ?>
			<?php kariez_entry_profile(); ?>
		</div>
	</div>
</article>
