<?php
$uri = $_SERVER['REQUEST_URI'];

if($uri === '/')
    require 'pages/index.php';
elseif($uri === '/index.html')
    require 'pages/index.php';
elseif($uri === '/about')
    require 'pages/about.php';
else
    require 'pages/404.html';
?>