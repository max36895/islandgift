<?php
ini_set('display_errors', 'On');
error_reporting('E_ALL');

include 'kernel/SITE.php';
$site = new SITE();
$productDb = new Product();

$pageText = include 'kernel/param/textForPage.php';
$products = $productDb->GetPopulationProduct();
$site->head('gift');
?>
    <div id="ul-content">
        <div style="display: none" id="productOrder"></div>
        <div id="ul-id-0-1" class="ul-container g-theme-block-2" data-theme="g-theme-block-2" data-parallax="none" style="" data-bgtype="color" data-map-settings="" data-auto_height="true" data-is-100vh-enabled="false" data-behavior="none">
            <div class="container js-block-container">
                <div id="ul-id-0-2" class="row ul-row"><div id="ul-id-0-3" class="col ul-col col-xs-12 col-sm-12 col-md-12"><div id="ul-id-0-4" class="ul-widget ul-w-spacer" data-controls="mer" style="height:36px" data-widget="spacer"></div></div></div>
                <div id="ul-id-0-5" class="row ul-row"><div id="ul-id-0-6" class="col ul-col col-xs-12 col-sm-12 col-md-12"><div id="ul-id-0-7" spellcheck="false" class="ul-widget ul-widget-wysivig-header" data-controls="mer" data-tag="span" data-widget="header"><div spellcheck="false"><div class="ul-header-editor clearfix ul-header-wrap" style="outline:0;word-wrap:break-word;margin:0 5px"><h1 class="ul-w-header-span h1" style="text-align:center"><?=$pageText['gift']['title']?></h1></div></div></div></div></div>
                <div id="ul-id-0-8" class="row ul-row"><div id="ul-id-0-9" class="col ul-col col-xs-12 col-sm-12 col-md-12"><div id="ul-id-0-10" class="ul-widget ul-w-spacer" data-controls="mer" style="height:36px" data-widget="spacer"></div></div></div>
            </div>
        </div>
        <?php if ($pageText['gift']['section1Text'] != '36895') { ?>
        <div id="ul-id-4-0" class="ul-container g-theme-block-0 g-theme-block-2" data-theme="g-theme-block-0" data-parallax="none" style="" data-bgtype="color" data-map-settings="" data-auto_height="true" data-is-100vh-enabled="false" data-behavior="none">
            <div class="container js-block-container">
                <div id="ul-id-4-1" class="row ul-row">
                    <div id="ul-id-4-2" class="col ul-col col-xs-12 col-sm-12 col-md-12">
                        <div id="ul-id-4-3" class="ul-widget ul-widget-wysivig" data-image="true" data-controls="mer" data-widget="wysiwyg"><div class="ul-wysivig-editor clearfix" style="outline:0;word-wrap:break-word"><p><?=$pageText['gift']['section1Text']?></p></div></div>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
        <div id="ul-id-57-9" class="ul-container g-theme-block-5" data-theme="g-theme-block-5" data-parallax="fixedPosition" style="background-image:url(img/subjects.v1/celebration_organize/full/full_festival-204331_1920.jpg);background-size:cover;background-repeat:no-repeat;background-position:50% 0" data-bgtype="image" data-map-settings="" data-auto_height="true" data-is-100vh-enabled="false" data-behavior="none">
            <div class="ul-background-block-overlay js-background-overlay" style="background-color:#000;opacity:.25"></div>
            <div class="container js-block-container">
                <div id="ul-id-57-10" class="row ul-row"><div id="ul-id-57-11" class="col ul-col col-xs-12 col-sm-12 col-md-12"><div id="ul-id-57-12" class="ul-widget ul-w-spacer" data-controls="mer" style="height:80px" data-widget="spacer"></div></div></div>
                <div id="ul-id-57-13" class="row ul-row"><div id="ul-id-57-14" class="col ul-col col-xs-12 col-sm-12 col-md-12"><div id="ul-id-57-15" spellcheck="false" class="ul-widget ul-widget-wysivig-header" data-controls="mer" data-tag="h1" data-widget="header"><div spellcheck="false"><div class="ul-header-editor clearfix ul-header-wrap" style="outline:0;word-wrap:break-word;margin:0 5px"><span class="ul-w-header-span h1" style="text-align:center">Категории&nbsp;</span></div></div></div></div></div>
                <div id="ul-id-57-16" class="row ul-row">
                    <div id="ul-id-57-17" class="col ul-col col-xs-12 col-sm-12 col-md-1"><div id="ul-id-57-18" class="ul-widget ul-w-spacer" data-controls="mer" style="height:50px" data-widget="spacer"></div></div>
                    <div id="ul-id-57-19" class="col ul-col col-xs-12 col-sm-12 col-md-10"><div id="ul-id-57-20" class="ul-widget ul-widget-wysivig" data-image="true" data-controls="mer" data-widget="wysiwyg"><div class="ul-wysivig-editor clearfix" style="outline:0;word-wrap:break-word"><p style="text-align:center"><?=$pageText['gift']['categoryText']?></p></div></div></div>
                    <div id="ul-id-57-21" class="col ul-col col-xs-12 col-sm-12 col-md-1"><div id="ul-id-57-22" class="ul-widget ul-w-spacer" data-controls="mer" style="height:50px" data-widget="spacer"></div></div>
                </div>
                <div id="ul-id-57-23" class="row ul-row">
                    <div id="ul-id-57-24" class="col ul-col col-xs-12 col-sm-12 col-md-12">
                        <div id="ul-id-57-25" class="ul-widget ul-w-price ul-w-price-vertical ul-w-price-custom-vertical" data-controls="mer" data-widget="price">
                            <div class="ul-w-price-pages">
                                <div class="ul-w-price-page active ul-w-price-page-length-3" data-page="0">
                                    <div class="ul-w-price-item col-md-4 col-sm-6 col-xs-12" itemscope itemtype="http://schema.org/Product">
                                        <div class="ul-w-price-item-name h4" itemprop="name"> Подарки&nbsp;<br>для<br>женщин</div>
                                        <div class="img-gift"><img src="img/woman/1.png" class="imgZoom" title="Прекрасным женщинам и девушкам" alt="Прекрасным женщинам и девушкам"></div>
                                        <div class="ul-w-price-item-description normal" itemprop="description" style="min-height: 115px">Достойные подарки для любимой женщины</div>
                                        <div class="ul-w-price-item-button"><a role="button" href="/woman" class="ul-w-price-button ul-w-button1 middle" title="Прекрасным женщинам и девушкам">Подробнее</a></div>
                                        <div style="display: none" itemprop="offers" itemscope itemtype="http://schema.org/Offer"><meta itemprop="price" content="100"><meta itemprop="priceCurrency" content="RUR"></div>
                                    </div>
                                    <div class="ul-w-price-item col-md-4 col-sm-6 col-xs-12" itemscope itemtype="http://schema.org/Product">
                                        <div class="ul-w-price-item-name h4" itemprop="name"> Подарки<br>для<br>мужчин</div>
                                        <div class="img-gift"><img src="img/man/1.jpg" class="imgZoom" title="Настоящему мужчине" alt="Настоящему мужчине"></div>
                                        <div class="ul-w-price-item-description normal" itemprop="description" style="min-height: 115px">Подарки настоящему мужчине</div>
                                        <div class="ul-w-price-item-button"><a role="button" href="/man" class="ul-w-price-button ul-w-button1 middle"title="Настоящему мужчине">Подробнее</a></div>
                                        <div style="display: none" itemprop="offers" itemscope itemtype="http://schema.org/Offer"><meta itemprop="price" content="100"><meta itemprop="priceCurrency" content="RUR"></div>
                                    </div>
                                    <div class="ul-w-price-item col-md-4 col-sm-6 col-xs-12" itemscope itemtype="http://schema.org/Product">
                                        <div class="ul-w-price-item-name h4" itemprop="name"> Подарки&nbsp;<br>для&nbsp;<br>детей</div>
                                        <div class="img-gift"><img src="img/children/1.png" class="imgZoom" title="Подарки самым маленьким" alt="Подарки самым маленьким"></div>
                                        <div class="ul-w-price-item-description normal" itemprop="description" style="min-height: 115px">Подарки самым маленьким</div>
                                        <div class="ul-w-price-item-button"><a role="button" href="/children" class="ul-w-price-button ul-w-button1 middle" title="Подарки самым маленьким">Подробнее</a></div>
                                        <div style="display: none" itemprop="offers" itemscope itemtype="http://schema.org/Offer"><meta itemprop="price" content="100"><meta itemprop="priceCurrency" content="RUR"></div>
                                    </div>
                                    <div class="ul-w-price-item col-md-4 col-sm-6 col-xs-12" itemscope itemtype="http://schema.org/Product">
                                        <div class="ul-w-price-item-name h4" itemprop="name"> Подарки<br>для<br>Родителей<br></div>
                                        <div class="img-gift"><img src="img/parent/1.png" class="imgZoom" title="Маленькое чудо для родителей" alt="Маленькое чудо для родителей"></div>
                                        <div class="ul-w-price-item-description normal" itemprop="description">Маленькое чудо для родителей</div>
                                        <div class="ul-w-price-item-button"><a role="button" href="/parent" class="ul-w-price-button ul-w-button1 middle" title="Маленькое чудо для родителей">Подробнее</a></div>
                                        <div style="display: none" itemprop="offers" itemscope itemtype="http://schema.org/Offer"><meta itemprop="price" content="100"><meta itemprop="priceCurrency" content="RUR"></div>
                                    </div>
                                    <div class="ul-w-price-item col-md-4 col-sm-6 col-xs-12" itemscope itemtype="http://schema.org/Product">
                                        <div class="ul-w-price-item-name h4" itemprop="name"> Подарки<br>для<br>Бабушек и дедушек<br></div>
                                        <div class="img-gift"><img src="img/grandmather/1.png" class="imgZoom" title="Любимым бабушкам и дедушкам" alt="Любимым бабушкам и дедушкам"></div>
                                        <div class="ul-w-price-item-description normal" itemprop="description">Подарки для любимых бабушек и дедушек</div>
                                        <div class="ul-w-price-item-button"><a role="button" href="/grandma" class="ul-w-price-button ul-w-button1 middle" title="Любимым бабушкам и дедушкам">Подробнее</a></div>
                                        <div style="display: none" itemprop="offers" itemscope itemtype="http://schema.org/Offer"><meta itemprop="price" content="100"><meta itemprop="priceCurrency" content="RUR"></div>
                                    </div>
                                    <div class="ul-w-price-item col-md-4 col-sm-6 col-xs-12" itemscope itemtype="http://schema.org/Product">
                                        <div class="ul-w-price-item-name h4" itemprop="name"> Все подарки</div>
                                        <div class="img-gift"><img src="img/allgift/1.jpg" class="imgZoom" style="width: 100%" title="Все подарки" alt="Все подарки"></div>
                                        <div class="ul-w-price-item-description normal" itemprop="description">Здесь собранна вся коллекция подарков и услуг которые мы с радостью предоставляем для Вас</div>
                                        <div class="ul-w-price-item-button"><a role="button" href="/allgift" class="ul-w-price-button ul-w-button1 middle" title="Все подарки">Подробнее</a></div>
                                        <div style="display: none" itemprop="offers" itemscope itemtype="http://schema.org/Offer"><meta itemprop="price" content="100"><meta itemprop="priceCurrency" content="RUR"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="ul-id-64-0" class="row ul-row">
                    <div id="ul-id-64-1" class="col ul-col col-xs-12 col-sm-12 col-md-12">
                        <div id="ul-id-64-2" class="ul-widget ul-w-price ul-w-price-vertical ul-w-price-custom-vertical" data-controls="mer" data-widget="price">
                            <div class="ul-w-price-pages">
                                <div class="ul-w-price-page active ul-w-price-page-length-2" data-page="0">
                                    <div class="ul-w-price-item col-md-6 col-sm-6 col-xs-12" itemscope itemtype="http://schema.org/Product">
                                        <div class="ul-w-price-item-name h4" itemprop="name"> Цветы<br></div>
                                        <div class="img-gift dop"><img src="img/flowers/1.jpg" class="imgZoom" title="Цветы и букеты" alt="Цветы и букеты"></div>
                                        <div class="ul-w-price-item-description normal" itemprop="description" style="min-height: 90px">Цветы и букеты на любой вкус</div>
                                        <div class="ul-w-price-item-button"><a role="button" href="/flowers" class="ul-w-price-button ul-w-button1 middle" title="Цветы и букеты">Подробнее</a></div>
                                        <div style="display: none" itemprop="offers" itemscope itemtype="http://schema.org/Offer"><meta itemprop="price" content="100"><meta itemprop="priceCurrency" content="RUR"></div>
                                    </div>
                                    <div class="ul-w-price-item col-md-6 col-sm-6 col-xs-12" itemscope itemtype="http://schema.org/Product">
                                        <div class="ul-w-price-item-name h4" itemprop="name"> Сладости</div>
                                        <div class="img-gift dop"><img src="img/sweet/1.jpg" class="imgZoom" title="Сладость в радость" alt="Сладость в радость"></div>
                                        <div class="ul-w-price-item-description normal" itemprop="description" style="min-height: 90px">Любимые сладости</div>
                                        <div class="ul-w-price-item-button"><a role="button" href="/sweet" class="ul-w-price-button ul-w-button1 middle" title="Сладость в радость">Подробнее</a></div>
                                        <div style="display: none" itemprop="offers" itemscope itemtype="http://schema.org/Offer"><meta itemprop="price" content="100"><meta itemprop="priceCurrency" content="RUR"></div>
                                    </div>
                                    <div class="ul-w-price-item col-md-6 col-sm-6 col-xs-12" itemscope itemtype="http://schema.org/Product">
                                        <div class="ul-w-price-item-name h4" itemprop="name"> Наборы и упаковка<br></div>
                                        <div class="img-gift dop"><img src="img/box/1.jpg" class="imgZoom" title="Креативные наборы" alt="Креативные наборы"></div>
                                        <div class="ul-w-price-item-description normal" itemprop="description" style="min-height: 90px">Креативные наборы и упаковки</div>
                                        <div class="ul-w-price-item-button"><a role="button" href="/box" class="ul-w-price-button ul-w-button1 middle" title="Креативные наборы">Подробнее</a></div>
                                        <div style="display: none" itemprop="offers" itemscope itemtype="http://schema.org/Offer"><meta itemprop="price" content="100"><meta itemprop="priceCurrency" content="RUR"></div>
                                    </div>
                                    <div class="ul-w-price-item col-md-6 col-sm-6 col-xs-12" itemscope itemtype="http://schema.org/Product">
                                        <div class="ul-w-price-item-name h4" itemprop="name"> Организация праздника<br></div>
                                        <div class="img-gift dop"><img src="img/celebration/1.jpg" class="imgZoom" title="Организация праздника" alt="Организация праздника"></div>
                                        <div class="ul-w-price-item-description normal" itemprop="description" style="min-height: 90px">Незабываемый праздник</div>
                                        <div class="ul-w-price-item-button"><a role="button" href="/celebration" class="ul-w-price-button ul-w-button1 middle" title="Организация праздника">Подробнее</a></div>
                                        <div style="display: none" itemprop="offers" itemscope itemtype="http://schema.org/Offer"><meta itemprop="price" content="100"><meta itemprop="priceCurrency" content="RUR"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="ul-id-57-26" class="row ul-row"><div id="ul-id-57-27" class="col ul-col col-xs-12 col-sm-12 col-md-12"><div id="ul-id-57-28" class="ul-widget ul-w-spacer" data-controls="mer" style="height:80px" data-widget="spacer"></div></div></div>
            </div>
        </div>
        <!-- Подарки к празднику -->
        <div id="ul-id-57-59" class="ul-container g-theme-block-2" data-theme="g-theme-block-2" data-parallax="none" style="" data-bgtype="color" data-map-settings="" data-auto_height="true" data-is-100vh-enabled="false" data-behavior="none">
            <div class="container js-block-container">
                <div id="ul-id-57-60" class="row ul-row"><div id="ul-id-57-61" class="col ul-col col-xs-12 col-sm-12 col-md-12"><div id="ul-id-57-62" class="ul-widget ul-w-spacer" data-controls="mer" style="height:36px" data-widget="spacer"></div></div></div>
                <div id="ul-id-57-63" class="row ul-row">
                    <div id="ul-id-57-64" class="col ul-col col-xs-12 col-sm-12 col-md-12">
                        <div id="ul-id-57-65" spellcheck="false" class="ul-widget ul-widget-wysivig-header" data-controls="mer" data-tag="h1" data-widget="header">
                            <div spellcheck="false"><div class="ul-header-editor clearfix ul-header-wrap" style="outline:0;word-wrap:break-word;margin:0 5px">
                                    <span class="ul-w-header-span h1" style="text-align:center">Подарки<?php $month = date('m');
                                        $descriptionText = '';
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="ul-id-57-66" class="row ul-row"><div id="ul-id-57-67" class="col ul-col col-xs-12 col-sm-12 col-md-12"><div id="ul-id-57-68" class="ul-widget ul-w-spacer" data-controls="mer" style="height:36px" data-widget="spacer"></div></div></div>
            </div>
        </div>
        <div id="ul-id-0-11" class="ul-container g-theme-block-0 g-theme-block-2" data-theme="g-theme-block-0" data-parallax="none" style="" data-bgtype="color" data-map-settings="" data-auto_height="true" data-is-100vh-enabled="false" data-behavior="none">
            <div id="productOrder" class="container js-block-container">
                <div id="ul-id-0-15" class="row ul-row">
                    <div id="ul-id-0-16" class="col ul-col col-xs-12 col-sm-12 col-md-12">
                        <div id="ul-id-0-17" class="ul-widget ul-widget-wysivig" data-image="true" data-controls="mer" data-widget="wysiwyg"><div class="ul-wysivig-editor clearfix" style="outline:0;word-wrap:break-word"><p style="text-align:center"><span class="g-color-text-2"><?=$descriptionText?></span></p></div></div>
                    </div>
                </div>
                <div id="ul-id-0-18" class="row ul-row">
                    <div id="ul-id-0-19" class="col ul-col col-xs-12 col-sm-12 col-md-12"><div id="ul-id-0-20" class="ul-widget ul-w-spacer" data-controls="mer" style="height:36px" data-widget="spacer"></div></div>
                </div>
                <div id="ul-id-0-21" class="row ul-row">
                    <?php

                    $productDb = new Product();

                    $productP = $productDb->GetResultCatalogGift($category, ' LIMIT 3', 'RAND()');

                    if ($productP) {
                        while ($product = mysqli_fetch_array($productP, MYSQLI_NUM)) {
                            ?><div class="col ul-col col-xs-12 col-sm-12 col-md-4">
                                <a href="/product/<?= $product[0]?>" id="ul-id-9-<?=$product[0]?>" class="ul-widget ul-w-productCard js-w-productCard" data-controls="mer" data-widget="productCard" data-design="design-0" data-alignment="center" itemscope itemtype="http://schema.org/Product">
                                    <div class="ul-w-productCard__picture"><img class="ul-w-productCard__picture__image js-w-productCard__picture__image" src="<?= $product[5]?>" alt="<?= $product[1]?>" title="<?= $product[1]?> "></div>
                                    <div class="ul-w-productCard__title"><div class="ul-w-productCard__title__content h4" itemprop="name"><?= $product[1]?>&nbsp;</div></div>
                                    <div class="ul-w-productCard__description note" itemprop="description"><?= $product[2]?></div>
                                    <div class="ul-w-productCard__spacer" data-position="description"></div>
                                    <div class="ul-w-productCard__price price-small" itemprop="offers" itemscope itemtype="http://schema.org/Offer"><div data-type="value" data-raw="<?= $product[4]?>"><?= $product[4]?></div><div data-type="currency">руб.</div><meta itemprop="price" content="<?= $product[4]?>"><meta itemprop="priceCurrency" content="RUR"></div>
                                    <div class="ul-w-productCard__action"><span role="button" class="ul-w-productCard__action__button ul-w-button1 middle js-w-productCard__to-cart" data-price-value="<?= $product[4]?>" data-product-id="<?= $product[0]?>" data-product-title="<?= $product[1]?>" data-product-quantity="<?= $product[5]?>" data-description-visible="true" data-button-style="ul-w-button1 middle" id="add_<?= $product[0]?>"><div class="ul-w-productCard__action__button__caption">Купить</div></span></div>
                                </a>
                            </div><?php
                        }
                        mysqli_free_result($productP);
                    }
                    ?></div>
                <div id="ul-id-0-31" class="row ul-row"><div id="ul-id-0-32" class="col ul-col col-xs-12 col-sm-12 col-md-12"><div id="ul-id-0-33" class="ul-widget ul-w-spacer" data-controls="mer" style="height:81px" data-widget="spacer"></div></div></div>
            </div>
        </div>
        <div id="ul-id-0-34" class="ul-container g-theme-block-2" data-theme="g-theme-block-2" data-parallax="none" style="" data-bgtype="color" data-map-settings="" data-auto_height="true" data-is-100vh-enabled="false" data-behavior="none">
            <div class="container js-block-container">
                <div id="ul-id-0-35" class="row ul-row"><div id="ul-id-0-36" class="col ul-col col-xs-12 col-sm-12 col-md-12"><div id="ul-id-0-37" class="ul-widget ul-w-spacer" data-controls="mer" style="height:80px" data-widget="spacer"></div></div></div>
                <div id="ul-id-0-38" class="row ul-row"><div id="ul-id-0-39" class="col ul-col col-xs-12 col-sm-12 col-md-12"><div id="ul-id-0-40" spellcheck="false" class="ul-widget ul-widget-wysivig-header" data-controls="mer" data-tag="span" data-widget="header"><div spellcheck="false"><div class="ul-header-editor clearfix ul-header-wrap" style="outline:0;word-wrap:break-word;margin:0 5px"><span class="ul-w-header-span h1" style="text-align:center">Популярные <span class="g-color-text-3">товары и услуги</span>&nbsp;</span></div></div></div></div></div>
                <div id="ul-id-0-41" class="row ul-row">
                    <div id="ul-id-0-42" class="col ul-col col-xs-12 col-sm-12 col-md-1"><div id="ul-id-0-43" class="ul-widget ul-w-spacer" data-controls="mer" style="height:50px" data-widget="spacer"></div></div>
                    <div id="ul-id-0-44" class="col ul-col col-xs-12 col-sm-12 col-md-10"><div id="ul-id-0-45" class="ul-widget ul-widget-wysivig" data-image="true" data-controls="mer" data-widget="wysiwyg"><div class="ul-wysivig-editor clearfix" style="outline:0;word-wrap:break-word"><p style="text-align:center"><span class="g-color-text-2">Здесь собраны товары и услуги, которые пользуются спросом😉</span></p></div></div></div>
                    <div id="ul-id-0-46" class="col ul-col col-xs-12 col-sm-12 col-md-1"><div id="ul-id-0-47" class="ul-widget ul-w-spacer" data-controls="mer" style="height:50px" data-widget="spacer"></div></div>
                </div>
                <div id="ul-id-0-48" class="row ul-row">
                    <div id="ul-id-0-49" class="col ul-col col-xs-12 col-sm-12 col-md-12">
                        <div id="ul-id-0-50" class="ul-widget ul-w-price ul-w-price-horizontal ul-w-price-custom-horizontal" data-controls="mer" data-widget="price">
                            <table class="ul-w-price-table">
                                <thead class="ul-w-price-table-head"><tr><td class="note">Название</td><td class="note">Описание</td><td class="note">Цена</td><td class="note">Изображение</td><td></td></tr>
                                </thead><tbody class="ul-w-price-table-body"><?php
                                if ($products) {
                                    while ($product = mysqli_fetch_array($products, MYSQLI_NUM)) {
                                        ?>
                                        <tr itemscope itemtype="http://schema.org/Product">
                                            <td class="ul-w-price-item-name normal" itemprop="name"><?= $product[1] ?></td>
                                            <td class="ul-w-price-item-description normal" itemprop="description"><?= $product[2] ?></td>
                                            <td class="ul-w-price-item-price normal" itemprop="offers" itemscope itemtype="http://schema.org/Offer"> <?= $product[4] ?> руб<meta itemprop="price" content=" <?= $product[4] ?>"><meta itemprop="priceCurrency" content="RUR"></td>
                                            <td class="ul-w-price-item-price normal" itemprop="offers" itemscope><img src="<?= $product[5]?>" class="imgZoom" style="width: 61%" title="<?= $product[1] ?>" alt="<?= $product[1] ?>"></td>
                                            <td class="ul-w-price-item-button"><a role="button" href="/product/<?= $product[0] ?>" class="ul-w-price-button ul-w-button1 middle">Подробнее </a></td>
                                        </tr>
                                        <?php
                                    }
                                    mysqli_free_result($products);
                                }
                                ?></tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div id="ul-id-0-51" class="row ul-row"><div id="ul-id-0-52" class="col ul-col col-xs-12 col-sm-12 col-md-12"><div id="ul-id-0-53" class="ul-widget ul-w-spacer" data-controls="mer" style="height:80px" data-widget="spacer"></div></div></div>
            </div>
        </div>
        <div id="ul-id-0-54" class="ul-container g-theme-block-5" data-theme="g-theme-block-5" data-parallax="fixedPosition" style="background-color:#000;background-image:url(templates/c_bestday/img/scaled/goods-default-img-720.jpg);background-size:cover;background-repeat:no-repeat;background-position:50% 0" data-bgtype="image" data-map-settings="" data-auto_height="true" data-is-100vh-enabled="false" data-behavior="none">
            <div class="ul-background-block-overlay js-background-overlay" style="background-color:transparent;opacity:.25"></div>
            <div class="container js-block-container">
                <div class="container_box"></div>
                <div id="ul-id-0-55" class="row ul-row"><div id="ul-id-0-56" class="col ul-col col-xs-12 col-sm-12 col-md-12"><div id="ul-id-0-57" class="ul-widget ul-w-spacer" data-controls="mer" style="height:80px" data-widget="spacer"></div></div></div>
                <?php echo $site->showPromo(); ?>
                <div id="ul-id-0-68" class="row ul-row"><div id="ul-id-0-69" class="col ul-col col-xs-12 col-sm-12 col-md-12"><div id="ul-id-0-70" class="ul-widget ul-w-spacer" data-controls="mer" style="height:80px" data-widget="spacer"></div></div></div>
            </div>
        </div>
        <div id="ul-id-0-71" class="ul-container g-theme-block-1" data-theme="g-theme-block-1" data-parallax="none" style="" data-bgtype="color" data-map-settings="" data-auto_height="true" data-is-100vh-enabled="false" data-behavior="none">
            <div class="container js-block-container">
                <div id="ul-id-0-72" class="row ul-row"><div id="ul-id-0-73" class="col ul-col col-xs-12 col-sm-12 col-md-12"><div id="ul-id-0-74" class="ul-widget ul-w-spacer" data-controls="mer" style="height:80px" data-widget="spacer"></div></div></div>
                <div id="ul-id-0-75" class="row ul-row"><div id="ul-id-0-76" class="col ul-col col-xs-12 col-sm-12 col-md-12"><div id="ul-id-0-77" spellcheck="false" class="ul-widget ul-widget-wysivig-header" data-controls="mer" data-tag="span" data-widget="header"><div spellcheck="false"><div class="ul-header-editor clearfix ul-header-wrap" style="outline:0;word-wrap:break-word;margin:0 5px"><span class="ul-w-header-span h1" style="text-align:center">Прогноз погоды</span></div></div></div></div></div>
                <div id="ul-id-0-78" class="row ul-row"><div id="ul-id-0-79" class="col ul-col col-xs-12 col-sm-12 col-md-1"><div id="ul-id-0-80" class="ul-widget ul-w-spacer" data-controls="mer" style="height:50px" data-widget="spacer"></div></div><div id="ul-id-0-81" class="col ul-col col-xs-12 col-sm-12 col-md-10"><div id="ul-id-0-82" class="ul-widget ul-widget-wysivig" data-image="true" data-controls="mer" data-widget="wysiwyg"><div class="ul-wysivig-editor clearfix" style="outline:0;word-wrap:break-word"><p><br></p></div></div></div><div id="ul-id-0-83" class="col ul-col col-xs-12 col-sm-12 col-md-1"><div id="ul-id-0-84" class="ul-widget ul-w-spacer" data-controls="mer" style="height:50px" data-widget="spacer"></div></div></div>
                <div id="ul-id-69-0" class="row ul-row"><div id="ul-id-69-1" class="col ul-col col-xs-12 col-sm-12 col-md-12"><div id="ul-id-69-2" class="ul-widget ul-w-weather" data-controls="mer" data-widget="weather" style="margin: 0 auto"><div class="ul-w-weather-container" data-position="center" style="background:rgba(139,198,62,.2);background-repeat:no-repeat;background-size:cover;background-position:50% 50%"><div class="g-color-text-1 ul-w-weather-wrap"><div id="0926cdc40d297b02e631275ea0d09315" class="ww-informers-box-854753" style="-webkit-transform:rotateY(90deg);transform:rotateY(90deg);"><p><a href="https://world-weather.ru/pogoda/russia/yaroslavl/">world-weather.ru/pogoda/russia/yaroslavl/</a><br><a href="https://world-weather.ru/pogoda/russia/barnaul/">https://world-weather.ru/pogoda/russia/barnaul/</a></p></div><script type="text/javascript" charset="utf-8" src="https://world-weather.ru/wwinformer.php?userid=0926cdc40d297b02e631275ea0d09315"></script></div></div></div></div></div>
            </div>
            <div id="ul-id-0-95" class="row ul-row" style="margin-left:0;margin-right:0;"><div id="ul-id-0-96" class="col ul-col col-xs-12 col-sm-12 col-md-12" ><div id="ul-id-0-97" class="ul-widget ul-w-spacer" data-controls="mer" style="height:80px" data-widget="spacer"></div></div></div>
        </div>
    </div>
    <script type="application/ld+json">{"@context":"http://schema.org","@type":"ItemList","itemListElement":[{"@type":"ListItem","position":1,"url":"https://www.islandgift.ru/woman"},{"@type":"ListItem","position":2,"url":"https://www.islandgift.ru/man"},{"@type":"ListItem","position":3,"url":"https://www.islandgift.ru/children"},{"@type":"ListItem","position":4,"url":"https://www.islandgift.ru/parent"},{"@type":"ListItem","position":5,"url":"https://www.islandgift.ru/grandma"},{"@type":"ListItem","position":6,"url":"https://www.islandgift.ru/allgift"},{"@type":"ListItem","position":7,"url":"https://www.islandgift.ru/flowers"},{"@type":"ListItem","position":8,"url":"https://www.islandgift.ru/sweet"},{"@type":"ListItem","position":9,"url":"https://www.islandgift.ru/box"},{"@type":"ListItem","position":10,"url":"https://www.islandgift.ru/celebration"}]}</script>
<?php
$site->footer();
?>