<?php
    session_start();
    if (hash('md5', $_SESSION["login"]) == $_SESSION["key"]) {
        require_once("../config/db_config.php");

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
            $sql = "SELECT * FROM `categories` WHERE `Category`='". $_POST['newcategory'] ."'";
            $result = mysqli_query($link, $sql);

            // Обновляем строку, если до этого не нашли таких же категорий
            if ((mysqli_num_rows($result) == 0) or ($_POST['oldcategory']==$_POST['newcategory'] )) {
                $sql = "INSERT INTO `categories` SET `Category`='". $_POST['newcategory'] ."', `Name`='". $_POST['newname'] ."', `Image`='". $imgsrc ."', `Status`='Active'";
                echo $sql;
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