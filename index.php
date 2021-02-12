<?php
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$segments = explode('/', trim($uri, '/'));

if($uri === '/')
    require 'pages/index.php';
elseif($uri === '/about')
    require 'pages/about.php';
else
    require 'pages/404.html';
?>