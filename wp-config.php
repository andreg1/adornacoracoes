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
define('DB_NAME', 'adornacoracoes');

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

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'dZ!2n`dy2-gn&0l-01.v$^qT5y;t^V{|!,Z|Eib^oL$;@yJu|&UWl=IImy7Gy^hn');
define('SECURE_AUTH_KEY',  ')FvDY P>3v(!3h`1T4#<pZB`0g)z-rw){1.*__sY0}kz$ pX&eG-^b+Z2^c,E@,N');
define('LOGGED_IN_KEY',    'D7k7x?=s}MGp6Vu[dl.r#1j#vqh;O0m>3V9b$:p.liCae6wl(9ar(Le@:R3MQM=$');
define('NONCE_KEY',        '7kRauye!jZCj3:}P>IaoKM11z2h ka*e32HEA*6PWCfYde+azq`YEfA)}*gP;@e@');
define('AUTH_SALT',        'h2p`!VNUkl7L$p~gn@#wmqNm+O)~9Lrvg:>l,B6,K1nzx@zToYnD>j,Tl`rj@wLL');
define('SECURE_AUTH_SALT', '|Gfp5R_KqGmo1S@sd)0r{_5v]8*|G8{$2-CX#M*[/`%um:vF|;~zl}Cf?n|Q>S23');
define('LOGGED_IN_SALT',   't$PLa7%l*(OQQCQ+mcW)FZUgC^XulL X2IZaE-lt_g*]5YXZ9x)(H.cv,YbR$2It');
define('NONCE_SALT',       '?y{&NyEX@HNz WC1ZZ[wcL[mvvny0x.eOPNaq`~r>p~@Y-]@lRbt,&>])>AJbZez');

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
