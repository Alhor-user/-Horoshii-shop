<footer class="uk-section uk-section-secondary uk-section-xsmall" style="background-image: url(../img/header-wave2.jpg); background-size: 100%; margin-top: 30px;">
    <div uk-grid class="uk-width-1-1 uk-grid-collapse uk-child-width-expand">
        <div class="uk-width-1-4">
            <a href="../"><img src="../img/logo.png" alt="Logo" class="img-logo" style="margin: 0 0 0 25px;"></a>
        </div>
        <div class="uk-width-1-2 uk-height-1-1">
            <a><p class="footer-menu-text" style="margin: 0 25px 5px 0;">Вкусные рецепты</p></a>
            <a><p class="footer-menu-text" style="margin: 5px 25px 5px 0;">Новости</p></a>
            <a><p class="footer-menu-text" style="margin: 5px 25px 0 0;">Контакты</p></a>
        </div>
        <div class="uk-width-1-4 uk-height-1-1">

            <?php // Подгружаем из БД записи, что должны быть в футере и хедере
                echo '<p class="header-footer-work-text size-1" style="margin: 0 25px 5px 0;">';
                $sql = "SELECT `Content` FROM `content` WHERE `ID`='1'";
                $result = mysqli_query($link, $sql);
                $data = mysqli_fetch_array($result);
                echo $data['Content'];
                if (hash('md5', $_SESSION["login"]) == $_SESSION["key"]) echo '<a href="#modal-example-1" uk-toggle uk-icon="icon: pencil"></a>';
                echo '</p>';

                echo '<p class="header-footer-work-text size-2" style="margin: 5px 25px 5px 0;">';
                $sql = "SELECT `Content` FROM `content` WHERE `ID`='2'";
                $result = mysqli_query($link, $sql);
                $data = mysqli_fetch_array($result);
                echo $data['Content'];
                if (hash('md5', $_SESSION["login"]) == $_SESSION["key"]) echo '<a href="#modal-example-2" uk-toggle uk-icon="icon: pencil"></a>';
                echo '</p>';

                echo '<p class="header-footer-work-text size-2" style="margin: 5px 25px 0 0;">';
                $sql = "SELECT `Content` FROM `content` WHERE `ID`='3'";
                $result = mysqli_query($link, $sql);
                $data = mysqli_fetch_array($result);
                echo $data['Content'];
                if (hash('md5', $_SESSION["login"]) == $_SESSION["key"]) echo '<a href="#modal-example-3" uk-toggle uk-icon="icon: pencil"></a>';
                echo '</p>';
            ?>

        </div>
    </div>
    <hr>
    <div class="uk-flex uk-flex-between">
        <div><i style="margin-left:25px; text-align: left; color: #F5F4F5; font-size: .75rem; font-weight: 400;">Copyright © 2010 - 2021 "Магазин Хороший"</i></div>
        <div><i style="margin-right: 25px; text-align: right; color: #F5F4F5; font-size: .75rem; font-weight: 400;">Разработчик: alecsandr-hor@yandex.ru</i></div>
    </div>
</footer>



<?php 
if (hash('md5', $_SESSION["login"]) == $_SESSION["key"])
    echo "
    <script>
        document.getElementById('file1').addEventListener('change', handleFileSelect1, false);
        document.getElementById('file2').addEventListener('change', handleFileSelect2, false);
        document.getElementById('file3').addEventListener('change', handleFileSelect3, false);
        document.getElementById('file4').addEventListener('change', handleFileSelect4, false);
    </script>";
?>