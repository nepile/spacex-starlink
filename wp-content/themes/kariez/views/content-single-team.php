<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package kariez
 */

use RT\Kariez\Options\Opt;
use RT\Kariez\Helpers\Fns;

$id                     = get_the_ID();
$rt_team_info_title  	= get_post_meta( $id, 'rt_team_info_title', true );
$rt_team_designation 	= get_post_meta( $id, 'rt_team_designation', true );
$rt_team_phone       	= get_post_meta( $id, 'rt_team_phone', true );
$rt_team_website     	= get_post_meta( $id, 'rt_team_website', true );
$rt_team_email       	= get_post_meta( $id, 'rt_team_email', true );
$rt_team_address     	= get_post_meta( $id, 'rt_team_address', true );
$rt_team_skill_title 	= get_post_meta( $id, 'rt_team_skill_title', true );
$rt_team_skill_info 	= get_post_meta( $id, 'rt_team_skill_info', true );
$rt_team_skill      	= get_post_meta( $id, 'rt_team_skill', true );

$rt_team_qualification_title      	= get_post_meta( $id, 'rt_team_qualification_title', true );
$rt_team_single_qualification = get_post_meta( $id, 'rt_team_single_qualification', true );
$rt_team_qualification_label      = get_post_meta( $id, 'rt_team_qualification_label', true );


$socials        		= (array) get_post_meta( $id, 'rt_team_socials', true );
$socials_fields 		= Fns::get_team_socials();



if ( kariez_option( 'rt_team_single_author_order' ) == 'thumb-right') {
	$order = 'order-1';
} else {
	$order = 'order-2';
}

?>
<div id="post-<?php the_ID(); ?>" <?php post_class( 'team-single' ); ?>>
	<div class="team-single-item">
		<div class="row team-single-wrap">
			<div class="col-lg-8 col-12 <?php echo esc_attr( $order ); ?>">
				<div class="team-single-content-wrap">
					<div class="team-single-content">
						<?php the_content(); ?>
					</div>

					<div class="rt-team-qualification-wrap">
						<?php if ( kariez_option( 'rt_team_single_qualification' ) && ! empty( $rt_team_qualification_label ) ) { ?>
						<?php if( $rt_team_qualification_title ) { ?><h3><?php echo esc_html( $rt_team_qualification_title ); ?></h3><?php } ?>
						<div class="team-qualification-wrapper">
							<?php

							foreach ($rt_team_qualification_label as $qualification_label) { ?>
								<span class="rt-qualification-name"><i class="icon-round-check"></i><?php echo esc_html($qualification_label['qualification_name']) ?></span>
							<?php } ?>

							<?php } ?>
						</div>
					</div>


					<?php if ( kariez_option( 'rt_team_single_skill' ) && ! empty( $rt_team_skill ) ) { ?>
						<div class="rt-skill-wrap progress-appear">
							<div class="rt-skills">
								<?php if( $rt_team_skill_title ) { ?><h3><?php echo esc_html( $rt_team_skill_title ); ?></h3><?php } ?>

								<?php echo esc_html( $rt_team_skill_info ); ?>
								<div class="skill-item-wrapper">
									<?php foreach ( $rt_team_skill as $skill ): ?>
										<?php
										if ( empty( $skill['skill_name'] ) || empty( $skill['skill_value'] ) ) {
											continue;
										}
										$skill_value = (int) $skill['skill_value'];
										$skill_style = "";

										if ( ! empty( $skill['skill_color'] ) ) {
											$skill_style .= " background:{$skill['skill_color']};";
										}
										?>

										<div class="rt-skill-each">
											<div class="rt-name"><?php echo esc_html( $skill['skill_name'] ); ?></div>
											<div class="progress">
												<div class="progress-bar skill-per"
													 data-per="<?php echo esc_attr( $skill_value ); ?>" style="<?php echo esc_attr( $skill_style ); ?>"></div>
											</div>
										</div>


									<?php endforeach; ?>
								</div>
							</div>
						</div>
					<?php } ?>
				</div>
			</div>
			<div class="col-lg-4 col-12">
				<div class="team-single-image
				<?php kariez_html( kariez_option( 'rt_team_single_author' ), 'allow_title'); ?>">
					<?php if ( has_post_thumbnail() ) { the_post_thumbnail( 'full' ); } ?>
				</div>
				<div class="team-heading">
					<?php if ( ! Opt::$breadcrumb_title ) { ?>
						<h1 class="entry-title"><?php the_title(); ?></h1>
					<?php } else { ?>
						<h2 class="entry-title"><?php the_title(); ?></h2>
					<?php } ?>
					<span class="designation"><?php echo esc_html( $rt_team_designation ); ?></span>

					<!-- Team info -->
					<?php if( kariez_option( 'rt_team_single_info' ) ) { ?>
						<div class="team-info">
							<?php if( $rt_team_info_title ) { ?><h3><?php echo esc_html( $rt_team_info_title ); ?></h3><?php } ?>
							<ul>
								<?php if ( ! empty( $rt_team_phone ) ) { ?>
									<li><span class="team-label"><?php esc_html_e( 'Call', 'kariez' ); ?> : </span>
										<a href="tel:<?php echo esc_html( $rt_team_phone ); ?>"><?php echo esc_html( $rt_team_phone ); ?></a>
									</li>
								<?php }
								if ( ! empty( $rt_team_email ) ) { ?>
									<li><span class="team-label"><?php esc_html_e( 'E-mail', 'kariez' ); ?> : </span>
										<?php echo esc_html( $rt_team_email ); ?>
									</li>
								<?php }
								if ( ! empty( $rt_team_website ) ) { ?>
									<li><span class="team-label"><?php esc_html_e( 'Website', 'kariez' ); ?> : </span>
										<?php echo esc_html( $rt_team_website ); ?>
									</li>
								<?php }
								if ( ! empty( $rt_team_address ) ) { ?>
									<li><span class="team-label"><?php esc_html_e( 'Location', 'kariez' ); ?> : </span>
										<?php echo esc_html( $rt_team_address ); ?>
									</li>
								<?php } ?>
							</ul>
						</div>
					<?php } ?>

					<?php if ( kariez_option( 'rt_team_single_social' ) && ! empty( $socials ) ) { ?>
						<ul class="team-social-social">
							<?php foreach ( $socials as $key => $value ):
								if(! $value){
									continue;
								}
								?>
								<li><a target="_blank" href="<?php echo esc_url( $value ); ?>"><i class="<?php echo esc_attr( $socials_fields[ $key ]['icon'] ); ?>"></i></a>
								</li>
							<?php endforeach; ?>
						</ul>
					<?php } ?>
				</div>

			</div>
		</div>
	</div>
</div>
