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
define( 'DB_NAME', 'myschool' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'eD8Np;0<6}QQE#6+JA7`o)#:GnEC=({Na #[:?FE>1}~@` *JFY5K5&nxX9FZOwd' );
define( 'SECURE_AUTH_KEY',  '8oM91Mi9p+xB)e<CJWxD)[.dfn3YCx9BAUxI!Y)4<m->]f;G|L0Csrgg<#L.;v]R' );
define( 'LOGGED_IN_KEY',    ',]RB=<v)0s*n`AGv;Gqs[PJ#4L$HfwA+/WPd=lZs6WF@Ta-qm!/Ozb3)9bRqPNRZ' );
define( 'NONCE_KEY',        'QO&=KYdOYSNaq%IoU8Ga)._iG;v0Ej0p!)-6Zhm66v#V+JXFd9HLwR%)|0nCUaw1' );
define( 'AUTH_SALT',        '_]-#@<v6i^B_.s8Pza1q7XhnGc[;9}Bx$z4GeMM.#yTcs1f1jubCg67{FL<`7etS' );
define( 'SECURE_AUTH_SALT', 'IXt6+qFF|IAxV gAo+M5OwpyVKUc.kq)h$La[.3VSmUlQ%Qrq$Ra*%G_?;m7QuRS' );
define( 'LOGGED_IN_SALT',   '~73;W:2LQG?F1[?T^M#}1UD.K~*p}e1UVH[B0vTwv-%nj>u50J@kS>|LbT,8(W)I' );
define( 'NONCE_SALT',       '>t&Ulv4KC4!:+OM,UUB5r@o:}/2eM0d~8yP|/yZ!qp+Ql$?@k&=k60XJi|y|x%WO' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );
define( 'FS_METHOD', 'direct' );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
