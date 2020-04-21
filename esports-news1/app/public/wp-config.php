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
define( 'DB_NAME', 'local' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '6PSu2zNVtX1j5n6p8BnhmiXJntfVQ+JMMM62cwjBv8BRQddYwJIBZScM61bJGug/wiO2VvRooihyuLuMELJNYw==');
define('SECURE_AUTH_KEY',  'qqt0qY24D7lEvkXNn4HgoqRpDRAgFSCcoFK15kVsQnPRtskWcXE444GLXEssV3L0e972aoNZPwPbE53cHJQzAA==');
define('LOGGED_IN_KEY',    'bX/+/ZnGvN5Ma9kdUyQ9neQsx/Fk7MeXCbyQzCgxqy/8A4A5kcyiZKNM1OewnjHDYZhqnpYfoRlQC7UzImDVqg==');
define('NONCE_KEY',        'FhnCGbGmaInHZ9+Pn7UFlZaPW0K4d7AqAG/MmOsRWUef669RnNIknX7ptb0JPRFL/SHnv4gR0GfksArlUM/1Wg==');
define('AUTH_SALT',        'Oh2e86zdhcKPTho9AtEKGXyQq/OnnsygUiNB4ayj01nYhkN2HaiFPdfZlTwWKXhOw/yhh0lJtSlEiIO2fPc86A==');
define('SECURE_AUTH_SALT', 'khVZQM8pU6WqvN3jh1FN2cbJMHAnbwsigC7Bo6LE7s+9TuTSuoAk6Wj3cWLoKSPp2Z4FFSv6uuNMBtLzPDPzsQ==');
define('LOGGED_IN_SALT',   'X0UFs3pG8bnlLkVjt5kzsJxQ//1U5GNvXe+EDeXCnq3aN0/k1rqxZvOWiyHSs4+ITbW9YeEmWBWEByNIu+o2KA==');
define('NONCE_SALT',       'kR0ZhAncJ+W+S5La4AgPOOqO6SxJQAr+wDIV4m+YD6fo/8zXyKCVCpDJlAuJqMyT7yaZ+Zd6ajTleOMl/82nNw==');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_5ebx60yrn8_';




/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
