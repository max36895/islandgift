<?php
require 'amp.php';
$amp = new amp();

$pageText = include '../kernel/param/textForPage.php';
$amp->head('about');
?>
    <main>
        <section>
            <div class="container">
                <h1><?=$pageText['about']['title']?></h1>
                <p><?=$pageText['about']['section1Text']?></p>
                <div class="rbt-inline-88">
                    <amp-img src="https://www.islandgift.ru/img/allgift/podarok.jpg" alt="MaxImko" class="rbt-inline-89" width="219.8" height="151.2" layout="fixed"></amp-img>
                </div>
            </div>
        </section>

        <section>
            <div class="container">
                <h2><?=$pageText['advantages']['title']?></h2>
                <p><?=$pageText['advantages']['description']?></p>
                <amp-img src="https://www.islandgift.ru/amp/img/symbols/1.PNG" alt="MaxImko" class="rbt-inline-89"
                         width="219.8" height="151.2" layout="fixed"></amp-img>
                <h3><?=$pageText['advantages']['item1Title']?></h3>
                <p><?=$pageText['advantages']['item1Text']?></p>
                <amp-img src="https://www.islandgift.ru/amp/img/symbols/2.PNG" alt="MaxImko" class="rbt-inline-89"
                         width="219.8" height="151.2" layout="fixed"></amp-img>
                <h3><?=$pageText['advantages']['item2Title']?></h3>
                <p><?=$pageText['advantages']['item2Text']?></p>
                <amp-img src="https://www.islandgift.ru/amp/img/symbols/3.PNG" alt="MaxImko" class="rbt-inline-89"
                         width="219.8" height="151.2" layout="fixed"></amp-img>
                <h3><?=$pageText['advantages']['item3Title']?></h3>
                <p><?=$pageText['advantages']['item3Text']?></p>
                <amp-img src="https://www.islandgift.ru/amp/img/symbols/4.PNG" alt="MaxImko" class="rbt-inline-89"
                         width="219.8" height="151.2" layout="fixed"></amp-img>
                <h3><?=$pageText['advantages']['item4Title']?></h3>
                <p><?=$pageText['advantages']['item4Text']?></p>
            </div>
        </section>

        <section class="success-stories">
            <h2>Отзывы</h2>
            <div class="container">
                <div class="row">
                    <div class="twelve columns">
                        <amp-carousel class="success-carousel desktop-up"
                                      height="750" controls
                                      layout="flex-item"
                                      type="slides">

                            <div class="card-container">
                                <?php
                                require_once '../kernel/Reviews.php';
                                $reviews = new Reviews();
                                $review = $reviews->select();
                                if ($review) {
                                    while ($data = mysqli_fetch_array($review, MYSQLI_NUM)) {
                                        ?>
                                <div class="card centered wapo">
                                        <div class="card-inner">
                                            <amp-img class="card-icon"
                                                     noloading
                                                     height="280"
                                                     width="450"
                                                     layout=responsive
                                                     src="https://www.islandgift.ru/<?=$data[3]?$data[3]:'/img/avatar_placeholder.svg'?>">
                                            </amp-img>
                                            <div class="card-content">
                                                <h3><?=$data[2]?></h3>
                                                <p><?=$data[5]?></p>
                                            </div>
                                        </div>
                                </div>
                                        <?php
                                    }
                                    mysqli_free_result($review);
                                }
                                ?>
                            </div>
                        </amp-carousel>
                        <amp-carousel class="success-carousel mobile-down"
                                      height="750" controls
                                      layout="flex-item"
                                      type="slides">

                            <?php
                            $reviews = new Reviews();
                            $review = $reviews->select();
                            $index = 1;
                            if ($review) {
                                while ($data = mysqli_fetch_array($review, MYSQLI_NUM)) {
                                    if ($index == 1) {
                                        $style = 'wapo';
                                    } else if ($index == 2) {
                                        $style = 'wired';
                                    } else {
                                        $style = 'teads';
                                        $index = 1;
                                    }
                                    $index++;
                                    ?>
                                    <div class="card-container">
                                        <div class="card centered <?=$style?>">
                                            <div class="card-inner">
                                                <amp-img class="card-icon"
                                                         noloading
                                                         height="280"
                                                         width="450"
                                                         layout=responsive
                                                         src="https://www.islandgift.ru/<?=$data[3]?$data[3]:'/img/avatar_placeholder.svg'?>">
                                                </amp-img>
                                                <div class="card-content">
                                                    <h3><?=$data[2]?></h3>
                                                    <p><?=$data[5]?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                                mysqli_free_result($review);
                            }
                            ?>
                        </amp-carousel>
                    </div>
                </div>
            </div>
        </section>
    </main>
<?php
$amp->footer();
?>