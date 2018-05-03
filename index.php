<?php
ini_set('display_errors', 'On');
error_reporting('E_ALL');
include 'kernel/SITE.php';
$site = new SITE();

$pageText = include 'kernel/param/textForPage.php';
$site->head('');
?>
    <div id="ul-content">
        <div id="ul-id-0-0" class="ul-container g-theme-block-2" data-theme="g-theme-block-2" data-parallax="none" style="" data-bgtype="color" data-map-settings="" data-auto_height="true" data-is-100vh-enabled="false" data-behavior="none">
            <div class="container js-block-container">
                <div id="ul-id-0-2" class="row ul-row"><div id="ul-id-0-3" class="col ul-col col-xs-12 col-sm-12 col-md-12"><div id="ul-id-0-4" class="ul-widget ul-w-spacer" data-controls="mer" style="height:36px" data-widget="spacer"></div></div></div>
                <div id="ul-id-0-5" class="row ul-row"><div id="ul-id-0-6" class="col ul-col col-xs-12 col-sm-12 col-md-12"><div id="ul-id-0-7" spellcheck="false" class="ul-widget ul-widget-wysivig-header" data-controls="mer" data-tag="span" data-widget="header"><div spellcheck="false"><div class="ul-header-editor clearfix ul-header-wrap" style="outline:0;word-wrap:break-word;margin:0 5px"><h1 class="ul-w-header-span h1" style="text-align:center"><?=$pageText['']['title']?></h1></div></div></div></div></div>
                <div id="ul-id-0-8" class="row ul-row"><div id="ul-id-0-9" class="col ul-col col-xs-12 col-sm-12 col-md-12"><div id="ul-id-0-10" class="ul-widget ul-w-spacer" data-controls="mer" style="height:36px" data-widget="spacer"></div></div></div>
            </div>
        </div>
        <div id="ul-id-0-1" class="ul-container g-theme-block-0 g-theme-block-2" data-theme="g-theme-block-0" data-parallax="none" style="" data-bgtype="color" data-map-settings="" data-auto_height="true" data-is-100vh-enabled="false" data-behavior="none">
            <div class="ul-container-no-padding container-fluid js-block-container">
                <div id="ul-id-0-2" class="row ul-row">
                    <div id="ul-id-0-3" class="col ul-col col-xs-12 col-sm-12 col-md-12">
                        <div id="ul-id-0-4" class="ul-widget ul-widget-slider-2" data-controls="mer" data-widget="sliderWysiwyg">
                            <div class="ul-slider-wysy ul-load" style="height:615px">
                                <div class="ul-type-slider">
                                    <div class="ul-image srcset__-templates-c_bestday-img-full_1gasOemt-jpg--cols-12-12-12-12--fluid-true--offset-false--widget-sliderWysiwyg--info-none" style="height:615px;    background-image: url(/__scale/templates/c_bestday/img/123.jpg?width=1170&quality=85);" itemscope itemtype="http://schema.org/ImageObject">
                                        <link itemprop="contentUrl" href="templates/c_bestday/img/123.jpg">
                                        <div class="ul-slider-item-overlay ul-overlay-position-center" style="padding:12px;position:absolute;top:143px;left:303px;width:auto;height:auto"><div class="ul-slider-item-overlay-edit g-theme-block-2" style="pointer-events:none;top:0;left:0;width:100%;height:100%;position:absolute;opacity:.75;border-radius: 11px;"></div><div class="ul-slider-item-text g-theme-block-2" style="text-align:center;margin:24px" itemprop="description"><?=$pageText['']['section1Text']?></div><div class="ul-slider-item-btn" style="margin-top:12px;margin-left:24px;margin-right:24px;margin-bottom:24px;text-align:center"><a class="ul-w-btn-el ul-w-button1 middle" href="/about" title="О нас">Подробнее о нас</a></div></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="ul-id-0-5" class="ul-container g-theme-block-1" data-theme="g-theme-block-1" data-parallax="none" style="" data-bgtype="color" data-map-settings="" data-auto_height="true" data-is-100vh-enabled="false" data-behavior="none">
            <div class="container js-block-container">
                <div id="ul-id-0-6" class="row ul-row"><div id="ul-id-0-7" class="col ul-col col-xs-12 col-sm-12 col-md-12"><div id="ul-id-0-8" class="ul-widget ul-w-spacer" data-controls="mer" style="height:80px" data-widget="spacer"></div></div></div>
                <div id="ul-id-0-9" class="row ul-row">
                    <div id="ul-id-0-10" class="col ul-col col-xs-12 col-sm-12 col-md-1"><div id="ul-id-0-11" class="ul-widget ul-w-spacer" data-controls="mer" style="height:50px" data-widget="spacer"></div></div>
                    <div id="ul-id-0-12" class="col ul-col col-xs-12 col-sm-12 col-md-10">
                        <div id="ul-id-0-13" class="ul-widget ul-widget-wysivig" data-image="true" data-controls="mer" data-widget="wysiwyg">
                            <div class="ul-wysivig-editor clearfix" style="outline:0;word-wrap:break-word"><h2 style="text-align:center"><span style="font-weight:700">Т</span>вой день в твоих руках!</h2><p style="text-align:center"><span class="g-color-text-2"><?=$pageText['']['section2Text']?></span><br></p></div>
                        </div><div id="ul-id-0-14" class="ul-widget ul-w-spacer" data-controls="mer" style="height:36px" data-widget="spacer"></div><div id="ul-id-0-15" class="ul-widget ul-w-button text-center" data-controls="mer" data-widget="button"><a class="normal ul-w-button1 middle" target="_self" href="/gift" title="Подарок для тебя♥">подробнее</a></div>
                    </div>
                    <div id="ul-id-0-16" class="col ul-col col-xs-12 col-sm-12 col-md-1"><div id="ul-id-0-17" class="ul-widget ul-w-spacer" data-controls="mer" style="height:50px" data-widget="spacer"></div></div>
                </div>
                <div id="ul-id-0-18" class="row ul-row"><div id="ul-id-0-19" class="col ul-col col-xs-12 col-sm-12 col-md-12"><div id="ul-id-0-20" class="ul-widget ul-w-spacer" data-controls="mer" style="height:80px" data-widget="spacer"></div></div></div>
            </div>
        </div>
        <div id="ul-id-57-59" class="ul-container g-theme-block-2" data-theme="g-theme-block-2" data-parallax="none" style="" data-bgtype="color" data-map-settings="" data-auto_height="true" data-is-100vh-enabled="false" data-behavior="none">
            <div class="container js-block-container"><div id="ul-id-57-60" class="row ul-row"><div id="ul-id-57-61" class="col ul-col col-xs-12 col-sm-12 col-md-12"><div id="ul-id-57-62" class="ul-widget ul-w-spacer" data-controls="mer" style="height:36px" data-widget="spacer"></div></div></div><div id="ul-id-57-63" class="row ul-row"><div id="ul-id-57-64" class="col ul-col col-xs-12 col-sm-12 col-md-12"><div id="ul-id-57-65" spellcheck="false" class="ul-widget ul-widget-wysivig-header" data-controls="mer" data-tag="h1" data-widget="header"><div spellcheck="false"><div class="ul-header-editor clearfix ul-header-wrap" style="outline:0;word-wrap:break-word;margin:0 5px"><span class="ul-w-header-span h1" style="text-align:center">Подарки<?php
                                        $month = date('m');
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
            ?></span></div></div></div></div></div><div id="ul-id-57-66" class="row ul-row"><div id="ul-id-57-67" class="col ul-col col-xs-12 col-sm-12 col-md-12"><div id="ul-id-57-68" class="ul-widget ul-w-spacer" data-controls="mer" style="height:36px" data-widget="spacer"></div></div></div></div></div>
        <div id="ul-id-0-11-1" class="ul-container g-theme-block-0 g-theme-block-2" data-theme="g-theme-block-0" data-parallax="none" style="" data-bgtype="color" data-map-settings="" data-auto_height="true" data-is-100vh-enabled="false" data-behavior="none"><div id="productOrder" class="container js-block-container"><div id="ul-id-0-15-1" class="row ul-row"><div id="ul-id-0-16-1" class="col ul-col col-xs-12 col-sm-12 col-md-12"><div id="ul-id-0-17-1" class="ul-widget ul-widget-wysivig" data-image="true" data-controls="mer" data-widget="wysiwyg"><div class="ul-wysivig-editor clearfix" style="outline:0;word-wrap:break-word"><p style="text-align:center"><span class="g-color-text-2"><?=$descriptionText?></span></p></div></div></div></div><div id="ul-id-0-18-1" class="row ul-row"><div id="ul-id-0-19-1" class="col ul-col col-xs-12 col-sm-12 col-md-12"><div id="ul-id-0-20-1" class="ul-widget ul-w-spacer" data-controls="mer" style="height:36px" data-widget="spacer"></div></div></div><div id="ul-id-0-21-1" class="row ul-row"><?php
                    $productDb = new Product();
                    $productP = $productDb->GetResultCatalogGift($category, ' LIMIT 6', 'RAND()');
                    if ($productP) {
                        while ($product = mysqli_fetch_array($productP, MYSQLI_NUM)) {
                            ?>
                            <div class="col ul-col col-xs-12 col-sm-12 col-md-4">
                                <a href="/product/<?= $product[0]?>" id="ul-id-9-<?=$product[0]?>" class="ul-widget ul-w-productCard js-w-productCard" data-controls="mer" data-widget="productCard" data-design="design-0" data-alignment="center" itemscope itemtype="http://schema.org/Product">
                                    <div class="ul-w-productCard__picture"><img class="ul-w-productCard__picture__image js-w-productCard__picture__image" src="<?= $product[5]?>" alt="<?= $product[1]?>" title="<?= $product[1]?> "></div>
                                    <div class="ul-w-productCard__title"><div class="ul-w-productCard__title__content h4" itemprop="name"><?= $product[1]?>&nbsp;</div></div>
                                    <div class="ul-w-productCard__description note" itemprop="description"><?= $product[2]?></div>
                                    <div class="ul-w-productCard__spacer" data-position="description"></div>
                                    <div class="ul-w-productCard__price price-small" itemprop="offers" itemscope itemtype="http://schema.org/Offer"><div data-type="value" data-raw="<?= $product[4]?>"><?= $product[4]?></div><div data-type="currency">руб.</div><meta itemprop="price" content="<?= $product[4]?>"><meta itemprop="priceCurrency" content="RUR"></div>
                                    <div class="ul-w-productCard__action"><span role="button" class="ul-w-productCard__action__button ul-w-button1 middle js-w-productCard__to-cart" data-price-value="<?= $product[4]?>" data-product-id="<?= $product[0]?>" data-product-title="<?= $product[1]?>" data-product-quantity="<?= $product[5]?>" data-description-visible="true" data-button-style="ul-w-button1 middle" id="add_<?= $product[0]?>"><div class="ul-w-productCard__action__button__caption">Купить</div></span></div>
                                </a>
                            </div>
                            <?php
                        }
                        mysqli_free_result($productP);
                    }
                    ?></div><div id="ul-id-0-31" class="row ul-row"><div id="ul-id-0-32" class="col ul-col col-xs-12 col-sm-12 col-md-12"><div id="ul-id-0-33" class="ul-widget ul-w-spacer" data-controls="mer" style="height:81px" data-widget="spacer"></div></div></div></div>
        </div>
        <div id="ul-id-0-48" class="ul-container g-theme-block-5" data-theme="g-theme-block-5" data-parallax="fixedPosition" style="background-color:#000;background-image:url(templates/c_bestday/img/scaled/goods-default-img-720.jpg);background-size:cover;background-repeat:no-repeat;background-position:50% 0" data-bgtype="image" data-map-settings="" data-auto_height="true" data-is-100vh-enabled="false" data-behavior="none"><div class="ul-background-block-overlay js-background-overlay" style="background-color:transparent;opacity:.25"></div>
            <div class="container js-block-container"><div class="container_box"></div><div id="ul-id-0-49" class="row ul-row"><div id="ul-id-0-50" class="col ul-col col-xs-12 col-sm-12 col-md-12"><div id="ul-id-0-51" class="ul-widget ul-w-spacer" data-controls="mer" style="height:80px" data-widget="spacer"></div></div></div><?php echo $site->showPromo();?><div id="ul-id-0-62" class="row ul-row"><div id="ul-id-0-63" class="col ul-col col-xs-12 col-sm-12 col-md-12"><div id="ul-id-0-64" class="ul-widget ul-w-spacer" data-controls="mer" style="height:80px" data-widget="spacer"></div></div></div></div>
        </div>
        <div id="ul-id-0-21" class="ul-container g-theme-block-2" data-theme="g-theme-block-2" data-parallax="none" style="" data-bgtype="color" data-map-settings="" data-auto_height="true" data-is-100vh-enabled="false" data-behavior="none">
            <div class="container js-block-container">
                <div id="ul-id-0-22" class="row ul-row"><div id="ul-id-0-23" class="col ul-col col-xs-12 col-sm-12 col-md-12"><div id="ul-id-0-24" class="ul-widget ul-w-spacer" data-controls="mer" style="height:80px" data-widget="spacer"></div></div></div>
                <div id="ul-id-0-25" class="row ul-row"><div id="ul-id-0-26" class="col ul-col col-xs-12 col-sm-12 col-md-12"><div id="ul-id-0-27" spellcheck="false" class="ul-widget ul-widget-wysivig-header" data-controls="mer" data-tag="span" data-widget="header"><div spellcheck="false"><div class="ul-header-editor clearfix ul-header-wrap" style="outline:0;word-wrap:break-word;margin:0 5px"><span class="ul-w-header-span h1" style="text-align:center">УСЛУГИ</span></div></div></div></div></div>
                <div id="ul-id-0-28" class="row ul-row">
                    <div id="ul-id-0-29" class="col ul-col col-xs-12 col-sm-12 col-md-1"><div id="ul-id-0-30" class="ul-widget ul-w-spacer" data-controls="mer" style="height:50px" data-widget="spacer"></div></div>
                    <div id="ul-id-0-31" class="col ul-col col-xs-12 col-sm-12 col-md-10"><div id="ul-id-0-32" class="ul-widget ul-widget-wysivig" data-image="true" data-controls="mer" data-widget="wysiwyg"><div class="ul-wysivig-editor clearfix" style="outline:0;word-wrap:break-word"><p style="text-align:center"><span class="g-color-text-2">Все проводимые мероприятия оставляют приятный след в Ваших воспоминаниях</span></p></div></div></div>
                    <div id="ul-id-0-33" class="col ul-col col-xs-12 col-sm-12 col-md-1"><div id="ul-id-0-34" class="ul-widget ul-w-spacer" data-controls="mer" style="height:50px" data-widget="spacer"></div></div>
                </div>
                <div id="ul-id-0-35" class="row ul-row">
                    <div id="ul-id-0-36" class="col ul-col col-xs-12 col-sm-12 col-md-4">
                        <div id="ul-id-0-37" class="ul-widget ul-widget-goods ul-goods-layout tariff ul-goods-layout-html2" data-controls="mer" data-widget="goods" data-is-icon-shown="false" data-icon-set="">
                            <div class="ul-goods-view-item js-goods-item-linkPopover" itemscope itemtype="http://schema.org/Product">
                                <div class="ul-goods-view-image-wrap js-goods-image-wrap">
                                    <div class="ul-goods-view-image-wrap2 js-goods-image-changebtn-wrapper">
                                        <picture><img src="__scale/templates/c_bestday/img/full_VRYxiS6j.jpg" alt="Выпускные вечера" style="width:0;height:0;opacity:1" class="ul-goods-view-image-tag imgZoom" itemprop="image" title="Организация праздника"></picture>
                                        <a href="/celebration" class="js-goods-popup-link ul-goods-view-link"  title="Организация праздника"></a>
                                    </div>
                                </div>
                                <div class="ul-goods-view-details">
                                    <div class="ul-goods-view-title" data-field-name="title"><div class="js-goods-contenteditable h4" itemprop="name">Выпускные вечера</div></div>
                                    <div class="ul-goods-view-price" itemprop="offers" itemscope itemtype="http://schema.org/Offer"><span class="ul-goods-view-price-val" data-field-name="price.value"><span class="js-goods-contenteditable price-small" onkeypress="">от 5000 руб.</span></span><meta itemprop="price" content="5000"><meta itemprop="priceCurrency" content="RUR"></div>
                                    <div class="ul-goods-view-descr" data-field-name="description.data"><div class="note js-goods-contenteditable js-goods-descr" itemprop="description">Мы предлагаем услуги по организации выпускных вечеров и иных торжеств, что может лучше передать праздничную атмосферу выпускного вечера.&nbsp;</div></div>
                                    <div class="js-goods-view-button ul-goods-view-button UL js-goods-view-button" data-field-name="button.title"><a href="/celebration" class="middle js-goods-popup-link ul-goods-view-button-link" title="Организация праздника">Заказать</a></div>
                                </div>
                            </div>
                        </div><div id="ul-id-0-38" class="ul-widget ul-w-spacer" data-controls="mer" style="height:36px" data-widget="spacer"></div>
                    </div>
                    <div id="ul-id-0-39" class="col ul-col col-xs-12 col-sm-12 col-md-4">
                        <div id="ul-id-0-40" class="ul-widget ul-widget-goods ul-goods-layout tariff ul-goods-layout-html2" data-controls="mer" data-widget="goods" data-is-icon-shown="false" data-icon-set="">
                            <div class="ul-goods-view-item js-goods-item-linkPopover" itemscope itemtype="http://schema.org/Product">
                                <div class="ul-goods-view-image-wrap js-goods-image-wrap">
                                    <div class="ul-goods-view-image-wrap2 js-goods-image-changebtn-wrapper">
                                        <picture><img src="__scale/templates/c_bestday/img/full_quLHA08C.jpg" alt="Свадебные торжества" style="width:0;height:0;opacity:1" class="ul-goods-view-image-tag imgZoom" itemprop="image" title="Организация праздника"></picture>
                                        <a href="/celebration" class="js-goods-popup-link ul-goods-view-link" title="Организация праздника"></a>
                                    </div>
                                </div>
                                <div class="ul-goods-view-details">
                                    <div class="ul-goods-view-title" data-field-name="title"><div class="js-goods-contenteditable h4" itemprop="name">Свадебные торжества</div></div>
                                    <div class="ul-goods-view-price" itemprop="offers" itemscope itemtype="http://schema.org/Offer"><span class="ul-goods-view-price-val" data-field-name="price.value"><span class="js-goods-contenteditable price-small" onkeypress="">от 15000 руб.</span></span><meta itemprop="price" content="15000"><meta itemprop="priceCurrency" content="RUR"></div>
                                    <div class="ul-goods-view-descr" data-field-name="description.data"><div class="note js-goods-contenteditable js-goods-descr" itemprop="description">Свадьба — это торжественное и важное мероприятние, поэтому каждый хочет ее запомнить на всю жизнь, причем не только в фотографиях, но и в приятных воспоминаниях.</div></div>
                                    <div class="js-goods-view-button ul-goods-view-button UL js-goods-view-button" data-field-name="button.title"><a href="/celebration" class="middle js-goods-popup-link ul-goods-view-button-link" title="Организация праздника">Заказать</a></div>
                                </div>
                            </div>
                        </div><div id="ul-id-0-41" class="ul-widget ul-w-spacer" data-controls="mer" style="height:36px" data-widget="spacer"></div>
                    </div>
                    <div id="ul-id-0-42" class="col ul-col col-xs-12 col-sm-12 col-md-4">
                        <div id="ul-id-0-43" class="ul-widget ul-widget-goods ul-goods-layout tariff ul-goods-layout-html2" data-controls="mer" data-widget="goods" data-is-icon-shown="false" data-icon-set="">
                            <div class="ul-goods-view-item js-goods-item-linkPopover" itemscope itemtype="http://schema.org/Product">
                                <div class="ul-goods-view-image-wrap js-goods-image-wrap">
                                    <div class="ul-goods-view-image-wrap2 js-goods-image-changebtn-wrapper">
                                        <picture><img src="/templates/c_bestday/img/scaled/full_emt-768.jpg" alt="Официальные мероприятия" style="width:0;height:0;opacity:1" class="ul-goods-view-image-tag imgZoom" itemprop="image" title="Организация праздника"></picture>
                                        <a href="/celebration" class="js-goods-popup-link ul-goods-view-link" title="Организация праздника"></a>
                                    </div>
                                </div>
                                <div class="ul-goods-view-details">
                                    <div class="ul-goods-view-title" data-field-name="title"><div class="js-goods-contenteditable h4" itemprop="name">Официальные мероприятия</div></div>
                                    <div class="ul-goods-view-price" itemprop="offers" itemscope itemtype="http://schema.org/Offer"><span class="ul-goods-view-price-val" data-field-name="price.value"><span class="js-goods-contenteditable price-small" onkeypress="">от 12000 руб.</span></span><meta itemprop="price" content="12000"><meta itemprop="priceCurrency" content="RUR"></div>
                                    <div class="ul-goods-view-descr" data-field-name="description.data"><div class="note js-goods-contenteditable js-goods-descr" itemprop="description">Проведение официальных и частных мероприятий, требует особого подхода.</div></div>
                                    <div class="js-goods-view-button ul-goods-view-button UL js-goods-view-button" data-field-name="button.title"><a href="/celebration" class="middle js-goods-popup-link ul-goods-view-button-link" title="Организация праздника">Заказать</a></div>
                                </div>
                            </div>
                        </div><div id="ul-id-0-44" class="ul-widget ul-w-spacer" data-controls="mer" style="height:36px" data-widget="spacer"></div>
                    </div>
                </div>
                <div id="ul-id-0-45" class="row ul-row"><div id="ul-id-0-46" class="col ul-col col-xs-12 col-sm-12 col-md-12"><div id="ul-id-0-47" class="ul-widget ul-w-spacer" data-controls="mer" style="height:81px" data-widget="spacer"></div></div></div>
            </div>
        </div>
        <div id="ul-id-0-24" class="ul-container g-theme-block-1" data-theme="g-theme-block-1" data-parallax="none" style="" data-bgtype="color" data-map-settings="" data-auto_height="true" data-is-100vh-enabled="false" data-behavior="none">
            <div class="container js-block-container">
                <div id="ul-id-0-66" class="row ul-row"><div id="ul-id-0-67" class="col ul-col col-xs-12 col-sm-12 col-md-12"><div id="ul-id-0-68" class="ul-widget ul-w-spacer" data-controls="mer" style="height:63px" data-widget="spacer"></div></div></div>
                <div id="ul-id-0-69" class="row ul-row"><div id="ul-id-0-70" class="col ul-col col-xs-12 col-sm-12 col-md-12"><div id="ul-id-0-71" spellcheck="false" class="ul-widget ul-widget-wysivig-header" data-controls="mer" data-tag="span" data-widget="header"><div spellcheck="false"><div class="ul-header-editor clearfix ul-header-wrap" style="outline:0;word-wrap:break-word;margin:0 5px"><span class="ul-w-header-span h1" style="text-align:center"><?=$pageText['advantages']['title']?></span></div></div></div></div></div>
                <div id="ul-id-0-72" class="row ul-row">
                    <div id="ul-id-0-73" class="col ul-col col-xs-12 col-sm-12 col-md-1"><div id="ul-id-0-74" class="ul-widget ul-w-spacer" data-controls="mer" style="height:50px" data-widget="spacer"></div></div>
                    <div id="ul-id-0-75" class="col ul-col col-xs-12 col-sm-12 col-md-10"><div id="ul-id-0-76" class="ul-widget ul-widget-wysivig" data-image="true" data-controls="mer" data-widget="wysiwyg"><div class="ul-wysivig-editor clearfix" style="outline:0;word-wrap:break-word"><p style="text-align:center"><span class="g-color-text-2"><?=$pageText['advantages']['description']?></span></p></div></div></div>
                    <div id="ul-id-0-77" class="col ul-col col-xs-12 col-sm-12 col-md-1"><div id="ul-id-0-78" class="ul-widget ul-w-spacer" data-controls="mer" style="height:50px" data-widget="spacer"></div></div>
                </div>
                <div id="ul-id-0-79" class="row ul-row">
                    <div id="ul-id-0-80" class="col ul-col col-xs-12 col-sm-12 col-md-12"><div id="ul-id-0-81" class="ul-widget ul-w-spacer" data-controls="mer" style="height:36px" data-widget="spacer"></div></div>
                </div>
                <div id="ul-id-0-82" class="row ul-row">
                    <div id="ul-id-0-83" class="col ul-col col-xs-12 col-sm-12 col-md-3">
                        <div id="ul-id-0-84" class="ul-widget ul-widget-goods ul-goods-layout default ul-goods-layout-default" data-controls="mer" data-widget="goods" data-is-icon-shown="true" data-icon-set="fontAwesome">
                            <div class="ul-goods-view-item js-goods-item-linkPopover" itemscope itemtype="http://schema.org/Product">
                                <div class="ul-goods-view-image-wrap js-goods-image-wrap ul-goods-view-image-wrap--icon"><div class="ul-goods-view-image-wrap2 js-goods-image-changebtn-wrapper"><span class="fa-group fa ul-goods-view-icon" style="font-size:48px"> </span> <a href="/gift" class="js-goods-popup-link ul-goods-view-link"></a></div></div>
                                <div class="ul-goods-view-title" data-field-name="title"><div class="js-goods-contenteditable h4" itemprop="name"><?=$pageText['advantages']['item1Title']?></div></div>
                                <div class="ul-goods-view-details">
                                    <div class="ul-goods-view-descr" data-field-name="description.data"><div class="js-goods-contenteditable js-goods-descr note" itemprop="description"><?=$pageText['advantages']['item1Text']?></div></div>
                                </div>
                                <div style="display: none" itemprop="offers" itemscope itemtype="http://schema.org/Offer"><meta itemprop="price" content="100"><meta itemprop="priceCurrency" content="RUR"></div>
                            </div>
                        </div>
                        <div id="ul-id-0-85" class="ul-widget ul-w-spacer" data-controls="mer" style="height:36px" data-widget="spacer"></div>
                    </div>
                    <div id="ul-id-0-86" class="col ul-col col-xs-12 col-sm-12 col-md-3">
                        <div id="ul-id-0-87" class="ul-widget ul-widget-goods ul-goods-layout default ul-goods-layout-default" data-controls="mer" data-widget="goods" data-is-icon-shown="true" data-icon-set="fontAwesome">
                            <div class="ul-goods-view-item js-goods-item-linkPopover" itemscope itemtype="http://schema.org/Product">
                                <div class="ul-goods-view-image-wrap js-goods-image-wrap ul-goods-view-image-wrap--icon"><div class="ul-goods-view-image-wrap2 js-goods-image-changebtn-wrapper"><span class="fa-heart fa ul-goods-view-icon" style="font-size:48px"> </span> <a href="/sweet" class="js-goods-popup-link ul-goods-view-link"></a></div></div>
                                <div class="ul-goods-view-title" data-field-name="title"><div class="js-goods-contenteditable h4" itemprop="name"><?=$pageText['advantages']['item2Title']?></div></div>
                                <div class="ul-goods-view-details"><div class="ul-goods-view-descr" data-field-name="description.data"><div class="js-goods-contenteditable js-goods-descr note" itemprop="description"><?=$pageText['advantages']['item2Text']?></div></div></div>
                                <div style="display: none" itemprop="offers" itemscope itemtype="http://schema.org/Offer"><meta itemprop="price" content="100"><meta itemprop="priceCurrency" content="RUR"></div>
                            </div>
                        </div>
                        <div id="ul-id-0-88" class="ul-widget ul-w-spacer" data-controls="mer" style="height:36px" data-widget="spacer"></div>
                    </div>
                    <div id="ul-id-0-89" class="col ul-col col-xs-12 col-sm-12 col-md-3">
                        <div id="ul-id-0-90" class="ul-widget ul-widget-goods ul-goods-layout default ul-goods-layout-default" data-controls="mer" data-widget="goods" data-is-icon-shown="true" data-icon-set="fontAwesome">
                            <div class="ul-goods-view-item js-goods-item-linkPopover" itemscope itemtype="http://schema.org/Product">
                                <div class="ul-goods-view-image-wrap js-goods-image-wrap ul-goods-view-image-wrap--icon"><div class="ul-goods-view-image-wrap2 js-goods-image-changebtn-wrapper"><span class="fa-birthday-cake fa ul-goods-view-icon" style="font-size:48px"> </span> <a href="/gift" class="js-goods-popup-link ul-goods-view-link"></a></div></div>
                                <div class="ul-goods-view-title" data-field-name="title"><div class="js-goods-contenteditable h4" itemprop="name"><?=$pageText['advantages']['item3Title']?></div></div>
                                <div class="ul-goods-view-details"><div class="ul-goods-view-descr" data-field-name="description.data"><div class="js-goods-contenteditable js-goods-descr note" itemprop="description"><?=$pageText['advantages']['item3Text']?></div></div></div>
                                <div style="display: none" itemprop="offers" itemscope itemtype="http://schema.org/Offer"><meta itemprop="price" content="100"><meta itemprop="priceCurrency" content="RUR"></div>
                            </div>
                        </div>
                        <div id="ul-id-0-91" class="ul-widget ul-w-spacer" data-controls="mer" style="height:36px" data-widget="spacer"></div>
                    </div>
                    <div id="ul-id-0-92" class="col ul-col col-xs-12 col-sm-12 col-md-3">
                        <div id="ul-id-0-93" class="ul-widget ul-widget-goods ul-goods-layout default ul-goods-layout-default" data-controls="mer" data-widget="goods" data-is-icon-shown="true" data-icon-set="fontAwesome">
                            <div class="ul-goods-view-item js-goods-item-linkPopover" itemscope itemtype="http://schema.org/Product">
                                <div class="ul-goods-view-image-wrap js-goods-image-wrap ul-goods-view-image-wrap--icon"><div class="ul-goods-view-image-wrap2 js-goods-image-changebtn-wrapper"><span class="fa-gift fa ul-goods-view-icon" style="font-size:48px"> </span> <a href="/celebration" class="js-goods-popup-link ul-goods-view-link"></a></div></div>
                                <div class="ul-goods-view-title" data-field-name="title"><div class="js-goods-contenteditable h4" itemprop="name"><?=$pageText['advantages']['item4Title']?></div></div>
                                <div class="ul-goods-view-details"><div class="ul-goods-view-descr" data-field-name="description.data"><div class="js-goods-contenteditable js-goods-descr note" itemprop="description"><?=$pageText['advantages']['item4Text']?></div></div></div>
                                <div style="display: none" itemprop="offers" itemscope itemtype="http://schema.org/Offer"><meta itemprop="price" content="100"><meta itemprop="priceCurrency" content="RUR"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="ul-id-0-94" class="row ul-row"><div id="ul-id-0-95" class="col ul-col col-xs-12 col-sm-12 col-md-12"><div id="ul-id-0-96" class="ul-widget ul-w-spacer" data-controls="mer" style="height:72px" data-widget="spacer"></div></div></div>
            </div>
        </div>
    </div>
    <script type="application/ld+json">{"@context":"http://schema.org","@type":"ItemList","itemListElement":[{"@type":"ListItem","position":1,"url":"https://www.islandgift.ru"},{"@type":"ListItem","position":2,"url":"https://www.islandgift.ru/gift"},{"@type":"ListItem","position":3,"url":"https://www.islandgift.ru/picking"},{"@type":"ListItem","position":4,"url":"https://www.islandgift.ru/about"}]}</script><script type="application/ld+json">{"@context": "http://schema.org","@type": "WebSite","url": "https://www.islandgift.ru/","potentialAction": {"@type": "SearchAction","target": "https://www.islandgift.ru/search?searchid=2319268&text={search_term_string}&web=0","query-input": "required name=search_term_string"}}</script>
<?php
$site->footer();
?>