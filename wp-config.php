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
define('DB_NAME', 'bantincitigo');

/** MySQL database username */
define('DB_USER', 'admin');

/** MySQL database password */
define('DB_PASSWORD', 'admin');

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
define('AUTH_KEY',         '%;/%4BP`K8(Mv8m{%m*p-mlDG>25LBDdH!o3 nn3Jmje*ah(C?56PbA]!R)7wU%4');
define('SECURE_AUTH_KEY',  'FWdY$wI}A^[?u*gdm<UF#CKFSQpa)O$t9A1[zz9cUS/QVg!:7 r8)S5MQ>/mbPU1');
define('LOGGED_IN_KEY',    'gKiqZ-e,;I697CtY*g*aow,i_4A7bV?O(qRPV4t4K[+n:CRYMD1LS.H_:x|*VBOK');
define('NONCE_KEY',        '`=[~z.[0zj>v]Hb+!$},j#p<nBV$LkV;YQ,,m&Z~Yrd!VK`-?)Rlk*rJ9f.ik@2]');
define('AUTH_SALT',        '+Lh@bj}NXO>?NIsI`2SsTUQ>wzFlXM&nXXX81-h+&Db%nGRA<m8m^++~IVybYEMG');
define('SECURE_AUTH_SALT', 'xo![S:|7in.rFAb+Qc%5XKEe@zv;KJ76`9 Ab*}!)y+U3<N;z+yzms3CXLlJVVe<');
define('LOGGED_IN_SALT',   'N{Zps@9r~3EU`6m<n`P2V5CG_ZwyDKfFb2#YPXnp&B#yvcGCOH;<2}8I8Ki]W]IL');
define('NONCE_SALT',       '9^6~Lv;iz=s>#:f`Y7&z13AT1#us-fNxoI)C8=8%Yv^wwEl|jSNbfvy^=jaA_kgF');

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
