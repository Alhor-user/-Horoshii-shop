<?php
    session_start();
    if (hash('md5', $_SESSION["login"]) == $_SESSION["key"]) {
        require_once("../config/db_config.php");

        if ($_POST['type']=='new-category'){

            if ( 0 < $_FILES['file']['error'] ) {
                //echo 'Error: ' . $_FILES['file']['error'] . '<br>';
                $imgsrc = 'noimage.png';
            }
            else {
                move_uploaded_file($_FILES['file']['tmp_name'], '../img/' . $_FILES['file']['name']);
                $imgsrc = $_FILES['file']['name'];
            };
            
            // Ищем категории с таким же названием 
            $sql = "SELECT * FROM `categories` WHERE `Category`='". mysqli_real_escape_string($link, $_POST['newcategory']) ."'";
            $result = mysqli_query($link, $sql);

            // Обновляем строку, если до этого не нашли таких же категорий
            if ((mysqli_num_rows($result) == 0) or ($_POST['oldcategory']==$_POST['newcategory'] )) {
                $sql = "INSERT INTO `categories` SET `Category`='". mysqli_real_escape_string($link, $_POST['newcategory']) ."', `Name`='". mysqli_real_escape_string($link, $_POST['newname']) ."', `Image`='". mysqli_real_escape_string($link, $imgsrc) ."', `Status`='Active', `Priority`=". mysqli_real_escape_string($link, $_POST['newpriority']) ."";
                echo $sql;
                $result = mysqli_query($link, $sql);

                if ($result == false) {
                    print("Произошла ошибка при выполнении запроса");
                }
            } else {
                print("Произошла ошибка - категория с таким названием уже существует");
            };
        };
        
        if ($_POST['type']=='new-item'){
            require_once("../config/db_config.php");

            if ( 0 < $_FILES['file']['error'] ) {
                //echo 'Error: ' . $_FILES['file']['error'] . '<br>';
                $imgsrc = 'noimage.png';
            }
            else {
                move_uploaded_file($_FILES['file']['tmp_name'], '../img/' . $_FILES['file']['name']);
                $imgsrc = $_FILES['file']['name'];
            }; 
            
            $tagstock = (isset($_POST['newtagstock']) ? 1 : 0);
            $tagnew = (isset($_POST['newtagnew']) ? 1 : 0);
            $priority = ($_POST['newpriority']=='' ? 99 : $_POST['newpriority']);

            if ($_POST['newprice']<>0) $price = ", `Price`='".mysqli_real_escape_string($link, $_POST['newprice'])."'"; else $price = ", `Price`=NULL";
            if ($_POST['newcount']<>0) $count = ", `Count`='".mysqli_real_escape_string($link, $_POST['newcount'])."'"; else $count = ", `Count`=NULL";


            $sql = "INSERT INTO `production` SET `Image`='". mysqli_real_escape_string($link, $imgsrc) ."', `Name`='". mysqli_real_escape_string($link, $_POST['newname']) ."', `Description`='". mysqli_real_escape_string($link, $_POST['newdescription']) ."', `Category`='". mysqli_real_escape_string($link, $_POST['newcategory']) ."'". $price . $count .", `Is-new`='". mysqli_real_escape_string($link, $tagnew) ."', `Is-no-stock`='". mysqli_real_escape_string($link, $tagstock) ."', `Priority`=". mysqli_real_escape_string($link, $priority) ."";
            echo $sql;
            $result = mysqli_query($link, $sql);

            if ($result == false) {
                print("Произошла ошибка при выполнении запроса");
            } 
        };

        //header("Location: {$_SERVER['HTTP_REFERER']}");
        // echo "<pre>";
        // print_r($_POST);
        // echo "</pre>";
    }
?>