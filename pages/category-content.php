<?php
    //echo 'Привет, ' . $category . '! <br>';
    $sql = "SELECT * FROM `production` WHERE `Category`='" . $category . "'";
    $result = mysqli_query($link, $sql);
?>



<div uk-grid class="uk-grid-collapse">

    <div class="uk-width-1-1" style="height: 50px;">
    </div>

    <div class="uk-width-1-1" style="margin: 0 10vw;">
        <div class="uk-grid-column-small uk-grid-row-small uk-text-center uk-flex-center uk-child-width-1-5@m" uk-grid style="margin: 0;">


            <?php
            while ($row = mysqli_fetch_array($result)) {
                echo '<div class="uk-inline-clip uk-transition-toggle border-round" tabindex="0" style="padding: 0; cursor: pointer; margin-left: 15px;">';
                
                if (hash('md5', $_SESSION["login"]) == $_SESSION["key"]) {
                    echo '<div class="icon-delete" style="position: absolute; width: 30px; height: 30px; background-color: white; top: 0px; right: 0px; z-index: 1; opacity: 0.8;">
                        <a href="#modal-example-7" uk-toggle onclick="DeleteItem(\'', $row['ID'], '\', \'', $row['Name'], '\')"><i class="fa fa-trash fa-lg" style="color: black;"></i></a>
                    </div>
                    <div class="icon-edit" style="position: absolute; width: 30px; height: 30px; background-color: white; top: 0px; right: 30px; z-index: 1; opacity: 0.8;">
                        <a href="#modal-example-8" uk-toggle onclick="EditItem(\'', $row['ID'], '\', \'', $row['Name'], '\')"><i class="fa fa-pencil fa-lg" style="color: black;"></i></a>
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
                echo '<a href="#modal-example-9" uk-toggle>
                        <div class="uk-card uk-card-default" style="box-shadow: none;">
                            <div class="uk-card-media-top">
                                <img src="../img/new-item.png" alt="" class="category-card" style="height: auto;">
                            </div>
                        </div>
                    </a>
                </div>';
            };?>
        </div> 
    </div>

    <div class="uk-width-1-1" style="height: 50px;">
    </div>

</div>
