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
                    <input class="uk-input" type="text" name="login">
                </div>
            </div>

            <div class="uk-margin">
                <div class="uk-inline">
                    <span class="uk-form-icon" uk-icon="icon: lock"></span>
                    <input class="uk-input" type="password" name="pass">
                </div>
            </div>
            <button class="uk-button uk-button-primary" type="submit">Вход</button>
        </form>
    </div>

    <?php 

    ?>

</body>
</html>