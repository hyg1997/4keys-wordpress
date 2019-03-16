<?php
/**
 * Configuración básica de WordPress.
 *
 * Este archivo contiene las siguientes configuraciones: ajustes de MySQL, prefijo de tablas,
 * claves secretas, idioma de WordPress y ABSPATH. Para obtener más información,
 * visita la página del Codex{@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} . Los ajustes de MySQL te los proporcionará tu proveedor de alojamiento web.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** Ajustes de MySQL. Solicita estos datos a tu proveedor de alojamiento web. ** //
/** El nombre de tu base de datos de WordPress */
define( 'DB_NAME', 'blog_1' );

/** Tu nombre de usuario de MySQL */
define( 'DB_USER', 'root' );

/** Tu contraseña de MySQL */
define( 'DB_PASSWORD', '' );

/** Host de MySQL (es muy probable que no necesites cambiarlo) */
define( 'DB_HOST', 'localhost' );

/** Codificación de caracteres para la base de datos. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Cotejamiento de la base de datos. No lo modifiques si tienes dudas. */
define('DB_COLLATE', '');

/**#@+
 * Claves únicas de autentificación.
 *
 * Define cada clave secreta con una frase aleatoria distinta.
 * Puedes generarlas usando el {@link https://api.wordpress.org/secret-key/1.1/salt/ servicio de claves secretas de WordPress}
 * Puedes cambiar las claves en cualquier momento para invalidar todas las cookies existentes. Esto forzará a todos los usuarios a volver a hacer login.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY', 'Dn=Z{pV>r!(HH1IdM uTvL9AMr6~QkRTByv6ic)CR-$:;f0(!X|INb;`x,?jdL(T' );
define( 'SECURE_AUTH_KEY', 'wMq<m>l6CClqnU,_=Ld`sJ]bx8>>y#+6#KtAXQ#73oaO@}[iGieGzpcBya*Nyk7}' );
define( 'LOGGED_IN_KEY', 'O6F<Npn?wIfyc.5>Rz$G!TeU,Iw2pX*(7qnum|8G-@>,>n[AITUKAHki9taE3GX4' );
define( 'NONCE_KEY', 'EaZ&3vAm+v5aIe T6rck@,}f+A=ULN= usO0Gj{(4q#El2uflA0SYBJ^<vfhh*G]' );
define( 'AUTH_SALT', 'v-U0mK1_jwcm5;n[vX&IDO68Sgtm(PPI:gbE1@yQGo]#L=WBIpF_))dBx6lN]m5^' );
define( 'SECURE_AUTH_SALT', '7YTcmh$a):r;pRUtjJ8=k{vd29G!NPGHXm0LOX:B)G9D^Y^nmlz1:4Vl%}}ys zw' );
define( 'LOGGED_IN_SALT', 'f.9cj+k1k{q#W.RF*Ax%_[8dy(Q`l:v|sLNB^y}!KT-k_!GZ}}2%ema~OGKHI![l' );
define( 'NONCE_SALT', '~6Om>TFMk^Igtr-Fqb&_(S!`A|j!9xOlcZW1r 1G2vS6C#,c+lqt(EK$6et|(BWs' );

/**#@-*/

/**
 * Prefijo de la base de datos de WordPress.
 *
 * Cambia el prefijo si deseas instalar multiples blogs en una sola base de datos.
 * Emplea solo números, letras y guión bajo.
 */
$table_prefix = 'wp_';


/**
 * Para desarrolladores: modo debug de WordPress.
 *
 * Cambia esto a true para activar la muestra de avisos durante el desarrollo.
 * Se recomienda encarecidamente a los desarrolladores de temas y plugins que usen WP_DEBUG
 * en sus entornos de desarrollo.
 */
define('WP_DEBUG', false);

/* ¡Eso es todo, deja de editar! Feliz blogging */

/** WordPress absolute path to the Wordpress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

