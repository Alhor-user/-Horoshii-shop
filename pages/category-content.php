<?php
    function pagePrint($page, $title, $show, $active_class = '') {
        if($show) {
            echo '<a href="?do=list&page=' . $page . '">' . $title . '</a>';
        } else {
            if(!empty($active_class)) $active = 'class="' . $active_class . '"';
            echo '<span ' . $active . '>' . $title . '</span>';
        }
        return false;
    }


    $page_setting = [
        'limit' => 50, // кол-во записей на странице
        'show'  => 5, // 5 до текущей и после
        'prev_show' => 0, // не показывать кнопку "предыдущая"
        'next_show' => 0, // не показывать кнопку "следующая"
        'first_show' => 0, // не показывать ссылку на первую страницу
        'last_show' => 0, // не показывать ссылку на последнюю страницу
        'prev_text' => 'назад',
        'next_text' => 'вперед',
        'class_active' => 'active',
        'separator' => ' ... ',
    ];
    $start = ($page-1)*$page_setting['limit'];


    $sql = "SELECT count(*) AS count FROM `production` WHERE `Category`='" . mysqli_real_escape_string($link, $category) . "'";
    $res = mysqli_query($link, $sql);
    $row = $res->fetch(PDO::FETCH_ASSOC);
    $page_count = ceil($row['count'] / $page_setting['limit']); // кол-во страниц
    $page_left = $page - $page_setting['show']; // находим левую границу
    $page_right = $page + $page_setting['show']; // находим правую границу
    $page_prev = $page - 1; // узнаем номер предыдушей страницы
    $page_next = $page + 1; // узнаем номер следующей страницы
    if($page_left < 2) $page_left = 2; // левая граница не может быть меньше 2, так как 2 - первое целое число после 1
    if($page_right > ($page_count - 1)) $page_right = $page_count - 1; // правая граница не может ровняться или быть больше, чем всего страниц
    if($page > 1) $page_setting['prev_show'] = 1; // если текущая страница не первая, значит существует предыдущая
    if($page != 1) $page_setting['first_show'] = 1; // показываем ссылку на первую страницу, если мы не на ней
    if($page < $page_count) $page_setting['next_show'] = 1; // если текущая страница не последняя, значит существуюет следующая
    if($page != $page_count) $page_setting['last_show'] = 1;


    $page = (int) $_GET['page'];
    if(empty($page)) $page = 1; // если страница не задана, показываем первую


    

    $sql = "SELECT * FROM `production` WHERE `Category`='" . mysqli_real_escape_string($link, $category) . "' ORDER BY `Name` LIMIT {$start},{$page_setting['limit']}";
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
                        <a href="#modal-example-8" uk-toggle onclick="EditItem(\'', $row['Name'], '\',\'', $row['Description'], '\',\'', $row['Price'], '\',\'', $row['Count'], '\',\'', $category, '\',\'', $row['Is-new'], '\',\'', $row['Is-no-stock'], '\',\'', $row['ID'], '\')"><i class="fa fa-pencil fa-lg" style="color: black;"></i></a>
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

    <div class="uk-width-1-1" style="height: 50px;">
    </div>

    <?php
        pagePrint($page_prev, $page_setting['prev_text'], $page_setting['prev_show']);
        pagePrint(1, 1, $page_setting['first_show'], $page_setting['class_active']);
        if($page_left > 2) echo $page_setting['separator'];
        for($i = $page_left; $i <= $page_right; $i++) {
            $page_show = 1;
            if($page == $i) $page_show = 0;
            pagePrint($i, $i, $page_show, $page_setting['class_active']);
        }
        if($page_right < ($page_count - 1)) echo $page_setting['separator'];
        if($page_count != 1) pagePrint($page_count, $page_count, $page_setting['last_show'], $page_setting['class_active']);
        pagePrint($page_next, $page_setting['next_text'], $page_setting['next_show']);
    ?>
</div>
