<?php
define('WP_CACHE', true); // Added by SpeedyCache

/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'vedica_wp706' );

/** Database username */
define( 'DB_USER', 'vedica_wp706' );

/** Database password */
define( 'DB_PASSWORD', 'Vp39)G[S6g' );

/** Database hostname */
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
define( 'AUTH_KEY',         'xkajnnvoacj1zqolqjdwti3rvxlo5tk94thktrro3oodb9vels1pbeqierdndccc' );
define( 'SECURE_AUTH_KEY',  'nrszyqjprchnd0kcaurg12vk3ufpjgi4n1jnviazgzqqfzu5pjeecygfjniob7wv' );
define( 'LOGGED_IN_KEY',    '8yeed1xq70pajxs3ytvmejmtvnq3tnflhdj6dejnsvla8jka3v9xpkzmjej8updx' );
define( 'NONCE_KEY',        'eymixzyd3z11mm2wd3lvs6u7l2mhf5psvhddjzssn2ut1wv3yct9qytbv2k5ay5x' );
define( 'AUTH_SALT',        '7iyvwsob99xlmjtdincs4ikzti1hpyfya3verx0vnicd0osjnpi4okf53i5njfbw' );
define( 'SECURE_AUTH_SALT', 'c52qjc3cwxbulnny9b1di6lce9ihsfef5fgsgrzahy3w1uztmh5c6pm6em8xtvhc' );
define( 'LOGGED_IN_SALT',   'g8lotxpstbajfqe5tbcbdyinlabip0jf4mvyzoc3p5nsndudrmlt53jpargfd4mm' );
define( 'NONCE_SALT',       'mcvqbzhpbkmknksic2qztyhh6xqx1azcr4hw9qgdiq1xkvv8mni26yelswdumvi6' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
 */
$table_prefix = 'wphm_';

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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
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
