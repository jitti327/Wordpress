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
define('DB_NAME', 'bikes');

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
define('AUTH_KEY',         '8S/=[l2Qszb9oVr+}n x47rHauPnbFZ!w*yyZMlIf9Mz^Xp>##Q[a63Di`L#x%I>');
define('SECURE_AUTH_KEY',  'y)IDKOM9#6&!6!!Ct6$/(ab<OrZN(@m)ow,Gt*|9?2|@?n*~VOK__xSCu2&U;hj~');
define('LOGGED_IN_KEY',    ';tDtCK7q]n&oCk24uOGf?*9^vs69P:Fugb{Hq^s?5WY>s$ vVWWm$GW`ePGGV}kc');
define('NONCE_KEY',        'H#%|ZO@<0hArzlhH,Tf= kM94+~n=#JIFz[?4+*N~]/ 8s:5A2=1p]y!#hGmv.xI');
define('AUTH_SALT',        '>+KGsT6EwGDS<{6tl37}^f+X<{[A)D?@hXy=A8<mf,^|98Nqv7W/C7POF^S7P6fn');
define('SECURE_AUTH_SALT', 'WfI,<Puk^5%y7Ty^D!wT#!KNpop{GP%_ Oq,3]]4_$)M^1G.G.G3;,$RXicc`^q7');
define('LOGGED_IN_SALT',   'xj2pjS<g|53AU=O.1E*O]&aD98-<hTgQ*@>}TPMA/X6!Jr;LEVz=2wX2hM)`lKvN');
define('NONCE_SALT',       'x5 +qjeflblbK?FnZdX$Oe;cM4XDKK|rdW.X4bfVBFQ2x84Eeba[~`UlmZk<aqZA');

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
