<?php
session_start();

define('URL', str_replace("index.php","",(isset($_SERVER['HTTPS']) ? "https" : "http")."://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]"));

require_once('config/Autoload.php');

$autoload = new Autoload();

new Define();

$router = new Router();

$router->routeReq();
?>