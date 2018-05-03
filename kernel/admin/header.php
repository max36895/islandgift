<header class="g-theme-block-1">
    <div class="contact-bar">
        <div class="container">
            <div class="pull-left">
                <div class="top-widget-bar"></div>
            </div>
            <div class="pull-right">
                <div class="top-social-bar"></div>
            </div>
        </div>
    </div>
    <div class="l-top g-theme-block-1">
        <div class="container">
            <a href="/" class="logo-head col-xs-12 col-sm-12 col-md-5 col-lg-4">
                <div id="ul-id-icon-logo" class="ul-widget ul-widget-icon text-center" data-controls="e" data-widget="icon" data-icon-set="fontAwesome"><span class="fa fa-angellist ul-w-icon-size-32 g-color-text-2"></span></div>
                <div id="ul-id-header-siteName" spellcheck="false"
                     class="ul-widget ul-widget-wysivig-header" data-controls="e" placeholder=""
                     data-tag="span" data-widget="header">
                    <div spellcheck="false">
                        <div class="ul-header-editor clearfix ul-header-wrap" placeholder="placeholder" style="outline:0;word-wrap:break-word;margin:0 5px"><span class="ul-w-header-span h1" style="text-align:center"><span class="g-color-text-2">max</span><span class="g-color-text-3">IMKO</span></span></div>
                    </div>
                </div>
            </a>
            <div class="menu-head col-xs-12 col-sm-12 col-md-7 col-lg-8">
                <div id="ul-id-mainmenu-main" class="ul-widget ul-w-mainmenu" data-controls="e"
                     data-widget="mainmenu" data-fixed="false" data-bgcolor="0" data-bgtransparent="100" data-version="1">
                    <div class="ul-w-mainmenu-showButton" style="text-align: right"><span><form action="/search" method="get" target="_self" accept-charset="utf-8"><input type="hidden" name="searchid" value="2319379"/><input type="hidden" name="l10n" value="ru"/><input type="hidden" name="reqenc" value=""/><input type="search" class="search" name="text" placeholder="Поиск по сайту✌" title="Поиск по сайту"/><button type="submit" class="searchButton"></button><a style="padding: 11px" href="../you">Личный кабинет</a></form></span> <span></span> <span></span></div>
                    <div class="ul-w-mainmenu-nav" style="opacity:0">
                        <?php $pageText = include 'param/textForPage.php';
                        $thing = 'class="normal js-w-mainmenu ul-w-mainmenu-item-link" data-type="page" target="_self"'; ?>
                        <div class="ul-w-mainmenu-item"><a <?=$thing?> href="/" title="Магазин подарков MaxImko">Главная</a></div>
                        <div class="ul-w-mainmenu-item ul-w-mainmenu-have-nasted ul-w-mainmenu-have-nested"><a <?=$thing?> href="/gift" title="Подарок для тебя♥"><?=$pageText['gift']['title']?></a><div class="ul-w-mainmenu-nested">
                                <div class="ul-w-mainmenu-item"><a <?=$thing?> href="/allgift" title="Все подарки">Все подарки</a></div>
                                <div class="ul-w-mainmenu-item"><a <?=$thing?> href="/woman" title="Прекрасным женщинам и девушкам">Женщинам</a></div>
                                <div class="ul-w-mainmenu-item"><a <?=$thing?> href="/man" title="Настоящему мужчине">Мужчинам</a></div>
                                <div class="ul-w-mainmenu-item"><a <?=$thing?> href="/children" title="Подарки самым маленьким">Детям</a></div>
                                <div class="ul-w-mainmenu-item"><a <?=$thing?> href="/parent" title="Маленькое чудо для родителей">Родителям</a></div>
                                <div class="ul-w-mainmenu-item"><a <?=$thing?> href="/grandma" title="Любимым бабушкам и дедушкам">Бабушкам и Дедушкам</a></div>
                                <div class="ul-w-mainmenu-item"><a <?=$thing?> href="/flowers" title="Цветы и букеты">Цветы</a></div>
                                <div class="ul-w-mainmenu-item"><a <?=$thing?> href="/box" title="Креативные наборы">Наборы и упаковка</a></div>
                                <div class="ul-w-mainmenu-item"><a <?=$thing?> href="/sweet" title="Сладость в радость">Сладости</a></div>
                                <div class="ul-w-mainmenu-item"><a <?=$thing?> href="/celebration" title="Организация праздника">Организация праздника</a></div></div></div>
                        <div class="ul-w-mainmenu-item"><a <?=$thing?> href="/picking" title="Идеи для подарка"><?=$pageText['picking']['title']?></a></div>
                        <div class="ul-w-mainmenu-item"><a <?=$thing?> href="/articles" title="Список статей"><?=$pageText['articles']['title']?></a></div>
                        <div class="ul-w-mainmenu-item"><a <?=$thing?> href="/about" title="О нас"><?=$pageText['about']['title']?></a></div>
                        <div class="ul-w-mainmenu-toggle-button"><span></span><span></span><span></span></div>
                        <div class="ul-w-mainmenu-item ul-w-mainmenu-have-nasted ul-w-mainmenu-have-nested">
                            <a class="normal js-w-mainmenu ul-w-mainmenu-item-link"
                               data-type="page" target="_self">Админка</a>
                            <div class="ul-w-mainmenu-nested">
                                <div class="ul-w-mainmenu-item"><a class="normal js-w-mainmenu ul-w-mainmenu-item-link" href="siteadminka" data-type="page" target="_self">Главная</a></div>
                                <div class="ul-w-mainmenu-item"><a class="normal js-w-mainmenu ul-w-mainmenu-item-link" href="promo" data-type="page" target="_self">Акции и спецпредложения</a></div>
                                <div class="ul-w-mainmenu-item"><a class="normal js-w-mainmenu ul-w-mainmenu-item-link" href="contact" data-type="page" target="_self">Изменить данные</a></div>
                                <div class="ul-w-mainmenu-item"><a class="normal js-w-mainmenu ul-w-mainmenu-item-link" href="article" data-type="page" target="_self">Статьи</a></div>
                                <div class="ul-w-mainmenu-item"><a class="normal js-w-mainmenu ul-w-mainmenu-item-link" href="collection" data-type="page" target="_self">Коллекции картинок</a></div>
                                <div class="ul-w-mainmenu-item"><a class="normal js-w-mainmenu ul-w-mainmenu-item-link" href="for1C" data-type="page" target="_self">Выгрузки в 1С</a></div>
                            </div>
                        </div>
                        <div class="ul-w-mainmenu-toggle"><a class="ul-w-mainmenu-toggle-more normal">Еще</a><div class="ul-w-mainmenu-toggle-nasted"></div></div>
                    </div>
                    <script type="text/javascript" src="/widgets/mainmenu/js/mainmenu.js"></script>
                </div>
            </div>
        </div>
    </div>
</header>
<main>