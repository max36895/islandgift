<?php
include 'kernel/SITE.php';
$site = new SITE();

$meta_d = 'Всех приветствую. И с сожалением сообщаю что панели администратора тут нет😞 но зато тут есть маленький секрет для вас😉';
$meta_k = 'админка управление все о сайте';
$title = 'Тут админки нет😳 но зато есть секретик😉';

$site->head('none', $title, $meta_d, $meta_k);
?>
<div id="ul-content">
    <div id="ul-id-2-13" class="ul-container g-theme-block-2" data-theme="g-theme-block-2" data-parallax="none" style="" data-bgtype="color" data-map-settings="" data-auto_height="true" data-is-100vh-enabled="false" data-behavior="none">
        <div class="container js-block-container">
            <div id="ul-id-2-14" class="row ul-row"><div id="ul-id-2-15" class="col ul-col col-xs-12 col-sm-12 col-md-12"><div id="ul-id-2-16" class="ul-widget ul-w-spacer" data-controls="mer" style="height:36px" data-widget="spacer"></div></div></div>
            <div id="ul-id-2-17" class="row ul-row">
                <div id="ul-id-2-18" class="col ul-col col-xs-12 col-sm-12 col-md-12">
                    <div id="ul-id-2-19" spellcheck="false" class="ul-widget ul-widget-wysivig-header" data-controls="mer" data-tag="h1" data-widget="header">
                        <div spellcheck="false"><div class="ul-header-editor clearfix ul-header-wrap" style="outline:0;word-wrap:break-word;margin:0 5px"><h1 class="ul-w-header-span h1" style="text-align:center"><?=$title?></h1></div></div>
                    </div>
                </div>
            </div>
            <div id="ul-id-2-20" class="row ul-row"><div id="ul-id-2-21" class="col ul-col col-xs-12 col-sm-12 col-md-12"><div id="ul-id-2-22" class="ul-widget ul-w-spacer" data-controls="mer" style="height:36px" data-widget="spacer"></div></div></div>
        </div>
    </div>
    <div id="ul-id-0-11" class="ul-container g-theme-block-0 g-theme-block-2" data-theme="g-theme-block-0" data-parallax="none" style="" data-bgtype="color" data-map-settings="" data-auto_height="true" data-is-100vh-enabled="false" data-behavior="none">
        <div class="container js-block-container">
            <div id="ul-id-0-12" class="row ul-row"><div id="ul-id-0-13" class="col ul-col col-xs-12 col-sm-12 col-md-12"><div id="ul-id-0-14" class="ul-widget ul-w-spacer" data-controls="mer" style="height:80px" data-widget="spacer"></div></div></div>
            <div id="ul-id-0-15" class="row ul-row">
                <div id="ul-id-0-16" class="col ul-col col-xs-12 col-sm-12 col-md-6">
                    <div id="ul-id-0-17" class="ul-widget ul-widget-wysivig" data-image="true" data-controls="mer" data-widget="wysiwyg">
                        <div class="ul-wysivig-editor clearfix" style="outline:0;word-wrap:break-word"><p><span class="g-color-text-2">
                                Увы и ах, но админку вы здесь не найдете😉
                                Может она есть, а может ее нет, Пусть это останется маленькой тайной и одним раскрытым секретом😉
                                Благодарим что решили зайти к нам и нашли данный секрет!
                                На страницах нашего сайта вы сможете найти много интересного и веселого.
                                И это определенно не все загадки и секреты нашего сайта!
                                Сможете ли вы найти все секреты? Смотрите внимательнее и возможно именно Вам повезет!
                                Кто знает может того кто найдет все секреты ждет приз.
                                Только тсссс
                                </span><br></p><p></p></div>
                    </div>
                    <div id="ul-id-0-18" class="ul-widget ul-w-spacer" data-controls="mer" style="height:36px" data-widget="spacer"></div>
                </div>
                <div id="ul-id-0-19" class="col ul-col col-xs-12 col-sm-12 col-md-6"><div id="ul-id-0-20" class="ul-widget ul-w-imagezoom" data-controls="mer" data-widget="imagezoom"><div class="ul-w-wrap ul-w-imagezoom-type-none ul-imagezoom-published" itemscope itemtype="http://schema.org/ImageObject"><div class="ul-w-imagezoom-img-wrap"><div><picture><img src="/img/good/service_picking.png" class="imgZoom" style="width:100%" alt="Что подарить?" title="Что подарить?" data-lightbox="img/good/service_picking.png" itemprop="contentUrl"></picture></div></div></div></div></div>
            </div>
            <div id="ul-id-0-21" class="row ul-row"><div id="ul-id-0-22" class="col ul-col col-xs-12 col-sm-12 col-md-12"><div id="ul-id-0-23" class="ul-widget ul-w-spacer" data-controls="mer" style="height:80px" data-widget="spacer"></div></div></div>
        </div>
    </div>
</div>
<?php
$site->footer();
?>
