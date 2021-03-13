<?php
    echo 'Привет, ' . $category . '! <br>';
    $sql = "SELECT * FROM `production`";
    $result = mysqli_query($link, $sql);
    while ($row = mysqli_fetch_array($result)) {
        if ($row['Category'] == $category){
            print("Название: " . $row['Name'] . "; Категория: . " . $row['Category'] . "<br>");
        }
       
    }
?>