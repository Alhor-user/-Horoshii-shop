<?php
    session_start();
    if (hash('md5', $_SESSION["login"]) == $_SESSION["key"]) {
        require_once("../config/db_config.php");
        
        if ($_POST['type']=='content'){
            $string = mysqli_real_escape_string($link, $_POST['text']);
            $sql = "UPDATE `content` SET `Content` = '". mysqli_real_escape_string($link, $string) ."' WHERE `ID`= '". mysqli_real_escape_string($link, $_POST['id']) ."'";
            $result = mysqli_query($link, $sql);

            if ($result == false) {
                print("Произошла ошибка при выполнении запроса");
            }
        };

        if ($_POST['type']=='edit-category'){

            $sql = "SELECT * FROM `categories` WHERE `Category`='". mysqli_real_escape_string($link, $_POST['oldcategory']) ."'";
            $result = mysqli_query($link, $sql);
            $row = mysqli_fetch_array($result);
            $oldimg = $row['Image'];

            if ( 0 < $_FILES['file']['error'] ) {
                //echo 'Error: ' . $_FILES['file']['error'] . '<br>';
                $imgsrc = $oldimg;
            }
            else {
                move_uploaded_file($_FILES['file']['tmp_name'], '../img/' . $_FILES['file']['name']);
                $imgsrc = $_FILES['file']['name'];
            };
            

            $priority = ($_POST['newpriority']=='' ? 127 : $_POST['newpriority']);
            // Ищем категории с таким же названием 
            $sql = "SELECT * FROM `categories` WHERE `Category`='". mysqli_real_escape_string($link, $_POST['newcategory']) ."'";
            $result = mysqli_query($link, $sql);

            // Обновляем строку, если до этого не нашли таких же категорий
            if ((mysqli_num_rows($result) == 0) or ($_POST['oldcategory']==$_POST['newcategory'] )) {
                $sql = "UPDATE `categories` SET `Category`='". translit($_POST['newname']) ."', `Name`='". mysqli_real_escape_string($link, $_POST['newname']) ."', `Image`='". mysqli_real_escape_string($link, $imgsrc) ."', `Priority`=". mysqli_real_escape_string($link, $priority) ." WHERE `Category`='". mysqli_real_escape_string($link, $_POST['oldcategory']) ."'";
                //echo $sql;
                $result = mysqli_query($link, $sql);

                if ($result == false) {
                    print("Произошла ошибка при выполнении запроса");
                }
            } else {
                print("Произошла ошибка - категория с таким названием уже существует");
            };
        };

        if ($_POST['type']=='edit-item'){

            $sql = "SELECT * FROM `production` WHERE `ID`='". mysqli_real_escape_string($link, $_POST['id']) ."'";
            $result = mysqli_query($link, $sql);
            $row = mysqli_fetch_array($result);
            $oldimg = $row['Image'];

            if ( 0 < $_FILES['file']['error'] ) {
                //echo 'Error: ' . $_FILES['file']['error'] . '<br>';
                $imgsrc = $oldimg;
            }
            else {
                move_uploaded_file($_FILES['file']['tmp_name'], '../img/' . $_FILES['file']['name']);
                $imgsrc = $_FILES['file']['name'];
            };
            

            $tagstock = (isset($_POST['newtagstock']) ? 1 : 0);
            $tagnew = (isset($_POST['newtagnew']) ? 1 : 0);
            $priority = ($_POST['newpriority']=='' ? 127 : $_POST['newpriority']);

            if ($_POST['newprice']<>0) $price = ", `Price`='".mysqli_real_escape_string($link, $_POST['newprice'])."'"; else $price = ", `Price`=NULL";
            if ($_POST['newcount']<>0) $count = ", `Count`='".mysqli_real_escape_string($link, $_POST['newcount'])."'"; else $count = ", `Count`=NULL";

            // Обновляем строку, если до этого не нашли таких же товаров
            if (mysqli_num_rows($result) <> 0) {
                $sql = "UPDATE `production` SET `Image`='". mysqli_real_escape_string($link, $imgsrc) ."', `Name`='". mysqli_real_escape_string($link, $_POST['newname']) ."', `Description`='". mysqli_real_escape_string($link, $_POST['newdescription']) ."', `Category`='". mysqli_real_escape_string($link, $_POST['newcategory']) ."'". $price . $count .", `Is-new`='". mysqli_real_escape_string($link, $tagnew) ."', `Is-no-stock`='". mysqli_real_escape_string($link, $tagstock) ."', `Priority`='". mysqli_real_escape_string($link, $priority) ."' WHERE `ID`='". mysqli_real_escape_string($link, $_POST['id']) ."'";
                //echo $sql;
                $result = mysqli_query($link, $sql);

                if ($result == false) {
                    print("Произошла ошибка при выполнении запроса");
                } 
            } else {
                print("Произошла ошибка - такого товара не существует (id)");
            };
        };
        
        header("Location: {$_SERVER['HTTP_REFERER']}");
        // echo "<pre>";
        // print_r($_POST);
        // echo "</pre>";
    }


    function translit($s) {
        $s = (string) $s; // преобразуем в строковое значение
        $s = str_replace(array("\n", "\r"), " ", $s); // убираем перевод каретки
        $s = preg_replace("/\s+/", ' ', $s); // удаляем повторяющие пробелы
        $s = trim($s); // убираем пробелы в начале и конце строки
        $s = function_exists('mb_strtolower') ? mb_strtolower($s) : strtolower($s); // переводим строку в нижний регистр (иногда надо задать локаль)
        $s = strtr($s, 
            array(
                'а'=>'a',
                'б'=>'b',
                'в'=>'v',
                'г'=>'g',
                'д'=>'d',
                'е'=>'e',
                'ё'=>'e',
                'ж'=>'j',
                'з'=>'z',
                'и'=>'i',
                'й'=>'y',
                'к'=>'k',
                'л'=>'l',
                'м'=>'m',
                'н'=>'n',
                'о'=>'o',
                'п'=>'p',
                'р'=>'r',
                'с'=>'s',
                'т'=>'t',
                'у'=>'u',
                'ф'=>'f',
                'х'=>'h',
                'ц'=>'c',
                'ч'=>'ch',
                'ш'=>'sh',
                'щ'=>'shch',
                'ы'=>'y',
                'э'=>'e',
                'ю'=>'yu',
                'я'=>'ya',
                'ъ'=>'',
                'ь'=>''
            )
        );
        $s = preg_replace("/[^0-9a-z-_ ]/i", "", $s); // очищаем строку от недопустимых символов
        $s = str_replace(" ", "-", $s); // заменяем пробелы знаком минус
        return $s; // возвращаем результат
    }
?>