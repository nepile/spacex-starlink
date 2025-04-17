<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package kariez
 */

use RT\Kariez\Helpers\Fns;
use RT\Kariez\Modules\Pagination;

get_header();
$content_columns = Fns::content_columns();

if ( is_post_type_archive( "rt-team" ) || is_tax( "rt-team-category" ) ) {
	get_template_part( 'archive-rt', 'team' );
	return;
}
if ( is_post_type_archive( "rt-service" ) || is_tax( "rt-service-category" ) ) {
	get_template_part( 'archive-rt', 'service' );
	return;
}
if ( is_post_type_archive( "rt-project" ) || is_tax( "rt-project-category" ) ) {
	get_template_part( 'archive-rt', 'project' );
	return;
}

?>
	<div id="primary" class="content-area">
		<div class="container">
			<div class="row align-stretch">
				<div class="<?php echo esc_attr( $content_columns ); ?>">
					<main id="main" class="site-main" role="main">
						<div class="row <?php echo esc_attr( kariez_option( 'rt_blog_column_gap' ) ); ?> rt-masonry-grid">
							<?php
							if ( have_posts() ) :
								/* Start the Loop */
								while ( have_posts() ) :
									the_post();
									get_template_part( 'views/content', kariez_option( 'rt_blog_style' ) );
								endwhile;
							else :
								get_template_part( 'views/content', 'none' );
							endif;
							?>
						</div>
						<?php Pagination::pagination(); ?>
					</main><!-- #main -->
				</div><!-- .col- -->
				<?php get_sidebar(); ?>
			</div><!-- .row -->
		</div><!-- .container -->
	</div><!-- #primary -->
<?php
get_footer();
