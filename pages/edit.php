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

        if ($_POST['type']=='edit-category'){

            $sql = "SELECT * FROM `categories` WHERE `Category`='". $_POST['oldcategory'] ."'";
            $result = mysqli_query($link, $sql);
            $row = mysqli_fetch_array($result);
            $oldimg = $row['Image'];

            if ( 0 < $_FILES['file']['error'] ) {
                echo 'Error: ' . $_FILES['file']['error'] . '<br>';
                $imgsrc = $oldimg;
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
                $sql = "UPDATE `categories` SET `Category`='". $_POST['newcategory'] ."', `Name`='". $_POST['newname'] ."', `Image`='". $imgsrc ."' WHERE `Category`='". $_POST['oldcategory'] ."'";
                echo $sql;
                $result = mysqli_query($link, $sql);

                if ($result == false) {
                    print("Произошла ошибка при выполнении запроса");
                }
            } else {
                print("Произошла ошибка - категория с таким названием уже существует");
            };
        };

        if ($_POST['type']=='edit-item'){

            $sql = "SELECT * FROM `production` WHERE `ID`='". $_POST['id'] ."'";
            $result = mysqli_query($link, $sql);
            $row = mysqli_fetch_array($result);
            $oldimg = $row['Image'];

            if ( 0 < $_FILES['file']['error'] ) {
                echo 'Error: ' . $_FILES['file']['error'] . '<br>';
                $imgsrc = $oldimg;
            }
            else {
                move_uploaded_file($_FILES['file']['tmp_name'], '../img/' . $_FILES['file']['name']);
                $imgsrc = $_FILES['file']['name'];
            };
            

            if (isset($_POST['newtagstock'])) $tagstock = 1;
            if (isset($_POST['newtagnew'])) $tagnew = 1;

            // Обновляем строку, если до этого не нашли таких же категорий
            if (mysqli_num_rows($result) <> 0) {
                $sql = "UPDATE `production` SET `Image`='". $imgsrc ."', `Name`='". $_POST['newname'] ."', `Description`='". $_POST['newdescription'] ."', `Category`='". $_POST['newcategory'] ."', `Price`='". $_POST['newprice'] ."', `Count`='". $_POST['newcount'] ."', `Is-new`='". $tagnew ."', `Is-no-stock`='". $tagstock ."' WHERE `ID`='". $_POST['id'] ."'";
                echo $sql;
                // $result = mysqli_query($link, $sql);

                // if ($result == false) {
                //     print("Произошла ошибка при выполнении запроса");
                // }
            } else {
                print("Произошла ошибка - такого товара не существует (id)");
            };
        };
        
        echo "<pre>";
        print_r($_POST);
        echo "</pre>";
    }
?>