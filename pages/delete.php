<?php
    session_start();
    if (hash('md5', $_SESSION["login"]) == $_SESSION["key"]) {
        require_once("../config/db_config.php");
        
        
        if ($_POST['type']=='delete-category'){
            $sql = "DELETE FROM `categories` WHERE `Category`= '". mysqli_real_escape_string($link, $_POST['category']) ."'";
            $result = mysqli_query($link, $sql);

            if ($result == false) {
                print("Произошла ошибка при выполнении запроса");
            }
        };


        if ($_POST['type']=='delete-item'){
            $sql = "DELETE FROM `production` WHERE `ID`= '". mysqli_real_escape_string($link, $_POST['ID']) ."'";
            $result = mysqli_query($link, $sql);

            if ($result == false) {
                print("Произошла ошибка при выполнении запроса");
            }
        }; 

        header("Location: {$_SERVER['HTTP_REFERER']}");
        // echo "<pre>";
        // print_r($_POST);
        // echo "</pre>";
    }
?>