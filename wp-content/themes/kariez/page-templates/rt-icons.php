<?php
/**
 * Template Name: RT Icons
 *
 * @link https://developer.wordpress.org/themes/template-files-section/page-template-files/
 *
 * @package kariez
 */

get_header(); ?>
	<div class="container">
		<div class="row pt-50 pb-50 d-flex gap-15">
			<?php
			echo kariez_get_svg( 'search' );
			echo kariez_get_svg( 'facebook' );
			echo kariez_get_svg( 'twitter' );
			echo kariez_get_svg( 'linkedin' );
			echo kariez_get_svg( 'instagram' );
			echo kariez_get_svg( 'pinterest' );
			echo kariez_get_svg( 'tiktok' );
			echo kariez_get_svg( 'youtube' );
			echo kariez_get_svg( 'snapchat' );
			echo kariez_get_svg( 'whatsapp' );
			echo kariez_get_svg( 'reddit' );
			?>
		</div>
	</div>
<?php
get_footer();
