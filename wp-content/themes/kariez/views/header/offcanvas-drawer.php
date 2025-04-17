<?php
/**
 * Template part for displaying header offcanvas
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package kariez
 */
use RT\Kariez\Options\Opt;
use RT\Kariez\Helpers\Fns;
$logo_h1 = ! is_singular( [ 'post' ] );
$topinfo = ( kariez_option( 'rt_contact_address' ) || kariez_option( 'rt_phone' ) || kariez_option( 'rt_email' ) || kariez_option( 'rt_email' ) ) ? true : false;
?>


<div class="kariez-offcanvas-drawer">
	<div class="offcanvas-logo">
		<?php echo kariez_site_logo( $logo_h1 ); ?>
		<a class="trigger-icon trigger-off-canvas" href="#">×</a>
	</div>
	<?php if( kariez_option( 'rt_about_label' ) || kariez_option( 'rt_about_text' ) ) { ?>
	<div class="offcanvas-about offcanvas-address">
		<?php if( kariez_option( 'rt_about_label' ) ) { ?><label><?php echo kariez_option( 'rt_about_label' ) ?></label><?php } ?>
		<?php if( kariez_option( 'rt_about_text' ) ) { ?><p><?php echo kariez_option( 'rt_about_text' ) ?></p><?php } ?>
	</div>
	<?php } ?>
	<nav class="offcanvas-navigation" role="navigation">
		<?php
		if ( has_nav_menu( 'primary' ) ) :
			wp_nav_menu(
				array(
					'theme_location' => 'primary',
					'walker'         => new RT\Kariez\Core\WalkerNav(),
				)
			);
		endif;
		?>
	</nav><!-- .kariez-navigation -->

	<div class="offcanvas-address">
		<?php if( $topinfo ) { ?>
			<?php if( kariez_option( 'rt_contact_info_label' ) ) { ?><label><?php echo kariez_option( 'rt_contact_info_label' ) ?></label><?php } ?>
			<ul class="offcanvas-info">
				<?php if( kariez_option( 'rt_contact_address' ) ) { ?>
					<li><i class="icon-map-pin"></i><?php kariez_html( kariez_option( 'rt_contact_address' ) , false );?> </li>
				<?php } if( kariez_option( 'rt_phone' ) ) { ?>
					<li><i class="icon-phone"></i><a href="tel:<?php echo esc_attr( kariez_option( 'rt_phone' ) );?>"><?php kariez_html( kariez_option( 'rt_phone' ) , false );?></a> </li>
				<?php } if( kariez_option( 'rt_email' ) ) { ?>
					<li><i class="icon-mail"></i><a href="mailto:<?php echo esc_attr( kariez_option( 'rt_email' ) );?>"><?php kariez_html( kariez_option( 'rt_email' ) , false );?></a> </li>
				<?php } if( kariez_option( 'rt_open_time' ) ) { ?>
					<li><i class="icon-clock"></i><?php kariez_html( kariez_option( 'rt_open_time' ) , false );?></li>
				<?php } ?>
			</ul>
		<?php } ?>

		<?php if( kariez_option( 'rt_offcanvas_social' ) ) { ?>
			<div class="offcanvas-social-icon">
				<?php kariez_get_social_html( '#555' ); ?>
			</div>
		<?php } ?>
	</div>

</div><!-- .container -->

<div class="kariez-body-overlay"></div>
