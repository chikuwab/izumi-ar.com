<?php
if (preg_match("/izumi-ar\.com/", $_SERVER["SERVER_NAME"])) {
  define('DB_NAME', '_izumiar');
  define('DB_USER', '_izumiar');
  define('DB_PASSWORD', 'h3frpaw5');
  define('DB_HOST', 'mysql320.phy.heteml.lan');
  define('WP_DEBUG', false);
} else {
  define('DB_NAME', 'ys_izumi');
  define('DB_USER', 'spadmin');
  define('DB_PASSWORD', '$Fe8wrXL');
  define('DB_HOST', '127.0.0.1');
  define('WP_DEBUG', true);
}

define('DB_CHARSET', 'utf8');
define('DB_COLLATE', '');


define('AUTH_KEY',         ')G0scH<$-)|C?2p4so^Cee^d.uKfhZV~Hw/6x6oU7r6>{Jn3tNA#l_HL!N@WBgIe');
define('SECURE_AUTH_KEY',  '9 mTDxarl<N<vB||(g$qi+xnut==p,5|xKA=x)9+5fSEsQqT]p2NcX.`M]pY-b?[');
define('LOGGED_IN_KEY',    'N4=DGV<+J-;=],CI|V-GRMIJe:o=LeRXlLFX2$QTe-pJwG9)|_+712tF:uc|j&/u');
define('NONCE_KEY',        'mpu`!jiPxTE+$_f1SC/J6g7kMwuu4-(r7+:;xI7aScA)[B{hH-_R$|s-tMg[ylVd');
define('AUTH_SALT',        '+Pm}~r_HhyE8$e{g:[iL9%.v+U0w-}&E_:Dd6`Bf|XDF(-;fe|<?y@RLq8&`ezli');
define('SECURE_AUTH_SALT', '$tKHh#fxqUqWX;{]:;{e?[|xzGMD)9!z|xb(3&z4H?5F;gV,[+t-H~Nj+Layy6+S');
define('LOGGED_IN_SALT',   'M6kN&dhJ|!hIR.-)p70GQ,8 %w|!+?)eFZsZ+,)A}dozk%^i!$(r4ENW3D]$J#Ly');
define('NONCE_SALT',       'JTfu7&->49jdOYXTJGk&]/s^R}`Anr>W24ZDUD(Egu|~ Cx`sfGfeyP(x!tHF4rj');


$table_prefix = 'wp_izumi_';

define('DISALLOW_FILE_EDIT', true);


/* 編集が必要なのはここまでです ! WordPress でのパブリッシングをお楽しみください。 */

/** Absolute path to the WordPress directory. */
if (!defined('ABSPATH'))
  define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
