<?php require_once("../config/db_config.php"); ?>


<?php 
    //Проверяем, что юзер нажал на кнопку Вход
    if ($_POST['sumbit'] == 'true') {
        $passhash = hash('md5', hash('md5', $_POST['pass']));
        //Ищем юзера с введенным логином и хэшем пароля
        $sql = "SELECT * FROM `users` WHERE `Password`='" . $passhash . "' AND `Login`='" . $_POST['Login'] . "'";
        $result = mysqli_query($link, $sql);
        $row = mysqli_fetch_array($result);
        //Если такого юзера нет - ошибка, иначе - открываем сессию и редиректим на главную
        if ($row['Login'] <> '') {
            session_start();
        } else echo "ERROR";
    }

    echo "<pre>";
    print_r($_POST);
    echo "</pre>";
    echo "<pre>";
    print_r($row);
    echo "</pre>";
    echo hash('md5', hash('md5', $_POST['pass']));
?>


<html lang="ru">
<head>
    <?php require_once("head.php"); ?>
</head>
<body style="background-color: #f7f7f7;">
    
    <div class="uk-align-center" style="width:226px;"> <!-- Магическое число, 226 - это ширина полей ввода данных -->
        <form style="padding-top: 200px;" id="auth" method="post">
            <h3 style="text-align: center;">Авторизация</p>
            <div class="uk-margin">
                <div class="uk-inline">
                    <span class="uk-form-icon" uk-icon="icon: user"></span>
                    <input class="uk-input" type="text" name="Login">
                </div>
            </div>

            <div class="uk-margin">
                <div class="uk-inline">
                    <span class="uk-form-icon" uk-icon="icon: lock"></span>
                    <input class="uk-input" type="password" name="pass">
                </div>
            </div>
            <button class="uk-button uk-button-primary" type="submit" name="sumbit" value="true">Вход</button>
        </form>
    </div>

</body>
</html> 