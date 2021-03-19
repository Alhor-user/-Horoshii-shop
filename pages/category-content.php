<?php
    // Поверка, есть ли GET запрос
    if (isset($_GET['page'])) {
        // Если да то переменной $pageno присваиваем его
        $page = $_GET['page'];
    } else { // Иначе
        // Присваиваем $pageno один
        $page = 1;
    }
    // Назначаем количество данных на одной странице
    $size_page = 8;
    // Вычисляем с какого объекта начать выводить
    $offset = ($page-1) * $size_page;


    // SQL запрос для получения количества элементов
    $count_sql = "SELECT COUNT(*) FROM `production` WHERE `Category`='" . mysqli_real_escape_string($link, $category) . "'";
    $result = mysqli_query($link, $count_sql);
    // Количество подходящих строк в БД
    $total_rows = mysqli_fetch_array($result)[0];
    // Вычисляем количество страниц
    $total_pages = ceil($total_rows / $size_page);




    //echo 'Привет, ' . $category . '! <br>';
    $sql = "SELECT * FROM `production` WHERE `Category`='" . mysqli_real_escape_string($link, $category) . "' ORDER BY `Priority`, `Name` LIMIT $offset, $size_page";
    $result = mysqli_query($link, $sql);
?>



<div uk-grid class="uk-grid-collapse" style="min-height: 600px;">

    <div class="uk-width-1-1" style="height: 50px;">
    </div>

    <div class="uk-width-1-1" style="margin: 0 10vw;">
        <div class="uk-grid-column-small uk-grid-row-small uk-text-center uk-flex-center uk-child-width-1-5@m" uk-grid style="margin: 0;">

            <?php
            while ($row = mysqli_fetch_array($result)) {
                echo '
                <div class="uk-inline-clip uk-transition-toggle border-round" tabindex="0" style="padding: 0; cursor: pointer; margin-left: 15px;">';
                
                if (hash('md5', $_SESSION["login"]) == $_SESSION["key"]) {
                    echo '
                    <div class="icon-delete" style="position: absolute; width: 30px; height: 30px; background-color: white; top: 0px; right: 0px; z-index: 1; opacity: 0.8;">
                        <a href="#modal-example-7" uk-toggle onclick="DeleteItem(\'', $row['ID'], '\', \'', $row['Name'], '\')"><i class="fa fa-trash fa-lg" style="color: black;"></i></a>
                    </div>
                    <div class="icon-edit" style="position: absolute; width: 30px; height: 30px; background-color: white; top: 0px; right: 30px; z-index: 1; opacity: 0.8;">
                        <a href="#modal-example-8" uk-toggle onclick="EditItem(\'', $row['Name'], '\',\'', $row['Description'], '\',\'', $row['Price'], '\',\'', $row['Count'], '\',\'', $category, '\',\'', $row['Is-new'], '\',\'', $row['Is-no-stock'], '\',\'', $row['ID'], '\',\'', $row['Priority'], '\')"><i class="fa fa-pencil fa-lg" style="color: black;"></i></a>
                    </div>';

                }

                
                
                
                echo'<a>
                        <div class="uk-card uk-card-default" style="box-shadow: none;">
                            <div class="uk-card-media-top">
                                <img src="../img/', $row['Image'], '" alt="" class="category-card" style="height: auto;">
                            </div>
                            <div class="uk-card-body uk-padding-small">
                                <a class="uk-card-title">', $row['Name'], '</a>
                                <p class="uk-margin-small-top">', $row['Description'], '</p>
                            </div>
                        </div>
                    </a>
                </div>';

            }; 
            
            if (hash('md5', $_SESSION["login"]) == $_SESSION["key"]) {
                echo '
                <a href="#modal-example-9" onclick="NewItem(\'', $category,'\')" uk-toggle>
                    <div class="uk-card uk-card-default" style="box-shadow: none;">
                        <div class="uk-card-media-top">
                            <img src="../img/new-item.png" alt="" class="category-card" style="height: auto;">
                        </div>
                    </div>
                </a>';
            } elseif ((mysqli_num_rows($result) == 0)) {
                echo'
                <div style="width:100%">
                    <p style="font-size: 72pt; test-align: center;">Ой..</p>
                    <p style="font-size: 48pt; test-align: center;">Кажется, что в этой категории пока что нет товаров..</p>
                </div>';
            };
            ?>
        </div> 
    </div>

    <div class="uk-width-1-1" style="height: 30px;">
    </div>

    <div style="width: 100%;" <?php if ($total_rows<>0) echo 'hidden="true"'; ?>>
        <ul class="uk-pagination uk-flex-center uk-margin-small-topuk-margin-medium-bottom" uk-margin style="font-size: 16pt;">
            
            <!-- Предыдущая страница -->
            <?php if ($page>1) echo'<li><a href="?page=', $page-1, '"><span uk-pagination-previous></span></a></li>';?>
            
            <!-- Первая страница -->
            <?php if (($page-2)>0) echo'<li><a href="?page=1">1</a></li>';?>
            
            <!-- Многоточие до -->
            <?php if (($page-3)>0) echo'<li class="uk-disabled"><span>...</span></li>';?>
            
            <!-- Предыдущая страница -->
            <?php if ($page>1) echo'<li><a href="?page=', $page-1, '">', $page-1, '</a></li>';?>
            
            <!-- Настоящая страница -->
            <li class="uk-active"><a><?php echo $page; ?></a></li>
            
            <!-- Следующая страница -->
            <?php if ($page<$total_pages) echo'<li><a href="?page=', $page+1, '">', $page+1, '</a></li>';?>
            
            <!-- Многоточие после -->
            <?php if (($page+3)<=$total_pages) echo'<li class="uk-disabled"><span>...</span></li>';?>
            
            <!-- Последняя страница -->
            <?php if (($page+2)<=$total_pages) echo'<li><a href="?page=', $total_pages, '">', $total_pages, '</a></li>';?>

            <!-- Следующая страница -->
            <?php if ($page<$total_pages) echo'<li><a href="?page=', $page+1, '"><span uk-pagination-next></span></a></li>';?>
        </ul>
    </div>
</div>
