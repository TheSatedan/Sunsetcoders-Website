<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'sunset-coders');

/** MySQL database username */
define('DB_USER', 'ExtremeCoder');

/** MySQL database password */
define('DB_PASSWORD', 'Aort101ms#');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'p=L:Q`qUHl202#zR.Ss6~i!=+_DPbrD&,TI~tr==$&f>~42XW7PC3Uu)n0OA#S}g');
define('SECURE_AUTH_KEY',  '*5@1s9rh@5,{*6xt_[@SaT fzjMvi%kSeYFYF#O-/9t|X60Jt+,dcn.qkmV%z760');
define('LOGGED_IN_KEY',    '`N<yKpo|lAA~oOd~SYj7cpZXzP4N/5S0<Y40D(6CclAMz`1}YmXLE:`^Vw8rhT+x');
define('NONCE_KEY',        '/-/^Xl~>/Per~XEmv>Z(^!z$R9=ANAu7ZELA*O-L)gbqXFMVs_SiUR(6GJdW1E?8');
define('AUTH_SALT',        'L)Hviw(.SSG#*B&&8pq/H+JBzW<?7,8T^O C`#Qe/-GlE0Jf~d%tx{F8@;bbWynA');
define('SECURE_AUTH_SALT', '[A aY[APbthAIN0./6dB8q57P|a-m|l,u?-/?;V.R-[2r 2Af#x<I]JpJ;=$I0+1');
define('LOGGED_IN_SALT',   'l7/r.n+nFNDCDtU-ABvo%M5Yo.%T$[px`L5aH?nK UcqOJkgd7{9}>flTL4g]c?k');
define('NONCE_SALT',       'L-Jp|Q78mjz%_YqlD|9}PX@eB]ZoNN6J{`:#2kI0B%f}:BOfcu;%2RmmD@^X6MY?');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
