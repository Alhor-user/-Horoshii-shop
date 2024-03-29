<?php
// <!-- Модальное окно 1 текст -->
echo'
<div id="modal-example-1" uk-modal>
    <div class="uk-modal-dialog uk-modal-body">
        <form id="edit-text" method="post" action="../pages/edit.php">
            <legend class="uk-legend">Изменение строки</legend>
            
            <input type="hidden" name="type" value="content">
            
            <input class="uk-input uk-margin-medium-top" type="text" name="text" value="';
            
            $sql = "SELECT `Content` FROM `content` WHERE `ID`='1'";
            $result = mysqli_query($link, $sql);
            $data = mysqli_fetch_array($result);
            echo $data['Content'];
            echo '">
            <p class="uk-text-center uk-margin-medium-top">
                <button class="uk-button uk-button-danger uk-modal-close" type="button">Отмена</button>
                <button class="uk-button uk-button-primary" type="submit" name="id" value="1">Сохранить</button>
            </p>
        </form>
    </div>
</div>';

// <!-- Модальное окно 2 текст -->
echo'
<div id="modal-example-2" uk-modal>
    <div class="uk-modal-dialog uk-modal-body">
        <form id="edit-text" method="post" action="../pages/edit.php">
            <legend class="uk-legend">Изменение строки</legend>
            
            <input type="hidden" name="type" value="content">
            
            <input class="uk-input uk-margin-medium-top" type="text" name="text" value="';
            
            $sql = "SELECT `Content` FROM `content` WHERE `ID`='2'";
            $result = mysqli_query($link, $sql);
            $data = mysqli_fetch_array($result);
            echo $data['Content'];
            echo '">
            <p class="uk-text-center uk-margin-medium-top">
                <button class="uk-button uk-button-danger uk-modal-close" type="button">Отмена</button>
                <button class="uk-button uk-button-primary" type="submit" name="id" value="2">Сохранить</button>
            </p>
        </form>
    </div>
</div>';

// <!-- Модальное окно 3 текст -->
echo'
<div id="modal-example-3" uk-modal>
    <div class="uk-modal-dialog uk-modal-body">
        <form id="edit-text" method="post" action="../pages/edit.php">
            <legend class="uk-legend">Изменение строки</legend>
            
            <input type="hidden" name="type" value="content">
            
            <input class="uk-input uk-margin-medium-top" type="text" name="text" value="';
            
            $sql = "SELECT `Content` FROM `content` WHERE `ID`='3'";
            $result = mysqli_query($link, $sql);
            $data = mysqli_fetch_array($result);
            echo $data['Content'];
            echo '">
            <p class="uk-text-center uk-margin-medium-top">
                <button class="uk-button uk-button-danger uk-modal-close" type="button">Отмена</button>
                <button class="uk-button uk-button-primary" type="submit" name="id" value="3">Сохранить</button>
            </p>
        </form>
    </div>
</div>';



// Модальное окно для удаления категории
echo'
<div id="modal-example-4" uk-modal>
    <div class="uk-modal-dialog uk-modal-body">
        <form id="deleteategoryform" method="post" action="../pages/delete.php">
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
echo'
<div id="modal-example-5" uk-modal>
    <div class="uk-modal-dialog uk-modal-body">
        <form enctype="multipart/form-data" id="editcategoryform" method="post" action="../pages/edit.php">
            <legend class="uk-legend">Редактирование категории</legend>

            <div class="container uk-margin-medium-top">
                <div uk-form-custom="target: true">
                    <label><i class="fa fa-info-circle" style="color: black;" uk-tooltip="Если не выбрать изображение, то картинка останется прежней"></i> Картинка категории (будет сжата до квадратной):</label><br>
                    <input class="uk-margin-small-top" type="file" id="file1" name="file" />
                    <input class="uk-input uk-form-width-medium uk-margin-small-top" type="text" placeholder="Выбрать файл" disabled>
                </div>
                <div class="row">
                    <span class="uk-margin-small-top" id="output1"></span>
                </div>
            </div>

            <p class="uk-margin-medium-top" style="margin-bottom: 10px;"><i class="fa fa-info-circle" style="color: black;" uk-tooltip="Название отображается на сайте, например \'Икра\'"></i> Название категории:</p>
            <input id="editCategoryName" class="uk-input" name="newname" value="" required>
            
            <!-- <p class="uk-margin-medium-top" style="margin-bottom: 10px;"><i class="fa fa-info-circle" style="color: black;" uk-tooltip="Категория отображается в адресной строке, например \'ikra\'. Разрешенные символы - латинский алфавит, цифры и \'-\'"></i> Название категории:</p>
            <input id="editCategoryCategory" class="uk-input" name="newcategory" pattern="^[a-zA-Z0-9-]+$" value="" required> -->
            
            <p class="uk-margin-medium-top" style="margin-bottom: 10px;"><i class="fa fa-info-circle" style="color: black;" uk-tooltip="Первыми на сайте отображаются категории с меньшей цифрой в приоритете. Если приоритет одинаковый - идут в алфавитном порядке. Разрешенные символы - числа 0-127"></i> Приоритет:</p>
            <input id="editCategoryPriority" class="uk-input" name="newpriority" pattern="\b(1[0-1][0-9]|1[0-2][0-7]|[1-9][0-9]|[0-9])\b" value="">

            <input type="hidden" name="type" value="edit-category">
            
            <p class="uk-text-center uk-margin-medium-top">
                <button class="uk-button uk-button-danger uk-modal-close" type="button">Отмена</button>
                <button id="editCategoryOldCategory" class="uk-button uk-button-primary" type="submit" name="oldcategory" value="">Сохранить</button>
            </p>
        </form>
    </div> 
</div>';

// Модальное окно для добавления новой категории
echo'
<div id="modal-example-6" uk-modal>
    <div class="uk-modal-dialog uk-modal-body">
        <form enctype="multipart/form-data" id="newcategoryform" method="post" action="../pages/new.php">
            <legend class="uk-legend">Добавление новой категории</legend>

            <div class="container uk-margin-medium-top">
                <div uk-form-custom="target: true">
                <label><i class="fa fa-info-circle" style="color: black;" uk-tooltip="Если не выбрать изображение, то будет установлена картинка по-умолчанию"></i> Картинка категории (будет сжата до квадратной):</label><br>
                <input class="uk-margin-small-top" type="file" id="file2" name="file" />
                    <input class="uk-input uk-form-width-medium uk-margin-small-top" type="text" placeholder="Выбрать файл" disabled>
                </div>
                <div class="row">
                    <span class="uk-margin-small-top" id="output2"></span>
                </div>
            </div>

            <p class="uk-margin-medium-top" style="margin-bottom: 10px;"><i class="fa fa-info-circle" style="color: black;" uk-tooltip="Название отображается на сайте, например \'Икра\'"></i> Название категории:</p>
            <input id="newCategoryName" class="uk-input" name="newname" value="" required>
            
            <!-- <p class="uk-margin-medium-top" style="margin-bottom: 10px;"><i class="fa fa-info-circle" style="color: black;" uk-tooltip="Категория отображается в адресной строке, например \'ikra\'. Разрешенные символы - латинский алфавит, цифры и \'-\'"></i> Название категории:</p>
            <input id="newCategoryCategory" class="uk-input" name="newcategory" pattern="^[a-zA-Z0-9-]+$" value="" required> -->
            
            <p class="uk-margin-medium-top" style="margin-bottom: 10px;"><i class="fa fa-info-circle" style="color: black;" uk-tooltip="Первыми на сайте отображаются категории с меньшей цифрой в приоритете. Если приоритет одинаковый - идут в алфавитном порядке. Разрешенные символы - числа 0-127"></i> Приоритет:</p>
            <input id="newCategoryPriority" class="uk-input" name="newpriority" pattern="\b(1[0-1][0-9]|1[0-2][0-7]|[1-9][0-9]|[0-9])\b" value="127">

            <input type="hidden" name="type" value="new-category">
            
            <p class="uk-text-center uk-margin-medium-top">
                <button class="uk-button uk-button-danger uk-modal-close" type="button">Отмена</button>
                <button id="newCategoryOldCategory" class="uk-button uk-button-primary" type="submit">Сохранить</button>
            </p>
        </form>
    </div> 
</div>';


// Модальное окно для удаления товара
echo'
<div id="modal-example-7" uk-modal>
    <div class="uk-modal-dialog uk-modal-body">
        <form id="deleteitemform" method="post" action="../pages/delete.php">
            <legend class="uk-legend">Вы точно хотите удалить этот товар?</legend>
            
            <input id="deleteItemName" class="uk-input uk-margin-medium-top" style="text-align: center;" value="" disabled>
            
            <input type="hidden" name="type" value="delete-item">
            
            <p class="uk-text-center uk-margin-medium-top">
                <button class="uk-button uk-button-danger uk-modal-close" type="button">Отмена</button>
                <button id="deleteItemID" class="uk-button uk-button-primary" type="submit" name="ID" value="">Удалить</button>
            </p>
        </form>
    </div>
</div>';

// Модальное окно для редактирования товара
echo'
<div id="modal-example-8" uk-modal>
    <div class="uk-modal-dialog uk-modal-body">
        <form enctype="multipart/form-data" id="edititemform" method="post" action="../pages/edit.php">
            <legend class="uk-legend">Редактирование категории</legend>

            <!-- Выбор изображения -->
            <div class="container uk-margin-medium-top">
                <div uk-form-custom="target: true">
                    <label><i class="fa fa-info-circle" style="color: black;" uk-tooltip="Если не выбрать изображение, то картинка останется прежней"></i> Картинка товара (будет сжата до квадратной):</label><br>
                    <input class="uk-margin-small-top" type="file" id="file3" name="file" />
                    <input class="uk-input uk-form-width-medium uk-margin-small-top" type="text" placeholder="Выбрать файл" disabled>
                </div>
                <div class="row">
                    <span class="uk-margin-small-top" id="output3"></span>
                </div>
            </div>

            <!-- Ввод Name -->
            <p class="uk-margin-medium-top" style="margin-bottom: 10px;"><i class="fa fa-info-circle" style="color: black;" uk-tooltip="Название отображается на сайте, например \'Икра трески\'"></i> Название товара:</p>
            <input id="editItemName" class="uk-input" name="newname" value="" required>
            
            <!-- Ввод Description -->
            <p class="uk-margin-medium-top" style="margin-bottom: 10px;"><i class="fa fa-info-circle" style="color: black;" uk-tooltip="Описание отображается на сайте"></i> Описание товара:</p>
            <input id="editItemDescription" class="uk-input" name="newdescription" value="">
            
            <!-- Ввод Price -->
            <p class="uk-margin-medium-top" style="margin-bottom: 10px;"><i class="fa fa-info-circle" style="color: black;" uk-tooltip="Если цена не прописана, то вместо нее будет надпись \'не указана\'. Разрешенные символы - цифры и \',\'"></i> Цена:</p>
            <input id="editItemPrice" class="uk-input" name="newprice" pattern="\d+(,\d{2})?" value="">

            <!-- Ввод Count -->
            <p class="uk-margin-medium-top" style="margin-bottom: 10px;"><i class="fa fa-info-circle" style="color: black;" uk-tooltip="Если вес не прописан, то вместо него будет надпись \'не указан\'"></i> Вес:</p>
            <input id="editItemCount" class="uk-input" name="newcount" value="">
            
            <p class="uk-margin-medium-top" style="margin-bottom: 10px;"><i class="fa fa-info-circle" style="color: black;" uk-tooltip="Первыми на сайте отображаются товары с меньшей цифрой в приоритете. Если приоритет одинаковый - идут в алфавитном порядке. Разрешенные символы - числа 0-127"></i> Приоритет:</p>
            <input id="editItemPriority" class="uk-input" name="newpriority" pattern="\b(1[0-1][0-9]|1[0-2][0-7]|[1-9][0-9]|[0-9])\b" value="">

            <!-- Выбор Tags -->
            <p class="uk-margin-medium-top" style="margin-bottom: 10px;"><i class="fa fa-info-circle" style="color: black;" uk-tooltip="Если тег указан, то он отобразится сверху на товаре"></i> Теги:</p>
            <div class="uk-margin-small-left">
                <label><input id="editItemTagNew" class="uk-checkbox" type="checkbox" name="newtagnew"> Новинка</label>
            </div>
            <div class="uk-margin-small-left">
                <label><input id="editItemTagStock" class="uk-checkbox" type="checkbox" name="newtagstock"> Нет в наличии</label>
            </div>

            <!-- ID -->
            <input id="editItemID" type="hidden" name="id" value="">

            <!-- Category -->
            <input id="editItemCategory" type="hidden" name="newcategory" value="">

            <!-- Категория (для скрипта обработки данных) -->
            <input type="hidden" name="type" value="edit-item">

            <!-- Кнопки отправки формы -->
            <p class="uk-text-center uk-margin-medium-top">
                <button class="uk-button uk-button-danger uk-modal-close" type="button">Отмена</button>
                <button class="uk-button uk-button-primary" type="submit">Сохранить</button>
            </p>
        </form>
    </div> 
</div>';






// Модальное окно для добавления новой товара
echo'
<div id="modal-example-9" uk-modal>
    <div class="uk-modal-dialog uk-modal-body">
        <form enctype="multipart/form-data" id="newitemform" method="post" action="../pages/new.php">
            <legend class="uk-legend">Добавление новой категории</legend>

            <!-- Выбор изображения -->
            <div class="container uk-margin-medium-top">
                <div uk-form-custom="target: true">
                    <label><i class="fa fa-info-circle" style="color: black;" uk-tooltip="Если не выбрать изображение, будет установлена картинка по-умолчанию"></i> Картинка товара (будет сжата до квадратной):</label><br>
                    <input class="uk-margin-small-top" type="file" id="file4" name="file" />
                    <input class="uk-input uk-form-width-medium uk-margin-small-top" type="text" placeholder="Выбрать файл" disabled>
                </div>
                <div class="row">
                    <span class="uk-margin-small-top" id="output4"></span>
                </div>
            </div>

            <!-- Ввод Name -->
            <p class="uk-margin-medium-top" style="margin-bottom: 10px;"><i class="fa fa-info-circle" style="color: black;" uk-tooltip="Название отображается на сайте, например \'Икра трески\'"></i> Название товара:</p>
            <input id="newItemName" class="uk-input" name="newname" value="" required>
            
            <!-- Ввод Description -->
            <p class="uk-margin-medium-top" style="margin-bottom: 10px;"><i class="fa fa-info-circle" style="color: black;" uk-tooltip="Описание отображается на сайте"></i> Описание товара:</p>
            <input id="newItemDescription" class="uk-input" name="newdescription" value="">
            
            <!-- Ввод Price -->
            <p class="uk-margin-medium-top" style="margin-bottom: 10px;"><i class="fa fa-info-circle" style="color: black;" uk-tooltip="Если цена не прописана, то вместо нее будет надпись \'не указана\'. Разрешенные символы - цифры и \',\'"></i> Цена:</p>
            <input id="newItemPrice" class="uk-input" name="newprice" pattern="\d+(,\d{2})?" value="">

            <!-- Ввод Count -->
            <p class="uk-margin-medium-top" style="margin-bottom: 10px;"><i class="fa fa-info-circle" style="color: black;" uk-tooltip="Если вес не прописан, то вместо него будет надпись \'не указан\'"></i> Вес:</p>
            <input id="newItemCount" class="uk-input" name="newcount" value="">
            
            <p class="uk-margin-medium-top" style="margin-bottom: 10px;"><i class="fa fa-info-circle" style="color: black;" uk-tooltip="Первыми на сайте отображаются категории с меньшей цифрой в приоритете. Если приоритет одинаковый - идут в алфавитном порядке. Разрешенные символы - числа 0-127"></i> Приоритет:</p>
            <input id="newItemPriority" class="uk-input" name="newpriority" pattern="\b(1[0-1][0-9]|1[0-2][0-7]|[1-9][0-9]|[0-9])\b" value="127">

            <!-- Выбор Tags -->
            <p class="uk-margin-medium-top" style="margin-bottom: 10px;"><i class="fa fa-info-circle" style="color: black;" uk-tooltip="Если тег указан, то он отобразится сверху на товаре"></i> Теги:</p>
            <div class="uk-margin-small-left">
                <label><input id="newItemTagNew" class="uk-checkbox" type="checkbox" name="newtagnew"> Новинка</label>
            </div>
            <div class="uk-margin-small-left">
                <label><input id="newItemTagStock" class="uk-checkbox" type="checkbox" name="newtagstock"> Нет в наличии</label>
            </div>

            <!-- Category -->
            <input id="newItemCategory" type="hidden" name="newcategory" value="">

            <!-- Категория (для скрипта обработки данных) -->
            <input type="hidden" name="type" value="new-item">

            <!-- Кнопки отправки формы -->
            <p class="uk-text-center uk-margin-medium-top">
                <button class="uk-button uk-button-danger uk-modal-close" type="button">Отмена</button>
                <button class="uk-button uk-button-primary" type="submit">Сохранить</button>
            </p>
        </form>
    </div> 
</div>';
?>