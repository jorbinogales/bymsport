<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'bymsports' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
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
define( 'AUTH_KEY',         '@+A6G~bI5ok?C}*Ow~9+xQ=@I8r9J|2!>-Wgx>DXS$jK;)fgug?%,SJb5^<l(5z%' );
define( 'SECURE_AUTH_KEY',  'WGH}hogDEi*NnGXhs_ehOm]$gg~xntW0Y*!2q7OqO%W u#h{]vX)&&3?q}gl^s.9' );
define( 'LOGGED_IN_KEY',    '!zg#8{XYUH4wsH<$G%z]H]aBk:bQO8Cd2}gMUyeb0/ms2WLHc~Y=evb&dB8tpGc}' );
define( 'NONCE_KEY',        'F8Ru^bTtKwc`[;K@`j4?.A+0;29PxvuEWmHtAA^K2lw+KNqB7a3bJK=p^Zce#MM2' );
define( 'AUTH_SALT',        '9_kQxY[aTTnzWGF&%N4c)j1p&Q]wg~xBJ9iw@)qMhV6MCj.O4KGj1oAFf?>(C,(Q' );
define( 'SECURE_AUTH_SALT', '`Gz]BLBN:kbnZXY<[]}5Pja3,=#=r?uzcY`apq/pA}*gkD ]FKUR,zmu+UZXk*5v' );
define( 'LOGGED_IN_SALT',   'yZ%`{;?X~5;ZH=+1|HWm5uB4cEC.Q+?&kQ]vfml7r*&O%_#~C/ka#MDGj2{L;1mT' );
define( 'NONCE_SALT',       'fFBoa|4CR/Yx1m5{,y}aR^Xr2YXh?aWEr9-y[v%aC1@n@fcs5ngRT[Olnd (Ciy?' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
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
