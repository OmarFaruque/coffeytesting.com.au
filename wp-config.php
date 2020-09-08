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
define( 'DB_NAME', 'coffeyte_wp959' );

/** MySQL database username */
define( 'DB_USER', 'coffeyte_wp959' );

/** MySQL database password */
define( 'DB_PASSWORD', 'TpbdS8@56(' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '0ng8xcdfxec5fgjkoondtarq1vtiiuvbjy982i6k6bpnperjp7rtj8o9ktvjtie6' );
define( 'SECURE_AUTH_KEY',  'xd4hp5rmz4vmq5ujz2csjsmkb9ogfnwexbzsh711hzvtall9hvsuk19lvqnajovk' );
define( 'LOGGED_IN_KEY',    'kl5z3an2wdd5jb4jw4tjmqito0l90ocvesxytejjowpv8bjslqwzplnprhg2fh5h' );
define( 'NONCE_KEY',        'ytqhbe8mrgqoqv75ol7d633rfvewz1beqgvmtoxjv2oxnqb8t9dq14s37vezffw4' );
define( 'AUTH_SALT',        'rivfzi3huu5r2x0ltwun2qew81csd3t6elnjwl65tgu85lenctitthvafmiakqfo' );
define( 'SECURE_AUTH_SALT', 'ctrm2ur9kkcuym2q8c2tf7wqrz6vihxvjb1yagjilewxz3dwrkym3obyr4lp4ie0' );
define( 'LOGGED_IN_SALT',   '9zpghmufa3pcoipp0zk3wdhgd8d9two3o5trxucrvga61dxhj1qszn82il3hqmas' );
define( 'NONCE_SALT',       'hmeq5jzqsdb2f25bjsozavqpet2eawvbkp566tnhrqfztdbiulai0yi4q4hymzn2' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wppr_';

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
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
