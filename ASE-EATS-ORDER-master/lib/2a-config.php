<?php
/* [DATABASE SETTINGS] */
// ! CHANGE THESE TO YOUR OWN !
define('DB_HOST', 'localhost');
define('DB_NAME', 'ACCASE');
define('DB_CHARSET', 'utf8');
define('DB_USER', 'root');
define('DB_PASSWORD', 'newhorizon');

/* [MUTE NOTIFICATIONS] */
error_reporting(E_ALL & ~E_NOTICE);

/* [PATH] */
// Manually define the absolute path if you get path problems
define('PATH_LIB', __DIR__ . DIRECTORY_SEPARATOR);

/* [START SESSION] */
session_start();
if (!is_array($_SESSION['cart'])) { $_SESSION['cart'] = []; }
?>