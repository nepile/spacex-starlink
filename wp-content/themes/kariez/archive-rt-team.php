<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

use RT\Kariez\Helpers\Fns;
use RT\Kariez\Options\Opt;
use RT\Kariez\Modules\Pagination;

get_header();

$post_classes = "";
if ( Opt::$layout == 'right-sidebar' || Opt::$layout == 'left-sidebar' ) {
	$post_classes = 'col-sm-6 col-lg-6';
} else {
	$post_classes = 'col-sm-6 col-lg-3 col-xl-4';
}

if ( kariez_option( 'rt_team_style' ) == 'default' ){
	$team_archive_layout 		= "rt-team-default rt-team-multi-layout-1";
} elseif ( kariez_option( 'rt_team_style' ) == '2' ){
	$team_archive_layout 		= "rt-team-default rt-team-multi-layout-2";
} elseif ( kariez_option( 'rt_team_style' ) == '3' ){
	$team_archive_layout 		= "rt-team-default rt-team-multi-layout-3";
} else {
	$team_archive_layout 		= "rt-team-default rt-team-multi-layout-1";
}
$content_columns = Fns::content_columns();

?>

<div id="primary" class="content-area overflow-hidden ">
	<div class="container">
		<div class="row">
			<div class="<?php echo esc_attr( $team_archive_layout );?> <?php echo esc_attr( $content_columns ); ?>">
				<main id="main" class="site-main">
					<?php if ( have_posts() ) :?>
						<div class="row g-2 item-parent">
							<?php while ( have_posts() ) : the_post(); ?>
								<div class="<?php echo esc_attr( $post_classes );?> item">
									<?php get_template_part( 'views/content-team', kariez_option( 'rt_team_style' ) ); ?>
								</div>
							<?php endwhile; ?>
						</div>
					<?php else:?>
						<?php get_template_part( 'views/content', 'none' );?>
					<?php endif;?>
					<?php Pagination::pagination(); ?>
				</main>
			</div>
			<?php get_sidebar(); ?>
		</div>
	</div>
</div>
<?php get_footer(); ?>
