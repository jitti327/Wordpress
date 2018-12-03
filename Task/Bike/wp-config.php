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
define('DB_NAME', 'bike');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         '4:Rtjt8xXN}C u-XJQGS+_p$h21!=JSEg4I~pHos(F<97oSNPIPwA[H.H)1];Vke');
define('SECURE_AUTH_KEY',  'H#f%-GFQ7NK,8eaTG=7C:QK2K,yr(EYqGZ&|.qfb1e(Xr@^sVF!obt4~L<;kQ?Fr');
define('LOGGED_IN_KEY',    '9{oUW~:lidNy];91o Dz~-Ty?t,Y?umv9VR1gt2+W5^qB!DB+lG))ZBxl/@-.o/n');
define('NONCE_KEY',        ',G0C?Gr0)+Hp!TUM^bJs%j/_?N(LCH0.oZ0]1ZB=~L0|,/}_MmngQ51sK}t-*aGE');
define('AUTH_SALT',        '/*a-Ux!PpnBHP6]-| #WA-jWmZY- LvL&WSsN?U3<H%Awbyr3n`CstiuQ@z|7a/x');
define('SECURE_AUTH_SALT', '4Iy3ceUkfUL+ /#{,ow>Rg8}[$x)uj?AxeUujjTp*qgc0.iS,[N:>N0w&T>~i+>R');
define('LOGGED_IN_SALT',   '<q(]YM,ME;#*#V~ w>uI`LdF3h}a2{u;<5H;zh7N2LhW(tlKz&uRrS;d/G?-ZlH`');
define('NONCE_SALT',       '1h*J;}Y^CgdTnGaG_1HW8a3;:6lZ&XIB Zn%=jS+:zO*|fMOnGsJ4KFSCg)y@xQH');

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
