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

$info = '';
if ($_POST) {
    $info = '<span style="color: black;font-weight: bold;">' . $site->addGift() . '</span>';
}

$site->head('Админка сайта', '', '');
echo $info;
?>
<div id="ul-content">
    <div id="ul-id-7-3" class="ul-container g-theme-block-2" data-theme="g-theme-block-2" data-parallax="none" style="" data-bgtype="color" data-map-settings="" data-auto_height="true" data-is-100vh-enabled="false" data-behavior="none">
        <div class="container js-block-container">
            <div id="ul-id-7-4" class="row ul-row">
                <div id="ul-id-7-5" class="col ul-col col-xs-12 col-sm-12 col-md-12">
                    <div id="ul-id-7-6" class="ul-widget ul-w-spacer" data-controls="mer" style="height:36px" data-widget="spacer"></div>
                </div>
            </div>
            <div id="ul-id-7-7" class="row ul-row">
                <div id="ul-id-7-8" class="col ul-col col-xs-12 col-sm-12 col-md-12">
                    <div id="ul-id-7-9" spellcheck="false" class="ul-widget ul-widget-wysivig-header" data-controls="mer" placeholder="" data-tag="h1" data-widget="header">
                        <div spellcheck="false">
                            <div class="ul-header-editor clearfix ul-header-wrap" placeholder="placeholder" style="outline:0;word-wrap:break-word;margin:0 5px"><h1 style="text-align:center">Админка <span class="g-color-text-3">сайта</span>&nbsp;
                                </h1></div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="ul-id-7-10" class="row ul-row">
                <div id="ul-id-7-11" class="col ul-col col-xs-12 col-sm-12 col-md-12">
                    <div id="ul-id-7-12" class="ul-widget ul-w-spacer" data-controls="mer" style="height:36px" data-widget="spacer"></div>
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
                <div id="ul-id-feedBack-footerform" class="ul-widget ul-widget-feedBack clearfix default" data-controls="e" data-widget="feedBack" style="margin: 0 auto;">

                    <p>Название коллеции зависит от типа!<br>Т.е. у продуктов название коллекции это номер продукта, а у статей это url<br>
                    Картинки загружаются и обновляются автоматически после нажатия кнопки "загрузить"<br>
                    Можно загрузить сразу неслько фото в коллекцию, но только если коллекция существует. В принципе коллекция будет создаваться для любых новых данных
                    <br>Менять название коллекции нельзя!<br>Полное описание полей доступно по <a href="param/desc.txt">ссылке</a>
                    </p>

                    <form class="feedBack" name="uploader" method="post" role="form" id="updateProduct" enctype="multipart/form-data" style=" margin-top: 15px;margin-bottom: 15px;">
                        <div class="ul-widget-feedBack-form-group ul-widget-feedBack-header has-feedback">
                            <div class="ul-w-feedBack-editable h2" data-name="header.title">Введите название коллекции</div>
                        </div>

                        <div class="ul-widget-feedBack-form-group has-feedback has-feedback">
                            <div class="ul-w-feedBack-control-label ul-w-feedBack-editable normal" data-name="name.title">Название товара</div>
                            <input class="ul-widget-feedBack-form-control normal" type="text" id="collection" name="collection" placeholder="Название">
                            <span class="ul-widget-feedBack-form-control-feedback icon-content-special-required"></span>
                        </div>

                        <div id="textCollection"></div>
                    </form>
                </div>
            </div>
            <div id="ul-id-0-94" class="row ul-row"><div id="ul-id-0-95" class="col ul-col col-xs-12 col-sm-12 col-md-12"><div id="ul-id-0-96" class="ul-widget ul-w-spacer" data-controls="mer" style="height:72px" data-widget="spacer"></div></div></div>
        </div>
    </div>
</div>
<?php
$site->footer();
?>
