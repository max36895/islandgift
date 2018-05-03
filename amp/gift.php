<?php
require 'amp.php';
include '../kernel/SITE.php';
$amp = new amp();
$productDb = new Product();

$products = $productDb->GetPopulationProduct();
$productsDesktop = $productDb->GetPopulationProduct();

$meta_d = 'На страницах нашего сайта представлен огромный ассортимент необычных и оригинальных подарков, которые наверняка вам понравятся. Порадуйте своих близких';
$meta_k = 'в ярославле подарок набор новый год день рождения праздник оригинально идея для тебя';
$pageText = include '../kernel/param/textForPage.php';
$amp->head('gift', 'Подарок для тебя💝', $meta_d, $meta_k);
?>
<main class="text-center">
    <section class="success-stories">
        <h1><?=$pageText['gift']['title']?></h1>
        <?php
        if($pageText['gift']['section1Text'] != '36895'){
            echo '<p>'.$pageText['gift']['section1Text'].'</p>';
        }
        ?>
        <h3>Категории</h3>
        <p><?=$pageText['gift']['categoryText']?></p>
        <div class="container">
            <div class="row">
                <div class="twelve columns">
                    <amp-carousel class="success-carousel desktop-up"
                                  height="650" controls
                                  layout="flex-item"
                                  type="slides">
                        <div class="card-container">
                            <div class="card centered wapo">
                                <div class="card-inner">
                                    <amp-img class="card-icon"
                                             noloading
                                             height="280"
                                             width="450"
                                             layout=responsive
                                             src="https://www.islandgift.ru/img/woman/1.png">
                                    </amp-img>
                                    <div class="card-content">
                                        <h3>Подарки&nbsp;<br>для<br>женщин</h3>
                                        <p> Достойные подарки для любимой женщины</p>
                                        <div class="ul-widget ul-w-button text-center ul-scroll-animate"><a
                                                    class="normal ul-w-button1 middle" target="_self"
                                                    href="https://www.islandgift.ru/amp/woman"
                                                    title="Прекрасным женщинам и девушкам">Подробнее</a></div>
                                    </div>
                                </div>
                            </div>
                            <div class="card centered wired">
                                <div class="card-inner">
                                    <amp-img class="card-icon"
                                             noloading
                                             height="280"
                                             width="450"
                                             layout=responsive
                                             src="https://www.islandgift.ru/img/man/1.jpg">
                                    </amp-img>
                                    <div class="card-content">
                                        <h3>Подарки<br>для<br>мужчин</h3>
                                        <p> Подарки настоящему мужчине</p>
                                        <div class="ul-widget ul-w-button text-center ul-scroll-animate"><a
                                                    class="normal ul-w-button1 middle" target="_self"
                                                    href="https://www.islandgift.ru/amp/man"
                                                    title="Подарки настоящему мужчине">Подробнее</a></div>
                                    </div>
                                </div>
                            </div>
                            <div class="card centered teads">
                                <div class="card-inner">
                                    <amp-img class="card-icon"
                                             noloading
                                             height="280"
                                             width="450"
                                             layout=responsive
                                             src="https://www.islandgift.ru/img/children/1.png">
                                    </amp-img>
                                    <div class="card-content">
                                        <h3>Подарки&nbsp;<br>для&nbsp;<br>детей</h3>
                                        <p> Подарки самым маленьким</p>
                                        <div class="ul-widget ul-w-button text-center ul-scroll-animate"><a
                                                    class="normal ul-w-button1 middle" target="_self"
                                                    href="https://www.islandgift.ru/amp/children"
                                                    title="Подарки самым маленьким">Подробнее</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </amp-carousel>
                    <amp-carousel class="success-carousel mobile-down"
                                  height="535" controls
                                  layout="flex-item"
                                  type="slides">

                        <div class="card-container">
                            <div class="card centered wapo">
                                <div class="card-inner">
                                    <amp-img class="card-icon"
                                             noloading
                                             height="280"
                                             width="450"
                                             layout=responsive
                                             src="https://www.islandgift.ru/img/woman/1.png">
                                    </amp-img>
                                    <div class="card-content">
                                        <h3>Подарки&nbsp;<br>для<br>женщин</h3>
                                        <p> Достойные подарки для любимой женщины</p>
                                        <div class="ul-widget ul-w-button text-center ul-scroll-animate"><a
                                                    class="normal ul-w-button1 middle" target="_self"
                                                    href="https://www.islandgift.ru/amp/woman"
                                                    title="Прекрасным женщинам и девушкам">Подробнее</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-container">
                            <div class="card centered wired">
                                <div class="card-inner">
                                    <amp-img class="card-icon"
                                             noloading
                                             height="280"
                                             width="450"
                                             layout=responsive
                                             src="https://www.islandgift.ru/img/man/1.jpg">
                                    </amp-img>
                                    <div class="card-content">
                                        <h3>Подарки<br>для<br>мужчин</h3>
                                        <p> Подарки настоящему мужчине</p>
                                        <div class="ul-widget ul-w-button text-center ul-scroll-animate"><a
                                                    class="normal ul-w-button1 middle" target="_self"
                                                    href="https://www.islandgift.ru/amp/man"
                                                    title="Подарки настоящему мужчине">Подробнее</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-container">
                            <div class="card centered teads">
                                <div class="card-inner">
                                    <amp-img class="card-icon"
                                             noloading
                                             height="280"
                                             width="450"
                                             layout=responsive
                                             src="https://www.islandgift.ru/img/children/1.png">
                                    </amp-img>
                                    <div class="card-content">
                                        <h3>Подарки&nbsp;<br>для&nbsp;<br>детей</h3>
                                        <p> Подарки самым маленьким</p>
                                        <div class="ul-widget ul-w-button text-center ul-scroll-animate"><a
                                                    class="normal ul-w-button1 middle" target="_self"
                                                    href="https://www.islandgift.ru/amp/children"
                                                    title="Подарки самым маленьким">Подробнее</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </amp-carousel>
                </div>
            </div>
            <div class="row">
                <div class="twelve columns">
                    <amp-carousel class="success-carousel desktop-up"
                                  height="650" controls
                                  layout="flex-item"
                                  type="slides">
                        <div class="card-container">
                            <div class="card centered wapo">
                                <div class="card-inner">
                                    <amp-img class="card-icon"
                                             noloading
                                             height="280"
                                             width="450"
                                             layout=responsive
                                             src="https://www.islandgift.ru/img/parent/1.png">
                                    </amp-img>
                                    <div class="card-content">
                                        <h3>Подарки<br>для<br>Родителей</h3>
                                        <p> Маленькое чудо для родителей</p>
                                        <div class="ul-widget ul-w-button text-center ul-scroll-animate"><a
                                                    class="normal ul-w-button1 middle" target="_self"
                                                    href="https://www.islandgift.ru/amp/parent"
                                                    title="Маленькое чудо для родителей">Подробнее</a></div>
                                    </div>
                                </div>
                            </div>
                            <div class="card centered wired">
                                <div class="card-inner">
                                    <amp-img class="card-icon"
                                             noloading
                                             height="280"
                                             width="450"
                                             layout=responsive
                                             src="https://www.islandgift.ru/img/grandmather/1.png">
                                    </amp-img>
                                    <div class="card-content">
                                        <h3>Подарки<br>для<br>Бабушек и дедушек<br></h3>
                                        <p> Подарки для любимых бабушек и дедушек</p>
                                        <div class="ul-widget ul-w-button text-center ul-scroll-animate"><a
                                                    class="normal ul-w-button1 middle" target="_self"
                                                    href="https://www.islandgift.ru/amp/grandma"
                                                    title="Подарки для любимых бабушек и дедушек">Подробнее</a></div>
                                    </div>
                                </div>
                            </div>
                            <div class="card centered teads">
                                <div class="card-inner">
                                    <amp-img class="card-icon"
                                             noloading
                                             height="280"
                                             width="450"
                                             layout=responsive
                                             src="https://www.islandgift.ru/img/allgift/1.jpg">
                                    </amp-img>
                                    <div class="card-content">
                                        <h3>Все подарки</h3>
                                        <p> Здесь собранна вся коллекция подарков и услуг которые мы с радостью
                                            предоставляем для Вас</p>
                                        <div class="ul-widget ul-w-button text-center ul-scroll-animate"><a
                                                    class="normal ul-w-button1 middle" target="_self"
                                                    href="https://www.islandgift.ru/amp/allgift"
                                                    title="Все подарки">Подробнее</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </amp-carousel>
                    <amp-carousel class="success-carousel mobile-down"
                                  height="530" controls
                                  layout="flex-item"
                                  type="slides">

                        <div class="card-container">
                            <div class="card centered wapo">
                                <div class="card-inner">
                                    <amp-img class="card-icon"
                                             noloading
                                             height="280"
                                             width="450"
                                             layout=responsive
                                             src="https://www.islandgift.ru/img/parent/1.png">
                                    </amp-img>
                                    <div class="card-content">
                                        <h3>Подарки<br>для<br>Родителей</h3>
                                        <p> Маленькое чудо для родителей</p>
                                        <div class="ul-widget ul-w-button text-center ul-scroll-animate"><a
                                                    class="normal ul-w-button1 middle" target="_self"
                                                    href="https://www.islandgift.ru/amp/parent"
                                                    title="Маленькое чудо для родителей">Подробнее</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-container">
                            <div class="card centered wired">
                                <div class="card-inner">
                                    <amp-img class="card-icon"
                                             noloading
                                             height="280"
                                             width="450"
                                             layout=responsive
                                             src="https://www.islandgift.ru/img/grandmather/1.png">
                                    </amp-img>
                                    <div class="card-content">
                                        <h3>Подарки<br>для<br>Бабушек и дедушек<br></h3>
                                        <p> Подарки для любимых бабушек и дедушек</p>
                                        <div class="ul-widget ul-w-button text-center ul-scroll-animate"><a
                                                    class="normal ul-w-button1 middle" target="_self"
                                                    href="https://www.islandgift.ru/amp/grandma"
                                                    title="Подарки для любимых бабушек и дедушек">Подробнее</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-container">
                            <div class="card centered teads">
                                <div class="card-inner">
                                    <amp-img class="card-icon"
                                             noloading
                                             height="280"
                                             width="450"
                                             layout=responsive
                                             src="https://www.islandgift.ru/img/allgift/1.jpg">
                                    </amp-img>
                                    <div class="card-content">
                                        <h3>Все подарки</h3>
                                        <p> Здесь собранна вся коллекция подарков и услуг которые мы с радостью
                                            предоставляем для Вас</p>
                                        <div class="ul-widget ul-w-button text-center ul-scroll-animate"><a
                                                    class="normal ul-w-button1 middle" target="_self"
                                                    href="https://www.islandgift.ru/amp/allgift"
                                                    title="Все подарки">Подробнее</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </amp-carousel>
                </div>
            </div>
            <div class="row">
                <div class="twelve columns">
                    <amp-carousel class="success-carousel desktop-up"
                                  height="550" controls
                                  layout="flex-item"
                                  type="slides">
                        <div class="card-container">
                            <div class="card centered wapo">
                                <div class="card-inner">
                                    <amp-img class="card-icon"
                                             noloading
                                             height="280"
                                             width="450"
                                             layout=responsive
                                             src="https://www.islandgift.ru/img/flowers/1.jpg">
                                    </amp-img>
                                    <div class="card-content">
                                        <h3>Цветы</h3>
                                        <p> Цветы и букеты на любой вкус</p>
                                        <div class="ul-widget ul-w-button text-center ul-scroll-animate"><a
                                                    class="normal ul-w-button1 middle" target="_self"
                                                    href="https://www.islandgift.ru/amp/flowers"
                                                    title="Цветы и букеты на любой вкус">Подробнее</a></div>
                                    </div>
                                </div>
                            </div>
                            <div class="card centered wired">
                                <div class="card-inner">
                                    <amp-img class="card-icon"
                                             noloading
                                             height="280"
                                             width="450"
                                             layout=responsive
                                             src="https://www.islandgift.ru/img/sweet/1.jpg">
                                    </amp-img>
                                    <div class="card-content">
                                        <h3>Сладости</h3>
                                        <p> Любимые сладости</p>
                                        <div class="ul-widget ul-w-button text-center ul-scroll-animate"><a
                                                    class="normal ul-w-button1 middle" target="_self"
                                                    href="https://www.islandgift.ru/amp/sweet"
                                                    title="Любимые сладости">Подробнее</a></div>
                                    </div>
                                </div>
                            </div>
                            <div class="card centered teads">
                                <div class="card-inner">
                                    <amp-img class="card-icon"
                                             noloading
                                             height="280"
                                             width="450"
                                             layout=responsive
                                             src="https://www.islandgift.ru/img/box/1.jpg">
                                    </amp-img>
                                    <div class="card-content">
                                        <h3>Наборы и упаковка</h3>
                                        <p> Креативные наборы и упаковки</p>
                                        <div class="ul-widget ul-w-button text-center ul-scroll-animate"><a
                                                    class="normal ul-w-button1 middle" target="_self"
                                                    href="https://www.islandgift.ru/amp/box"
                                                    title="Креативные наборы и упаковки">Подробнее</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-container">
                            <div class="card centered teads">
                                <div class="card-inner">
                                    <amp-img class="card-icon"
                                             noloading
                                             height="280"
                                             width="450"
                                             layout=responsive
                                             src="https://www.islandgift.ru/img/celebration/1.jpg">
                                    </amp-img>
                                    <div class="card-content">
                                        <h3>Организация праздника</h3>
                                        <p> Незабываемый праздник</p>
                                        <div class="ul-widget ul-w-button text-center ul-scroll-animate"><a
                                                    class="normal ul-w-button1 middle" target="_self"
                                                    href="https://www.islandgift.ru/amp/celebration"
                                                    title="Незабываемый праздник">Подробнее</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </amp-carousel>
                    <amp-carousel class="success-carousel mobile-down"
                                  height="500" controls
                                  layout="flex-item"
                                  type="slides">

                        <div class="card-container">
                            <div class="card centered wapo">
                                <div class="card-inner">
                                    <amp-img class="card-icon"
                                             noloading
                                             height="280"
                                             width="450"
                                             layout=responsive
                                             src="https://www.islandgift.ru/img/flowers/1.jpg">
                                    </amp-img>
                                    <div class="card-content">
                                        <h3>Цветы</h3>
                                        <p> Цветы и букеты на любой вкус</p>
                                        <div class="ul-widget ul-w-button text-center ul-scroll-animate"><a
                                                    class="normal ul-w-button1 middle" target="_self"
                                                    href="https://www.islandgift.ru/amp/flowers"
                                                    title="Цветы и букеты на любой вкус">Подробнее</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-container">
                            <div class="card centered wired">
                                <div class="card-inner">
                                    <amp-img class="card-icon"
                                             noloading
                                             height="280"
                                             width="450"
                                             layout=responsive
                                             src="https://www.islandgift.ru/img/sweet/1.jpg">
                                    </amp-img>
                                    <div class="card-content">
                                        <h3>Сладости</h3>
                                        <p> Любимые сладости</p>
                                        <div class="ul-widget ul-w-button text-center ul-scroll-animate"><a
                                                    class="normal ul-w-button1 middle" target="_self"
                                                    href="https://www.islandgift.ru/amp/sweet"
                                                    title="Любимые сладости">Подробнее</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-container">
                            <div class="card centered teads">
                                <div class="card-inner">
                                    <amp-img class="card-icon"
                                             noloading
                                             height="280"
                                             width="450"
                                             layout=responsive
                                             src="https://www.islandgift.ru/img/box/1.jpg">
                                    </amp-img>
                                    <div class="card-content">
                                        <h3>Наборы и упаковка</h3>
                                        <p> Креативные наборы и упаковки</p>
                                        <div class="ul-widget ul-w-button text-center ul-scroll-animate"><a
                                                    class="normal ul-w-button1 middle" target="_self"
                                                    href="https://www.islandgift.ru/amp/box"
                                                    title="Креативные наборы и упаковки">Подробнее</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-container">
                            <div class="card centered teads">
                                <div class="card-inner">
                                    <amp-img class="card-icon"
                                             noloading
                                             height="280"
                                             width="450"
                                             layout=responsive
                                             src="https://www.islandgift.ru/img/celebration/1.jpg">
                                    </amp-img>
                                    <div class="card-content">
                                        <h3>Организация праздника</h3>
                                        <p> Незабываемый праздник</p>
                                        <div class="ul-widget ul-w-button text-center ul-scroll-animate"><a
                                                    class="normal ul-w-button1 middle" target="_self"
                                                    href="https://www.islandgift.ru/amp/celebration"
                                                    title="Незабываемый праздник">Подробнее</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </amp-carousel>
                </div>
            </div>
        </div>
    </section>
    <section class="success-stories">
        <h2>
            Подарки<span class="g-color-text-3"><?php $month = date('m');
                $day = date('d');
                $category = 0;
                if ($month == 2) {
                    if ($day > 23) {
                        $category = 1;
                        $descriptionText = 'Поздравьте свою любимую с этим замечательным праздником';
                        echo ' к 8 марта';
                    } else {
                        $category = 2;
                        echo ' к 23 февраля';
                        $descriptionText = 'Поздравьте своего защитника с этим замечательным праздником';
                    }
                } else if ($month == 3) {
                    $category = 1;
                    if ($day <= 8) {
                        echo ' к 8 марта';
                        $descriptionText = 'Поздравьте свою любимую с этим замечательным праздником';
                    } else {
                        $index = random_int(1, 2);
                        if ($index == 1) {
                            $category = 0;
                            echo ' ко Дню рождения';
                            $descriptionText = 'Подарите самый лучший подарок в День рождения, который наверняка понравится именнинику';
                        } else {
                            $category = 7;
                            echo ' для себя';
                            $descriptionText = 'Порадуйте себя вкусняшкой😇';
                        }
                    }
                } else if ($month == 12) {
                    $category = 9;
                    echo ' к Новому году';
                    $year = date('Y') + 1;
                    $descriptionText = 'Поздравьте своих близких с Новым ' . $year . ' годом! И подарите им самый лучший подарок';
                } else {
                    $index = random_int(1, 2);
                    if ($index == 1) {
                        $category = 0;
                        echo ' ко Дню рождения';
                        $descriptionText = 'Подарите самый лучший подарок в День рождения, который наверняка понравится именнинику';
                    } else {
                        $category = 7;
                        echo ' для себя';
                        $descriptionText = 'Порадуйте себя вкусняшкой😇';
                    }
                }
                ?></span>
        </h2>
        <p><?= $descriptionText ?></p>
        <div class="container">
            <div class="row">
                <div class="twelve columns">
                    <?php
                    require_once '../kernel/Product.php';
                    $productDb = new Product();
                    $productP = $productDb->GetResultCatalogGift($category, ' LIMIT 3', 'RAND()');
                    $amp->cardProductDesktop($productP);
                    mysqli_free_result($productP);

                    $productP = $productDb->GetResultCatalogGift($category, ' LIMIT 3', 'RAND()');
                    $amp->cardProductMobile($productP);
                    mysqli_free_result($productP);
                    ?>
                </div>
            </div>
        </div>
    </section>
    <section class="success-stories">
        <h2>
            <span class="g-color-text-3">Популярные товары</span>
        </h2>
        <p>Здесь собраны товары и услуги, которые пользуются спросом😉</p>
        <div class="container">
            <div class="row">
                <div class="twelve columns">
                    <?php
                    $amp->cardProductDesktop($productsDesktop);
                    mysqli_free_result($productsDesktop);

                    $amp->cardProductMobile($products);
                    mysqli_free_result($products);
                    ?>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <?php
            require_once '../kernel/Promotions.php';
            $promo = new Promotions();
            echo $promo->showPromoAmp();
            ?>
        </div>
    </section>
    <section class="success-stories">
        <h2>
            <span class="g-color-text-3">Погода в Ярославле</span>
        </h2>
        <div class="container">
            <div class="row">
                <div class="twelve columns">
                    <?php
                    $file = fopen('../weather/weather.txt', 'r');
                    $temp = 0;
                    $temp_min = 0;
                    $temp_max = 0;
                    if ($file) {
                        while ($text = fgets($file, 4096)) {
                            $text = explode(';', $text);
                            $temp = $text[0];
                            $temp_min = $text[1];
                            $temp_max = $text[2];
                        }
                    }
                    ?>
                    <amp-carousel class="success-carousel desktop-up"
                                  height="750" controls
                                  layout="flex-item"
                                  type="slides">

                        <div class="card-container">
                            <div class="card centered wapo">
                                <div class="card-inner">
                                    <amp-img class="card-icon"
                                             noloading
                                             height="280"
                                             width="450"
                                             layout=responsive
                                             src="https://www.islandgift.ru/amp/img/weather.jpg">
                                    </amp-img>
                                    <div class="card-content">
                                        <h3>Сейчас в Ярославле: <?= $temp ?>°</h3>
                                        <p>Минимальная температура: <?= $temp_min ?>°<br>
                                            Максимсальная температура: <?= $temp_max ?>°
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </amp-carousel>
                    <amp-carousel class="success-carousel mobile-down"
                                  height="500" controls
                                  layout="flex-item"
                                  type="slides">
                        <div class="card-container">
                            <div class="card centered wapo">
                                <div class="card-inner">
                                    <amp-img class="card-icon"
                                             noloading
                                             height="239"
                                             width="358"
                                             layout=responsive
                                             src="https://www.islandgift.ru/amp/img/weather.jpg">
                                    </amp-img>
                                    <div class="card-content">
                                        <h3>Сейчас в Ярославле: <?= $temp ?>°</h3>
                                        <p>Минимальная температура: <?= $temp_min ?>°<br>
                                            Максимсальная температура: <?= $temp_max ?>°
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </amp-carousel>
                </div>
            </div>
        </div>
    </section>
</main>
<script type="application/ld+json">{"@context":"http://schema.org","@type":"ItemList","itemListElement":[{"@type":"ListItem","position":1,"url":"https://www.islandgift.ru/amp/woman"},{"@type":"ListItem","position":2,"url":"https://www.islandgift.ru/amp/man"},{"@type":"ListItem","position":3,"url":"https://www.islandgift.ru/amp/children"},{"@type":"ListItem","position":4,"url":"https://www.islandgift.ru/amp/parent"},{"@type":"ListItem","position":5,"url":"https://www.islandgift.ru/amp/grandma"},{"@type":"ListItem","position":6,"url":"https://www.islandgift.ru/amp/allgift"},{"@type":"ListItem","position":7,"url":"https://www.islandgift.ru/amp/flowers"},{"@type":"ListItem","position":8,"url":"https://www.islandgift.ru/amp/sweet"},{"@type":"ListItem","position":9,"url":"https://www.islandgift.ru/amp/box"},{"@type":"ListItem","position":10,"url":"https://www.islandgift.ru/amp/celebration"}]}</script>
<?php
$amp->footer()
?>
