<div uk-grid class="uk-grid-collapse">

    <div class="uk-width-1-1" style="height: 100px;">
    </div>

    <div class="uk-width-1-1" style="margin: 0 10vw;">
        <div class="uk-grid-column-small uk-grid-row-small uk-text-center uk-flex-center" uk-grid style="margin: 0;">
            
            
            
            <?php
                $sql = "SELECT * FROM `categories` WHERE `Status`='Active'";
                $result = mysqli_query($link, $sql);
                while ($row = mysqli_fetch_array($result)) {
                    //print("Название: " . $row['Name'] . "; Категория: . " . $row['Category'] . "<br>");
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
            
            
            <!-- карта №1
            <div class="uk-inline-clip uk-transition-toggle border-round" tabindex="0" style="padding: 0; cursor: pointer; margin-left: 15px;">
                <a href="/catalog/ikra">
                    <div class="uk-card uk-card-default">
                        <div class="uk-card-media-top">
                            <img src="../img/ikra.jpg" alt="" class="category-card uk-transition-scale-up uk-transition-opaque">
                            <div class="uk-overlay uk-overlay-primary uk-position-bottom category-card-text">
                                <a>Икра</a>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            карта №2
            <div class="uk-inline-clip uk-transition-toggle border-round" tabindex="0" style="padding: 0; cursor: pointer; margin-left: 15px;">
                <a href="/catalog/river-fish">
                    <div class="uk-card uk-card-default">
                        <div class="uk-card-media-top">
                            <img src="../img/rechnaya-riba.jpg" alt="" class="category-card uk-transition-scale-up uk-transition-opaque">
                            <div class="uk-overlay uk-overlay-primary uk-position-bottom category-card-text">
                                <a>Речная рыба</a>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            карта №3
            <div class="uk-inline-clip uk-transition-toggle border-round" tabindex="0" style="padding: 0; cursor: pointer; margin-left: 15px;">
                <a href="/catalog/sea-fish">
                    <div class="uk-card uk-card-default">
                        <div class="uk-card-media-top">
                            <img src="../img/morskaya-riba.jpg" alt="" class="category-card uk-transition-scale-up uk-transition-opaque">
                            <div class="uk-overlay uk-overlay-primary uk-position-bottom category-card-text">
                                <a>Морская рыба</a>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            карта №4
            <div class="uk-inline-clip uk-transition-toggle border-round" tabindex="0" style="padding: 0; cursor: pointer; margin-left: 15px;">
                <a href="/catalog/salt-fish">
                    <div class="uk-card uk-card-default">
                        <div class="uk-card-media-top">
                            <img src="../img/solenaya-riba.jpg" alt="" class="category-card uk-transition-scale-up uk-transition-opaque">
                            <div class="uk-overlay uk-overlay-primary uk-position-bottom category-card-text">
                                <a>Солёная рыба</a>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            карта №5
            <div class="uk-inline-clip uk-transition-toggle border-round" tabindex="0" style="padding: 0; cursor: pointer; margin-left: 15px;">
                <div class="uk-card uk-card-default">
                    <div class="uk-card-media-top">
                        <img src="../img/noimage.png" alt="" class="category-card uk-transition-scale-up uk-transition-opaque">
                        <div class="uk-overlay uk-overlay-primary uk-position-bottom category-card-text">
                            <a>Default</a>
                        </div>
                    </div>
                </div>
            </div>
            карта №6
            <div class="uk-inline-clip uk-transition-toggle border-round" tabindex="0" style="padding: 0; cursor: pointer; margin-left: 15px;">
                <div class="uk-card uk-card-default">
                    <div class="uk-card-media-top">
                        <img src="../img/noimage.png" alt="" class="category-card uk-transition-scale-up uk-transition-opaque">
                        <div class="uk-overlay uk-overlay-primary uk-position-bottom category-card-text">
                            <a>Default</a>
                        </div>
                    </div>
                </div>
            </div>
            карта №7
            <div class="uk-inline-clip uk-transition-toggle border-round" tabindex="0" style="padding: 0; cursor: pointer; margin-left: 15px;">
                <div class="uk-card uk-card-default">
                    <div class="uk-card-media-top">
                        <img src="../img/noimage.png" alt="" class="category-card uk-transition-scale-up uk-transition-opaque">
                        <div class="uk-overlay uk-overlay-primary uk-position-bottom category-card-text">
                            <a>Default</a>
                        </div>
                    </div>
                </div>
            </div>
            карта №8
            <div class="uk-inline-clip uk-transition-toggle border-round" tabindex="0" style="padding: 0; cursor: pointer; margin-left: 15px;">
                <div class="uk-card uk-card-default">
                    <div class="uk-card-media-top">
                        <img src="../img/noimage.png" alt="" class="category-card uk-transition-scale-up uk-transition-opaque">
                        <div class="uk-overlay uk-overlay-primary uk-position-bottom category-card-text">
                            <a>Default</a>
                        </div>
                    </div>
                </div>
            </div>
            карта №9
            <div class="uk-inline-clip uk-transition-toggle border-round" tabindex="0" style="padding: 0; cursor: pointer; margin-left: 15px;">
                <div class="uk-card uk-card-default">
                    <div class="uk-card-media-top">
                        <img src="../img/noimage.png" alt="" class="category-card uk-transition-scale-up uk-transition-opaque">
                        <div class="uk-overlay uk-overlay-primary uk-position-bottom category-card-text">
                            <a>Default</a>
                        </div>
                    </div>
                </div>
            </div>
            карта №10
            <div class="uk-inline-clip uk-transition-toggle border-round" tabindex="0" style="padding: 0; cursor: pointer; margin-left: 15px;">
                <div class="uk-card uk-card-default">
                    <div class="uk-card-media-top">
                        <img src="../img/noimage.png" alt="" class="category-card uk-transition-scale-up uk-transition-opaque">
                        <div class="uk-overlay uk-overlay-primary uk-position-bottom category-card-text">
                            <a>Default</a>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
    </div>

    <div class="uk-width-1-1" style="height: 150px;">
    </div>

</div>           