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
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */



// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'autocar' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
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
define( 'AUTH_KEY',         '=eog*B`R(}Oe hp#6[S&i5rTPbLlNm>Ary1B]AQ#Cf%g0D;N PXr.Q:hW8j&usi ' );
define( 'SECURE_AUTH_KEY',  '<=h$p(X~89QN4UxwrkV`d/`,Pf@axQW|{GDIV3vahy*-a_}!]+VMueNjh1B1.toz' );
define( 'LOGGED_IN_KEY',    '*~`I>|,cO53a ?D#%Bk2V!JR8GUc272g)Im}:X&d:Zxsliq4#PX26W9J!8>,tal5' );
define( 'NONCE_KEY',        '^R+~)mO.Eh^T. lMGvvaH91T%^y)bl+TKsz[(~aYt_~RqWn* Wvnhqohi#M`uu24' );
define( 'AUTH_SALT',        'C@AoyH/Gw/s97f]I1Q9KFv-% ?EEoECUs%K#-FG/%i=/<EWgf1>FnTVc>aS>Jy.W' );
define( 'SECURE_AUTH_SALT', 'wnip.YA JMeQgt/xf/L?vmjHaM(;A4M 6HZvjO_qL@kUrH|@Y5`NuVGMshe[=,0D' );
define( 'LOGGED_IN_SALT',   '=|}*WBRS:dZ,mvkmo_h&[e$:(t4^GM~[*|?atFBC9tDLXw,G@XhDgNsI];yL_*Bk' );
define( 'NONCE_SALT',       'G)}[:Co)L4o)cpS1DEjU_bqT2QS4[>c4kuw2(Xi-AK`*oh7hprH;[W6s5>Ki0>.@' );

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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
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
