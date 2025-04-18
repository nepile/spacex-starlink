<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 * @var $layout             string
 * @var $title              string
 * @var $title_tag          string
 * @var $process_list       string
 * @var $animation          string
 * @var $animation_effect   string
 * @var $delay              string
 * @var $duration           string
 * @var $item_space         string
 * @var $col_xl             string
 * @var $col_lg             string
 * @var $col_md             string
 * @var $col_sm             string
 * @var $col_xs             string
 * @var $number_display     string
 * @var $thumb_display      string
 */

$col_class = "col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-xs-{$col_xs}";
?>

<div class="rt-working-process rt-process-<?php echo esc_attr( $layout ); ?>">
    <div class="row <?php echo esc_attr( $item_space );?>">
		<?php $ade = $delay; $adu = $duration; $i= 1;
		foreach($process_list as $item) {
		$attr = '';
		if ( !empty( $item['url']['url'] ) ) {
			$attr  = 'href="' . $item['url']['url'] . '"';
			$attr .= !empty( $item['url']['is_external'] ) ? ' target="_blank"' : '';
			$attr .= !empty( $item['url']['nofollow'] ) ? ' rel="nofollow"' : '';
		}
		if ( $i % 2 == 0 ) {
			$item_parity_2  = 'even';
		}
		else {
			$item_parity_2  = 'odd';
		}
		?>
        <div class="<?php echo esc_attr( $col_class );?>">
            <div class="process-item <?php echo esc_attr( $item_parity_2  );?> <?php if( !empty( $alignment ) ) { ?><?php echo esc_attr( $alignment );?><?php } ?> elementor-repeater-item-<?php echo esc_attr($item['_id']) ?> <?php echo esc_attr( $animation );?> <?php echo esc_attr( $animation_effect );?>" data-wow-delay="<?php echo esc_attr( $ade );?>ms" data-wow-duration="<?php echo esc_attr( $adu );?>ms">
                <?php if( $thumb_display == 'yes' ) { ?>
                <div class="process-info-img">
                    <?php  echo wp_get_attachment_image( $item['image']['id'], 'full' );?>
                </div>
	           <?php } ?>
                <div class="process-content">
					<?php if( $item['title'] ) { ?><<?php echo esc_attr( $title_tag ) ?> class="rt-title"><a class="title-link" <?php echo $attr; ?>><?php echo kariez_html( $item['title'], 'allow_title' );?></a></<?php echo esc_attr( $title_tag ) ?>><?php } ?>
                <div class="rt-content"><?php echo kariez_html( $item['content'], 'allow_title' );?></div>
				<?php if( $number_display == 'yes' ) { ?><div class="rt-number"><?php echo kariez_html( $item['number'], 'allow_title' );?></div><?php } ?>
            </div>
        </div>
    </div>
	<?php $ade = $ade + 200; $adu = $adu + 0; $i++;} ?>
</div>
</div>
