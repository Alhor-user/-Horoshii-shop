<?php
// Подключаем бд
require_once("config/db_config.php");

// Роутим страницы по URI
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$segments = explode('/', trim($uri, '/'));

if($uri === '/')
    require 'pages/index.php';
elseif($uri === '/about')
    require 'pages/about.php';
elseif($uri === '/catalog/ikra')
    require 'pages/category.php?c=ikra';
else
    require 'pages/404.html';
?>