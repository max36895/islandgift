<?php
header('HTTP/1.0 404 Not Found');
header('Status: 404 Not Found');
include 'kernel/SITE.php';
$site = new SITE();
$site->head('none','Страница не найдена','Страница не найдена','Страница не найдена');
?>
<div id="body" class="g-theme-site-3" data-mode="published" data-site-theme="g-theme-site-3"><div id="body-fict" class="g-theme-block-2 ul-page-special-404" data-block_theme="g-theme-block-2" style="" data-parallax="none"><div id="ul-content"><div id="ul-id-special-404_block" class="ul-container g-theme-block-2" style="" data-theme="g-theme-block-2" data-bgtype="color" data-map-settings="" data-parallax="none"><div class="container special-404-design3"><div class="col col-xs-12 col-lg-offset-1 col-lg-10"><div class="row"><div class="col col-xs-12 col-sm-5 col-sm-push-7 col-md-5 col-md-push-7"><div id="ul-id-special-404_icon" class="ul-widget ul-widget-icon text-center" data-controls="uer" data-widget="icon" data-is-icon-font-loaded="true"><img class="ul-w-icon-size-192" src="/img/icons/404-cat.svg"></div></div><div class="col col-xs-12 col-sm-7 col-sm-pull-5 col-md-7 col-md-pull-5"><div id="ul-id-special-404_header2" spellcheck="false" class="ul-widget ul-widget-wysivig-header js-editableWithEditor ul-disabled-overlay-element" data-controls="ue" data-tag="span" data-widget="header"><div spellcheck="false"><div class="ul-header-editor clearfix ul-header-wrap ul-editableWithEditor" style="outline:none; word-wrap: break-word; margin: 0 5px" contenteditable="true" spellcheck="false"><span class="ul-w-header-span h1">Упс... Ошибочка<br>Данная страница не найдена</span></div></div><div id="ul-id-special-404_text" class="ul-widget ul-widget-wysivig" data-image="" data-controls="uer" data-widget="wysiwyg"><div class="ul-wysivig-editor clearfix" style="outline:none; word-wrap: break-word;"><p>Возможно вы&nbsp;ошиблись в&nbsp;адресе или страница была перемещена. Вы&nbsp;можете вернуться на&nbsp;главную, или воспользоваться меню.</p></div><div id="ul-id-special-404_button" class="ul-widget ul-w-button text-center " data-controls="ue" data-widget="button"><a class="normal ul-w-button1 middle" target="_self" href="/">На главную</a></div></div></div></div></div></div></div></div></div></div></div>
<?php
$site->footer();
?>