<?php
/**
 * Template part for displaying banner content
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package kariez
 */

use RT\Kariez\Options\Opt;
use RT\Kariez\Helpers\Fns;


if ( ! Opt::$has_banner ) {
	return;
}

$banner_image_css = '';
	$image_url = wp_get_attachment_image_src( Opt::$banner_image, 'full' );
	$banner_image_css .= isset( $image_url[0] ) ? "background-image:url({$image_url[0]});" : '';

	if ( ! empty( kariez_option( 'rt_banner_image_attr' ) ) ) {
		$bg_attr = json_decode( kariez_option( 'rt_banner_image_attr' ), ARRAY_A );

		if ( ! empty( $bg_attr['position'] ) ) {
			$banner_image_css .= "background-position: {$bg_attr['position']};";
		}
		if ( ! empty( $bg_attr['attachment'] ) ) {
			$banner_image_css .= "background-attachment: {$bg_attr['attachment']};";
		}
		if ( ! empty( $bg_attr['repeat'] ) ) {
			$banner_image_css .= "background-repeat: {$bg_attr['repeat']};";
		}
		if ( ! empty( $bg_attr['size'] ) ) {
			$banner_image_css .= "background-size: {$bg_attr['size']};";
		}
	}

$has_image = isset( $image_url[0] );
if ( in_array( Opt::$single_style, [] ) ) {
	$has_image        = false;
	$banner_image_css = '';
}

$classes = Fns::class_list( [
	'kariez-breadcrumb-wrapper',
	$has_image ? 'has-bg' : 'no-bg',
	Opt::$banner_color ? 'has-color' : 'no-color',
	kariez_option('rt_banner_color_mode') == 'banner-dark' ? 'banner-dark' : 'banner-light',
] );

/*banner title*/
if ( is_404() ) {
	$kariez_title = "Error Page";
}
elseif ( is_search() ) {
	$kariez_title = esc_html__( 'Search Results for : ', 'kariez' ) . get_search_query();
}
elseif ( is_home() ) {
	if ( get_option( 'page_for_posts' ) ) {
		$kariez_title = get_the_title( get_option( 'page_for_posts' ) );
	}
	else {
		$kariez_title = apply_filters( 'theme_blog_title', esc_html__( 'All Posts', 'kariez' ) );
	}
} elseif (is_post_type_archive('rt-team')) {
	$kariez_title  = kariez_option('rt_team_banner_archive_title');
} elseif (is_post_type_archive('rt-service')) {
	$kariez_title  = kariez_option('rt_service_banner_archive_title');
} elseif (is_post_type_archive('rt-project')) {
	$kariez_title  = kariez_option('rt_project_banner_archive_title');
} elseif (is_tax('rt-team-category')) {
	$kariez_title  = single_term_title( '', false );
} elseif (is_tax('rt-service-category')) {
	$kariez_title  = single_term_title( '', false );
} elseif (is_tax('rt-project-category')) {
	$kariez_title  = single_term_title( '', false );
} elseif ( is_category() ) {
	$kariez_title = single_term_title( '', false );
} elseif ( is_archive() ) {
	$kariez_title = esc_html__( 'Our Recent Posts', 'kariez' );
} elseif (is_singular('rt-team')) {
	$kariez_title  = kariez_option('rt_team_banner_single_title');
} elseif (is_singular('rt-service')) {
	$kariez_title  = kariez_option('rt_service_banner_single_title');
} elseif (is_singular('rt-project')) {
	$kariez_title  = kariez_option('rt_project_banner_single_title');
} elseif ( is_single() ) {
	$kariez_title = kariez_option('rt_post_banner_single_title');
} else {
	$kariez_title = get_the_title();
}

$breadcrumb_classes = kariez_option( 'rt_breadcrumb_alignment' );
?>

<div class="<?php echo esc_attr( $classes ) ?>">
	<span class="banner-image" style="<?php echo esc_attr( $banner_image_css ) ?>"></span>
	<div class="container <?php echo esc_attr( $breadcrumb_classes ) ?>">
		<?php if ( Opt::$breadcrumb_title ) { ?>
			<?php if ( is_single() ) { ?>
				<h1 class="entry-title"><?php kariez_html( $kariez_title, 'allow_title' ); ?></h1>
			<?php } else if ( is_page() ) { ?>
				<h1 class="entry-title"><?php kariez_html( $kariez_title , 'allow_title' );?></h1>
			<?php } else { ?>
				<h1 class="entry-title"><?php kariez_html( $kariez_title , 'allow_title' );?></h1>
			<?php } ?>
		<?php } ?>
		<?php if ( Opt::$has_breadcrumb ) { ?>
			<?php get_template_part( 'views/content', 'breadcrumb' ); ?>
		<?php } ?>
	</div>
</div>
