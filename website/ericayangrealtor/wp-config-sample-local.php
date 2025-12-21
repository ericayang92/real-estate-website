<?php
/**
 * Local Development Configuration Template
 *
 * Copy this to wp-config.php and use for local development.
 * DO NOT commit wp-config.php to git - it contains sensitive credentials.
 */

define( 'WP_CACHE', false );
ini_set('display_errors','Off');
ini_set('error_reporting', E_ALL );
define('WP_DEBUG', false);
define('WP_DEBUG_DISPLAY', false);

/**
 * The base configuration for WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wordpress_local');

/** Database username */
define('DB_USER', 'wpuser');

/** Database password */
define('DB_PASSWORD', 'wppass');

/** Database hostname */
define('DB_HOST', 'db:3306');

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * IMPORTANT: Get these from production wp-config.php
 * These must match production for user sessions to work
 */
define('AUTH_KEY', 'YOUR_AUTH_KEY_HERE');
define('SECURE_AUTH_KEY', 'YOUR_SECURE_AUTH_KEY_HERE');
define('LOGGED_IN_KEY', 'YOUR_LOGGED_IN_KEY_HERE');
define('NONCE_KEY', 'YOUR_NONCE_KEY_HERE');
define('AUTH_SALT', 'YOUR_AUTH_SALT_HERE');
define('SECURE_AUTH_SALT', 'YOUR_SECURE_AUTH_SALT_HERE');
define('LOGGED_IN_SALT', 'YOUR_LOGGED_IN_SALT_HERE');
define('NONCE_SALT', 'YOUR_NONCE_SALT_HERE');

/**#@-*/

/**
 * WordPress database table prefix.
 */
$table_prefix = 'wuc_';
define('WP_CRON_LOCK_TIMEOUT', 120);
define('AUTOSAVE_INTERVAL', 300);
define('WP_POST_REVISIONS', 5);
define('EMPTY_TRASH_DAYS', 7);
define('WP_AUTO_UPDATE_CORE', true);

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
