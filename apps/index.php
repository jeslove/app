<?php
include_once '../vendor/autoload.php';
#TODO
ini_set('display_errors', 0);
#TODO
ini_set('display_startup_errors', 0);

error_reporting(E_ALL);

function is_session_started()
{
    if (php_sapi_name() !== 'cli')
    {
        if (version_compare(phpversion(), '5.4.0', '>='))
        {
            return session_status() === PHP_SESSION_ACTIVE ? TRUE : FALSE;
        }
        else
        {
            return session_id() === '' ? FALSE : TRUE;
        }
    }
    return FALSE;
}

if (is_session_started() === FALSE) session_start();
    
define('DS', DIRECTORY_SEPARATOR);

define('ROOT', dirname(__FILE__));

$url = isset($_SERVER['PATH_INFO']) ? explode('/', ltrim($_SERVER['PATH_INFO'], '/')) : [];

new Router($url);

