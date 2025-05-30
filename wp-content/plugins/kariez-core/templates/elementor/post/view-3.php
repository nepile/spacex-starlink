<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 *
 * @var $thumbnail_visibility       string
 * @var $project_thumbnail_size     string
 * @var $cat_visibility             string
 * @var $content_visibility         string
 * @var $readmore_visibility        string
 * @var $readmore_text              string
 * @var $author_visibility          string
 * @var $date_visibility            string
 * @var $comment_visibility         string
 * @var $reading_visibility         string
 * @var $content_limit              string
 * @var $views_visibility           string
 * @var $title_tag                  string
 * @var $title_count                string
 */


$has_entry_meta  = ( $author_visibility || $date_visibility || $comment_visibility || $reading_visibility ) ? true : false;

$content = wp_trim_words( get_the_excerpt(), $content_limit, '.' );
$content = "<p>$content</p>";
$title = wp_trim_words( get_the_title(), $title_count, '' );
$comments_number = get_comments_number();
$comments_text   = sprintf( _n( 'Comment: %s', 'Comments: %s', $comments_number, 'kariez-core' ), number_format_i18n( $comments_number ) );

?>
<div class="article-inner-wrapper">
	<?php if( 'visible' === $thumbnail_visibility ) { ?>
		<?php kariez_post_thumbnail( $project_thumbnail_size ); ?>
	<?php } ?>
    <div class="entry-wrapper">
        <header class="entry-header">
			<?php if ( $cat_visibility ) { ?>
                <div class="separate-meta title-above-meta"><?php echo kariez_posted_in(); ?></div>
			<?php } ?>
            <<?php echo esc_attr( $title_tag ) ?> class="entry-title default-max-width"><a href="<?php the_permalink();?>"><?php kariez_html( $title, 'allow_title' ); ?></a></<?php echo esc_attr( $title_tag ) ?>>
			<?php if ( $has_entry_meta ) { ?>
                <div class="rt-post-meta">
                    <ul class="entry-meta">
						<?php if ( $author_visibility ) { ?>
                            <li><i class="icon-user"></i><?php echo kariez_posted_by(esc_html__( 'by ', 'kariez-core' )); ?></li>
						<?php } if ( $date_visibility ) { ?>
                            <li><i class="icon-calender"></i><?php echo kariez_posted_on(); ?></li>
						<?php } if ( $comment_visibility ) { ?>
                            <li><i class="icon-comment"></i><a href="<?php echo get_comments_link( get_the_ID() ); ?>"><?php echo wp_kses( $comments_text , 'allowed_html' );?></a></li>
						<?php } if ( $reading_visibility ) { ?>
                            <li><i class="icon-clock"></i><?php echo kariez_reading_time(); ?></li>
						<?php } if ( $views_visibility ) { ?>
                            <li><i class="icon-eye"></i><?php echo rt_post_views(); ?></li>
						<?php } ?>
                    </ul>
                </div>
			<?php } ?>
        </header>
		<?php if( 'visible' === $content_visibility ) { ?>
            <div class="entry-content">
	            <?php kariez_html( $content , false ); ?>
            </div>
		<?php } ?>
		<?php if( 'visible' === $readmore_visibility ) { ?>
            <div class="rt-button entry-footer">
                <a class="btn button-3" href="<?php the_permalink();?>">
                    <span class="button-text"><?php echo esc_html( $readmore_text );?></span>
                    <span class="btn-round-shape">
                        <i class="icon-arrow-right"></i>
                    </span>
                </a>
            </div>
		<?php } ?>
    </div>
</div>
