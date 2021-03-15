<?php require_once("../config/db_config.php"); ?>
<!doctype html>
<html lang="ru">
<head>
    <?php require_once("head.php"); ?>
</head>
<body style="background-color: #f7f7f7;">
    <!-- Подключаем хедер, контент и футер -->
    <?php
        if (hash('md5', $_SESSION["login"]) == $_SESSION["key"]) {
            require_once("adminpanel.php");
        };
        require_once("header.php");
        require_once("index-content.php");
        require_once("footer.php"); 
    ?>
</body>
</html>