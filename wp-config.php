<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link http://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
ini_set( 'display_errors', 'off' );

define('SCRIPT_DEBUG', true);

define('WP_LANG', 'vi_VN');

define('DB_NAME', 'hanoivoyage');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         '+pE8Dp5[9l+_`oVNS.=au~0VwSH)-~_+6hs*toAq6%:2!UK;49b2TO}tXi08wvlU');
define('SECURE_AUTH_KEY',  '8-$Uuvy;W+v8{ >~/t Ut8nd9k%fPq76Ue[1=S??%#4:|YQ<X&y];/+su@FQ9R8,');
define('LOGGED_IN_KEY',    'p<U!zu&)pE;NZ|?rkISrnL^,4TTDFjhUZ,l!FUIgYpEj|F+p#;{=1UIXphm2}Kp9');
define('NONCE_KEY',        's3TT~2:d,6$l;|#-~Z+[u?N)eyuQ?boii.<WI73wZxb?T2ftL<B=::BU uo::0nz');
define('AUTH_SALT',        'J3|~V-K1vCU0=[NVJHa~%AKb<@Iq/s}rr!Rb8mP/DS|JsrRhZ f9h$oau(|tRC+*');
define('SECURE_AUTH_SALT', '?x4kb:t(RL9&kpb5eO.O_[QIC*wT>e09|chA [){BuW*PdHC10BmBoy~Y$-:yvN`');
define('LOGGED_IN_SALT',   ']Z3MkozM!?U6SF$=NEbo1n9WS5-j7V!nkP?nO&P+g|94 H?D<kRG[.JgH^,aJZK_');
define('NONCE_SALT',       'fYtM0`AjSuSx2+|hX.+$1E*&h`/h>+#X[LUgsGV(|wCu6iPFk_bM<Xt0|^p/%b/b');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
