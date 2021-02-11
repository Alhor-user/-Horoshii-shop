<?php

    $link = "";
    function db_connect () {
        $db_address = "srv12.host-food.ru";
        $db_user = "h153523_test";
        $db_password = "123qwe!@#QWE";
        $db_dbname = "h153523_test";
        
        // global $link;
        $link = mysqli_connect($db_address, $db_user, $db_password, $db_dbname);

        if ($link == false){
            print("Ошибка: Невозможно подключиться к MySQL " . mysqli_connect_error());
        }
        else {
            print("Соединение установлено успешно");
        }
    }
    db_connect ();
    echo $link;
?>