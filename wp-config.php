<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'spacex_starlink_logistics' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'ZuQ[yIYW2T;R^m7KF3y^(Ck<b^vk&pbHvw+8`J xsb+RT1^B20r#zIFDYWt %Bj!' );
define( 'SECURE_AUTH_KEY',  '{pg4yN+9?>hESlG8+{S@eoze3*jR|B;9/2%j78THlk?U<(_cfRnQMAR+:Lqv2)%~' );
define( 'LOGGED_IN_KEY',    '=Rhm}y%PmUX@tiBFmh_a`dXBOR%7nhrd6gIS9 p%TV;3NeTBK~w,xP1B#p=,Ma;~' );
define( 'NONCE_KEY',        '04cML]l:eOeFZ.h,wmWSkK]eK:<^`85sU+19%ol^RKY$7pgh6,c8S7PY`nA#cnFG' );
define( 'AUTH_SALT',        'dX~{@aTEkARiEbf!#nbwr=v6*s}qE[i||qs=~59:0k3=||v()^PWZVKCc<H9=u<g' );
define( 'SECURE_AUTH_SALT', 'kN%9xc^3,ah[u`L;4G`HWlCKwI ^M=yp3uxpNDkk^ sI#9m1.wQ=|4LUix3,t:O`' );
define( 'LOGGED_IN_SALT',   '=;)3J}D#dvF94>sPKZgBi5(3c -~RrldcnJ?-f6~;A]P!z`4uWNxn.yd_-UO:o[|' );
define( 'NONCE_SALT',       'S-S$/!Uh/w(:/^8SD){eE/(q|P%]Bbhh/V%97NPz/:WhUlLFKud&]sb$Q7X97Yc)' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
