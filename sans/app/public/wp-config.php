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
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define( 'AUTH_KEY',          'Dyd_*q6OKbmHi:Y(PIZ)7:4}S1m^P.[./yE|V]H|rqzca-!pI{zg5eG>nW{%*/4k' );
define( 'SECURE_AUTH_KEY',   'a=%%9__N4RQ&)MTh/[@RY2:ILM[vw>pgOj!>W@qW@@HnBr4<MXz<6w4}VP@rJVc}' );
define( 'LOGGED_IN_KEY',     '$wE*hze9x&/`[|pYxU(O97`e2qgQ@SKU]L1`-( *aq6![O.IVX*;DPT|%A&kt$T|' );
define( 'NONCE_KEY',         'iaED*`pY?3 Jjz8ZB}HPC/!{o#vXhtsU,pDjj_E|j&~02qOv4$HM{+@.IH Zx#A(' );
define( 'AUTH_SALT',         '|d:w0cMdFL gR~r{M8!YX$v<=+w*}sbBJ~_X3WGvK*mr.-dxN!g0R86)Vx*bRKn,' );
define( 'SECURE_AUTH_SALT',  'Xi90gPLf>FhshW%S+>o~6Fh5v^6K<HG2SPYgzxoHFZBoDUnQY%m/9:m>O,$a]t)X' );
define( 'LOGGED_IN_SALT',    '@e0gUuOn}pA^RV+=e>$H,YzWp^]:p&:KT~HI1^jo~IHzSHj=[m|%R(h5=Z/E>KB8' );
define( 'NONCE_SALT',        'i}1@;CJJ*3ATuz(>f>A^8GpL_lqto<IwAs#`FG4PlvkH5,%dd+:R(6C-nvn/E>ov' );
define( 'WP_CACHE_KEY_SALT', '6BkE30AK|Ud&5%gHM$~>h9(LOFp{}CT^z7sgW-S~c+j<m/NTdtWn1TXxd`oEiQ){' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



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
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
