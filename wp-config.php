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
define( 'DB_NAME', 'wp_test' );

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
define( 'AUTH_KEY',         '~MzvlZ_}|>W3:-G_yh.pz[waU(vV81e1$,f69]JPA&v6%q():3a(Mh-/;&[CVv^=' );
define( 'SECURE_AUTH_KEY',  'ow3.6F,xF<%#G]s4eeZjzb`m`:@,|;hV7}=ly&L,eRjKp02,8t<_@(sVlp`P/n;P' );
define( 'LOGGED_IN_KEY',    'X+U}*B7w<*kvZe7X_<,koo?++/c<3slraOVy{5nbM:Om?&*?NPeoDFIbf#a68UvF' );
define( 'NONCE_KEY',        'rF|tl-T|nD5x>Bw4hd*v02b:MS,*~t[i(twINT8&HolQ~wo]B9[EL-AUL8G--Sx6' );
define( 'AUTH_SALT',        '6ly&#9}dYEyo}I{JuiQ)7bGFsEYdNQROX&OoL%5zE/qorS*oj5:)<b6:Ycm3F  z' );
define( 'SECURE_AUTH_SALT', 'X6C5.oTCP/&*!129*e{C66<<?*q#>m>S|bF+C$R,&iTI+n7/M^K~9Zi^OPquq^$w' );
define( 'LOGGED_IN_SALT',   '^vP%Q!ml:i,;d):$xEnMA^N|{Wc:!{{XHy^`Z0$fp^S~ E-noG@r2q^!Ydm7H{A;' );
define( 'NONCE_SALT',       'rd*A>l:g`s->c7{gLKu%(%(@de4Y=EdQ >n&XDR-+xl 4=<[j8zXG%}WdwRO>#I:' );

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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define('WP_DEBUG', true);
define('WP_DEBUG_LOG', true);
define('WP_DEBUG_DISPLAY', true);

/* Add any custom values between this line and the "stop editing" line. */

define('HUBSPOT_API_KEY', 'pat-eu1-dbf1bc9a-0470-419a-a4b5-cfed7ebcee15');

/* That's all, stop editing! Happy publishing. */

define('FS_METHOD', 'direct');

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';

