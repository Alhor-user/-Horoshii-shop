<!doctype html>
<html lang="en">
<head>
    <?php require_once("head.php"); ?>
</head>
<body style="background-color: #f7f7f7;">
    <!-- Подключаем хедер, контент и футер -->
    <?php
        if (hash('md5', $_SESSION["login"]) == $_SESSION["key"]) {
            require_once("adminpanel.php");
        };
    ?>
    <?php require_once("header.php"); ?>
    <?php require_once("category-content.php"); ?>
    <?php require_once("footer.php"); ?>
</body>
</html>