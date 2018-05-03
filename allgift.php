<?php
ini_set('display_errors', 'On');
error_reporting('E_ALL');

include 'kernel/SITE.php';
$site = new SITE();
$productDb = new Product();

$pageText = include 'kernel/param/textForPage.php';
$products = $productDb->allGift();
$site->head('allgift');
?>
    <div id="ul-content">
        <div id="ul-id-7-3" class="ul-container g-theme-block-2" data-theme="g-theme-block-2" data-parallax="none" style="" data-bgtype="color" data-map-settings="" data-auto_height="true" data-is-100vh-enabled="false" data-behavior="none">
            <div class="container js-block-container">
                <div id="ul-id-7-4" class="row ul-row"><div id="ul-id-7-5" class="col ul-col col-xs-12 col-sm-12 col-md-12"><div id="ul-id-7-6" class="ul-widget ul-w-spacer" data-controls="mer" style="height:36px" data-widget="spacer"></div></div></div>
                <div id="ul-id-7-7" class="row ul-row">
                    <div id="ul-id-7-8" class="col ul-col col-xs-12 col-sm-12 col-md-12">
                        <div id="ul-id-7-9" spellcheck="false" class="ul-widget ul-widget-wysivig-header" data-controls="mer"  data-tag="h1" data-widget="header">
                            <div spellcheck="false">
                                <div class="ul-header-editor clearfix ul-header-wrap" style="outline:0;word-wrap:break-word;margin:0 5px"><h1 class="ul-w-header-span h1" style="text-align:center"><?=$pageText['allgift']['title']?></h1></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="ul-id-7-10" class="row ul-row"><div id="ul-id-7-11" class="col ul-col col-xs-12 col-sm-12 col-md-12"><div id="ul-id-7-12" class="ul-widget ul-w-spacer" data-controls="mer" style="height:36px" data-widget="spacer"></div></div></div>
            </div>
        </div>
        <div id="ul-id-5-0" class="ul-container g-theme-block-0 g-theme-block-2" data-theme="g-theme-block-0" data-parallax="none" style="" data-bgtype="color" data-map-settings="" data-auto_height="true" data-is-100vh-enabled="false" data-behavior="none">
            <div class="container js-block-container">
                <div id="ul-id-5-1" class="row ul-row">
                    <div id="ul-id-5-2" class="col ul-col col-xs-12 col-sm-12 col-md-12">
                        <div id="ul-id-5-3" class="ul-widget ul-widget-wysivig" data-image="true" data-controls="mer" data-widget="wysiwyg"><div class="ul-wysivig-editor clearfix" style="outline:0;word-wrap:break-word"><p><?=$pageText['allgift']['description']?></p></div></div>
                    </div>
                </div>
            </div>
        </div>
        <div id="ul-id-5-4" class="ul-container g-theme-block-0 g-theme-block-2" data-theme="g-theme-block-0" data-parallax="none" style="" data-bgtype="color" data-map-settings="" data-auto_height="true" data-is-100vh-enabled="false" data-behavior="none">
            <div class="container-fluid js-block-container" id="productOrder">
                <div id="ul-id-6-0" class="row ul-row"><div id="ul-id-6-1" class="col ul-col col-xs-12 col-sm-12 col-md-12"><div id="ul-id-6-2" class="ul-widget ul-w-spacer" data-controls="mer" style="height:50px" data-widget="spacer"></div></div></div>
                <div id="ul-id-6-3" class="row ul-row"><div id="ul-id-6-4" class="col ul-col col-xs-12 col-sm-12 col-md-12"><div id="ul-id-6-5" class="ul-widget" type="border"><div class="ul-w-border"><div class="hr ul-widget-border-style2" data-reactid="2"></div></div></div></div></div>
                <div id="ul-id-6-6" class="row ul-row">
                    <div id="ul-id-6-7" class="col ul-col col-xs-12 col-sm-12 col-md-12"><?php
                        $color = 'style="color:';
                        $number = random_int(1, 9);
                        switch ($number) {
                            case 1:
                                $color .= 'hotpink;"';
                                break;
                            case 2:
                                $color .= 'mediumblue;"';
                                break;
                            case 3:
                                $color .= 'deeppink;"';
                                break;
                            case 4:
                                $color .= 'mediumvioletred;"';
                                break;
                            case 5:
                                $color .= 'darkred;"';
                                break;
                            case 6:
                                $color .= 'blueviolet;"';
                                break;
                            case 7:
                                $color .= 'magenta;"';
                                break;
                            case 8:
                                $color .= 'navy;"';
                                break;
                            case 9:
                                $color .= '#8bc63e;"';
                                break;
                        }
                        $site->breadcrumbList(
                            ['Главная', 'href="/" style="color: #337ab7;" title="Интернет магазин Maximko"'],
                            ['Подарок для тебя💝', 'href="/gift" ' . $color . ' title="Подарок для тебя"'],
                            ['Все подарки', '']
                        );
                        ?>
                        <div id="ul-id-6-8" class="ul-widget ul-w-spacer" data-controls="mer" style="height:50px" data-widget="spacer"></div>
                    </div>
                </div>
                <?php $site->findProductText(); ?>
                <div id="ul-id-8-36" style="display: none"></div>
                <div id="notFind"><div id="ul-id-8-3"><?php
                        $site->showProduct($products);
                    ?></div></div>
                <div id="ul-id-8-0" class="row ul-row"><div id="ul-id-8-1" class="col ul-col col-xs-12 col-sm-12 col-md-12"><div id="ul-id-8-2" class="ul-widget ul-w-spacer" data-controls="mer" style="height:50px" data-widget="spacer"></div></div></div>
            </div>
        </div>
    </div>
<?php
$site->footer();
?>