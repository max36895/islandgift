<?php
include 'amp.php';
$amp = new amp();

$meta_d = 'магазин Maximko – это то самое место, где вы всегда найдете море подарков к каждому торжественному случаю. Каждый хотел порадовать любимого и близкого ему человека - для вас мы подготовили самые очаровательные,необычные и романтичные подарки';
$meta_k = 'Интернет в Ярославле подарки Новый год 23 февраля день рождения 8 марта праздник идея для подарка';
$pageText = include '../kernel/param/textForPage.php';
$amp->head('', 'Интернет-магазин подарков MaxImko (Твой день в твоих руках)', $meta_d, $meta_k);
?>
    <main class="text-center">
        <div class="container">
            <h1><?= $pageText['']['title'] ?></h1>
            <p><?= $pageText['']['section2Text'] ?></p>
            <div class="ul-widget ul-w-button text-center ul-scroll-animate">
                <a class="normal ul-w-button1 middle" target="_self" href="https://www.islandgift.ru/amp/about" title="О нас">Подробнее о нас</a>
            </div>
        </div>
        <section class="success-stories">
            <h2>
                Подарки<?php $month = date('m');
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
                ?>
            </h2>
            <p><?=$descriptionText?></p>
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
            <h2>Услуги</h2>
            <p>Все проводимые мероприятия оставляют приятный след в Ваших воспоминаниях</p>
            <div class="container">
                <div class="row">
                    <div class="twelve columns">
                        <amp-carousel class="success-carousel desktop-up"
                                      height="750" controls
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
                                                 src="https://www.islandgift.ru/templates/c_bestday/img/scaled/full_emt-768.jpg">
                                        </amp-img>
                                        <div class="card-content">
                                            <h3>Выпускные вечера</h3>
                                            <h3>от 5000 руб.</h3>
                                            <p>Мы предлагаем услуги по организации выпускных вечеров и иных торжеств,
                                                что может лучше передать праздничную атмосферу выпускного вечера.</p>
                                            <div class="ul-widget ul-w-button text-center ul-scroll-animate"><a
                                                        class="normal ul-w-button1 middle" target="_self"
                                                        href="https://www.islandgift.ru/amp/celebration" title="О нас">Заказать</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card centered wapo">
                                    <div class="card-inner">
                                        <amp-img class="card-icon"
                                                 noloading
                                                 height="239"
                                                 width="358"
                                                 layout=responsive
                                                 src="https://www.islandgift.ru/__scale/templates/c_bestday/img/full_VRYxiS6j.jpg">
                                        </amp-img>
                                        <div class="card-content">
                                            <h3>Свадебные торжества</h3>
                                            <h3>от 15000 руб.</h3>
                                            <p>Свадьба — это торжественное и важное мероприятние, поэтому каждый хочет
                                                ее
                                                запомнить на всю жизнь, причем не только в фотографиях, но и в приятных
                                                воспоминаниях.</p>
                                            <div class="ul-widget ul-w-button text-center ul-scroll-animate"><a
                                                        class="normal ul-w-button1 middle" target="_self"
                                                        href="https://www.islandgift.ru/amp/celebration" title="О нас">Заказать</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card centered wapo">
                                    <div class="card-inner">
                                        <amp-img class="card-icon"
                                                 noloading
                                                 height="239"
                                                 width="358"
                                                 layout=responsive
                                                 src="https://www.islandgift.ru/__scale/templates/c_bestday/img/full_quLHA08C.jpg">
                                        </amp-img>
                                        <div class="card-content">
                                            <h3>Официальные мероприятия</h3>
                                            <h3>от 12000 руб.</h3>
                                            <p>Проведение официальных и частных мероприятий, требует особого
                                                подхода.</p>
                                            <div class="ul-widget ul-w-button text-center ul-scroll-animate"><a
                                                        class="normal ul-w-button1 middle" target="_self"
                                                        href="https://www.islandgift.ru/amp/celebration" title="О нас">Заказать</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </amp-carousel>
                        <amp-carousel class="success-carousel mobile-down"
                                      height="750" controls
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
                                                 src="https://www.islandgift.ru/__scale/templates/c_bestday/img/full_VRYxiS6j.jpg">
                                        </amp-img>
                                        <div class="card-content">
                                            <h3>Выпускные вечера</h3>
                                            <h3>от 5000 руб.</h3>
                                            <p>Мы предлагаем услуги по организации выпускных вечеров и иных торжеств,
                                                что может лучше передать праздничную атмосферу выпускного вечера.</p>
                                            <div class="ul-widget ul-w-button text-center ul-scroll-animate"><a
                                                        class="normal ul-w-button1 middle" target="_self"
                                                        href="https://www.islandgift.ru/amp/celebration" title="О нас">Заказать</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-container">
                                <div class="card centered wired">
                                    <div class="card-inner">
                                        <amp-img class="card-icon"
                                                 noloading
                                                 height="239"
                                                 width="358"
                                                 layout=responsive
                                                 src="https://www.islandgift.ru/__scale/templates/c_bestday/img/full_quLHA08C.jpg">
                                        </amp-img>
                                        <div class="card-content">
                                            <h3>Свадебные торжества</h3>
                                            <h3>от 15000 руб.</h3>
                                            <p>Свадьба — это торжественное и важное мероприятние, поэтому каждый хочет
                                                ее запомнить на всю жизнь, причем не только в фотографиях, но и в
                                                приятных воспоминаниях.</p>
                                            <div class="ul-widget ul-w-button text-center ul-scroll-animate"><a
                                                        class="normal ul-w-button1 middle" target="_self"
                                                        href="https://www.islandgift.ru/amp/celebration" title="О нас">Заказать</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-container">
                                <div class="card centered teads">
                                    <div class="card-inner">
                                        <amp-img class="card-icon"
                                                 noloading
                                                 height="239"
                                                 width="358"
                                                 layout=responsive
                                                 src="https://www.islandgift.ru/templates/c_bestday/img/scaled/full_emt-768.jpg">
                                        </amp-img>
                                        <div class="card-content">
                                            <h3>Официальные мероприятия</h3>
                                            <h3>от 12000 руб.</h3>
                                            <p>Проведение официальных и частных мероприятий, требует особого
                                                подхода.</p>
                                            <div class="ul-widget ul-w-button text-center ul-scroll-animate"><a
                                                        class="normal ul-w-button1 middle" target="_self"
                                                        href="https://www.islandgift.ru/amp/celebration" title="О нас">Заказать</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </amp-carousel>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="container">
                <h2><?= $pageText['advantages']['title'] ?></h2>
                <p><?= $pageText['advantages']['description'] ?></p>
                <amp-img src="https://www.islandgift.ru/amp/img/symbols/1.PNG" alt="MaxImko" class="rbt-inline-89"
                         width="219.8" height="151.2" layout="fixed"></amp-img>
                <h3><?= $pageText['advantages']['item1Title'] ?></h3>
                <p><?= $pageText['advantages']['item1Text'] ?></p>
                <amp-img src="https://www.islandgift.ru/amp/img/symbols/2.PNG" alt="MaxImko" class="rbt-inline-89"
                         width="219.8" height="151.2" layout="fixed"></amp-img>
                <h3><?= $pageText['advantages']['item2Title'] ?></h3>
                <p><?= $pageText['advantages']['item2Text'] ?></p>
                <amp-img src="https://www.islandgift.ru/amp/img/symbols/3.PNG" alt="MaxImko" class="rbt-inline-89"
                         width="219.8" height="151.2" layout="fixed"></amp-img>
                <h3><?= $pageText['advantages']['item3Title'] ?></h3>
                <p><?= $pageText['advantages']['item3Text'] ?></p>
                <amp-img src="https://www.islandgift.ru/amp/img/symbols/4.PNG" alt="MaxImko" class="rbt-inline-89"
                         width="219.8" height="151.2" layout="fixed"></amp-img>
                <h3><?= $pageText['advantages']['item4Title'] ?></h3>
                <p><?= $pageText['advantages']['item4Text'] ?></p>
            </div>
        </section>
    </main>
    <script type="application/ld+json">{"@context":"http://schema.org","@type":"ItemList","itemListElement":[{"@type":"ListItem","position":1,"url":"https://www.islandgift.ru/amp/"},{"@type":"ListItem","position":2,"url":"https://www.islandgift.ru/amp/gift"},{"@type":"ListItem","position":3,"url":"https://www.islandgift.ru/amp/picking"},{"@type":"ListItem","position":4,"url":"https://www.islandgift.ru/amp/about"}]}</script><script type="application/ld+json">{"@context": "http://schema.org","@type": "WebSite","url": "https://www.islandgift.ru/amp/","potentialAction": {"@type": "SearchAction","target": "https://www.islandgift.ru/search?searchid=2319268&text={search_term_string}&web=0","query-input": "required name=search_term_string"}}</script>
<?php
$amp->footer();
?>