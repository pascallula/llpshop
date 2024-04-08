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
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'Bd_bac3' );

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
define( 'AUTH_KEY',         '=`x6F U|[Z1( v#.kR$/n_C^xvp?nYE,g5ytqAzD|8k3}%RwizuY.fXMOB A#LZ!' );
define( 'SECURE_AUTH_KEY',  'g_mnP_H((H,0,DR-&%?~$%+>>G|^Ko(kNaUNk{V3&D_}{1pU^l]7OH;g3=@[71]>' );
define( 'LOGGED_IN_KEY',    'f[{j-#f#hO3Lh6+xG,+w*jT4oW^#k>GB0o&|:6ksdw-g%B*Ck!9(VdZAFI cDtT+' );
define( 'NONCE_KEY',        '$UK<GN.}?zE7Lzhc50t=]:{]X%u&Tl8 KcB!3&Q9^xKIYg ?O A4>nzsT7CmQo+M' );
define( 'AUTH_SALT',        '?uPR@yCHdgUCZOI%,T*k{&w]qBWmxKM^<bZn*L44?N`EpYF*Gx9$H7Hg ^$y++<*' );
define( 'SECURE_AUTH_SALT', 'aaE_VmMyqnZ}7<5!HQ-)+?&dg$sl,O_t:$A*w]o 77v1vxu>bVeQEZ*B-?X/J?y0' );
define( 'LOGGED_IN_SALT',   '/lMB!Fo?q}&aO-*O<xV78jY>tX&yb*_0@b:,(DYgV;3R-YoFDG`oB$QhL-.xJ@xE' );
define( 'NONCE_SALT',       'x?kzI:hqfpClsyaV3pRx3O9?4c$zW<UAt-z]XM6YN%b<WL-q8p;McEhO=G2I,TD9' );

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
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
