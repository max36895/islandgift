<?php
include 'kernel/SITE.php';
$site = new SITE();

$product = $site->productInfo();

if ($product[0] == 0) {
    header('HTTP/1.0 404 Not Found');
    header('Status: 404 Not Found');
    $product[1] = 'Продукт не найден';
    $product[2] = '';
    $product[4] = 0;
    $product[7] = 9;
}

$pageParam = include 'kernel/param/PageParam.php';

if (isset($pageParam['product'])) {
    $find = ['product_name', 'product_description', 'product_price'];
    $replase = [$product[1], $product[2], $product[4]];
    $meta_d = str_replace($find, $replase, $pageParam['product']['description']);
    $meta_k = str_replace($find, $replase, $pageParam['product']['keyword']);
    $title = str_replace($find, $replase, $pageParam['product']['title']);
} else {
    $meta_d = $product[2] . ' Возьмите даный продукт у нас по заманчивой цене.' . $product[4];
    $meta_k = 'купить в Ярославле подарки 8 марта 23 февраля день рождения новый год необычно ' . $product[1];
    $title = $product[1];
}

$site->head('none', $title, $meta_d, $meta_k);
?>
<div id="ul-content" itemscope itemtype="http://schema.org/Product">
    <div style="display: none" id="productOrder"></div>
    <div id="ul-id-2-20" class="ul-container g-theme-block-2" data-theme="g-theme-block-2" data-parallax="none" style="" data-bgtype="color" data-map-settings="" data-auto_height="true" data-is-100vh-enabled="false" data-behavior="none">
        <div class="container js-block-container">
            <div id="ul-id-2-21" class="row ul-row"><div id="ul-id-2-22" class="col ul-col col-xs-12 col-sm-12 col-md-12"><div id="ul-id-2-23" class="ul-widget ul-w-spacer" data-controls="mer" style="height:36px" data-widget="spacer"></div></div></div>
            <div id="ul-id-2-24" class="row ul-row">
                <div id="ul-id-2-25" class="col ul-col col-xs-12 col-sm-12 col-md-12">
                    <div id="ul-id-2-26" spellcheck="false" class="ul-widget ul-widget-wysivig-header" data-controls="mer" data-tag="h1" data-widget="header">
                        <div spellcheck="false"><div class="ul-header-editor clearfix ul-header-wrap" style="outline:0;word-wrap:break-word;margin:0 5px"><h1 class="ul-w-header-span h1" style="text-align:center" itemprop="name"><?= $title;?></h1></div></div>
                    </div>
                </div>
            </div>
            <div id="ul-id-2-27" class="row ul-row"><div id="ul-id-2-28" class="col ul-col col-xs-12 col-sm-12 col-md-12"><div id="ul-id-2-29" class="ul-widget ul-w-spacer" data-controls="mer" style="height:36px" data-widget="spacer"></div></div></div>
        </div>
    </div>
    <div id="ul-id-2-0" class="ul-container g-theme-block-0 g-theme-block-2" data-theme="g-theme-block-0" data-parallax="none" style="" data-bgtype="color" data-map-settings="" data-auto_height="true" data-is-100vh-enabled="false" data-behavior="none">
        <div class="container js-block-container">
            <div id="ul-id-2-8" class="row ul-row"><div id="ul-id-2-9" class="col ul-col col-xs-12 col-sm-12 col-md-12"><div id="ul-id-2-10" class="ul-widget ul-w-spacer" data-controls="mer" style="height:50px" data-widget="spacer"></div></div></div>
            <div id="ul-id-2-11" class="row ul-row"><div id="ul-id-2-12" class="col ul-col col-xs-12 col-sm-12 col-md-12"><div id="ul-id-2-13" class="ul-widget" type="border"><div class="ul-w-border" data-reactroot="" data-reactid="1" data-react-checksum="2054171773"><div class="hr ul-widget-border-style1" data-reactid="2"></div></div></div></div></div>
            <div id="ul-id-2-14" class="row ul-row"><div id="ul-id-2-15" class="col ul-col col-xs-12 col-sm-12 col-md-12"><?php
                    $text = '';
                    $url = '';
                    $color = 'style="color:';
                    $recommendation = '';
                    $category = 1;
                    switch ($product[7]) {
                        case 1:
                            $text = 'Подарки для женщин';
                            $url = '/woman';
                            $color .= 'hotpink;"';
                            $recommendation .= 'Рекомендуем посмотреть другие';
                            $category = random_int(1, 3);

                            if ($category == 1) {
                                $category = 1;
                                $recommendation .= ' товары для дам';
                            } else if ($category == 2) {
                                $category = 7;
                                $recommendation = 'Все мы любим сладости!😁 <br>Не так ли?';
                            } else {
                                $category = 6;
                                $recommendation = 'Любая девушка любит получать цветы!😉';
                            }

                            break;
                        case 2:
                            $text = 'Подарки для мужчин';
                            $url = '/man';
                            $color .= 'mediumblue;"';
                            $recommendation .= 'Рекомендуем посмотреть другие';
                            $category = random_int(1, 2);

                            if ($category == 1) {
                                $category = 2;
                                $recommendation .= ' товары для мужчин';
                            } else {
                                $category = 7;
                                $recommendation = 'Все мы любим сладости!😁 <br>Не так ли?';
                            }

                            break;
                        case 3:
                            $text = 'Подарки для детей';
                            $url = '/children';
                            $color .= 'deeppink;"';
                            $recommendation .= 'Рекомендуем посмотреть другие ';
                            $category = random_int(1, 2);

                            if ($category == 1) {
                                $category = 3;
                                $recommendation .= ' товары для детишек';
                            } else {
                                $category = 7;
                                $recommendation = 'Все мы любим сладости!😁 <br>Не так ли?';
                            }

                            break;
                        case 4:
                            $text = 'Подарки для родителей';
                            $url = '/parent';
                            $color .= 'mediumvioletred;"';
                            $recommendation .= 'Рекомендуем посмотреть другие';
                            $category = random_int(1, 2);

                            if ($category == 1) {
                                $category = 4;
                                $recommendation .= ' товары для родителей';
                            } else {
                                $category = 7;
                                $recommendation = 'Все мы любим сладости!😁 <br>Не так ли?';
                            }

                            break;
                        case 5:
                            $text = 'Подарки для бабушек и дедушек';
                            $url = '/grandma';
                            $color .= 'darkred;"';
                            $recommendation .= 'Рекомендуем посмотреть другие';
                            $category = random_int(1, 2);

                            if ($category == 1) {
                                $category = 5;
                                $recommendation .= ' товары для бабушек и дедушек';
                            } else {
                                $category = 7;
                                $recommendation = 'Все мы любим сладости!😁 <br>Не так ли?';
                            }

                            break;
                        case 6:
                            $text = 'Цветы';
                            $url = '/flowers';
                            $color .= 'blueviolet;"';
                            $recommendation .= 'К цветам определенно нужны сладости😁';
                            $category = 7;
                            break;
                        case 7:
                            $text = 'Сладости';
                            $url = '/sweet';
                            $color .= 'magenta;"';
                            $recommendation .= 'Сладости стоит упаковать в коробочку🎁';
                            $category = 8;
                            break;
                        case 8:
                            $text = 'Наборы и упаковка';
                            $url = '/box';
                            $color .= 'navy;"';
                            $category = random_int(1, 2);
                            if ($category == 1) {
                                $category = 8;
                                $recommendation = 'Может посмотреть на другие коробочки и наборы?';
                            } else {
                                $category = 7;
                                $recommendation = 'Все мы любим сладости!😁 <br>Не так ли?';
                            }
                            break;
                        case 9:
                            $text = 'Все подарки';
                            $url = '/allgift';
                            $color .= '#8bc63e;"';
                            $recommendation .= 'Эти товары наверняка вас заинтрересуют✌';
                            $category = 9;
                            break;
                    }

                    $site->breadcrumbList(
                        ['Подарок для тебя💝', 'href="/gift" style="color: #337ab7;" title="Подарок для тебя"'],
                        [$text, ' href="' . $url . '" ' . $color . ' title="' . $text . '"'],
                        [$product[1], '']);
                    ?><div id="ul-id-2-16" class="ul-widget ul-w-spacer" data-controls="mer" style="height:50px" data-widget="spacer"></div></div>
            </div>
            <?php if ($product[0] == 0){ ?>
            <div id="ul-id-2-1" class="row ul-row"><div id="ul-id-2-2" class="col ul-col col-xs-12 col-sm-12 col-md-12"><h2 style="text-align: center">К сожалению данного продукта нет.😞<br>Посмотрите другие товары.</h2><span style="text-align: center" role="button" style="cursor: pointer; width: 100%" class="ul-w-productCard__action__button ul-w-button1 middle js-w-productCard__to-cart"><a href="/gift.php" title="Подарок для тебя♥" class="ul-w-productCard__action__button__caption">Смотреть другие товары</a></span></div></div>
            <div id="ul-id-2-17" class="row ul-row"><div id="ul-id-2-18" class="col ul-col col-xs-12 col-sm-12 col-md-12"><div id="ul-id-2-19" class="ul-widget ul-w-spacer" data-controls="mer" style="height:50px" data-widget="spacer"></div></div></div>
        </div>
    </div>
    <?php }else{ ?>
            <div id="ul-id-2-1" class="row ul-row">
                <div id="ul-id-2-2" class="col ul-col col-xs-12 col-sm-12 col-md-6">
                    <div id="ul-id-2-3" class="ul-widget ul-w-imagezoom" data-controls="mer" data-widget="imagezoom">
                        <div class="ul-w-wrap ul-w-imagezoom-type-none ul-imagezoom-published">
                            <div class="ul-w-imagezoom-img-wrap">
                                <div class="galleria"><picture><?php
                                        if ($product[6]) {
                                            require_once 'kernel/Gift.php';
                                            $collectiondb = new Gift();
                                            $collectiondb->imgCollect = $product[6];
                                            $collections = $collectiondb->selectCollection();
                                            if ($collections) {
                                                while ($colection = mysqli_fetch_array($collections, MYSQLI_NUM)) {
?><img src="<?= $colection[2] ?>" style="width:100%" class="imgZoom" alt="<?= $product[1] ?>" title="<?= $product[1] ?>" data-lightbox="<?= $colection[2]; ?>" itemprop="image"><?php
                                                }
                                                mysqli_free_result($collections);
                                            }
                                        } else{?><img src="<?=$product[5];?>" class="imgZoom" style="width:100%" alt="<?=$product[1]?>" title="<?=$product[1]?>" data-lightbox="<?=$product[5]; ?>" itemprop="image"><?php }?></picture>
                                </div>
<?php if($product[6]) { ?><script src="/script/galleria/galleria-1.5.7.min.js"></script><script>Galleria.loadTheme('/script/galleria/themes/classic/galleria.classic.min.js');Galleria.run('.galleria');</script><?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="ul-id-2-4" class="col ul-col col-xs-12 col-sm-12 col-md-6">
                    <div id="ul-id-2-5" class="ul-widget ul-widget-wysivig" data-image="true" data-controls="mer" data-widget="wysiwyg">
                        <div class="ul-wysivig-editor clearfix" style="outline:0;word-wrap:break-word">
                            <h2 style="text-align:left">Купить за <?=$product[4];?> руб.</h2>
                            <div class="ul-w-productCard__action" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                                <meta itemprop="price" content="<?= $product[4]?>"><meta itemprop="priceCurrency" content="RUR">
                                <span role="button" style="cursor: pointer;width: 50%" class="ul-w-productCard__action__button ul-w-button1 middle js-w-productCard__to-cart"
                                      data-price-value="<?=$product[4]?>" data-product-id="<?= $product[0]?>"
                                      data-product-title="<?= $product[1]?>" data-product-quantity="<?=$product[5]?>" data-description-visible="true"
                                      data-button-style="ul-w-button1 middle" id="add_<?=$product[0]?>">
                                    <div class="ul-w-productCard__action__button__caption" style="text-align: center">Купить</div><link itemprop="availability" href="http://schema.org/InStock"/>
                                    <time style="display: none" itemprop="priceValidUntil" datetime="<?=(date('Y')+5).date('-m-d')?>"></time>
                                    <span style="display: none" itemprop="seller" itemscope itemtype="http://schema.org/Organization"><span itemprop="name">Maximko</span></span>
                                </span>
                            </div>
                            <p style="text-align:left" itemprop="description"><?= $product[3];?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div id="ul-id-2-17" class="row ul-row"><div id="ul-id-2-18" class="col ul-col col-xs-12 col-sm-12 col-md-12"><div id="ul-id-2-19" class="ul-widget ul-w-spacer" data-controls="mer" style="height:50px" data-widget="spacer"></div></div></div>
        </div>
    </div>
    <div id="ul-id-2-30" class="ul-container g-theme-block-2" data-theme="g-theme-block-2" data-parallax="none" style="" data-bgtype="color" data-map-settings="" data-auto_height="true" data-is-100vh-enabled="false" data-behavior="none">
        <div class="container js-block-container">
            <div id="ul-id-2-31" class="row ul-row">
                <div id="ul-id-2-32" class="col ul-col col-xs-12 col-sm-12 col-md-12"><div id="ul-id-2-33" class="ul-widget ul-w-spacer" data-controls="mer" style="height:36px" data-widget="spacer"></div>
                    <div class="ul-w-productCard__action" style="text-align: center">
                        <span role="button" style="cursor: pointer; width: 100%" class="ul-w-productCard__action__button ul-w-button1 middle js-w-productCard__to-cart"
                              data-price-value="<?=$product[4]?>" data-product-id="<?= $product[0]?>"
                              data-product-title="<?= $product[1]?>" data-product-quantity="<?=$product[5]?>" data-description-visible="true"
                              data-button-style="ul-w-button1 middle" id="add_<?=$product[0]?>">
                            <div class="ul-w-productCard__action__button__caption">Купить <?= $product[1]?> у нас за <?=$product[4]?> руб.</div>
                        </span></div>
                    <div style="margin: 0 auto; text-align: center;">
                        <script src="//yastatic.net/es5-shims/0.0.2/es5-shims.min.js"></script><script src="//yastatic.net/share2/share.js"></script><p style="padding-bottom: 0; padding-top: 11px; font-size: 19px;">🎈Поделиться товаром в соц. сетях😇</p>
                        <div class="ya-share2" data-services="vkontakte,facebook,telegram,odnoklassniki,whatsapp,viber,gplus,instagram,skype,moimir" data-counter=""></div>
                    </div>
                </div>
            </div>
            <div id="ul-id-2-37" class="row ul-row"><div id="ul-id-2-38" class="col ul-col col-xs-12 col-sm-12 col-md-12"><div id="ul-id-2-39" class="ul-widget ul-w-spacer" data-controls="mer" style="height:36px" data-widget="spacer"></div></div></div>
        </div>
    </div>

    <div id="ul-id-57-59" class="ul-container g-theme-block-2" data-theme="g-theme-block-2" data-parallax="none" style="" data-bgtype="color" data-map-settings="" data-auto_height="true" data-is-100vh-enabled="false" data-behavior="none"><div class="container js-block-container"><div id="ul-id-57-60" class="row ul-row"><div id="ul-id-57-61" class="col ul-col col-xs-12 col-sm-12 col-md-12"><div id="ul-id-57-62" class="ul-widget ul-w-spacer" data-controls="mer" style="height:36px" data-widget="spacer"></div></div></div><div id="ul-id-57-63" class="row ul-row"><div id="ul-id-57-64" class="col ul-col col-xs-12 col-sm-12 col-md-12"><div id="ul-id-57-65" spellcheck="false" class="ul-widget ul-widget-wysivig-header" data-controls="mer" data-tag="h1" data-widget="header"><div spellcheck="false"><div class="ul-header-editor clearfix ul-header-wrap" style="outline:0;word-wrap:break-word;margin:0 5px"><span class="ul-w-header-span h1" style="text-align:center"><?=$recommendation?></span></div></div></div></div></div><div id="ul-id-57-66" class="row ul-row"><div id="ul-id-57-67" class="col ul-col col-xs-12 col-sm-12 col-md-12"><div id="ul-id-57-68" class="ul-widget ul-w-spacer" data-controls="mer" style="height:36px" data-widget="spacer"></div></div></div></div></div>
    <div id="ul-id-0-11-1" class="ul-container g-theme-block-0 g-theme-block-2" data-theme="g-theme-block-0" data-parallax="none" style="" data-bgtype="color" data-map-settings="" data-auto_height="true" data-is-100vh-enabled="false" data-behavior="none"><div class="container js-block-container"><div id="ul-id-0-12-1" class="row ul-row"><div id="ul-id-0-13-1" class="col ul-col col-xs-12 col-sm-12 col-md-12"><div id="ul-id-0-14-1" class="ul-widget ul-w-spacer" data-controls="mer" style="height:80px" data-widget="spacer"></div></div></div><div id="ul-id-0-15-1" class="row ul-row"><div id="ul-id-0-16-1" class="col ul-col col-xs-12 col-sm-12 col-md-12"><div id="ul-id-0-17-1" class="ul-widget ul-widget-wysivig" data-image="true" data-controls="mer" data-widget="wysiwyg"><div class="ul-wysivig-editor clearfix" style="outline:0;word-wrap:break-word"></div></div></div></div><div id="ul-id-0-18-1" class="row ul-row"><div id="ul-id-0-19-1" class="col ul-col col-xs-12 col-sm-12 col-md-12"><div id="ul-id-0-20-1" class="ul-widget ul-w-spacer" data-controls="mer" style="height:36px" data-widget="spacer"></div></div></div><div id="ul-id-0-21-1" class="row ul-row"><?php
                $productDb = new Product();
                $productP = $productDb->GetResultCatalogGift($category, ' LIMIT 3', 'RAND()');
                if ($productP) {
                    while ($product = mysqli_fetch_array($productP, MYSQLI_NUM)) {
                        ?>
                        <div class="col ul-col col-xs-12 col-sm-12 col-md-4">
                            <a href="/product/<?= $product[0]?>" id="ul-id-9-1" class="ul-widget ul-w-productCard js-w-productCard" data-controls="mer" data-widget="productCard" data-design="design-0" data-alignment="center" itemscope itemtype="http://schema.org/Product">
                                <div class="ul-w-productCard__picture"><img class="ul-w-productCard__picture__image js-w-productCard__picture__image" src="<?= $product[5]?>" alt="<?= $product[1]?>" title="<?= $product[1]?> "></div>
                                <div class="ul-w-productCard__title"><div class="ul-w-productCard__title__content h4" itemprop="name"><?= $product[1]?>&nbsp;</div></div>
                                <div class="ul-w-productCard__description note" itemprop="description"><?= $product[2]?></div>
                                <div class="ul-w-productCard__spacer" data-position="description"></div>
                                <div class="ul-w-productCard__price price-small" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                                    <div data-type="value" data-raw="<?= $product[4]?>"><?= $product[4]?></div><div data-type="currency">руб.</div><meta itemprop="price" content="<?= $product[4]?>"><meta itemprop="priceCurrency" content="RUR">
                                </div>
                                <div class="ul-w-productCard__action"><div role="button" class="ul-w-productCard__action__button ul-w-button1 middle js-w-productCard__to-cart" data-price-value="<?= $product[4]?>" data-product-id="<?= $product[0]?>" data-product-title="<?= $product[1]?>" data-product-quantity="<?= $product[5]?>" data-description-visible="true" data-button-style="ul-w-button1 middle" id="add_<?= $product[0]?>"><div class="ul-w-productCard__action__button__caption">Купить</div></div></div>
                            </a>
                        </div>
                        <?php
                    }
                    mysqli_free_result($productP);
                }
                ?></div><div id="ul-id-0-31" class="row ul-row"><div id="ul-id-0-32" class="col ul-col col-xs-12 col-sm-12 col-md-12"><div id="ul-id-0-33" class="ul-widget ul-w-spacer" data-controls="mer" style="height:81px" data-widget="spacer"></div></div></div></div>
    </div>

<?php }?>
    <!-- Put this script tag to the <head> of your page -->
    <script type="text/javascript" src="//vk.com/js/api/openapi.js?152"></script><script type="text/javascript">VK.init({apiId: , onlyWidgets: true});</script>
    <div id="ul-id-2-31" class="ul-container g-theme-block-2" data-theme="g-theme-block-2" data-parallax="none" style="" data-bgtype="color" data-map-settings="" data-auto_height="true" data-is-100vh-enabled="false" data-behavior="none">
        <div class="container js-block-container">
            <!-- Put this div tag to the place, where the Comments block will be -->
            <div id="vk_comments"></div><script type="text/javascript">VK.Widgets.Comments("vk_comments", {limit: 25, attach: "*"});</script>
        </div>
    </div>
</div>
<?php
$site->footer();
?>
