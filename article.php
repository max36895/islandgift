<?php
ini_set('display_errors', 'On');
error_reporting('E_ALL');

include 'kernel/SITE.php';
require_once 'kernel/Articles.php';
$site = new SITE();
$article = new Articles();

$res = $article->articlesInfo();
if ($res[0] == 0) {
    echo '<script>document.location.href="' . $res[1] . '"</script>';
}
$pageParam = include 'kernel/param/PageParam.php';
if (isset($pageParam['article'])) {
    $find = ['article_name', 'article_description'];
    $replase = [$article->title, $article->description];
    $meta_d = str_replace($find, $replase, $pageParam['article']['description']);
    $meta_k = str_replace($find, $replase, $pageParam['article']['keyword']);
    $title = str_replace($find, $replase, $pageParam['article']['title']);
} else {
    $meta_d = $article->description;
    $meta_k = $article->title . ' читать интересно статья идея' . $meta_d;
    $title = $article->title;
}
$site->head('none', $title, $meta_d, $meta_k);
?>
<div id="ul-content">
    <div style="display: none" id="productOrder"></div>
    <div id="ul-id-2-20" class="ul-container g-theme-block-2" data-theme="g-theme-block-2" data-parallax="none" style="" data-bgtype="color" data-map-settings="" data-auto_height="true" data-is-100vh-enabled="false" data-behavior="none">
        <div class="container js-block-container">
            <div id="ul-id-2-21" class="row ul-row">
                <div id="ul-id-2-22" class="col ul-col col-xs-12 col-sm-12 col-md-12">
                    <div id="ul-id-2-23" class="ul-widget ul-w-spacer" data-controls="mer" style="height:36px" data-widget="spacer"></div>
                </div>
            </div>
            <div id="ul-id-2-24" class="row ul-row">
                <div id="ul-id-2-25" class="col ul-col col-xs-12 col-sm-12 col-md-12">
                    <div id="ul-id-2-26" spellcheck="false" class="ul-widget ul-widget-wysivig-header" data-controls="mer"  data-tag="h1" data-widget="header">
                        <div spellcheck="false">
                            <div class="ul-header-editor clearfix ul-header-wrap" style="outline:0;word-wrap:break-word;margin:0 5px"><h1 class="ul-w-header-span h1" style="text-align:center"><?= $article->title?></h1></div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="ul-id-2-27" class="row ul-row">
                <div id="ul-id-2-28" class="col ul-col col-xs-12 col-sm-12 col-md-12">
                    <div id="ul-id-2-29" class="ul-widget ul-w-spacer" data-controls="mer" style="height:36px" data-widget="spacer"></div>
                </div>
            </div>
        </div>
    </div>

    <div id="ul-id-2-0" class="ul-container g-theme-block-0 g-theme-block-2" data-theme="g-theme-block-0" data-parallax="none" style="" data-bgtype="color" data-map-settings="" data-auto_height="true" data-is-100vh-enabled="false" data-behavior="none">
        <div class="container js-block-container">
            <div id="ul-id-2-8" class="row ul-row">
                <div id="ul-id-2-9" class="col ul-col col-xs-12 col-sm-12 col-md-12">
                    <div id="ul-id-2-10" class="ul-widget ul-w-spacer" data-controls="mer" style="height:50px" data-widget="spacer"></div>
                </div>
            </div>
            <div id="ul-id-2-11" class="row ul-row">
                <div id="ul-id-2-12" class="col ul-col col-xs-12 col-sm-12 col-md-12">
                    <div id="ul-id-2-13" class="ul-widget" type="border">
                        <div class="ul-w-border" data-reactroot="" data-reactid="1" data-react-checksum="2054171773">
                            <div class="hr ul-widget-border-style1" data-reactid="2"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="ul-id-2-14" class="row ul-row">
                <div id="ul-id-2-15" class="col ul-col col-xs-12 col-sm-12 col-md-12">
                    <?php
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
                        ['Список статей📚', 'href="/articles" ' . $color . ' title="Список статей"'],
                        [$article->title, '']
                    );
                    ?><div id="ul-id-2-16" class="ul-widget ul-w-spacer" data-controls="mer" style="height:50px" data-widget="spacer"></div>
                </div>
            </div>

            <div id="ul-id-2-1" class="row ul-row">
                <?= $article->showArticle() ?>
                <div id="ul-id-2-4" class="col ul-col col-xs-12 col-sm-12 col-md-12">

                </div>
                <div  id="ul-id-2-4" class="col ul-col col-xs-12 col-sm-12 col-md-12">
                    <p style="text-align: center; margin: 25px;"> Статья написана:
                        <span><?= $article->author ?></span>
                    </p>
                </div>
            </div>

            <div id="ul-id-2-17" class="row ul-row">
                <div id="ul-id-2-18" class="col ul-col col-xs-12 col-sm-12 col-md-12">
                    <div id="ul-id-2-19" class="ul-widget ul-w-spacer" data-controls="mer" style="height:50px" data-widget="spacer"></div>
                </div>
            </div>
        </div>
    </div>

    <script type="application/ld+json">{
        "@context": "http://schema.org",
        "@type": "NewsArticle",
        "mainEntityOfPage": {
        "@type": "WebPage",
        "@id": "https://islandgift.ru<?=$_SERVER['REQUEST_URI']?>"
        },<?php $param = include'kernel/param/PageParam.php';?>
        "headline": "<?=$article->title?>",
        "image": [
        "https://www.islandgift.ru<?php echo str_replace('../','/',$article->img);?>"
        ],
        "datePublished": "2018-04-04T08:00:00+03:00",
        "dateModified": "<?php echo date('Y-m-d').'T'.date('H:m:s').'+03:00'?>",
        "author": {
        "@type": "Person",
        "name": "Maximko"
        },
        "publisher": {
        "@type": "Organization",
        "name": "Maximko",
        "logo": {
        "@type": "ImageObject",
        "url": "https://www.islandgift.ru/logo.png"
        }
        },
        "description": "<?= $article->description?>"
        }</script>

    <!-- Put this script tag to the <head> of your page -->
    <script type="text/javascript" src="//vk.com/js/api/openapi.js?152"></script>
    <script type="text/javascript">
        VK.init({apiId: , onlyWidgets: true});
    </script>
    <div id="ul-id-2-29" class="ul-container g-theme-block-2" data-theme="g-theme-block-2" data-parallax="none" style="" data-bgtype="color" data-map-settings="" data-auto_height="true" data-is-100vh-enabled="false" data-behavior="none">
        <div class="container js-block-container">
            <div style="margin: 0 auto">
                <!-- Put this div tag to the place, where the Like block will be -->
                <div id="vk_like" style="margin: 0 auto"></div>
                <script type="text/javascript">
                    VK.Widgets.Like("vk_like", {type: "button", height: 25});
                </script>
            </div>
        </div>
    </div>

    <div id="ul-id-2-30" class="ul-container g-theme-block-2" data-theme="g-theme-block-2" data-parallax="none" style="" data-bgtype="color" data-map-settings="" data-auto_height="true" data-is-100vh-enabled="false" data-behavior="none">
        <div class="container js-block-container">
            <div id="ul-id-2-31" class="row ul-row">
                <div id="ul-id-2-32" class="col ul-col col-xs-12 col-sm-12 col-md-12">
                    <div id="ul-id-2-33" class="ul-widget ul-w-spacer" data-controls="mer" style="height:36px" data-widget="spacer"></div>
                    <div style="margin: 0 auto; text-align: center;">
                        <script src="//yastatic.net/es5-shims/0.0.2/es5-shims.min.js"></script>
                        <script src="//yastatic.net/share2/share.js"></script>
                        <p style="padding-bottom: 0; padding-top: 11px; font-size: 19px;">🎈Поделиться статьей в соц. сетях😇</p>
                        <div class="ya-share2" data-services="vkontakte,facebook,telegram,odnoklassniki,whatsapp,viber,gplus,instagram,skype,moimir" data-counter=""></div>
                    </div>

                </div>
            </div>
            <div id="ul-id-2-37" class="row ul-row">
                <div id="ul-id-2-38" class="col ul-col col-xs-12 col-sm-12 col-md-12">
                    <div id="ul-id-2-39" class="ul-widget ul-w-spacer" data-controls="mer" style="height:36px" data-widget="spacer"></div>
                </div>
            </div>
        </div>
    </div>

    <div id="ul-id-2-31" class="ul-container g-theme-block-2" data-theme="g-theme-block-2" data-parallax="none" style="" data-bgtype="color" data-map-settings="" data-auto_height="true" data-is-100vh-enabled="false" data-behavior="none">
        <div class="container js-block-container">
        <!-- Put this div tag to the place, where the Comments block will be -->
        <div id="vk_comments"></div>
        <script type="text/javascript">
            VK.Widgets.Comments("vk_comments", {limit: 25, attach: "*"});
        </script>
        </div>
    </div>

</div>
<?php
$site->footer();
?>

