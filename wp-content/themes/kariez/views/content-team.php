<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

use RT\Kariez\Helpers\Fns;

$id = get_the_ID();
$designation   	= get_post_meta( $id, 'rt_team_designation', true );
$socials        = (array) get_post_meta( $id, 'rt_team_socials', true );
$socials_fields = Fns::get_team_socials();

$content = get_the_content();
$content = apply_filters( 'the_content', $content );
$content = wp_trim_words( get_the_excerpt(), kariez_option( 'rt_team_excerpt_limit' ), '' );

?>
<article id="post-<?php the_ID(); ?>" >
	<div class="team-item">
		<div class="team-content-wrap">
			<div class="team-thumbs">
				<?php kariez_post_thumbnail('full'); ?>
				<?php if ( kariez_option( 'rt_team_ar_social' ) ) { ?>
					<ul class="team-social">
						<?php foreach ( $socials as $key => $value ):
							if(! $value){
								continue;
							}
							?>
							<?php if ( !empty( $value ) ): ?>
							<li class="social-item">
								<a class="social-link" target="_blank" href="<?php echo esc_url( $value );?>">
									<i class="<?php echo esc_attr( $socials_fields[$key]['icon'] );?>" aria-hidden="true"></i>
								</a>
							</li>
						<?php endif; ?>
						<?php endforeach; ?>
					</ul>
				<?php } ?>
			</div>
			<div class="team-content team-hover-effect">
				<div class="team-info">
					<h2 class="team-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
					<?php if ( !empty($designation) && kariez_option( 'rt_team_ar_designation' ) ) { ?>
						<div class="team-designation"><?php echo esc_html( $designation );?></div>
					<?php } ?>
				</div>
			</div>
			<?php
				if ( kariez_option( 'rt_team_ar_excerpt' ) ) { ?>
				<p><?php kariez_html( $content, false ); ?></p>
			<?php } ?>
		</div>
	</div>
</article>
