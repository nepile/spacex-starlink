<?php
/**
 * Template part for displaying content
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package kariez
 */

?>
<article data-post-id="<?php the_ID(); ?>" <?php post_class( kariez_post_class() ); ?>>
	<div class="single-inner-wrapper">
		<?php kariez_single_entry_header(); ?>
		<?php kariez_post_single_thumbnail(); ?>
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
