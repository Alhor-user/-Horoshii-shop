<?php
// <!-- Модальное окно 1 текст -->
echo'
<div id="modal-example-1" uk-modal>
    <div class="uk-modal-dialog uk-modal-body">
        <form id="edit-text" method="post" action="../pages/edit.php">
            <legend class="uk-legend">Изменение строки</legend>
            
            <input type="hidden" name="type" value="content">
            
            <input class="uk-input" type="text" name="text" value="';
            
            $sql = "SELECT `Content` FROM `content` WHERE `ID`='1'";
            $result = mysqli_query($link, $sql);
            $data = mysqli_fetch_array($result);
            echo $data['Content'];
            echo '">
            <p class="uk-text-center">
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
            
            <input class="uk-input" type="text" name="text" value="';
            
            $sql = "SELECT `Content` FROM `content` WHERE `ID`='2'";
            $result = mysqli_query($link, $sql);
            $data = mysqli_fetch_array($result);
            echo $data['Content'];
            echo '">
            <p class="uk-text-center">
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
            
            <input class="uk-input" type="text" name="text" value="';
            
            $sql = "SELECT `Content` FROM `content` WHERE `ID`='3'";
            $result = mysqli_query($link, $sql);
            $data = mysqli_fetch_array($result);
            echo $data['Content'];
            echo '">
            <p class="uk-text-center">
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
                <div class="row">
                    <label><i class="fa fa-info-circle" style="color: black;" uk-tooltip="Если не выбрать файл, то картинка останется прежней"></i> Картинка категории (будет сжата до квадратной):</label><br>
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
echo'
<div id="modal-example-6" uk-modal>
    <div class="uk-modal-dialog uk-modal-body">
        <form enctype="multipart/form-data" id="newcategoryform" method="post" action="../pages/new.php">
            <legend class="uk-legend">Добавление новой категории</legend>

            <div class="container uk-margin-medium-top">
                <div class="row">
                    <label><i class="fa fa-info-circle" style="color: black;" uk-tooltip="Если не выбрать файл, то будет установлена картинка по-умолчанию"></i> Картинка категории (будет сжата до квадратной):</label><br>
                    <input class="uk-margin-small-top" type="file" id="file" name="file" />
                </div>
                <div class="row">
                    <span class="uk-margin-small-top" id="output"></span>
                </div>
            </div>

            <p class="uk-margin-medium-top" style="margin-bottom: 10px;"><i class="fa fa-info-circle" style="color: black;" uk-tooltip="Имя отображается на сайте, например \'Икра\'"></i> Имя категории:</p>
            <input id="newCategoryName" class="uk-input" name="newname" value="" required>
            
            <p class="uk-margin-medium-top" style="margin-bottom: 10px;"><i class="fa fa-info-circle" style="color: black;" uk-tooltip="Категория отображается в адресной строке и должна быть написана на английском, например \'ikra\'"></i> Название категории:</p>
            <input id="newCategoryCategory" class="uk-input" name="newcategory" value="" required>
            
            <input type="hidden" name="type" value="new-category">
            
            <p class="uk-text-center uk-margin-medium-top">
                <button class="uk-button uk-button-danger uk-modal-close" type="button">Отмена</button>
                <button id="newCategoryOldCategory" class="uk-button uk-button-primary" type="submit" name="oldcategory" value="">Сохранить</button>
            </p>
        </form>
    </div> 
</div>';





// Модальное окно для удаления товара
echo'<div id="modal-example-7" uk-modal>
<div class="uk-modal-dialog uk-modal-body">
<form id="deleteitemform" method="post" action="../pages/delete.php">
<legend class="uk-legend">Вы точно хотите удалить эту категорию?</legend>
<input id="deleteItemName" class="uk-input uk-margin-medium-top" style="text-align: center;" value="" disabled>
<input type="hidden" name="type" value="delete-item">
<p class="uk-text-center uk-margin-medium-top">
<button class="uk-button uk-button-danger uk-modal-close" type="button">Отмена</button>
<button id="deleteItemCategory" class="uk-button uk-button-primary" type="submit" name="category" value="">Удалить</button>
</p>
</form>
</div>
</div>';

// Модальное окно для редактирования товара
echo'<div id="modal-example-8" uk-modal>
<div class="uk-modal-dialog uk-modal-body">
<form enctype="multipart/form-data" id="edititemform" method="post" action="../pages/edit.php">
<legend class="uk-legend">Редактирование категории</legend>


<div class="container uk-margin-medium-top">
<div class="row">
    <label><i class="fa fa-info-circle" style="color: black;" uk-tooltip="Если не выбрать файл, то картинка останется прежней"></i> Картинка категории (будет сжата до квадратной):</label><br>
    <input class="uk-margin-small-top" type="file" id="file" name="file" />
</div>
<div class="row">
    <span class="uk-margin-small-top" id="output"></span>
</div>
</div>


<p class="uk-margin-medium-top" style="margin-bottom: 10px;"><i class="fa fa-info-circle" style="color: black;" uk-tooltip="Имя отображается на сайте, например \'Икра\'"></i> Имя категории:</p>
<input id="editItemName" class="uk-input" name="newname" value="" required>
<p class="uk-margin-medium-top" style="margin-bottom: 10px;"><i class="fa fa-info-circle" style="color: black;" uk-tooltip="Категория отображается в адресной строке и должна быть написана на английском, например \'ikra\'"></i> Название категории:</p>
<input id="editItemCategory" class="uk-input" name="newcategory" value="" required>
<input type="hidden" name="type" value="edit-category">
<p class="uk-text-center uk-margin-medium-top">
<button class="uk-button uk-button-danger uk-modal-close" type="button">Отмена</button>
<button id="editItemOldCategory" class="uk-button uk-button-primary" type="submit" name="oldcategory" value="">Сохранить</button>
</p>
</form>
</div> 
</div>';

// Модальное окно для добавления новой товара
echo'<div id="modal-example-9" uk-modal>
<div class="uk-modal-dialog uk-modal-body">
<form enctype="multipart/form-data" id="newitemform" method="post" action="../pages/new.php">
<legend class="uk-legend">Добавление новой категории</legend>


<div class="container uk-margin-medium-top">
<div class="row">
    <label><i class="fa fa-info-circle" style="color: black;" uk-tooltip="Если не выбрать файл, то будет установлена картинка по-умолчанию"></i> Картинка категории (будет сжата до квадратной):</label><br>
    <input class="uk-margin-small-top" type="file" id="file" name="file" />
</div>
<div class="row">
    <span class="uk-margin-small-top" id="output"></span>
</div>
</div>


<p class="uk-margin-medium-top" style="margin-bottom: 10px;"><i class="fa fa-info-circle" style="color: black;" uk-tooltip="Имя отображается на сайте, например \'Икра\'"></i> Имя категории:</p>
<input id="newItemName" class="uk-input" name="newname" value="" required>
<p class="uk-margin-medium-top" style="margin-bottom: 10px;"><i class="fa fa-info-circle" style="color: black;" uk-tooltip="Категория отображается в адресной строке и должна быть написана на английском, например \'ikra\'"></i> Название категории:</p>
<input id="newItemCategory" class="uk-input" name="newcategory" value="" required>
<input type="hidden" name="type" value="new-category">
<p class="uk-text-center uk-margin-medium-top">
<button class="uk-button uk-button-danger uk-modal-close" type="button">Отмена</button>
<button id="newItemOldCategory" class="uk-button uk-button-primary" type="submit" name="oldcategory" value="">Сохранить</button>
</p>
</form>
</div> 
</div>';
?>