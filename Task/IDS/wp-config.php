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
define('DB_NAME', 'ids');

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
define('AUTH_KEY',         'I}G2h|OCN^6+s#=svh<dx.!ikF*;&~-Vnvf3z/,FBk-ZdSchwpAV4YW*/qgAS=o8');
define('SECURE_AUTH_KEY',  'ji*k=f>U g0VnQk3k:`Bo#?c~AA-~_*~]O!<>7~Nx#*iFgYPEN(+Be1vX^Udn/et');
define('LOGGED_IN_KEY',    'J_]7vJ3rC}O6WCRlbxMtSw%nz9adZjb:)96i^Wlx$_Y=Q$[K4~*8%e)l-hSXD $?');
define('NONCE_KEY',        'B 0JEyB. d|yIB#x2b*wqQ:gG!eV~9-XT`45F,iX<e#Pwf$d vM?^~7Q]K<]fcI-');
define('AUTH_SALT',        '7u/]<w3=v@3M*|H3C!u`J/]u%|s&%Oq2OFczWq;pF]]9eT_f<V[-vkuOrDbkA+5!');
define('SECURE_AUTH_SALT', '[1izAYXe(S@7[u@$hiWZ?M^i-:%;_@Vtq7MF,<HAGrroQx(_$z5W.^V#MhMd+<]%');
define('LOGGED_IN_SALT',   'U-}.IPvY9-g;wl0e1!Hf]j~wXIDRu}j&~Ln%<jmeF;H?,]g)i^/R|f#7snh)Z1*:');
define('NONCE_SALT',       '8HGqHN4#6u]#fVRn`7z<evE.SeI9YnDidoI*m3owQ/Ls9H8<TAxp_kEg5RH6G>]F');

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
