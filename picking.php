<?php
ini_set('display_errors', 'On');
error_reporting('E_ALL');
include 'kernel/SITE.php';
$site = new SITE();

$pageText = include 'kernel/param/textForPage.php';
$site->head('picking');
?>
    <div id="ul-content">
        <div id="ul-id-2-13" class="ul-container g-theme-block-2" data-theme="g-theme-block-2" data-parallax="none" style="" data-bgtype="color" data-map-settings="" data-auto_height="true" data-is-100vh-enabled="false" data-behavior="none">
            <div class="container js-block-container">
                <div id="ul-id-2-14" class="row ul-row"><div id="ul-id-2-15" class="col ul-col col-xs-12 col-sm-12 col-md-12"><div id="ul-id-2-16" class="ul-widget ul-w-spacer" data-controls="mer" style="height:36px" data-widget="spacer"></div></div></div>
                <div id="ul-id-2-17" class="row ul-row">
                    <div id="ul-id-2-18" class="col ul-col col-xs-12 col-sm-12 col-md-12">
                        <div id="ul-id-2-19" spellcheck="false" class="ul-widget ul-widget-wysivig-header" data-controls="mer" data-tag="h1" data-widget="header">
                            <div spellcheck="false"><div class="ul-header-editor clearfix ul-header-wrap" style="outline:0;word-wrap:break-word;margin:0 5px"><h1 class="ul-w-header-span h1" style="text-align:center"><?=$pageText['picking']['title']?></h1></div></div>
                        </div>
                    </div>
                </div>
                <div id="ul-id-2-20" class="row ul-row"><div id="ul-id-2-21" class="col ul-col col-xs-12 col-sm-12 col-md-12"><div id="ul-id-2-22" class="ul-widget ul-w-spacer" data-controls="mer" style="height:36px" data-widget="spacer"></div></div></div>
            </div>
        </div>
        <div id="ul-id-2-0" class="ul-container g-theme-block-0 g-theme-block-2" data-theme="g-theme-block-0" data-parallax="none" style="" data-bgtype="color" data-map-settings="" data-auto_height="true" data-is-100vh-enabled="false" data-behavior="none">
            <div class="container js-block-container">
                <div id="ul-id-2-1" class="row ul-row"><div id="ul-id-2-2" class="col ul-col col-xs-12 col-sm-12 col-md-12"><div id="ul-id-2-3" class="ul-widget ul-widget-icon text-center" data-controls="mer" data-widget="icon" data-icon-set="fontAwesome"><span class="fa fa-angellist ul-w-icon-size-192 g-color-text-3"></span></div></div>
                </div><div id="ul-id-2-23" class="row ul-row">
                    <div id="ul-id-2-24" class="col ul-col col-xs-12 col-sm-12 col-md-12">
                        <div id="ul-id-2-25" class="ul-widget ul-widget-wysivig" data-image="true" data-controls="mer" data-widget="wysiwyg">
                            <div class="ul-wysivig-editor clearfix" style="outline:0;word-wrap:break-word"><h2>Что подарить?</h2>
                                <p><?= $pageText['picking']['section1Text'] ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="ul-id-2-4" class="row ul-row">
                    <div id="ul-id-2-5" class="col ul-col col-xs-12 col-sm-12 col-md-12">
                        <div id="ul-id-2-6" class="ul-widget ul-w-stages" data-controls="mer" data-widget="stages">
                            <h2 style="text-align: center">Принцип работы сервиса:</h2>
                            <div class="c-steps js-sort-steps" data-line-type="not-full" data-icon-type="counter" data-pour-type="not-full" data-text-align="center" data-icon-size="size48px" data-is-bold="true" data-is-italic="true">
                                <div class="c-steps__elem js-steps-elem odd" data-id="1" data-icon-set="fontAwesome">
                                    <div class="c-steps__elem-col" data-role="number"><div class="c-steps__elem-col__number g-theme-block-3" data-count="1" style=""><span class="js-steps-el-line c-steps__elem-line g-theme-block-3" style=""></span></div></div>
                                    <div class="c-steps__elem-col" data-role="text"><h3 class="c-steps__elem-col__title js-editable h3 g-color-text-1" data-db="title">Заполнение</h3>
                                        <div class="c-steps__elem-col__text js-editable normal g-color-text-1" data-db="description">Заполните все необходимые параметры</div>
                                    </div>
                                </div>
                                <div class="c-steps__elem js-steps-elem even" data-id="2" data-icon-set="fontAwesome">
                                    <div class="c-steps__elem-col" data-role="number"><div class="c-steps__elem-col__number g-theme-block-3" data-count="2" style=""><span class="js-steps-el-line c-steps__elem-line g-theme-block-3" style=""></span></div></div>
                                    <div class="c-steps__elem-col" data-role="text"><h3 class="c-steps__elem-col__title js-editable h3 g-color-text-1" data-db="title">Просмотр</h3>
                                        <div class="c-steps__elem-col__text js-editable normal g-color-text-1" data-db="description">Посмотрите все варианты, которые предлагает наш сервис</div>
                                    </div>
                                </div>
                                <div class="c-steps__elem js-steps-elem odd" data-id="3" data-icon-set="fontAwesome">
                                    <div class="c-steps__elem-col" data-role="number"><div class="c-steps__elem-col__number g-theme-block-3" data-count="3" style=""><span class="js-steps-el-line c-steps__elem-line g-theme-block-3" style=""></span></div></div>
                                    <div class="c-steps__elem-col" data-role="text"><h3 class="c-steps__elem-col__title js-editable h3 g-color-text-1" data-db="title">Выбор</h3>
                                        <div class="c-steps__elem-col__text js-editable normal g-color-text-1" data-db="description">Выберите то, что подходит именно Вам</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="ul-id-2-29" class="row ul-row"><div id="ul-id-2-30" class="col ul-col col-xs-12 col-sm-12 col-md-12"><div id="ul-id-2-31" class="ul-widget ul-widget-wysivig" data-image="true" data-controls="mer" data-widget="wysiwyg"><div class="ul-wysivig-editor clearfix" style="outline:0;word-wrap:break-word"><p>&nbsp;</p></div></div></div></div>
                <div id="ul-id-2-7" class="row ul-row">
                    <div id="ul-id-2-8" class="col ul-col col-xs-12 col-sm-12 col-md-12">
                        <div id="ul-id-feedBack-footerform" class="ul-widget ul-widget-feedBack clearfix default" data-controls="e" data-widget="feedBack" style="margin: 0 auto;"
                            <form class="feedBack" method="post" role="form" id="avt">
                                <div class="ul-widget-feedBack-form-group ul-widget-feedBack-header has-feedback"><div class="ul-w-feedBack-editable h2" data-name="header.title">Заполните данные</div></div>
                                <div class="ul-widget-feedBack-form-group has-feedback has-feedback">
                                    <div class="ul-w-feedBack-control-label ul-w-feedBack-editable normal" data-name="name.title" style="display: block">Кому преподносим подарок</div>
                                    <select class="ul-widget-feedBack-form-control normal" id="isGift" placeholder="Кому преподносим подарок">
                                        <option value="1">Девушке</option><option value="2">Парню</option><option value="3">Ребенку</option><option value="4">Родителям</option><option value="5">Бабушке/дедушке</option><option value="6">Себе😅</option>
                                    </select>
                                </div>
                                <div class="ul-widget-feedBack-form-group has-feedback has-feedback">
                                    <div class="ul-w-feedBack-control-label ul-w-feedBack-editable normal" data-name="name.title" style="display: block">Что предпочитаем</div>
                                    <select class="ul-widget-feedBack-form-control normal" id="isLove" placeholder="Что предпочитаем">
                                        <option value="1">Игрушки</option><option value="2">Сладости</option><option value="3">Цветы</option><option value="4">Все</option><option value="5">Не знаю😳</option>
                                    </select>
                                </div>
                                <div class="ul-widget-feedBack-form-group has-feedback has-feedback">
                                    <div class="ul-w-feedBack-control-label ul-w-feedBack-editable normal" data-name="name.title" style="display: block">Каков бюджет</div>
                                    <select class="ul-widget-feedBack-form-control normal" id="budget" placeholder="Каков бюджет?">
                                        <option value="1">Без разницы</option><option value="2">Дешевле</option><option value="3">Я студент</option><option value="4">У меня нет денег😞</option>
                                    </select>
                                </div>
                            </form>
                        </div>
                        <div id="ul-id-2-9" class="ul-widget ul-w-button text-center" data-controls="mer" data-widget="button" style="margin-top: 25px;"><a class="normal ul-w-button2 middle" id="generateGift">сгенерировать подарок&nbsp;</a></div>
                </div>
            </div>
            <div id="ul-id-36-89" class="row ul-row" style="display: none;margin-top: 11px;margin-bottom: 17px;"></div>
            <div id="ul-id-2-32" class="row ul-row">
                <div id="ul-id-2-33" class="col ul-col col-xs-12 col-sm-12 col-md-12">
                    <div id="ul-id-2-34" class="ul-widget ul-widget-wysivig" data-image="true" data-controls="mer" data-widget="wysiwyg">
                        <div class="ul-wysivig-editor clearfix" style="outline:0;word-wrap:break-word"><p><br></p><p><br></p></div>
                    </div>
                </div>
            </div>
            <div id="ul-id-2-26" class="row ul-row">
                <div id="ul-id-2-27" class="col ul-col col-xs-12 col-sm-12 col-md-12">
                    <div id="ul-id-2-28" class="ul-widget ul-widget-wysivig" data-image="true" data-controls="mer" data-widget="wysiwyg">
                        <div class="ul-wysivig-editor clearfix" style="outline:0;word-wrap:break-word">
                            <p style="text-align:center"><span class="g-color-text-2"><?= $pageText['picking']['section2Text'] ?></span></p>
                        </div>
                    </div>
                </div>
            </div>
            <div id="ul-id-2-35" class="row ul-row yandexMoney"><div id="ul-id-2-36" class="col ul-col col-xs-12 col-sm-12 col-md-12" style="padding-left: 0;"><div class="text-center"><iframe src="https://money.yandex.ru/quickpay/shop-widget?writer=seller&targets=%D0%9F%D0%BE%D0%B1%D0%BB%D0%B0%D0%B3%D0%BE%D0%B4%D0%B0%D1%80%D0%B8%D1%82%D1%8C&targets-hint=&default-sum=10&button-text=13&payment-type-choice=on&mobile-payment-type-choice=on&fio=on&comment=on&mail=on&hint=%D0%9C%D0%BE%D0%B6%D0%BD%D0%BE%20%D0%BE%D1%81%D1%82%D0%B0%D0%B2%D0%B8%D1%82%D1%8C%20%D0%BA%D0%BE%D0%BC%D0%BC%D0%B5%D0%BD%D1%82%D0%B0%D1%80%D0%B8%D0%B9%20%D0%BA%20%D0%B1%D0%BB%D0%B0%D0%B3%D0%BE%D0%B4%D0%B0%D1%80%D0%BD%D0%BE%D1%81%D1%82%D0%B8&successURL=https%3A%2F%2Fwww.islandgift.ru%2Fpicking&quickpay=shop&account=410014603054118" width="450" height="290" frameborder="0" allowtransparency="true" scrolling="no"></iframe></div></div></div>
            <div id="ul-id-2-32" class="row ul-row"><div id="ul-id-2-33" class="col ul-col col-xs-12 col-sm-12 col-md-12"><div id="ul-id-2-34" class="ul-widget ul-widget-wysivig" data-image="true" data-controls="mer" data-widget="wysiwyg"><div class="ul-wysivig-editor clearfix" style="outline:0;word-wrap:break-word"><p><br></p><p><br></p></div></div></div></div>
        </div>
    </div>
<?php
$site->footer();
?>