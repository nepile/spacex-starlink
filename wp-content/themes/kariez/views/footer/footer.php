<?php
/**
 * Template part for displaying footer
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package kariez
 */

$footer_width = 'container'. kariez_option('rt_footer_width');
$copyright_center = kariez_option('rt_social_footer') ? 'justify-content-between' : 'justify-content-center';
?>

<?php if ( is_active_sidebar( 'rt-footer-sidebar' ) ) : ?>
	<div class="footer-widgets-wrapper">
		<div class="footer-container <?php echo esc_attr($footer_width) ?>">
			<div class="footer-widgets row">
				<?php dynamic_sidebar( 'rt-footer-sidebar' ); ?>
			</div>
		</div>
	</div><!-- .site-info -->
<?php endif; ?>

<?php if ( ! empty( kariez_option( 'rt_footer_copyright' ) ) ) : ?>
	<div class="footer-copyright-wrapper text-center">
		<div class="footer-container <?php echo esc_attr( $footer_width ) ?>">
			<div class="d-flex align-items-center <?php echo esc_attr($copyright_center); ?>">
				<div class="copyright-text">
					<?php kariez_html( str_replace( '[y]', date( 'Y' ), kariez_option( 'rt_footer_copyright' ) ) ); ?>
				</div>
				<?php if( kariez_option('rt_social_footer') ) { ?>
				<div class="social-icon d-flex gap-20 align-items-center">
					<div class="social-icon d-flex column-gap-10">
						<?php if( kariez_option( 'rt_follow_us_label' ) ) { ?><label><?php kariez_html( kariez_option( 'rt_follow_us_label' ), 'allow_title' ) ?></label><?php } ?>
						<?php kariez_get_social_html( '#555' ); ?>
					</div>
				</div>
				<?php } ?>
			</div>
		</div>
	</div>
<?php endif; ?>
