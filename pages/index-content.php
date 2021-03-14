<div uk-grid class="uk-grid-collapse">

    <div class="uk-width-1-1" style="height: 50px;">
    </div>

    <div class="uk-width-1-1" style="margin: 0 10vw;">
        <div class="uk-grid-column-small uk-grid-row-small uk-text-center uk-flex-center" uk-grid style="margin: 0;">
                
            <?php // Добавление карточек с категориями из БД
                // echo $_SESSION["login"];
                // echo $_SESSION["key"];
                // echo hash('md5', $_SESSION["login"]);

                if (hash('md5', $_SESSION["login"]) == $_SESSION["key"]) {
                    echo "Работает!!!";
                };
                $sql = "SELECT * FROM `categories` WHERE `Status`='Active'";
                $result = mysqli_query($link, $sql);
                while ($row = mysqli_fetch_array($result)) {
                    echo '<div class="uk-inline-clip uk-transition-toggle border-round" tabindex="0" style="padding: 0; cursor: pointer; margin-left: 15px;">
                        <a href="/catalog/', $row['Category'], '">
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