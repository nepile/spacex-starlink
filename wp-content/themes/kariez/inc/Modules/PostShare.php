<?php

namespace RT\Kariez\Modules;
class PostShare {
	public static function kariez_post_share() {

		$url       = urlencode( get_permalink() );
		$title     = urlencode( get_the_title() );
		$meta_list = explode( ',', kariez_option( 'rt_post_share' ) );
		// Your $defaults array
		$defaults       = [
			'facebook'  => [
				'url'  => "http://www.facebook.com/sharer.php?u=$url",
				'icon' => 'icon-facebook',
			],
			'twitter'   => [
				'url'  => "https://twitter.com/intent/tweet?source=$url&text=$title:$url",
				'icon' => 'icon-twitter-sm'
			],
			'linkedin'  => [
				'url'  => "http://www.linkedin.com/shareArticle?mini=true&url=$url&title=$title",
				'icon' => 'icon-linkdin'
			],
			'pinterest' => [
				'url'  => "http://pinterest.com/pin/create/button/?url=$url&description=$title",
				'icon' => 'icon-pinterest'
			],
			'whatsapp' => [
				'url'   => 'https://api.whatsapp.com/send?text='. $title . ' – ' . $url ,
				'icon' => 'icon-whatsapp'
			],
			'youtube' => [
				'url'  => "https://www.youtube.com?text='. $title .'&amp;url='. $url",
				'icon' => 'icon-youtube'
			],
		];
		$category_index = array_intersect_key( $defaults, array_flip( $meta_list ) );

		$sharers = apply_filters( 'rt_social_sharing_icons', $category_index );

		?>

		<ul class="social-share-list">
			<?php foreach ( $sharers as $key => $sharer ): ?>
				<li class="social-<?php echo esc_attr( $key ); ?>">
					<a href="<?php echo esc_url( $sharer['url'] ); ?>" target="_blank">
						<i class="<?php echo esc_attr( $sharer['icon'] ); ?>"></i>
					</a>
				</li>
			<?php endforeach; ?>
		</ul>
		<?php
	}
}
