<?php
    session_start();
    if (hash('md5', $_SESSION["login"]) == $_SESSION["key"]) {
        require_once("../config/db_config.php");
        
        if ($_POST['type']='content'){
            $string = mysqli_real_escape_string($_POST['text']);
            $sql = "UPDATE `content` SET `Content` = ". $_POST['text'] ." WHERE `ID`= ". $_POST['id'];
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