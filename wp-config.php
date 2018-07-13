<?php

define( 'WP_MEMORY_LIMIT', '2048M' );

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
define('DB_NAME', 'reporting');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'wgruser01!');

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
define('AUTH_KEY',         's Br`Z0ceh*?7uU3Yx$X]]Ex$CEoZ,v6$JtIJyshW:%zs|>Y&kMwJc;iSbUC{Pg+');
define('SECURE_AUTH_KEY',  'z7H6yv.qC~Z:Pl@!`UKD(uSrY9^#{:v wbl2xkA^&DO{!42-}s-97AhQbA8$02D9');
define('LOGGED_IN_KEY',    'Ib*P+A?6KYxQ6S8JnHrOy6FQ4cXE*d5O;JZQCvhM8cEx,3q~{A&uPX~P`J~sWXjD');
define('NONCE_KEY',        'S`b*]ufgZH#}>tj[q}PIF UnManRL8o44>1{LW`~`3v:*I]:wZ)_4#Dx,<(7IY/m');
define('AUTH_SALT',        'DlrQF*nLjBdgC-E 6YZ4uaQkgjh^X)oiasuSPw5l9u?noveM-<LqC.r^$L~F~gfE');
define('SECURE_AUTH_SALT', 'u]`5Oo,MGy>Q7OT_u)[G*eD9{P*h.?6sM7;?pJ[s(<$15bTX}NC1O=tA%-W`yuq/');
define('LOGGED_IN_SALT',   'brGR2^6sm6NHcr^5+:jM*.yacGzJLW +?T>HkcC3JCOM:@SG{bbAZ1?wo)v{,B{r');
define('NONCE_SALT',       '}cD{A1?:r4t)@2(mw8SSB(UJVO{Y4 +fA#=!9p(drr_.6>YLol{Uy3Nw:?<lC&:(');

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
