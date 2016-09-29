<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link https://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'new-himatipa');

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
define('AUTH_KEY',         '{1AYZchO=#C;i0iS&Cp;cF*AKOpE[;h|O7nhd$0l,xHzKA^-7c a2=_<x8?<IXcQ');
define('SECURE_AUTH_KEY',  'Dfdp kjx^Lmf>DCW5XOap`JN[8pDCBDNI@qKO12_2x]RIS)$zbp:b=0ewp`]h6D{');
define('LOGGED_IN_KEY',    '9n$E5WPI#4Q6BUb)Op!`m1+*)CBvZzW,.DSS_(U_7/}7Rj)!B+S&?>m19YKpzFw~');
define('NONCE_KEY',        'P;nT0KOD+maio5n4#|JLIUt/~mW5z4fY44Md&:#PG`q?$b.py[I#T8^$)%hy+?iE');
define('AUTH_SALT',        ',(Y)jU;F2s/J{nVz*$FAG_.i%XInh>4ff|QMwY;X/-zWp_S3 sq_Ezzy>Do jh{n');
define('SECURE_AUTH_SALT', 'n+ y)@=0,_F2r,#/MN6J]W&dWqT?8VsSr6YIC%-FS9}55xX31c=[Y%3W+<cK=gO{');
define('LOGGED_IN_SALT',   '$j`7[lzr4qGvkkphR2~C&S^HI4.kLbg>Ar~X2.xgORog?`)/)%Y^Zv-|(#^mlV[{');
define('NONCE_SALT',       'y.ArDUu1_3118!E 4-@X/,~e&Z3MHHvS[<qx-j>~+)A+i*[LK/jy9A~qZaWk_}/2');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
