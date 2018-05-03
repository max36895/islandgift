<?php
include 'kernel/SITE.php';
$site = new SITE();

$pageText = include 'kernel/param/textForPage.php';
$site->head('survey');
?>
<div id="ul-content">
    <div id="ul-id-0-1" class="ul-container g-theme-block-2" data-theme="g-theme-block-2" data-parallax="none" style="" data-bgtype="color" data-map-settings="" data-auto_height="true" data-is-100vh-enabled="false" data-behavior="none">
        <div class="container js-block-container">
            <div id="ul-id-0-2" class="row ul-row"><div id="ul-id-0-3" class="col ul-col col-xs-12 col-sm-12 col-md-12"><div id="ul-id-0-4" class="ul-widget ul-w-spacer" data-controls="mer" style="height:36px" data-widget="spacer"></div></div></div>
            <div id="ul-id-0-5" class="row ul-row"><div id="ul-id-0-6" class="col ul-col col-xs-12 col-sm-12 col-md-12"><div id="ul-id-0-7" spellcheck="false" class="ul-widget ul-widget-wysivig-header" data-controls="mer" data-tag="span" data-widget="header"><div spellcheck="false"><div class="ul-header-editor clearfix ul-header-wrap" style="outline:0;word-wrap:break-word;margin:0 5px"><h1 class="ul-w-header-span h1" style="text-align:center"><?=$pageText['survey']['title']?></h1></div></div></div></div></div>
            <div id="ul-id-0-8" class="row ul-row"><div id="ul-id-0-9" class="col ul-col col-xs-12 col-sm-12 col-md-12">
                    <?php
                    $site->breadcrumbList(
                        ['Главная', 'href="/" style="color: #337ab7;" title="Интернет магазин Maximko"'],
                        ['В крации о нас', 'href="/about" style="color: #337ab7;" title="В крации о нас"'],
                        ['Опрос', '']
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
                    <h2 style="text-align: center">Опрос по работе сайта</h2>
                    <p><span class="g-color-text-2"><?=$pageText['survey']['text']?></span></p>
                    <p></p></div>
                <!-- Put this script tag to the <head> of your page -->
                <script type="text/javascript" src="//vk.com/js/api/openapi.js?152"></script>

                <script type="text/javascript">
                    VK.init({apiId: , onlyWidgets: true});
                    //VK.init({apiId: 6406749, onlyWidgets: true});
                </script>
                <!-- Put this div tag to the place, where the Poll block will be -->
                <div id="vk_poll" style="margin: 0 auto;"></div>
                <script type="text/javascript">
                    VK.Widgets.Poll("vk_poll", {width: "300"}, "");
                </script>
            </div>
            <div id="ul-id-0-18" class="ul-widget ul-w-spacer" data-controls="mer" style="height:36px" data-widget="spacer"></div>
            <div id="ul-id-0-21" class="row ul-row"><div id="ul-id-0-22" class="col ul-col col-xs-12 col-sm-12 col-md-12"><div id="ul-id-0-23" class="ul-widget ul-w-spacer" data-controls="mer" style="height:80px" data-widget="spacer"></div></div></div>
        </div>
    </div>

    <!-- Put this script tag to the <head> of your page-->
    <script type="text/javascript">
        VK.init({apiId: , onlyWidgets: true});
    </script>
    <div id="ul-id-2-31" class="ul-container g-theme-block-2" data-theme="g-theme-block-2" data-parallax="none" style="" data-bgtype="color" data-map-settings="" data-auto_height="true" data-is-100vh-enabled="false" data-behavior="none">
        <div class="container js-block-container">
            <h3>Оставить комментарий</h3>
            <p><?=$pageText['survey']['comment']?></p>
            <!-- Put this div tag to the place, where the Comments block will be -->
            <div id="vk_comments"></div>
            <script type="text/javascript">
                VK.Widgets.Comments("vk_comments", {limit: 25, attach: "*"});
            </script>
            <div id="ul-id-0-21" class="row ul-row"><div id="ul-id-0-22" class="col ul-col col-xs-12 col-sm-12 col-md-12"><div id="ul-id-0-23" class="ul-widget ul-w-spacer" data-controls="mer" style="height:80px" data-widget="spacer"></div></div></div>
        </div>
    </div>

</div>
<?php
$site->footer();
?>
