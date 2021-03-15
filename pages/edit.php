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
                $imgsrc = 'noimage.png';
            }
            else {
                move_uploaded_file($_FILES['file']['tmp_name'], '../img/' . $_FILES['file']['name']);
                $imgsrc = $_FILES['file']['name'];
            };
            

            // Ищем категории с таким же названием 
            $sql = "SELECT * FROM `categories` WHERE `Category`=\'". $_POST['oldcategory'] ."\'";
            $result = mysqli_query($link, $sql);

            echo $sql;
            echo $result['ID'];
            echo "<pre>";
            print_r($result);
            echo "</pre>";

            // Обновляем строку, если до этого не нашли таких же категорий
            if (mysqli_num_rows($result)>0) {
                $sql = "UPDATE `categories` SET `Category`=\'". $_POST['newcategory'] ."\' AND `Name`=\'". $_POST['newname'] ."\' AND `Image`=\'". $imgsrc ."\' WHERE `Category`=\'". $_POST['oldcategory'] ."\'";
                $result = mysqli_query($link, $sql);

                if ($result == false) {
                    print("Произошла ошибка при выполнении запроса");
                }
            } else {
                print("Произошла ошибка - категория с таким названием уже существует");
            };
        };
        
        echo "<pre>";
        print_r($_POST);
        echo "</pre>";
    }
?>