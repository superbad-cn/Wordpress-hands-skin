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
define('DB_NAME', 'replace_aren');

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
define('AUTH_KEY',         'l.AiC.;oc~k|G5-{1KsMCo%|ocpiu8cXc[/]V6+t2(?4Oe!BQH4`3 P$GdVbBVz,');
define('SECURE_AUTH_KEY',  'jWxfHPaTt,S, nq,059=$d&K8<0[g.5W6N.F9rSdX orWt/#5e `pq97qwx]z7YO');
define('LOGGED_IN_KEY',    'ls>Y`s)m,5p V>>;1?v,HG4x$kV1[be+C!G*h[c1+l>r(X--6yW (p,QXP}W.G~>');
define('NONCE_KEY',        'd>i4e`uQ[nZt0{x,{g>JI<,Oa`cXkj%ZM;#.jEn&$glS8R7aa|e`atEh6e#7IzsW');
define('AUTH_SALT',        '=}j/$-Io#soy_@Tja|]HLg8nn)-+$2 Y_?g-TAz`Q;Lgyn?/JuBt~zJ3JH9?fD/P');
define('SECURE_AUTH_SALT', '(uR]+,xuQ+TX|!a!1/G xQ:!L%:VJ4BG=+wPvj4mXa)eqy#l&CtnF,;3niDdy<85');
define('LOGGED_IN_SALT',   '3 Kyxu+VZ$zMrdl_ekAfs~[BgzBq#GB#VX%d]{ip{8%ntI1![FodO4GZ2 $%-so?');
define('NONCE_SALT',       'B[nm~Wr733Q. w^,|:YyeQFd;?6aD9GlFqWQ|bup`lsWf@~RlJnR$nIPeKnCQYlv');

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
// define('WP_DEBUG', false);
define('WP_DEBUG', true);
define('WP_DEBUG_DISPLAY', true);
/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
