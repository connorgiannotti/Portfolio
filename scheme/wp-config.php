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
define('DB_NAME', 'connorgi_scheme');

/** MySQL database username */
define('DB_USER', 'connorgi_ScAdmin');

/** MySQL database password */
define('DB_PASSWORD', 'wOP0PimBcBVF');

/** MySQL hostname */
define('DB_HOST', '');

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
define('AUTH_KEY',         'cl{.h<nCq;8[itjayg^[Z#?{E&.aFLLhnK bBJ9S$FAD(`(ZGM$2P|1tc8pKK+1g');
define('SECURE_AUTH_KEY',  '0MjW21P]QN4lo5d~ox}OUqPY_C/qgv:O>@`&GiSqGzIDJSd9Kf<2?vQ3ycgY7^03');
define('LOGGED_IN_KEY',    '$.Z?hW1&Z$J$Ahz*/3-wUdx4ZyZ]l{dn[}z8dldu@dw&!mH$f?^uX_ 8|QWKcVe^');
define('NONCE_KEY',        'C20BW##Mv;I 9sBBL{u+9SlM$5L%K >SzFJ`fDn}9|N]zrJf}ObC<#@A`y~zp18J');
define('AUTH_SALT',        'Lku}B_Y`_h_$kj{Fq|j/(+#6N*okk}TSAC;xh6KC#3@uoi}|DV8Re$9q_i0-xs;(');
define('SECURE_AUTH_SALT', 'oPWVy}&[b vHt[;^{[^b$;5PiH^bT14{}_!0[3PtC)%f3Lvi4Dx+QTx,jSqOYtVF');
define('LOGGED_IN_SALT',   'RH@WW5S3#U!XfYs;8H_VVs%|I{a{vHvn=)S6Lqma+.)3Mu]L/Pr}-JpLvk$DM753');
define('NONCE_SALT',       'F[KyV}eJ&VNeT;ZAGcY&$^L}v)(Ef~hq3/A(Aa)h2aMa<]iVkWB:e QqXWdv)+bP');

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
