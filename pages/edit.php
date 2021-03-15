<?php
    session_start();
    if (hash('md5', $_SESSION["login"]) == $_SESSION["key"]) {
        require_once("../config/db_config.php");
        
        if ($_POST['type']=='content'){
            $string = mysqli_real_escape_string($link, $_POST['text']);
            $sql = "UPDATE `content` SET `Content` = '". $string ."' WHERE `ID`= '". $_POST['id'] ."'";
            $result = mysqli_query($link, $sql);

            if ($result == false) {
                print("Произошла ошибка при выполнении запроса");
            }
        };

        if ($_POST['type']=='delete-category'){
            $sql = "DELETE FROM `categories` WHERE `Category`= '". $_POST['category'] ."'";
            $result = mysqli_query($link, $sql);

            if ($result == false) {
                print("Произошла ошибка при выполнении запроса");
            }
        };

        if ($_POST['type']=='edit-category'){
            if ( 0 < $_FILES['file']['error'] ) {
                echo 'Error: ' . $_FILES['file']['error'] . '<br>';
            }
            else {
                move_uploaded_file($_FILES['file']['tmp_name'], '../img/' . $_FILES['file']['name']);
            };

            // $sql = "DELETE FROM `categories` WHERE `Category`= '". $_POST['category'] ."'";
            // $result = mysqli_query($link, $sql);

            // if ($result == false) {
            //     print("Произошла ошибка при выполнении запроса");
            // }
        };
        
        echo "<pre>";
        print_r($_POST);
        echo "</pre>";
    }
?>