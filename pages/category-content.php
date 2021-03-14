<?php
    echo 'Привет, ' . $category . '! <br>';
    $sql = "SELECT * FROM `production` WHERE `Category`='" . $category . "'";
    $result = mysqli_query($link, $sql);
?>



<div uk-grid class="uk-grid-collapse">

    <div class="uk-width-1-1" style="height: 100px;">
    </div>

    <div class="uk-width-1-1" style="margin: 0 10vw;">
        <div class="uk-grid-column-small uk-grid-row-small uk-text-center uk-flex-center" uk-grid style="margin: 0;">


            <?php
            while ($row = mysqli_fetch_array($result)) {
                //print("Название: " . $row['Name'] . "; Категория: . " . $row['Category'] . "<br>");
                echo '<div class="uk-inline-clip uk-transition-toggle border-round" tabindex="0" style="padding: 0; cursor: pointer; margin-left: 15px;">
                    <a>
                        <div class="uk-card uk-card-default">
                            <div class="uk-card-media-top">
                                <img src="../img/', $row['Image'], '" alt="" class="category-card">
                                
                                // <div class="uk-overlay uk-overlay-primary uk-position-bottom category-card-text">
                                //     <a>', $row['Name'], '</a>
                                // </div>

                            </div>
                            <div class="uk-card-body">
                                <a class="uk-card-title">', $row['Name'], '</a>
                                <p>Системы неслыханно быстрые ошибаются неслыханно быстро.</p>
                            </div>
                        </div>
                    </a>
                </div>';
            }; ?>

            <!-- Мусор, тестовая карточка для разбора -->
            <!-- <div>
                <div class="uk-card uk-card-default">
                    <div class="uk-card-media-top">
                        <img src="images/light.jpg" alt="">
                    </div>
                    <div class="uk-card-body">
                        <h3 class="uk-card-title">Media Top</h3>
                        <p>Системы неслыханно быстрые ошибаются неслыханно быстро.</p>
                    </div>
                </div>
            </div> -->


        </div>
    </div>

    <div class="uk-width-1-1" style="height: 100px;">
    </div>

</div>
