<?php
    session_start();
    if (hash('md5', $_SESSION["login"]) == $_SESSION["key"]) {
        require_once("../config/db_config.php");
        
        
        if ($_POST['type']=='delete-category'){
            $sql = "DELETE FROM `categories` WHERE `Category`= '". $_POST['category'] ."'";
            $result = mysqli_query($link, $sql);

            if ($result == false) {
                print("Произошла ошибка при выполнении запроса");
            }
        };


        if ($_POST['type']=='delete-item'){
            $sql = "DELETE FROM `production` WHERE `ID`= '". $_POST['ID'] ."'";
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