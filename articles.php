<?php
ini_set('display_errors', 'On');
error_reporting('E_ALL');

include 'kernel/SITE.php';
require_once 'kernel/Articles.php';
$site = new SITE();
$articleDb = new Articles();

$paramPage = include 'kernel/param/textForPage.php';

$articles = $articleDb->selectArticle();
$site->head('articles');
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
                    <div id="ul-id-7-9" spellcheck="false" class="ul-widget ul-widget-wysivig-header" data-controls="mer"  data-tag="h1" data-widget="header">
                        <div spellcheck="false">
                            <div class="ul-header-editor clearfix ul-header-wrap" style="outline:0;word-wrap:break-word;margin:0 5px"><h1 class="ul-w-header-span h1" style="text-align:center"><?=$paramPage['articles']['title']?></h1></div>
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
    <div id="ul-id-6-0" class="ul-container g-theme-block-0 g-theme-block-2" data-theme="g-theme-block-0"
         data-parallax="none" style="" data-bgtype="color"
         data-map-settings="" data-auto_height="true" data-is-100vh-enabled="false" data-behavior="none">
        <div class="container js-block-container">
            <div id="ul-id-6-1" class="row ul-row">
                <div id="ul-id-6-2" class="col ul-col col-xs-12 col-sm-12 col-md-12">
                    <div id="ul-id-6-3" class="ul-widget ul-widget-wysivig" data-image="true"
                         data-controls="mer" data-widget="wysiwyg">
                        <div class="ul-wysivig-editor clearfix" style="outline:0;word-wrap:break-word">
                            <p><?= $paramPage['articles']['description'] ?><br></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="ul-id-7-4" class="ul-container g-theme-block-0 g-theme-block-2" data-theme="g-theme-block-0"
         data-parallax="none" style="" data-bgtype="color"
         data-map-settings="" data-auto_height="true" data-is-100vh-enabled="false" data-behavior="none">
        <div class="container-fluid js-block-container" id="productOrder">
            <div id="ul-id-8-0" class="row ul-row">
                <div id="ul-id-8-1" class="col ul-col col-xs-12 col-sm-12 col-md-12">
                    <div id="ul-id-8-2" class="ul-widget ul-w-spacer" data-controls="mer" style="height:50px" data-widget="spacer"></div>
                </div>
            </div>
            <div id="ul-id-8-3" class="row ul-row">
                <div id="ul-id-8-4" class="col ul-col col-xs-12 col-sm-12 col-md-12">
                    <div id="ul-id-8-5" class="ul-widget" type="border">
                        <div class="ul-w-border" data-reactroot="" data-reactid="1"
                             data-react-checksum="2056334462">
                            <div class="hr ul-widget-border-style2" data-reactid="2"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="ul-id-8-6" class="row ul-row">
                <div id="ul-id-8-7" class="col ul-col col-xs-12 col-sm-12 col-md-12">
                    <div id="ul-id-8-8" class="ul-widget ul-w-spacer" data-controls="mer" style="height:50px" data-widget="spacer"></div>
                </div>
            </div>
            <div id="notFind">
                <div id="ul-id-7-5" class="row ul-row">
                    <?php
                    $urlArticles = '';
                    if ($articles) {
                        $index = 1;
                        while ($article = mysqli_fetch_array($articles, MYSQLI_NUM)) {
                            ?>
                            <div class="col ul-col col-xs-12 col-sm-12 col-md-4">
                                <a href="/article/<?=$article[3]?>" id="ul-id-9-1" class="ul-widget ul-w-productCard js-w-productCard"
                                   data-controls="mer" data-widget="productCard" data-design="design-0" data-alignment="center">
                                    <div class="ul-w-productCard__picture"><img class="ul-w-productCard__picture__image js-w-productCard__picture__image" src="<?=$article[7]?>" alt="<?=$article[1]?>" title="<?=$article[1]?>"></div>
                                    <div class="ul-w-productCard__title"><div class="ul-w-productCard__title__content h4"><?=$article[1]?></div></div>
                                    <div class="ul-w-productCard__description note" itemprop="description"><?=$article[5]?></div>
                                    <div class="ul-w-productCard__spacer" data-position="description"></div>
                                    <a href="/article/<?=$article[3]?>" class="ul-w-productCard__action" style="text-align: center;">
                                        <span role="button" class="ul-w-productCard__action__button ul-w-button1 middle js-w-productCard__to-cart" data-description-visible="true" data-button-style="ul-w-button1 middle">
                                            <span class="ul-w-productCard__action__button__caption">Читать</span>
                                        </span>
                                    </a>
                                </a>
                            </div>
                            <?php
                            if ($urlArticles != '')
                                $urlArticles .= ',';
                            $urlArticles .= '{"@type":"ListItem","position":' . $index . ',"url":"https://www.islandgift.ru/article/' . $article[3] . '"}';
                            $index++;
                        }
                        mysqli_free_result($articles);
                    }
                    ?>
                </div>
            </div>
            <div id="ul-id-11-0" class="row ul-row">
                <div id="ul-id-11-1" class="col ul-col col-xs-12 col-sm-12 col-md-12">
                    <div id="ul-id-11-2" class="ul-widget ul-w-spacer" data-controls="mer" style="height:50px" data-widget="spacer"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="application/ld+json">
{
  "@context":"http://schema.org",
  "@type":"ItemList",
  "itemListElement":[
    <?= $urlArticles ?>
  ]
}
</script>
<?php
$site->footer();
?>
