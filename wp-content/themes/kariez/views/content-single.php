<?php
/**
 * Template part for displaying content
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package kariez
 */

use RT\Kariez\Options\Opt;

?>
<article data-post-id="<?php the_ID(); ?>" <?php post_class( kariez_post_class() ); ?>>
	<div class="single-inner-wrapper">
		<?php if ( ! in_array( Opt::$single_style, [ '2', '3', '4', '5' ] ) ) : ?>
			<?php kariez_post_single_thumbnail(); ?>
		<?php endif; ?>
		<div class="entry-wrapper">
			<?php kariez_single_entry_header(); ?>
				<div class="entry-content">
					<?php kariez_entry_content() ?>
				</div>
			<?php kariez_post_single_video(); ?>
			<?php kariez_entry_footer(); ?>
			<?php kariez_entry_profile(); ?>
		</div>
	</div>
</article>
