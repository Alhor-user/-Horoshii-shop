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
                                    <a href="#" class="header-menu-h1-text">Продукция</a>
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
                // <!-- Модальное окно 1 текст -->
                echo'<div id="modal-example-1" uk-modal>
                    <div class="uk-modal-dialog uk-modal-body">
                    <form id="edit-text" method="post" action="../pages/edit.php">
                    <h2 class="uk-modal-title">Изменение строки</h2>
                    <input type="hidden" name="type" value="content">
                    <input class="uk-input" type="text" name="text" value="';
                $sql = "SELECT `Content` FROM `content` WHERE `ID`='1'";
                $result = mysqli_query($link, $sql);
                $data = mysqli_fetch_array($result);
                echo $data['Content'];
                echo '"><p class="uk-text-center">
                    <button class="uk-button uk-button-danger uk-modal-close" type="button">Отмена</button>
                    <button class="uk-button uk-button-primary" type="submit" name="id" value="1">Сохранить</button>
                    </p>
                    </form>
                    </div>
                    </div>';
                
                // <!-- Модальное окно 2 текст -->
                echo'<div id="modal-example-2" uk-modal>
                    <div class="uk-modal-dialog uk-modal-body">
                    <form id="edit-text" method="post" action="../pages/edit.php">
                    <h2 class="uk-modal-title">Изменение строки</h2>
                    <input type="hidden" name="type" value="content">
                    <input class="uk-input" type="text" name="text" value="';
                $sql = "SELECT `Content` FROM `content` WHERE `ID`='2'";
                $result = mysqli_query($link, $sql);
                $data = mysqli_fetch_array($result);
                echo $data['Content'];
                echo '"><p class="uk-text-center">
                    <button class="uk-button uk-button-danger uk-modal-close" type="button">Отмена</button>
                    <button class="uk-button uk-button-primary" type="submit" name="id" value="2">Сохранить</button>
                    </p>
                    </form>
                    </div>
                    </div>';

                // <!-- Модальное окно 3 текст -->
                echo'<div id="modal-example-3" uk-modal>
                    <div class="uk-modal-dialog uk-modal-body">
                    <form id="edit-text" method="post" action="../pages/edit.php">
                    <h2 class="uk-modal-title">Изменение строки</h2>
                    <input type="hidden" name="type" value="content">
                    <input class="uk-input" type="text" name="text" value="';
                $sql = "SELECT `Content` FROM `content` WHERE `ID`='3'";
                $result = mysqli_query($link, $sql);
                $data = mysqli_fetch_array($result);
                echo $data['Content'];
                echo '"><p class="uk-text-center">
                    <button class="uk-button uk-button-danger uk-modal-close" type="button">Отмена</button>
                    <button class="uk-button uk-button-primary" type="submit" name="id" value="3">Сохранить</button>
                    </p>
                    </form>
                    </div>
                    </div>';

                // Модальное окно для удаления категории
                echo'<div id="modal-example-4" uk-modal>
                    <div class="uk-modal-dialog uk-modal-body">
                    <form id="delete-category" method="post" action="../pages/edit.php">
                    <legend class="uk-legend">Вы точно хотите удалить эту категорию?</legend>
                    <input id="deleteCategoryName" class="uk-input uk-margin-medium-top" style="text-align: center;" value="" disabled>
                    <input type="hidden" name="type" value="delete-category">
                    <p class="uk-text-center uk-margin-medium-top">
                    <button class="uk-button uk-button-danger uk-modal-close" type="button">Отмена</button>
                    <button id="deleteCategoryCategory" class="uk-button uk-button-primary" type="submit" name="category" value="">Удалить</button>
                    </p>
                    </form>
                    </div>
                    </div>';

                // Модальное окно для редактирования категории
                echo'<div id="modal-example-5" uk-modal>
                    <div class="uk-modal-dialog uk-modal-body">
                    <form enctype="multipart/form-data" id="delete-category" method="post" action="../pages/edit.php">
                    <legend class="uk-legend">Вы точно хотите удалить эту категорию?</legend>







                    <div class="container uk-margin-medium-top">
                        <div class="row">
                            <label>Картинка категории (будет сжата до квадратной):</label><br>
                            <input class="uk-margin-small-top" type="file" id="file" name="file" />
                        </div>
                        <div class="row">
                            <span class="uk-margin-small-top" id="output"></span>
                        </div>
                    </div>




                    <p class="uk-margin-medium-top" style="margin-bottom: 10px;"><i class="fa fa-info-circle" style="color: black;" uk-tooltip="Имя отображается на сайте, например \'Икра\'"></i> Имя категории:</p>
                    <input id="editCategoryName" class="uk-input" name="newname" value="" required>
                    <p class="uk-margin-medium-top" style="margin-bottom: 10px;"><i class="fa fa-info-circle" style="color: black;" uk-tooltip="Категория отображается в адресной строке и должна быть написана на английском, например \'ikra\'"></i> Название категории:</p>
                    <input id="editCategoryCategory" class="uk-input" name="newcategory" value="" required>
                    <input type="hidden" name="type" value="edit-category">
                    <p class="uk-text-center uk-margin-medium-top">
                    <button class="uk-button uk-button-danger uk-modal-close" type="button">Отмена</button>
                    <button id="editCategoryOldCategory" class="uk-button uk-button-primary" type="submit" name="oldcategory" value="">Сохранить</button>
                    </p>
                    </form>
                    </div> 
                    </div>';

                // Модальное окно для добавления новой категории
                echo'<div id="modal-example-6" uk-modal>
                <div class="uk-modal-dialog uk-modal-body">
                <form enctype="multipart/form-data" id="delete-category" method="post" action="../pages/new.php">
                <legend class="uk-legend">Вы точно хотите удалить эту категорию?</legend>







                <div class="container uk-margin-medium-top">
                    <div class="row">
                        <label>Картинка категории (будет сжата до квадратной):</label><br>
                        <input class="uk-margin-small-top" type="file" id="file" name="file" />
                    </div>
                    <div class="row">
                        <span class="uk-margin-small-top" id="output"></span>
                    </div>
                </div>




                <p class="uk-margin-medium-top" style="margin-bottom: 10px;"><i class="fa fa-info-circle" style="color: black;" uk-tooltip="Имя отображается на сайте, например \'Икра\'"></i> Имя категории:</p>
                <input id="editCategoryName" class="uk-input" name="newname" value="" required>
                <p class="uk-margin-medium-top" style="margin-bottom: 10px;"><i class="fa fa-info-circle" style="color: black;" uk-tooltip="Категория отображается в адресной строке и должна быть написана на английском, например \'ikra\'"></i> Название категории:</p>
                <input id="editCategoryCategory" class="uk-input" name="newcategory" value="" required>
                <input type="hidden" name="type" value="edit-category">
                <p class="uk-text-center uk-margin-medium-top">
                <button class="uk-button uk-button-danger uk-modal-close" type="button">Отмена</button>
                <button id="editCategoryOldCategory" class="uk-button uk-button-primary" type="submit" name="oldcategory" value="">Сохранить</button>
                </p>
                </form>
                </div> 
                </div>';
            }
            ?>

        </div>
    </div>
</nav>