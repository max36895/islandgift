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
             data-parallax="none" style="" data-bgtype="color" data-map-settings="" data-auto_height="true" data-is-100vh-enabled="false" data-behavior="none">
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
                        <a type="submit" id="ButtonUpdateContact" style="cursor: pointer;"
                           class="ul-w-button1 middle">
                            Изменить контактные данные
                        </a>
                        <a type="submit" id="ButtonUpdatePage" style="cursor: pointer;"
                           class="ul-w-button1 middle">
                            Изменить данные страниц
                        </a>
                        <a type="submit" id="ButtonUpdatePageText" style="cursor: pointer;"
                           class="ul-w-button1 middle">
                            Изменить текста страниц
                        </a>

                        <div id="contactUpdate">
                            <div style="padding: 15px"></div>
                            <div style="width: 100%; margin-bottom: 15px;">
                                <h2>Изменить контактные данные</h2>
                                <p><b>Описание</b><br>Значения прописывать в соответствующее поле после "=>"<br>
                                    'name'=>'text'<br>'name'-название элемента<br>'text'-значение элемента
                                    <br>Изменять название элемента нельзя!</p>
                                <textarea id="textContact" style="height: 278px;width: 100%;margin-bottom: 15px;resize: vertical;" title="Изменить контактные данные"></textarea>
                                <a type="submit" id="updateConact" style="cursor: pointer;" class="ul-w-button1 middle">Изменить</a>
                            </div>
                        </div>
                        <div id="pageUpdate" style="display: none;">
                            <div style="padding: 15px"></div>
                            <div style="width: 100%; margin-bottom: 15px;">
                                <h2>Изменить данные страниц</h2>
                                <p><b>Описание</b><br>Значения прописывать в соответствующее поле после "=>"<br>
                                    'name'=>'text'<br>'name'-название элемента<br>'text'-значение элемента
                                    <br>Изменять название элемента нельзя!<br>
                                    ..._title/description/price и тд берутся из параметров. их описание доступно по <a href="param/desc.txt">ссылке</a>
                                    <br> В /* ... */ прописанно описание страницы. При добавлении новых страниц желательно прописывать описание страницы в /**/</p>
                                <textarea id="textPage" style="height: 759px;width: 100%;margin-bottom: 15px;resize: vertical;" title="Изменить данные страниц"></textarea>
                                <a type="submit" id="updatePage" style="cursor: pointer;" class="ul-w-button1 middle">Изменить</a>
                            </div>
                        </div>
                        <div id="pageUpdateText" style="display: none;">
                            <div style="padding: 15px"></div>
                            <div style="width: 100%; margin-bottom: 15px;">
                                <h2>Изменить текста страниц</h2>
                                <p><b>Описание</b><br>Значения прописывать в соответствующее поле после "=>"<br>
                                    'name'=>'text'<br>'name'-название элемента<br>'text'-значение элемента
                                    <br>Изменять название элемента нельзя!<br>
                                    Подробное описание доступно по <a href="param/desc.txt">ссылке</a>
                                    <br> В /* ... */ прописанно описание страницы. При добавлении новых страниц желательно прописывать описание страницы в /**/</p>
                                <textarea id="textForPage" style="height: 759px;width: 100%;margin-bottom: 15px;resize: vertical;" title="Изменить текста страниц"></textarea>
                                <a type="submit" id="updateForPage" style="cursor: pointer;" class="ul-w-button1 middle">Изменить</a>
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