<?php
/**
 * Global application configuration.
 * Edit the constants below to match your environment.
 */

// ----- Database -----
define('DB_HOST', 'sql209.infinityfree.com');
define('DB_PORT', '3306');
define('DB_NAME', 'if0_43222940_php_admin_panel');
define('DB_USER', 'if0_43222940');
define('DB_PASS', 'PJex8ipvzpkjC');
define('DB_CHARSET', 'utf8mb4');

// ----- App -----
define('APP_NAME', 'PHP Admin Panel');
define('APP_ENV',  'production'); // Changed to 'production' for InfinityFree hosting

// Auto-detect project root URL so it works whether the request is for /
// (storefront), /admin/ (admin panel) or any other sub-folder.
$scriptDir = str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'] ?? ''));
$scriptDir = rtrim($scriptDir, '/');
// If the request is inside /admin/ (or any deeper sub-folder of /admin),
// climb back to the project root.
if (preg_match('#/admin(/.*)?$#', $scriptDir)) {
    $scriptDir = preg_replace('#/admin(/.*)?$#', '', $scriptDir);
}
define('BASE_URL',  ($scriptDir === '' ? '/' : $scriptDir . '/'));
define('ADMIN_URL', BASE_URL . 'admin/');

// ----- Paths -----
define('ROOT_PATH',      dirname(__DIR__));
define('INCLUDES_PATH', ROOT_PATH . '/includes');
define('UPLOADS_PATH',  ROOT_PATH . '/assets/uploads');
define('UPLOADS_URL',   BASE_URL . 'assets/uploads/');

// ----- Error handling -----
if (APP_ENV === 'development') {
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
} else {
    error_reporting(0);
    ini_set('display_errors', '0');
}

// ----- Session -----
if (session_status() === PHP_SESSION_NONE) {
    session_set_cookie_params([
        'lifetime' => 0,
        'path'     => '/',
        'httponly' => true,
        'samesite' => 'Lax',
    ]);
    session_start();
}

date_default_timezone_set('UTC');