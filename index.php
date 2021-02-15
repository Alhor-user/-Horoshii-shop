<?php
// Подключаем бд
// require_once("config/db_config.php");

// Роутим страницы по URI
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$segments = explode('/', trim($uri, '/'));


// // Тестовый мусор
// foreach ($segments as &$value) {
//     echo $value ."   ";
// }
// echo $uri;
// // 

if($uri === '/')
    require 'pages/index.php';
elseif($uri === '/about')
    require 'pages/about.php';
elseif($uri === '/catalog/ikra') 
{
    $category = $segments[1];
    require 'pages/category.php';
}
else
    require 'pages/404.html';
?>

