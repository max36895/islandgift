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
                        <a type="submit" id="ButtonArticleCreate" style="cursor: pointer;"
                           class="ul-w-button1 middle">
                            Создать статью
                        </a>
                        <a type="submit" id="ButtonArticleUpdate" style="cursor: pointer;"
                           class="ul-w-button1 middle">
                            Изменить статью
                        </a>

                        <form class="feedBack" method="post" role="form" id="createArticle" action="addArticle.php" enctype="multipart/form-data" style="margin-top: 15px;margin-bottom: 15px;">
                            <div class="ul-widget-feedBack-form-group ul-widget-feedBack-header has-feedback">
                                <div class="ul-w-feedBack-editable h2" data-name="header.title">Введите информацию о статье
                                </div>
                            </div>

                            <div class="ul-widget-feedBack-form-group has-feedback has-feedback">
                                <div class="ul-w-feedBack-control-label ul-w-feedBack-editable normal"
                                     data-name="name.title" style="display: block;">Название
                                </div>
                                <input class="ul-widget-feedBack-form-control normal" type="text" name="name" placeholder="Название(title)" required>
                                <span class="ul-widget-feedBack-form-control-feedback icon-content-special-required"></span>
                            </div>

                            <div class="ul-widget-feedBack-form-group has-feedback has-feedback">
                                <div class="ul-w-feedBack-control-label ul-w-feedBack-editable normal"
                                     data-name="name.title" style="display: block;">description
                                </div>
                                <textarea style='resize: vertical;' class="ul-widget-feedBack-form-control normal" type="text" name="description"  placeholder="description" required></textarea>
                                <span class="ul-widget-feedBack-form-control-feedback icon-content-special-required"></span>
                            </div>

                            <div class="ul-widget-feedBack-form-group has-feedback has-feedback">
                                <div class="ul-w-feedBack-control-label ul-w-feedBack-editable normal"
                                     data-name="name.title" style="display: block;">url
                                </div>
                                <input class="ul-widget-feedBack-form-control normal" type="text" id="login" name="url" placeholder="url" required>
                                <span class="ul-widget-feedBack-form-control-feedback icon-content-special-required"></span>
                            </div>

                            <div class="ul-widget-feedBack-form-group has-feedback has-feedback">
                                <div class="ul-w-feedBack-control-label ul-w-feedBack-editable normal"
                                     data-name="name.title" style="display: block;">Краткое описание
                                </div>
                                <textarea style='resize: vertical;' class="ul-widget-feedBack-form-control normal" type="text" name="incomplete"  placeholder="Краткое описание" required></textarea>
                                <span class="ul-widget-feedBack-form-control-feedback icon-content-special-required"></span>
                            </div>

                            <div class="ul-widget-feedBack-form-group has-feedback has-feedback">
                                <div class="ul-w-feedBack-control-label ul-w-feedBack-editable normal"
                                     data-name="name.title" style="display: block;">Подробное описание
                                </div>
                                <textarea style='resize: vertical;' class="ul-widget-feedBack-form-control normal" type="text" name="full" placeholder="Подробное описание" required></textarea>
                                <span class="ul-widget-feedBack-form-control-feedback icon-content-special-required"></span>
                            </div>

                            <div class="ul-widget-feedBack-form-group has-feedback has-feedback">
                                <div class="ul-w-feedBack-control-label ul-w-feedBack-editable normal"
                                     data-name="name.title" style="display: block;">Автор
                                </div>
                                <input class="ul-widget-feedBack-form-control normal" type="text" name="author" placeholder="Автор" title="Maximko" required>
                                <span class="ul-widget-feedBack-form-control-feedback icon-content-special-required"></span>
                            </div>

                            <div class="ul-widget-feedBack-form-group has-feedback has-feedback">
                                <div class="ul-w-feedBack-control-label ul-w-feedBack-editable normal"
                                     data-name="name.title" style="display: block;">Фотография для статьи
                                </div>
                                <input class="ul-widget-feedBack-form-control normal" type="file" name="img" required>
                                <span class="ul-widget-feedBack-form-control-feedback icon-content-special-required"></span>
                            </div>
                            <div class="ul-w-feedBack-control-label ul-w-feedBack-control-helpBlock" style="display: block;">
                                <span id="helpBlock" class="help-block note"> </span>
                                <span style="color: #8bc63e;">*</span>Обязательные поля
                            </div>
                            <button type="submit" id="add" style="cursor: pointer;" class="ul-w-button1 middle">
                                Создать
                            </button>
                        </form>
                        <div id="updateArticle" style="display: none;">
                            <form class="feedBack"name="uploader" method="post" role="form" enctype="multipart/form-data" style=" margin-top: 15px;margin-bottom: 15px;">
                                <div class="ul-widget-feedBack-form-group ul-widget-feedBack-header has-feedback">
                                    <a type="submit" id="ArticleOption" style="cursor: pointer;" class="ul-w-button1 middle">
                                        Подробнее
                                    </a>
                                    <section id="option" style="display: none; text-align: left;">
                                        <h2>Информация</h2>
                                        <p> Можно использовать следующие теги:</p>
                                        <ul>
                                            <li>&lt;h1&gt;-полностью</li>
                                            <li>&lt;h2&gt;-полность</li>
                                            <li>&lt;h3&gt;-полность</li>
                                            <li>&lt;p&gt;-полность</li>
                                            <li>&lt;a&gt;-полностью</li>
                                            <li>&lt;i&gt;-полностью</li>
                                            <li>&lt;b&gt;-полностью</li>
                                            <li>&lt;span&gt;-полностью</li>
                                            <li>img_x(х-название картинки с расширением):cen-картинка на весь экран</li>
                                            <li>img_x(х-название картинки с расширением):left-картинка слева</li>
                                            <li>img_x(х-название картинки с расширением):right-картинка справа</li>
                                            <li>img_index:position-тоже самое что и для картинок выше. Только берется
                                                фото обложки(position - позиция так же как и выше)
                                            </li>
                                            <li>$tab$ - Красная строка(8 пробелов)</li>
                                            <li>&lt;youtube>W#H#codeVideo&lt;youtube>- вставка видео из ютуба</li>
                                        </ul>
                                        <br>Полное описание полей доступно по <a href="param/desc.txt">ссылке</a>
                                        <p>После добавления картинок, главной картинкой для статьи становится 1
                                            загруженная картинка!<br>
                                            <b>пс</b> Статьи лучше писать в вордеи после копировать данные. Перенос
                                            строки интерпретируется как тег br.<br>Так же не желательно писать какие
                                            либо параметры в h теги. h1 на странице присутствует изначально и берется из
                                            названия статьи.
                                            <br>Примерный вид для статьи:<br> &lt;h2&gt;заголовок&lt;/h2&gt;<br>&lt;p
                                            style="text-align:left;"&gt;Текст&lt;/p&gt;
                                            img_1.jpg:cen &lt;a href="/gift"&gt;<span style="color: #0f7bff">ссылка</span>&lt;/a&gt; img_information:left&lt;p&gt;Текст3...&lt;/p&gt;</p>
                                    </section>
                                    <div class="ul-w-feedBack-editable h2" data-name="header.title">Введите название статьи или url</div>
                                </div>

                                <div class="ul-widget-feedBack-form-group has-feedback has-feedback">
                                    <div class="ul-w-feedBack-control-label ul-w-feedBack-editable normal" data-name="name.title">Название статьи или url</div>
                                    <input class="ul-widget-feedBack-form-control normal" type="text" id="articleFind" name="article" placeholder="Название">
                                    <span class="ul-widget-feedBack-form-control-feedback icon-content-special-required"></span>
                                </div>

                                <div id="text"></div>
                            </form>
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