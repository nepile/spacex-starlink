<?php
/**
 * Template part for displaying content
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package kariez
 */

$content = get_the_content();
$content = apply_filters( 'the_content', $content );
$content = wp_trim_words( get_the_excerpt(), kariez_option( 'rt_project_excerpt_limit' ), '' );

if( kariez_option( 'rt_project_filter' ) == 'grayscale' ) {
	$grayscale = 'is-blend';
} else {
	$grayscale = 'default';
}

?>
<article id="post-<?php the_ID(); ?>">
	<div class="project-item">
		<div class="project-thumbs <?php echo esc_attr( $grayscale ); ?>">
			<?php kariez_post_thumbnail('kariez-size7'); ?>
			<div class="project-content">
				<div class="project-info">
					<h2 class="project-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
					<?php if ( kariez_option( 'rt_project_ar_cat' ) ) { ?>
						<span class="project-cat"><?php
							$i = 1;
							$term_lists = get_the_terms( get_the_ID(), 'rt-project-category' );
							if( $term_lists ) {
								foreach ( $term_lists as $term_list ){
									$link = get_term_link( $term_list->term_id, 'rt-project-category' ); ?>
									<?php if ( $i > 1 ){ echo esc_html( ', ' ); } ?><a href="<?php echo esc_url( $link ); ?>">
									<?php echo esc_html( $term_list->name ); ?></a><?php $i++; } } ?>
					</span>
					<?php } if ( kariez_option( 'rt_project_ar_excerpt' ) ) { ?>
						<div class="project-excerpt"><?php kariez_html( $content , false ); ?></div>
					<?php } ?>
				</div>
				<?php if( kariez_option( 'rt_project_ar_button' ) ) { ?>
					<div class="rt-button">
						<a class="btn button-4" href="<?php the_permalink();?>">
							<span class="button-text"><?php esc_html_e('See Details' , 'kariez' ); ?></span>
							<span class="btn-round-shape">
								<i class="icon-arrow-right"></i>
							</span>
						</a>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
</article>
