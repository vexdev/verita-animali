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

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'I[EB_M9p5_P1o=+KWk1;5+TySRIDk!?6-hDZDPgi3*r&keU|pq(7dHxtR]!SERG{');
define('SECURE_AUTH_KEY',  'mLP+i#hR9X-vgN:zVcLkK-[W*N_F7K1q^l$(zMFcX]2G`f0-;s7-@JT]bg% o,~7');
define('LOGGED_IN_KEY',    '[RI9<d3c)T!Ek-<g-A8j/vP7:`zEQ+2|-H6{|/ZtQ}~hfD%odWltnYik0n-3k d?');
define('NONCE_KEY',        's [-f|0LQ6)c9NPWIiE}opNx3ZFPYp}B-#^*)DNaG!43O_4$DN&Nw&AC*YfJBsrc');
define('AUTH_SALT',        'F:6jPe+S)?K14t>]3(P44<37& sl+V*pVuF;C__N_HM0mIj0*yv;><omF^TSRr|?');
define('SECURE_AUTH_SALT', '+4n!CT_0tu>.:tQcJ-&#{@qHox}?Ef*M=lz$/1+nq_9yH0Xi0?sceb|hPtxAJ@T[');
define('LOGGED_IN_SALT',   'tKn%;F%lxu9=p<g<^ J,bIoV#!+C+CMYd_&1;h/l(RB,=cL-M%Dm+.}*.YFq]P?<');
define('NONCE_SALT',       '8{I/6p(zd9{:x:1cT-VawhVjzFm $1+VQx+ASYLS3?r6AE?lS9Y 6RJ Kg(8m8rH');

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
