<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package kariez
 */


use RT\Kariez\Helpers\Fns;

if ( is_singular() && is_active_sidebar( Fns::default_sidebar('single') ) ) {
	kariez_sidebar( Fns::default_sidebar('single')  );
} else {
	kariez_sidebar( Fns::default_sidebar('main') );
}
