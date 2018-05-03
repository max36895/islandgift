<?php
require 'amp.php';
$amp = new amp();

$amp->head('reviews', 'Отзывы', 'Отзывы на сайт и на всю продукцию. Здесь вы сможете оставить свой отзыв на сайт или на заказ', 'Отзывы оставить отзыв о нас что говорят пишут');
?>
    <main>
        <section class="success-stories">
            <h1>Отзывы</h1>
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
                                                     src="https://www.islandgift.ru/<?= $data[3] ? $data[3] : '/img/avatar_placeholder.svg' ?>">
                                            </amp-img>
                                            <div class="card-content">
                                                <h3><?= $data[2] ?></h3>
                                                <p><?= $data[5] ?></p>
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
                            if ($review) {
                                $index = 1;
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
                                        <div class="card centered <?= $style ?>">
                                            <div class="card-inner">
                                                <amp-img class="card-icon"
                                                         noloading
                                                         height="280"
                                                         width="450"
                                                         layout=responsive
                                                         src="https://www.islandgift.ru/<?= $data[3] ? $data[3] : '/img/avatar_placeholder.svg' ?>">
                                                </amp-img>
                                                <div class="card-content">
                                                    <h3><?= $data[2] ?></h3>
                                                    <p><?= $data[5] ?></p>
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