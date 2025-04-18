<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package kariez
 */

get_header();

?>

<div id="primary" class="content-area">
	<div class="container">
		<main id="main" class="site-main error-404" role="main">
			<?php
			if ( ! empty( kariez_option( 'rt_error_image' ) ) ) {
				echo wp_get_attachment_image( kariez_option( 'rt_error_image' ), 'full', true );
			} else {
				kariez_get_img( '404.png', true, 'width="1057" height="688"' ) . "' alt='";
			}
			?>

			<div class="error-info">
				<h2 class="error-title"><?php kariez_html( kariez_option( 'rt_error_heading' ), 'allow_title' ); ?></h2>
				<p><?php kariez_html( kariez_option( 'rt_error_text' ), 'allow_title' ); ?></p>

				<div class="rt-button">
					<a class="btn button-3" href="<?php echo esc_url( home_url() ) ?>">
						<span class="button-text"><?php kariez_html( kariez_option( 'rt_error_button_text' ), 'allow_title' ); ?></span>
						<span class="btn-round-shape">
							<i class="icon-arrow-right"></i>
						</span>
					</a>
				</div>

			</div>
		</main><!-- #main -->
	</div><!-- container - -->
</div><!-- #primary -->

<?php
get_footer();
