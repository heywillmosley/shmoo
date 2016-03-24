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
define('WP_CACHE', true); //Added by WP-Cache Manager
define( 'WPCACHEHOME', '/home/superamazing/demo/wp-content/plugins/wp-super-cache/' ); //Added by WP-Cache Manager
define('DB_NAME', 'shmoo');

/** MySQL database username */
define('DB_USER', 'shmoo');

/** MySQL database password */
define('DB_PASSWORD', 'Ks9p_^o8B}p5');

/** MySQL hostname */
define('DB_HOST', 'localhost');

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
define('AUTH_KEY',         '5FPS8TwTUtg7lSmbLC9pK9uP20Ha1zLS5GOeJp6UZ8tVimLaGxqyLRFnlJJn8Fr0');
define('SECURE_AUTH_KEY',  '0NsORo1GtFxwQOnrMbvaOjVTFnzjDZ7Au037bTF99FsbQ9Bwo1Y4rEGOOVBvbL9i');
define('LOGGED_IN_KEY',    'nPwJuGu7pJTxwokayaznhRvENWLGWra2aTtnS0FGJRSB5pzgSEqpu9f2VjQJbtIw');
define('NONCE_KEY',        'PgRn3vl5bisGY3MSmlrWvborqgbKscR3hqFX7BsIf1Tb0mq5kWzOhdcm4s0WChJY');
define('AUTH_SALT',        'er9iZj1mG3XJB4Y4cO4skspRjgyGGxq0L82iNDFf1qdphuB6zDwpMHjyc3m4UIyt');
define('SECURE_AUTH_SALT', 'ZYsHfAmsBAqNeQft5qI0c0SLUmEYl0mAKwqxkyBNw8hsLdV5pK3kUmnWiOS7GL0M');
define('LOGGED_IN_SALT',   '2NJWLG6rkhzRuLD1MBIWEweMbsWjfLGcvUYVCrkNRGENBGCJzFpEuV3sNAudT19e');
define('NONCE_SALT',       '4lKQTPMT6H3pQlqJqfu2RHDWxbQ8HCGIMX9KhclINnA0O7F81odzLP3Bi9vKMJ2L');

/**
 * Other customizations.
 */
define('FS_METHOD','direct');define('FS_CHMOD_DIR',0755);define('FS_CHMOD_FILE',0644);
define('WP_TEMP_DIR',dirname(__FILE__).'/wp-content/uploads');

/**
 * Turn off automatic updates since these are managed upstream.
 */
define('AUTOMATIC_UPDATER_DISABLED', true);


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