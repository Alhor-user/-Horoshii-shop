<nav class="uk-navbar-container" uk-navbar style="height: 150px; background-image: url(../img/header-wave2.jpg); background-size: 100%;">
    
    <div uk-grid class="uk-width-1-1 uk-grid-collapse uk-child-width-expand">
        <div class="uk-width-1-4">
            <a href="../"><img src="../img/logo.png" alt="Logo" class="img-logo" style="margin: 25px 0 0 25px;"></a>
        </div>


        <div>
            <div uk-grid class="uk-width-1-1 uk-height-1-1 uk-grid-collapse uk-child-width-expand">
                <div class="uk-width-1-1" style="height: 90px;">
                    <p style="font-family: Lobster; color: #F5F4F5; font-size: 1.7rem; font-weight: 200; text-align: center; margin-top: 30px;">Дары моря для кулинарных шедевров!</p>
                </div>
                <div class="uk-width-1-1" style="height: 60px;">
                
                <!-- Начало элемента меню в центре -->
                    <div class="uk-navbar">
                        <div class="uk-navbar-center">
                            <ul class="uk-navbar-nav">
                                <li>
                                    <a href="/" class="header-menu-h1-text">Продукция</a>
                                    <div class="uk-navbar-dropdown" style="box-shadow: none; background-color: #27698f; padding: 0;" uk-dropdown="offset: 0; padding: 0;">
                                        <ul class="uk-nav uk-navbar-dropdown-nav">


                                        <?php // Добавление в выпадающее меню категорий из БД
                                            $sql = "SELECT * FROM `categories` WHERE `Status`='Active'";
                                            $result = mysqli_query($link, $sql);
                                            while ($row = mysqli_fetch_array($result)) {
                                                echo '<li><a href="/catalog/', $row['Category'],'" style="font-size: 1rem; padding:15px 25px 7px 25px;">', $row['Name'], '</a></li>';
                                            }; 
                                        ?>
                                        </ul>
                                    </div>
                                </li>
                                <li><a href="#" class="header-menu-h1-text">Рецепты</a></li>
                                <li><a href="#" class="header-menu-h1-text">Наши магазины</a></li>
                                <li><a href="#" class="header-menu-h1-text">Контакты</a></li>
                            </ul>
                        </div>
                    </div>
                <!-- Конец элемента меню в центре -->

                </div>
            </div>
        </div>

        <div class="uk-width-1-4 uk-height-1-1">

            <?php // Подгружаем из БД записи, что должны быть в футере и хедере
                echo '<p class="header-footer-work-text size-1" style="margin: 25px 25px 10px 0;">';
                $sql = "SELECT `Content` FROM `content` WHERE `ID`='1'";
                $result = mysqli_query($link, $sql);
                $data = mysqli_fetch_array($result);
                echo $data['Content'];
                if (hash('md5', $_SESSION["login"]) == $_SESSION["key"]) echo '<a href="#modal-example-1" uk-toggle uk-icon="icon: pencil"></a>';
                echo '</p>';

                echo '<p class="header-footer-work-text size-2" style="margin: 10px 25px 10px 0;">';
                $sql = "SELECT `Content` FROM `content` WHERE `ID`='2'";
                $result = mysqli_query($link, $sql);
                $data = mysqli_fetch_array($result);
                echo $data['Content'];
                if (hash('md5', $_SESSION["login"]) == $_SESSION["key"]) echo '<a href="#modal-example-2" uk-toggle uk-icon="icon: pencil"></a>';
                echo '</p>';

                echo '<p class="header-footer-work-text size-2" style="margin: 10px 25px 25px 0;">';
                $sql = "SELECT `Content` FROM `content` WHERE `ID`='3'";
                $result = mysqli_query($link, $sql);
                $data = mysqli_fetch_array($result);
                echo $data['Content'];
                if (hash('md5', $_SESSION["login"]) == $_SESSION["key"]) echo '<a href="#modal-example-3" uk-toggle uk-icon="icon: pencil"></a>';
                echo '</p>';
            

            if (hash('md5', $_SESSION["login"]) == $_SESSION["key"]) {
                require_once('./modal-windows.php');
            };
            ?>

        </div>
    </div>
</nav>