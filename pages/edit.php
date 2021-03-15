<?php
    session_start();
    if (hash('md5', $_SESSION["login"]) == $_SESSION["key"]) {
        require_once("../config/db_config.php");
        
        if ($_POST['type']='content'){
            $text = $_POST['text'];
            $string = mysqli_real_escape_string($text);
            $sql = "UPDATE `content` SET `Content` = ". $string ." WHERE `ID`= ". $_POST['id'];
            $result = mysqli_query($link, $sql);

            if ($result == false) {
                print("Произошла ошибка при выполнении запроса");
            }
        };
        
        echo "<pre>";
        print_r($_POST);
        echo "</pre>";
    }
?>