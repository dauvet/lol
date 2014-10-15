<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'lienminh_lol');

/** MySQL database username */
define('DB_USER', 'lienminh_xyz');

/** MySQL database password */
define('DB_PASSWORD', 'xyz123456');

/** MySQL hostname */
define('DB_HOST', '125.253.124.134');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         '!Iu.^aNtJp2i!/M3V4+kk+oH;my#l2Iyx?_V<YKj#l/]|zQ]2 !sfcGRT.?,s6J:');
define('SECURE_AUTH_KEY',  'S>S]eWJyUbe-E@:RAU;4claBX+?R7UfGZnT`l@2kD%j<H&rJbfvX:;o <jd>9;79');
define('LOGGED_IN_KEY',    '(=Vk`L.)yJ-|R-3PqlR1Pqq$0+$<B4HuFU8Q_M~v|j S;nW]s A/CL$u k];G%-6');
define('NONCE_KEY',        '?/Vj+kZIXd95#xG:OJ-?3f]!r.Tojz7(B}_@$Un-`;:.HSQ(B+0J{a/w9*VwfOdC');
define('AUTH_SALT',        'i[7XgzjLZ~iRO+`c#^jZkpK>)~Mt^-Wa64LHbw@]^* )SI0~|>(1Yl+4#jSK/p+d');
define('SECURE_AUTH_SALT', 'zN>6}_N.P)$mM]CA1L]rcGGFb|;4~Vy8&G:7.j&NOEMZdI6-z9<-KC6TiM[Osq.c');
define('LOGGED_IN_SALT',   'OZ/&a/B?(uxtr8^%&ts?sOdjtILLXUCXeH=lsldM8thqB#7uW!r6XFhVZJ-Bvj0G');
define('NONCE_SALT',       'KCV8ueKjV6|v}o;P*eM]x.-_Pb(qWYEpbwA&+,o312o|694HY2V:}v1NLz;@len1');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'lol_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
