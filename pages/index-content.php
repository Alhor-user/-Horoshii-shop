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
                            <a href="#modal-example-4"><i class="fa fa-trash fa-lg" style="color: black;"></i></a>
                        </div>
                        <div class="icon-edit" style="position: absolute; width: 30px; height: 30px; background-color: white; top: 0px; right: 30px; z-index: 1; opacity: 0.8;">
                            <a href="#" onclick="Edit("', $row['Category'], '");"><i class="fa fa-pencil fa-lg" style="color: black;"></i></a>
                        </div>';
                        
                        // Модальное окно для удаления категории
                        echo'<div id="modal-example-4" uk-modal>
                            <div class="uk-modal-dialog uk-modal-body">
                            <form id="delete-category" method="post" action="../pages/edit.php">
                            <h2 class="uk-modal-title">Внимание!</h2>
                            <h4 class="uk-modal-title">Вы точно хотите удалить категорию !!!!!!!!!!!!!!!!!!!!?</h2>
                            <input type="hidden" name="type" value="delete-category">
                            <button class="uk-button uk-button-danger uk-modal-close" type="button">Отмена</button>
                            <button class="uk-button uk-button-primary" type="submit" name="category" value="!!!!!!!!!!!">Удалить</button>
                            </p>
                            </form>
                            </div>
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

<!-- <script>
function Edit(category) {
	if (Element.style.color == 'green') Element.style.color = 'red';
	else Element.style.color = 'green';
	return false;
}
</script> -->