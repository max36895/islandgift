<?php
ini_set('display_errors', 'On');
error_reporting('E_ALL');
require_once 'AdminSite.php';
$site = new Admin();

if ($site->avt->userDb->admin != 1 || !$site->avt->avtTriger) {
    header('HTTP/1.0 404 Not Found');
    header('Status: 404 Not Found');
    echo '<script>document.location.href = "/"</script>';
}

$site->head('Админка сайта', '', '');
?>
<div id="ul-content">
    <div id="ul-id-7-3" class="ul-container g-theme-block-2" data-theme="g-theme-block-2" data-parallax="none" style=""
         data-bgtype="color" data-map-settings="" data-auto_height="true" data-is-100vh-enabled="false"
         data-behavior="none">
        <div class="container js-block-container">
            <div id="ul-id-7-4" class="row ul-row">
                <div id="ul-id-7-5" class="col ul-col col-xs-12 col-sm-12 col-md-12">
                    <div id="ul-id-7-6" class="ul-widget ul-w-spacer" data-controls="mer" style="height:36px"
                         data-widget="spacer"></div>
                </div>
            </div>
            <div id="ul-id-7-7" class="row ul-row">
                <div id="ul-id-7-8" class="col ul-col col-xs-12 col-sm-12 col-md-12">
                    <div id="ul-id-7-9" spellcheck="false" class="ul-widget ul-widget-wysivig-header"
                         data-controls="mer" placeholder="" data-tag="h1" data-widget="header">
                        <div spellcheck="false">
                            <div class="ul-header-editor clearfix ul-header-wrap" placeholder="placeholder"
                                 style="outline:0;word-wrap:break-word;margin:0 5px"><h1 style="text-align:center">
                                    Админка <span class="g-color-text-3">сайта</span>&nbsp;
                                </h1><h2 style="text-align: center">Выгрузка в 1С</h2></div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="ul-id-7-10" class="row ul-row">
                <div id="ul-id-7-11" class="col ul-col col-xs-12 col-sm-12 col-md-12">
                    <div id="ul-id-7-12" class="ul-widget ul-w-spacer" data-controls="mer" style="height:36px"
                         data-widget="spacer"></div>
                </div>
            </div>
        </div>
    </div>

    <div id="ul-id-5-4" class="ul-container g-theme-block-0 g-theme-block-2" data-theme="g-theme-block-0"
         data-parallax="none" style="" data-bgtype="color"
         data-map-settings="" data-auto_height="true" data-is-100vh-enabled="false" data-behavior="none">
        <div class="container-fluid js-block-container">
            <div id="ul-id-6-0" class="row ul-row">
                <div id="ul-id-6-1" class="col ul-col col-xs-12 col-sm-12 col-md-12">
                    <div id="ul-id-6-2" class="ul-widget ul-w-spacer" data-controls="mer"
                         style="height:50px" data-widget="spacer"></div>
                </div>
            </div>
            <div id="ul-id-6-3" class="row ul-row">
                <div id="ul-id-6-4" class="col ul-col col-xs-12 col-sm-12 col-md-12">
                    <div id="ul-id-6-5" class="ul-widget" type="border">
                        <div class="ul-w-border" data-reactroot="" data-reactid="1"
                             data-react-checksum="2056334462">
                            <div class="hr ul-widget-border-style2" data-reactid="2"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="ul-id-6-6" class="row ul-row">
                <div id="ul-id-6-7" class="col ul-col col-xs-12 col-sm-12 col-md-12">
                    <div id="ul-id-6-8" class="ul-widget ul-w-spacer" data-controls="mer"
                         style="height:50px" data-widget="spacer"></div>
                </div>
            </div>

            <div id="ul-id-9-0" class="row ul-row" style="text-align: center;">

                <div id="ul-id-feedBack-footerform" class="ul-widget ul-widget-feedBack clearfix default"
                     data-controls="e" data-widget="feedBack" style="margin: 0 auto;">
                    <a type="submit" href="1c/product" style="cursor: pointer;"
                       class="ul-w-button1 middle">
                        Выгрузка 1С товары
                    </a>
                    <a type="submit" href="1c/order" style="cursor: pointer;"
                       class="ul-w-button1 middle">
                        Выгрузка 1С заказы
                    </a>
                    <h3 style="text-align: center">Форматы</h3>
                    <p>Для товаров:<br>Наименование_Описание_Цена$<br>_ - разделение элементов<br>$ - разделение товаров
                    </p>
                    <p style="word-break: break-all;">Для заказов:<br>Имя_Почта_СтатусЗаказа_Доставка_Комментарий_Цена_Дата#Товар&Количество&Стоимость:<br>_
                        - разделение элементов<br>$ - разделение заказов
                        <br># - информирует что пошли товары<br>& - разделение элементов заказа<br>: - разделение
                        товаров в заказе</p>
                </div>
            </div>
        </div>
    </div>
    <?php
    $site->footer();
