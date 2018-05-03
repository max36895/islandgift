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
                                <div class="ul-header-editor clearfix ul-header-wrap" placeholder="placeholder" style="outline:0;word-wrap:break-word;margin:0 5px"><h1 style="text-align:center">Админка <span class="g-color-text-3">сайта</span>&nbsp;</h1></div>
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
             data-parallax="none" style="" data-bgtype="color" data-map-settings="" data-auto_height="true" data-is-100vh-enabled="false" data-behavior="none">
            <div class="container-fluid js-block-container">
                <div id="ul-id-6-0" class="row ul-row">
                    <div id="ul-id-6-1" class="col ul-col col-xs-12 col-sm-12 col-md-12">
                        <div id="ul-id-6-2" class="ul-widget ul-w-spacer" data-controls="mer" style="height:50px" data-widget="spacer"></div>
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
                        <div id="ul-id-6-8" class="ul-widget ul-w-spacer" data-controls="mer" style="height:50px" data-widget="spacer"></div>
                    </div>
                </div>

                <div id="ul-id-9-0" class="row ul-row" style="text-align: center;">
                    <div id="ul-id-feedBack-footerform" class="ul-widget ul-widget-feedBack clearfix default" data-controls="e" data-widget="feedBack" style="margin: 0 auto;">
                        <div id="contactUpdate">
                            <div style="padding: 15px"></div>
                            <div style="width: 100%; margin-bottom: 15px;">
                                <h2>Акции и спец предложения</h2>
                                <p><b>Описание</b><br>Акции, которые действуют на сайте. На сайте будет отображаться последняя активная акция!<br>
                                    Что бы добавить кнопку необходимо прописать следующий код:
                                    button_Text#$страница#$. Text - текст внутри кнопки<br>
                                    Пример: новая акция button_название#&/product/1999#&<br>
                                    Если кнопки нет, то в конце прописать end_. <br>
                                    Обязательно должно быть либо end_ либо кнопка, иначе произойдет сбой в верстке. И возможно не корреткое отображение сайта<br>
                                    Так же на сайте обязательно должна быть хотябы одна активная акция иначе будет сбой в верстке. если все же акций нет должна быть созданна пустая акция с end_
                                </p>

                                <table border='1' style='margin-top: 25px;width:100%;'>
                                    <tr><td>Текст</td>
                                        <td><textarea style='resize: vertical' class='ul-widget-feedBack-form-control normal' rows='11' type='text' id='textPromotions' placeholder='Акция' ></textarea></td></tr>
                                    <tr><td>Статус</td>
                                        <td><input class='ul-widget-feedBack-form-control normal' type='text' id='statusPromotions' placeholder='1-активна; 0-не активна' value=''></td></tr>
                                    <tr><td></td>
                                        <td>
                                            <a type='submit' id='addPromotions' style='cursor: pointer;' class='ul-w-button1 middle'>Добавить</a>
                                        </td>
                                    </tr>
                                </table><?php
                                require_once 'Promotions.php';
                                $promo = new Promotions();
                                $text = $promo->endPromo();
                                ?><p style="margin-top: 25px;text-align: center;width: 100%;"><?=$text?></p>
                                <div class="ul-widget-feedBack-form-group has-feedback has-feedback">
                                    <div class="ul-w-feedBack-control-label ul-w-feedBack-editable normal" data-name="name.title">№ Акции</div>
                                    <input class="ul-widget-feedBack-form-control normal" type="text" id="findPromotions" placeholder="№ Акции">
                                    <span class="ul-widget-feedBack-form-control-feedback icon-content-special-required"></span>
                                </div>
                                <div id="text" style="width: 100%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="ul-id-0-94" style="width: 100%" class="row ul-row"><div id="ul-id-0-95" class="col ul-col col-xs-12 col-sm-12 col-md-12"><div id="ul-id-0-96" class="ul-widget ul-w-spacer" data-controls="mer" style="height:72px" data-widget="spacer"></div></div></div>
    </div>
<?php
$site->footer();
?>