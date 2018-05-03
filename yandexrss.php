<?php
include 'kernel/SITE.php';
$site = new SITE();

$site->head('yandexrss');
?>
    <div id="ul-content">
        <div id="ul-id-0-1" class="ul-container g-theme-block-2" data-theme="g-theme-block-2"
             data-parallax="none" style="" data-bgtype="color"
             data-map-settings="" data-auto_height="true" data-is-100vh-enabled="false" data-behavior="none">
            <div class="container js-block-container">
                <div id="ul-id-0-2" class="row ul-row"><div id="ul-id-0-3" class="col ul-col col-xs-12 col-sm-12 col-md-12"><div id="ul-id-0-4" class="ul-widget ul-w-spacer" data-controls="mer" style="height:36px" data-widget="spacer"></div></div></div>
                <div id="ul-id-0-5" class="row ul-row"><div id="ul-id-0-6" class="col ul-col col-xs-12 col-sm-12 col-md-12"><div id="ul-id-0-7" spellcheck="false" class="ul-widget ul-widget-wysivig-header" data-controls="mer" data-tag="span" data-widget="header"><div spellcheck="false"><div class="ul-header-editor clearfix ul-header-wrap" style="outline:0;word-wrap:break-word;margin:0 5px"><h1 class="ul-w-header-span h1" style="text-align:center">Турбо <span class=" g-color-text-3">страница Яндекс</span></h1></div></div></div></div></div>
                <div id="ul-id-0-8" class="row ul-row"><div id="ul-id-0-9" class="col ul-col col-xs-12 col-sm-12 col-md-12">
                        <?php
                        $site->breadcrumbList(
                            ['Главная', 'href="/" style="color: #337ab7;" title="Интернет магазин Maximko"'],
                            ['Турбо страницыя', 'href="/dev" style="color: #337ab7;" title="Турбо страницы"'],
                            ['Yandex Rss', '']
                        );
                        ?>
                        <div id="ul-id-0-10" class="ul-widget ul-w-spacer" data-controls="mer" style="height:36px" data-widget="spacer"></div>
                    </div></div>
            </div>
        </div>
        <div id="ul-id-0-11" class="ul-container g-theme-block-0 g-theme-block-2" data-theme="g-theme-block-0" data-parallax="none" style="" data-bgtype="color" data-map-settings="" data-auto_height="true" data-is-100vh-enabled="false" data-behavior="none">
            <div class="container js-block-container">

                <div id="ul-id-0-17" class="ul-widget ul-widget-wysivig" data-image="true" data-controls="mer" data-widget="wysiwyg">
                    <div class="ul-wysivig-editor clearfix" style="outline:0;word-wrap:break-word">
                        <h2 style="text-align: center">В крации о Турбо страницах</h2>
                        <p><span class="g-color-text-2">Как правило, на мобильных устройствах сайты загружаются медленнее, чем на десктопных, например, из-за низкой скорости интернета. Технология «Турбо-страницы» позволяет хранить содержимое страниц на сервере Яндекса и загружать их, не обращаясь к серверу, на котором размещается сайт. При этом можно по-прежнему отслеживать трафик сайта и учитывать доходы от рекламы.</span></p>
                        <h2 style="text-align: center">Технология Турбо: как Яндекс ускоряет доступ к информации</h2>
                        <p><span class="g-color-text-2">Быстрый домашний интернет приучил нас к тому, что любой сайт загружается почти мгновенно. Чтобы доступ к информации оставался быстрым и в мобильных сетях, в Яндексе используют технологию Турбо. Владельцам сайтов она позволяет создавать лёгкие версии страниц, которые быстро загружаются при медленном подключении к сети, а пользователям Яндекс.Браузера — быстрее открывать обычные страницы, при необходимости сжимая их содержимое и блокируя загрузку тяжёлых и необязательных элементов.</span><br></p>
                        <h2 style="text-align: center">Шифрование информации</h2>
                        <p><span class="g-color-text-2">Решая проблему экономии трафика, разработчики Яндекс.Браузера заодно сделали обмен данными безопаснее. Когда канал передачи информации между устройством пользователя и сервером сайта создаётся по протоколу HTTP, данные в нём не шифруются — а значит, их можно перехватить. Поэтому на сервере Яндекса происходит не только сжатие, но и шифрование информации — для надёжности. Кстати, по такому же принципу в Яндекс.Браузере работает защита при подключении к открытой сети Wi-Fi, только данные при этом не сжимаются, потому что в этом нет необходимости.</span><br></p>
                        <h2 style="text-align: center">Автоматическое включение</h2>
                        <p><span class="g-color-text-2">Режим Турбо включается автоматически, когда скорость соединения падает ниже 128 Кбит/с, и остается включённым, пока она не превысит 512 Кбит/с. О том, что режим Турбо активирован, говорит значок синей ракеты, который появляется в адресной строке браузера. При желании в настройках браузера можно запретить сжатие видео (при этом текст и картинки продолжат сжиматься) или совсем отключить автоматический переход в режим Турбо.</span><br></p>
                        <h2 style="text-align: center">Зачем использовать Турбо-страницы</h2>
                        <p><span class="g-color-text-2">
                                <dl class="g-color-text-2">
                                <dt>Страницы быстрее загружаются</dt>
                                    <dd>По данным внутренних исследований Яндекса, Турбо-страницы загружаются быстрее страниц мобильных версий сайтов: до полной загрузки страницы — в 15 раз, до момента возможности взаимодействия со страницей — в пять раз. Чем быстрее загружается сайт, тем больше вероятность, что посетитель останется на странице и найдет нужную ему информацию.</dd>
                                    <dt>Снижается нагрузка на ваш сервер</dt>
                                    <dd>При формировании Турбо-страницы ее содержимое кэшируется и хранится на сервере Яндекса. Когда посетитель открывает Турбо-страницу, она загружается с этого же сервера. Таким образом снижается количество обращений к серверу, на котором расположен сайт.</dd>
                                    <dt>Страницы создаются по алгоритмам Яндекса</dt>
                                    <dd>Технология помогает адаптировать страницы под мобильные устройства без внесения изменений в код сайта. Достаточно передать информацию о странице с помощью RSS-канала. На основе этих данных Яндекс сформирует Турбо-страницу.</dd>
                                    <dt>Изменения страниц отслеживаются автоматически</dt>
                                    <dd>Робот Яндекса регулярно отслеживает изменения, внесенные в RSS-канал. Подробно см. в разделе Обновление содержимого Турбо-страниц.</dd>
                                    <dt>Остается возможность сбора статистики</dt>
                                    <dd>Если к сайту подключены счетчики систем веб-аналитики, вы можете использовать их и на Турбо-страницах. Поддерживаются Яндекс.Метрика, LiveInternet, Google Analytics, Рейтинг Mail.Ru, Rambler Топ-100, Mediascope.</dd>
                                    <dt>Поддерживается использование рекламы</dt>
                                    <dd>Если вы партнер Рекламной сети Яндекса, можно создать и подключить специальные рекламные блоки для Турбо-страниц. Рекламу других источников можно подключить через ADFOX. Статистика по ним будет собираться так же, как для блоков, размещенных на вашем сайте.</dd>
                                </dl>
                                Информация взята с сайта <noindex><a href="https://yandex.ru/company/technologies/turbo" title="Яндекс RSS" style="color: #0f7bff">Yandex</a></noindex>
                            </span><br></p>
                        <p><span class="g-color-text-2"></span><br></p>
                        <p><span class="g-color-text-2">Подключить Турбо-страницы может владелец сайта любой тематики — будь то новостное издание или, скажем, сайт с рецептами блюд.</span></p>
                        <p><span class="g-color-text-2">Преимущество от использования Турбо-страницы заключается в том, что в поисковой выдаче ваш сайт будет отображаться чуть выше. За счет чего вероятность того что пользователь заметит ваш сайт и перейдет на него становится выше.</span><br></p>
                        <p><span class="g-color-text-2">Помимо всего прочего многих интересует вопрос о том, как подключить счетчик на Турбо страницу. Это сделать можно либо в Вебмастере "Турбо-страницы->Настройки" и уже там непосредственно подключить необходимые счетчики, или в коде самой страницы, прописав в заголовке "< yandex:analytics type="Yandex" id="ХХХХХХХХ"/>" ХХХХХХХХ - код вашего счетчика. Пример мы вожете посмотреть на по следующей ссылке <a href="https://www.islandgift.ru/rss/example" title="Пример кода" style="color: #0f7bff">https://www.islandgift.ru/rss/example</a></span><br></p>
                        <p><span class="g-color-text-2">В связи со всем выше сказанном мы предлагаем Вам воспользоваться нашими услугами. Мы в свою очередь постараемся как можно скорее реализовать для вас турбо-страницы. Помимо того, что мы разработаем для вас турбо-страницу, мы так же будем держать вашу страницу в актуальном состоянии, добавляя или удаляя новый функционал, что бы использование вашего сайта приносило только благоприятные эмоции.</span><br></p>
                        <p><span class="g-color-text-2">Так же у нас есть наработка по автоматической генерации турбо-страниц, которой мы можем поделиться с Вами</span><br></p>
                        <p><span class="g-color-text-2">Если вас заинтересовало данное предложение, то свяжитесь с нами и мы постараемся помочь вам как можно скорее. Для Вас мы создадим 1 страницу совершенно бесплатно, и если вам понравится результат, то разработаем все оставшиеся страницы<br>Консультация и помощь бесплатная.</span><br></p>
                        <p><span class="g-color-text-2">Благодарим за внимание!</span><br></p>
                        <p></p></div>
                </div>
                <div id="ul-id-0-18" class="ul-widget ul-w-spacer" data-controls="mer" style="height:36px" data-widget="spacer"></div>

                <div id="ul-id-0-12" class="row ul-row"><div id="ul-id-0-13" class="col ul-col col-xs-12 col-sm-12 col-md-12"><div id="ul-id-0-14" class="ul-widget ul-w-spacer" data-controls="mer" style="height:80px" data-widget="spacer"></div></div></div>
                <div id="ul-id-0-15" class="row ul-row">
                    <div id="ul-id-0-19" class="col ul-col col-xs-12 col-sm-12 col-md-4"><div id="ul-id-0-20" class="ul-widget ul-w-imagezoom" data-controls="mer" data-widget="imagezoom"><div class="ul-w-wrap ul-w-imagezoom-type-none ul-imagezoom-published" itemscope itemtype="http://schema.org/ImageObject"><div class="ul-w-imagezoom-img-wrap"><div><picture><img src="/img/turbo/3.jpg" class="imgZoom" style="width:100%" alt="Турбо страница мотивация" title="Турбо страница мотивация" data-lightbox="/img/turbo/3.jpg" itemprop="contentUrl"></picture></div></div></div></div></div>
                    <div id="ul-id-0-19" class="col ul-col col-xs-12 col-sm-12 col-md-4"><div id="ul-id-0-20" class="ul-widget ul-w-imagezoom" data-controls="mer" data-widget="imagezoom"><div class="ul-w-wrap ul-w-imagezoom-type-none ul-imagezoom-published" itemscope itemtype="http://schema.org/ImageObject"><div class="ul-w-imagezoom-img-wrap"><div><picture><img src="/img/turbo/4.png" class="imgZoom" style="width:100%" alt="наши турбо страницы" title="наши турбо страницы" data-lightbox="/img/turbo/4.png" itemprop="contentUrl"></picture></div></div></div></div></div>
                    <div id="ul-id-0-19" class="col ul-col col-xs-12 col-sm-12 col-md-4"><div id="ul-id-0-20" class="ul-widget ul-w-imagezoom" data-controls="mer" data-widget="imagezoom"><div class="ul-w-wrap ul-w-imagezoom-type-none ul-imagezoom-published" itemscope itemtype="http://schema.org/ImageObject"><div class="ul-w-imagezoom-img-wrap"><div><picture><img src="/img/turbo/2.jpg" class="imgZoom" style="width:100%" alt="Турбо страница" title="Турбо страница" data-lightbox="/img/turbo/2.jpg" itemprop="contentUrl"></picture></div></div></div></div></div>
                </div>
                <div id="ul-id-0-21" class="row ul-row"><div id="ul-id-0-22" class="col ul-col col-xs-12 col-sm-12 col-md-12"><div id="ul-id-0-23" class="ul-widget ul-w-spacer" data-controls="mer" style="height:80px" data-widget="spacer"></div></div></div>
            </div>
        </div>
        <script type="application/ld+json">{
        "@context": "http://schema.org",
        "@type": "NewsArticle",
        "mainEntityOfPage": {
        "@type": "WebPage",
        "@id": "https://islandgift.ru/yandexrss"
        },<?php $param = include'kernel/param/PageParam.php';?>
        "headline": "<?=$param['yandexrss']['title']?>",
        "image": [
        "https://www.islandgift.ru/img/turbo/4.png",
        "https://www.islandgift.ru/img/turbo/3.jpg",
        "https://www.islandgift.ru/img/turbo/2.jpg"
        ],
        "datePublished": "2018-04-03T11:11:11+03:00",
        "dateModified": "<?=date('Y-m-d');?>T00:05:00+03:00",
        "author": {
        "@type": "Person",
        "name": "Maximko"
        },
        "publisher": {
        "@type": "Organization",
        "name": "Maximko",
        "logo": {
        "@type": "ImageObject",
        "url": "https://www.islandgift.ru/logo.png"
        }
        },
        "description": "<?= $param['yandexrss']['description']?>"
        }</script>
        <div id="ul-id-0-24" class="ul-container g-theme-block-1" data-theme="g-theme-block-1" data-parallax="none" style="" data-bgtype="color" data-map-settings="" data-auto_height="true" data-is-100vh-enabled="false" data-behavior="none">
            <div class="container js-block-container">
                <div id="ul-id-0-66" class="row ul-row"><div id="ul-id-0-67" class="col ul-col col-xs-12 col-sm-12 col-md-12"><div id="ul-id-0-68" class="ul-widget ul-w-spacer" data-controls="mer" style="height:63px" data-widget="spacer"></div></div></div>
                <div id="ul-id-0-69" class="row ul-row"><div id="ul-id-0-70" class="col ul-col col-xs-12 col-sm-12 col-md-12"><div id="ul-id-0-71" spellcheck="false" class="ul-widget ul-widget-wysivig-header" data-controls="mer" data-tag="span" data-widget="header"><div spellcheck="false"><div class="ul-header-editor clearfix ul-header-wrap" style="outline:0;word-wrap:break-word;margin:0 5px"><span class="ul-w-header-span h1" style="text-align:center">Преимущества</span></div></div></div></div></div>
                <div id="ul-id-0-72" class="row ul-row">
                    <div id="ul-id-0-73" class="col ul-col col-xs-12 col-sm-12 col-md-1"><div id="ul-id-0-74" class="ul-widget ul-w-spacer" data-controls="mer" style="height:50px" data-widget="spacer"></div></div>
                    <div id="ul-id-0-75" class="col ul-col col-xs-12 col-sm-12 col-md-10"><div id="ul-id-0-76" class="ul-widget ul-widget-wysivig" data-image="true" data-controls="mer" data-widget="wysiwyg"><div class="ul-wysivig-editor clearfix" style="outline:0;word-wrap:break-word"><p style="text-align:center"><span class="g-color-text-2">Итоговая цена разработки страницы зависит от сложности портируемого сайта.</span></p></div></div></div>
                    <div id="ul-id-0-77" class="col ul-col col-xs-12 col-sm-12 col-md-1"><div id="ul-id-0-78" class="ul-widget ul-w-spacer" data-controls="mer" style="height:50px" data-widget="spacer"></div></div>
                </div>
                <div id="ul-id-0-79" class="row ul-row">
                    <div id="ul-id-0-80" class="col ul-col col-xs-12 col-sm-12 col-md-12"><div id="ul-id-0-81" class="ul-widget ul-w-spacer" data-controls="mer" style="height:36px" data-widget="spacer"></div></div>
                </div>
                <div id="ul-id-0-82" class="row ul-row">
                    <div id="ul-id-0-83" class="col ul-col col-xs-12 col-sm-12 col-md-4">
                        <div id="ul-id-0-84" class="ul-widget ul-widget-goods ul-goods-layout default ul-goods-layout-default" data-controls="mer" data-widget="goods" data-is-icon-shown="true" data-icon-set="fontAwesome">
                            <div class="ul-goods-view-item js-goods-item-linkPopover" itemscope itemtype="http://schema.org/Product">
                                <div class="ul-goods-view-image-wrap js-goods-image-wrap ul-goods-view-image-wrap--icon"><div class="ul-goods-view-image-wrap2 js-goods-image-changebtn-wrapper"><span class="fa-group fa ul-goods-view-icon" style="font-size:48px"> </span> <span class="js-goods-popup-link ul-goods-view-link"></span></div></div>
                                <div class="ul-goods-view-title" data-field-name="title"><div class="js-goods-contenteditable h4" itemprop="name">Помощь и консультация</div></div>
                                <div class="ul-goods-view-details">
                                    <div class="ul-goods-view-descr" data-field-name="description.data">
                                        <div class="js-goods-contenteditable js-goods-descr note" itemprop="description">К нам вы можете обратиться по любому вопросу. Мы сделаем все возможное чтобы решить все ваши вопросы.</div>
                                    </div>
                                </div>
                                <div style="display: none" itemprop="offers" itemscope itemtype="http://schema.org/Offer"><meta itemprop="price" content="100"><meta itemprop="priceCurrency" content="RUR"></div>
                            </div>
                        </div>
                        <div id="ul-id-0-85" class="ul-widget ul-w-spacer" data-controls="mer" style="height:36px" data-widget="spacer"></div>
                    </div>
                    <div id="ul-id-0-86" class="col ul-col col-xs-12 col-sm-12 col-md-4">
                        <div id="ul-id-0-87" class="ul-widget ul-widget-goods ul-goods-layout default ul-goods-layout-default" data-controls="mer" data-widget="goods" data-is-icon-shown="true" data-icon-set="fontAwesome">
                            <div class="ul-goods-view-item js-goods-item-linkPopover" itemscope itemtype="http://schema.org/Product">
                                <div class="ul-goods-view-image-wrap js-goods-image-wrap ul-goods-view-image-wrap--icon"><div class="ul-goods-view-image-wrap2 js-goods-image-changebtn-wrapper"><span class="fa-heart fa ul-goods-view-icon" style="font-size:48px"> </span> <span class="js-goods-popup-link ul-goods-view-link"></span></div></div>
                                <div class="ul-goods-view-title" data-field-name="title"><div class="js-goods-contenteditable h4" itemprop="name">Современные технологии</div></div>
                                <div class="ul-goods-view-details">
                                    <div class="ul-goods-view-descr" data-field-name="description.data"><div class="js-goods-contenteditable js-goods-descr note" itemprop="description">Мы стараемся быть в тренде. И поэтому используем последние наработки и технологии</div></div>
                                </div>
                                <div style="display: none" itemprop="offers" itemscope itemtype="http://schema.org/Offer"><meta itemprop="price" content="100"><meta itemprop="priceCurrency" content="RUR"></div>
                            </div>
                        </div>
                        <div id="ul-id-0-88" class="ul-widget ul-w-spacer" data-controls="mer" style="height:36px" data-widget="spacer"></div>
                    </div>
                    <div id="ul-id-0-89" class="col ul-col col-xs-12 col-sm-12 col-md-4">
                        <div id="ul-id-0-90" class="ul-widget ul-widget-goods ul-goods-layout default ul-goods-layout-default" data-controls="mer" data-widget="goods" data-is-icon-shown="true" data-icon-set="fontAwesome">
                            <div class="ul-goods-view-item js-goods-item-linkPopover" itemscope itemtype="http://schema.org/Product">
                                <div class="ul-goods-view-image-wrap js-goods-image-wrap ul-goods-view-image-wrap--icon">
                                    <div class="ul-goods-view-image-wrap2 js-goods-image-changebtn-wrapper">
                                        <span class="fa-smile-o fa ul-goods-view-icon" style="font-size:48px"> </span> <span class="js-goods-popup-link ul-goods-view-link"></span>
                                    </div>
                                </div>
                                <div class="ul-goods-view-title" data-field-name="title"><div class="js-goods-contenteditable h4" itemprop="name">Высокое качество и поддержка</div></div>
                                <div class="ul-goods-view-details">
                                    <div class="ul-goods-view-descr" data-field-name="description.data">
                                        <div class="js-goods-contenteditable js-goods-descr note" itemprop="description">Мы всегда следим за качеством конечного продукта. А также поддерживаем конечный продукт в актуальном состоянии.</div>
                                    </div>
                                </div>
                                <div style="display: none" itemprop="offers" itemscope itemtype="http://schema.org/Offer"><meta itemprop="price" content="100"><meta itemprop="priceCurrency" content="RUR"></div>
                            </div>
                        </div>
                        <div id="ul-id-0-91" class="ul-widget ul-w-spacer" data-controls="mer" style="height:36px" data-widget="spacer"></div>
                    </div>
                </div>
                <div id="ul-id-0-94" class="row ul-row"><div id="ul-id-0-95" class="col ul-col col-xs-12 col-sm-12 col-md-12"><div id="ul-id-0-96" class="ul-widget ul-w-spacer" data-controls="mer" style="height:72px" data-widget="spacer"></div></div></div>
            </div>
        </div>
    </div>
<?php
$site->footer();
?>