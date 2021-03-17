<div uk-grid class="uk-grid-collapse">

    <div class="uk-width-1-1" style="height: 50px;">
    </div>

    <div class="uk-width-1-1" style="margin: 0 10vw;">
        <div class="uk-grid-column-small uk-grid-row-small uk-text-center uk-flex-center" uk-grid style="margin: 0;">
                
            <?php // Добавление карточек с категориями из БД

                //Проверка работы сессии
                // if (hash('md5', $_SESSION["login"]) == $_SESSION["key"]) {
                //     echo "Работает!!!";
                // };

                $sql = "SELECT * FROM `categories` WHERE `Status`='Active'";
                $result = mysqli_query($link, $sql);
                while ($row = mysqli_fetch_array($result)) {
                    echo '<div class="uk-inline-clip uk-transition-toggle border-round" tabindex="0" style="padding: 0; cursor: pointer; margin-left: 15px; position: relative;">';
                    if (hash('md5', $_SESSION["login"]) == $_SESSION["key"]) {
                        echo '<div class="icon-delete" style="position: absolute; width: 30px; height: 30px; background-color: white; top: 0px; right: 0px; z-index: 1; opacity: 0.8;">
                            <a href="#modal-example-4" uk-toggle onclick="Delete(\'', $row['Category'], '\', \'', $row['Name'], '\')")><i class="fa fa-trash fa-lg" style="color: black;"></i></a>
                        </div>
                        <div class="icon-edit" style="position: absolute; width: 30px; height: 30px; background-color: white; top: 0px; right: 30px; z-index: 1; opacity: 0.8;">
                            <a href="#modal-example-5" uk-toggle onclick="Edit(\'', $row['Category'], '\', \'', $row['Name'], '\')")><i class="fa fa-pencil fa-lg" style="color: black;"></i></a>
                        </div>';
                        echo '<a href="/catalog/', $row['Category'], '">
                                <div class="uk-card uk-card-default">
                                    <div class="uk-card-media-top">
                                        <img src="../img/new-category.png" alt="" class="category-card uk-transition-scale-up uk-transition-opaque">
                                    </div>
                                </div>
                            </a>
                        </div>';


                    }
                    echo '<a href="/catalog/', $row['Category'], '">
                            <div class="uk-card uk-card-default">
                                <div class="uk-card-media-top">
                                    <img src="../img/', $row['Image'], '" alt="" class="category-card uk-transition-scale-up uk-transition-opaque">
                                    <div class="uk-overlay uk-overlay-primary uk-position-bottom category-card-text">
                                        <a>', $row['Name'], '</a>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>';
                }; 
            ?>

        </div>
    </div>

    <div class="uk-width-1-1" style="height: 50px;">
    </div>

</div>    