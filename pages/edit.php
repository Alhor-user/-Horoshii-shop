<?php
    session_start();
    if (hash('md5', $_SESSION["login"]) == $_SESSION["key"]) {
        echo "<pre>";
        print_r($_POST);
        echo "</pre>";
    }
?>