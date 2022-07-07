<?php

/**
 * Laravel - A PHP Framework For Web Artisans
 *
 * @package  Laravel
 * @author   Taylor Otwell <taylor@laravel.com>
 */
//echo phpinfo();
$uri = urldecode(
    parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
);

// This file allows us to emulate Apache's "mod_rewrite" functionality from the
// built-in PHP web server. This provides a convenient way to test a Laravel
// application without having installed a "real" web server software here.
if ($uri !== '/' && file_exists(__DIR__.'/public'.$uri)) {
    return false;
}
ini_set('error_reporting',1);
//////run composer install
///////run php dir_maker.php   ///to dcreate folder for all dir
///////run npm int , npm install , npm run dev; to finish npm instaallation
require_once __DIR__.'/public/index.php';
