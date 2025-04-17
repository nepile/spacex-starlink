<?php
/**
 * Template part for displaying header
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package kariez
 */

use RT\Kariez\Options\Opt;

if(! Opt::$has_top_bar ) {
	return;
}
$topinfo = ( kariez_option( 'rt_contact_address' ) || kariez_option( 'rt_phone' ) || kariez_option( 'rt_email' ) || kariez_option( 'rt_open_time' ) ) ? true : false;
$_fullwidth = Opt::$header_width == 'full' ? '-fluid' : '';
?>

<div class="kariez-topbar">
	<div class="topbar-container rt-container <?php echo esc_attr($_fullwidth) ?>">
		<div class="topbar-row d-flex flex-wrap column-gap-30 align-items-center">
			<?php if( $topinfo ) { ?>
			<div class="topbar-left d-flex flex-wrap column-gap-30 align-items-center">
				<?php if( kariez_option( 'rt_topbar_open_time' ) && kariez_option( 'rt_open_time' ) ) { ?>
					<span><i class="icon-clock"></i><?php kariez_html( kariez_option( 'rt_open_time' ) , false );?></span>
				<?php }
				if( kariez_option( 'rt_topbar_email' ) && kariez_option( 'rt_email' ) ) { ?>
					<span><i class="icon-mail"></i><a href="mailto:<?php echo esc_attr( kariez_option( 'rt_email' ) );?>"><?php kariez_html( kariez_option( 'rt_email' ) , false );?></a></span>
				<?php }
				 if( kariez_option( 'rt_topbar_address' ) && kariez_option( 'rt_contact_address' )  ) { ?>
					<span><i class="icon-map-pin"></i><?php kariez_html( kariez_option( 'rt_contact_address' ) , false );?></span>
				<?php }
				if( kariez_option( 'rt_topbar_phone' ) && kariez_option( 'rt_phone' ) ) { ?>
					<span><i class="icon-phone"></i><span class="text">Call Us:</span><a href="tel:<?php echo esc_attr( kariez_option( 'rt_phone' ) );?>"><?php kariez_html( kariez_option( 'rt_phone' ) , false );?></a></span>
				<?php }   ?>
			</div>
			<?php } ?>
			<?php if( kariez_option( 'rt_topbar_social' ) ) { ?>
			<div class="topbar-right d-flex gap-30 align-items-center">
				<div class="social-icon">
					<?php if( kariez_option( 'rt_follow_us_label' ) ) { ?><label><?php echo kariez_option( 'rt_follow_us_label' ) ?></label><?php } ?>
					<?php kariez_get_social_html( '#555' ); ?>
				</div>
			</div>
			<?php } ?>
		</div>
	</div>
</div>
