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
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

define('FS_METHOD', 'direct');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'wF<cDRTHDebVz5%ne;LBy_ X!BuY4vLnIaJMnv^W@67p8cN<MN3rO6|Y)B(#X~;D');
define('SECURE_AUTH_KEY',  't?M,Fp+1mtr)7h6.(<=+ME67Ej]fwm?Bt7zKb#A.T/)|rdasi(TgX^J/b4UkUgDi');
define('LOGGED_IN_KEY',    'X/j5Tw0]H@C%z`%Imxcl+lO;5:`KJ,c^TkK4O3/8n1d;m*SU&<=17m8*S%qF)GJQ');
define('NONCE_KEY',        'WM@B82f_Di[Ck)tQ!Wem VS)`.a=nhV4ePJTA&s{y1s<)m}QC/JCDSxnn7u3n3ut');
define('AUTH_SALT',        'o:,4QA_2{<3?V+L^*qFjmed@^k PF6RKCM)P;-ySIJ$@s4-Ue-iw:0soEo&rm3$z');
define('SECURE_AUTH_SALT', '?dS0^$ltw{GzU.7@vDS]}E1?q3hLJst5];#My]{BRmu2(P]XC.jZEA^;7KG*xI2f');
define('LOGGED_IN_SALT',   'l[[;mzCBfTi3ff>94;%G<%!S:**9_TA8UocgbDx5tB oHE/!>p :/[ :p*MSF qV');
define('NONCE_SALT',       'i#Q(!Jr>S)K0jd7ixHZb9aeICl [Fo{/r9y`9&>1Ia1VsSGprkp@T:lc-DpcH aq');

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
